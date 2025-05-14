<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tds_masters', function (Blueprint $table) {
        $table->id();
        $table->date('date_from');
        $table->date('date_to');
        $table->unsignedBigInteger('ledger_id'); // Ledger Master reference
        $table->decimal('amount', 12, 2);
        $table->string('bill_no');
        $table->unsignedBigInteger('bank_id');   // Bank Master reference
        $table->string('type');
        $table->timestamps();
        $table->foreign('ledger_id')->references('id')->on('ledger_masters')->onDelete('cascade');
        $table->foreign('bank_id')->references('id')->on('bank_masters')->onDelete('set null');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tds_masters');
    }
};
