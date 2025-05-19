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
        $table->unsignedBigInteger('ledger_id')->nullable();
        $table->decimal('amount', 10, 2)->nullable();
        $table->string('bill_no')->nullable();
        $table->unsignedBigInteger('bank_id')->nullable(); // must be nullable if using set null
        $table->string('type')->nullable();
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
