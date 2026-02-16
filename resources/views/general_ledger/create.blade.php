@extends('layouts.app')

@section('content')
    <h1>Создать новую запись в Главной книге</h1>

    <form action="{{ route('general_ledger.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="account_number">Номер счета</label>
            <input type="text" class="form-control @error('account_number') is-invalid @enderror" id="account_number" name="account_number" value="{{ old('account_number') }}" required>
            @error('account_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="transaction_date">Дата транзакции</label>
            <input type="date" class="form-control @error('transaction_date') is-invalid @enderror" id="transaction_date" name="transaction_date" value="{{ old('transaction_date') }}" required>
            @error('transaction_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="debit_amount">Сумма дебета</label>
            <input type="number" step="0.01" class="form-control @error('debit_amount') is-invalid @enderror" id="debit_amount" name="debit_amount" value="{{ old('debit_amount') }}" required>
            @error('debit_amount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="credit_amount">Сумма кредита</label>
            <input type="number" step="0.01" class="form-control @error('credit_amount') is-invalid @enderror" id="credit_amount" name="credit_amount" value="{{ old('credit_amount') }}" required>
            @error('credit_amount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="currency">Валюта</label>
            <input type="text" class="form-control @error('currency') is-invalid @enderror" id="currency" name="currency" value="{{ old('currency') }}" required>
            @error('currency')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="transaction_id">ID транзакции</label>
            <input type="text" class="form-control @error('transaction_id') is-invalid @enderror" id="transaction_id" name="transaction_id" value="{{ old('transaction_id') }}">
            @error('transaction_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Создать запись</button>
    </form>
@endsection