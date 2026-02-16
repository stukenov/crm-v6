@extends('layouts.app')

@section('content')
    <h1>Редактировать запись в Главной книге</h1>

    <form action="{{ route('general_ledger.update', $entry) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="account_number">Номер счета</label>
            <input type="text" class="form-control @error('account_number') is-invalid @enderror" id="account_number" name="account_number" value="{{ old('account_number', $entry->account_number) }}" required>
            @error('account_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="transaction_date">Дата транзакции</label>
            <input type="date" class="form-control @error('transaction_date') is-invalid @enderror" id="transaction_date" name="transaction_date" value="{{ old('transaction_date', $entry->transaction_date->format('Y-m-d')) }}" required>
            @error('transaction_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description', $entry->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="debit_amount">Сумма дебета</label>
            <input type="number" step="0.01" class="form-control @error('debit_amount') is-invalid @enderror" id="debit_amount" name="debit_amount" value="{{ old('debit_amount', $entry->debit_amount) }}" required>
            @error('debit_amount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="credit_amount">Сумма кредита</label>
            <input type="number" step="0.01" class="form-control @error('credit_amount') is-invalid @enderror" id="credit_amount" name="credit_amount" value="{{ old('credit_amount', $entry->credit_amount) }}" required>
            @error('credit_amount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="currency">Валюта</label>
            <input type="text" class="form-control @error('currency') is-invalid @enderror" id="currency" name="currency" value="{{ old('currency', $entry->currency) }}" required>
            @error('currency')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="transaction_id">ID транзакции</label>
            <input type="text" class="form-control @error('transaction_id') is-invalid @enderror" id="transaction_id" name="transaction_id" value="{{ old('transaction_id', $entry->transaction_id) }}">
            @error('transaction_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Обновить запись</button>
    </form>
@endsection