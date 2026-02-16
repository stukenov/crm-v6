@extends('layouts.app')

@section('content')
    <h1>Главная книга</h1>

    <form action="{{ route('general_ledger.index') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="account_number" class="form-control" placeholder="Номер счета" value="{{ request('account_number') }}">
            </div>
            <div class="col-md-3">
                <input type="date" name="date_from" class="form-control" value="{{ request('date_from') }}">
            </div>
            <div class="col-md-3">
                <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Фильтровать</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Номер счета</th>
                <th>Дата</th>
                <th>Описание</th>
                <th>Дебет</th>
                <th>Кредит</th>
                <th>Баланс</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entries as $entry)
                <tr>
                    <td>{{ $entry->id }}</td>
                    <td>{{ $entry->account_number }}</td>
                    <td>{{ $entry->transaction_date->format('d.m.Y') }}</td>
                    <td>{{ $entry->description }}</td>
                    <td>{{ number_format($entry->debit_amount, 2) }}</td>
                    <td>{{ number_format($entry->credit_amount, 2) }}</td>
                    <td>{{ number_format($entry->balance, 2) }}</td>
                    <td>
                        <a href="{{ route('general_ledger.show', $entry) }}" class="btn btn-sm btn-info">Просмотр</a>
                        <a href="{{ route('general_ledger.edit', $entry) }}" class="btn btn-sm btn-warning">Редактировать</a>
                        <form action="{{ route('general_ledger.destroy', $entry) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $entries->links() }}

    <a href="{{ route('general_ledger.create') }}" class="btn btn-success">Добавить запись</a>
    <a href="{{ route('general_ledger.report', request()->query()) }}" class="btn btn-info">Сгенерировать отчет</a>
@endsection