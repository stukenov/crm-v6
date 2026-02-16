<?php

use Livewire\Volt\Volt;
use App\Http\Controllers\GeneralLedgerController;

Volt::route('/', 'index');
Volt::route('/users', 'users.index');
Volt::route('/users/create', 'users.create');
Volt::route('/users/edit/{id}', 'users.edit');

Route::resource('general_ledger', GeneralLedgerController::class);

Route::get('general_ledger/report', [GeneralLedgerController::class, 'generateReport'])->name('general_ledger.report');
