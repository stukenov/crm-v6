<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralLedgerEntry extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'account_number',
        'transaction_date',
        'description',
        'debit_amount',
        'credit_amount',
        'balance',
        'currency',
        'transaction_id',
    ];

    protected $casts = [
        'transaction_date' => 'date',
        'debit_amount' => 'decimal:2',
        'credit_amount' => 'decimal:2',
        'balance' => 'decimal:2',
    ];

    // Relationships and other methods will be added here
}