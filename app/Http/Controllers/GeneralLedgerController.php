<?php

namespace App\Http\Controllers;

use App\Models\GeneralLedgerEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class GeneralLedgerController extends Controller
{
    public function index(Request $request)
    {
        $entries = GeneralLedgerEntry::query()
            ->when($request->filled('account_number'), function ($query) use ($request) {
                $query->where('account_number', $request->account_number);
            })
            ->when($request->filled('date_from'), function ($query) use ($request) {
                $query->where('transaction_date', '>=', $request->date_from);
            })
            ->when($request->filled('date_to'), function ($query) use ($request) {
                $query->where('transaction_date', '<=', $request->date_to);
            })
            ->paginate(15);

        return view('general_ledger.index', compact('entries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'account_number' => 'required|string',
            'transaction_date' => 'required|date',
            'description' => 'required|string',
            'debit_amount' => 'required|numeric|min:0',
            'credit_amount' => 'required|numeric|min:0',
            'currency' => 'required|string|size:3',
            'transaction_id' => 'nullable|string',
        ]);

        $entry = GeneralLedgerEntry::create($validated);

        // Здесь нужно добавить логику для пересчета баланса

        return redirect()->route('general_ledger.index')->with('success', 'Запись успешно создана');
    }

    public function show(GeneralLedgerEntry $entry)
    {
        return view('general_ledger.show', compact('entry'));
    }

    public function edit(GeneralLedgerEntry $entry)
    {
        return view('general_ledger.edit', compact('entry'));
    }

    public function update(Request $request, GeneralLedgerEntry $entry)
    {
        $validated = $request->validate([
            'account_number' => 'required|string',
            'transaction_date' => 'required|date',
            'description' => 'required|string',
            'debit_amount' => 'required|numeric|min:0',
            'credit_amount' => 'required|numeric|min:0',
            'currency' => 'required|string|size:3',
            'transaction_id' => 'nullable|string',
        ]);

        DB::transaction(function () use ($entry, $validated) {
            $oldDebit = $entry->debit_amount;
            $oldCredit = $entry->credit_amount;

            $entry->update($validated);

            $this->recalculateBalance($entry, $oldDebit, $oldCredit);
        });

        return redirect()->route('general_ledger.index')->with('success', 'Запись успешно обновлена');
    }

    public function destroy(GeneralLedgerEntry $entry)
    {
        DB::transaction(function () use ($entry) {
            $this->recalculateBalance($entry, $entry->debit_amount, $entry->credit_amount, true);
            $entry->delete();
        });

        return redirect()->route('general_ledger.index')->with('success', 'Запись успешно удалена');
    }

    private function recalculateBalance(GeneralLedgerEntry $entry, $oldDebit, $oldCredit, $isDelete = false)
    {
        $affectedEntries = GeneralLedgerEntry::where('account_number', $entry->account_number)
            ->where('transaction_date', '>=', $entry->transaction_date)
            ->where('id', '!=', $entry->id)
            ->orderBy('transaction_date')
            ->orderBy('id')
            ->get();

        $balance = $isDelete ? 0 : $entry->debit_amount - $entry->credit_amount;

        foreach ($affectedEntries as $affectedEntry) {
            $balance += $affectedEntry->debit_amount - $affectedEntry->credit_amount;
            $affectedEntry->balance = $balance;
            $affectedEntry->save();
        }

        if (!$isDelete) {
            $entry->balance = $balance - ($affectedEntries->last()->debit_amount ?? 0) + ($affectedEntries->last()->credit_amount ?? 0);
            $entry->save();
        }
    }

    public function create()
    {
        return view('general_ledger.create');
    }

    public function generateReport(Request $request)
    {
        $entries = GeneralLedgerEntry::query()
            ->when($request->filled('account_number'), function ($query) use ($request) {
                $query->where('account_number', $request->account_number);
            })
            ->when($request->filled('date_from'), function ($query) use ($request) {
                $query->where('transaction_date', '>=', $request->date_from);
            })
            ->when($request->filled('date_to'), function ($query) use ($request) {
                $query->where('transaction_date', '<=', $request->date_to);
            })
            ->orderBy('transaction_date')
            ->get();

        $csvFileName = 'general_ledger_report.csv';
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$csvFileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $columns = ['ID', 'Номер счета', 'Дата', 'Описание', 'Дебет', 'Кредит', 'Баланс', 'Валюта', 'ID транзакции'];

        $callback = function() use ($entries, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($entries as $entry) {
                fputcsv($file, [
                    $entry->id,
                    $entry->account_number,
                    $entry->transaction_date->format('d.m.Y'),
                    $entry->description,
                    $entry->debit_amount,
                    $entry->credit_amount,
                    $entry->balance,
                    $entry->currency,
                    $entry->transaction_id
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}