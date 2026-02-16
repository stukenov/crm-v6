<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralLedgerEntriesTable extends Migration
{
    public function up()
    {
        Schema::create('general_ledger_entries', function (Blueprint $table) {
            $table->id();
            $table->string('account_number');
            $table->date('transaction_date');
            $table->text('description');
            $table->decimal('debit_amount', 15, 2)->default(0);
            $table->decimal('credit_amount', 15, 2)->default(0);
            $table->decimal('balance', 15, 2);
            $table->string('currency', 3);
            $table->string('transaction_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('account_number');
            $table->index('transaction_date');
            $table->index('transaction_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('general_ledger_entries');
    }
}