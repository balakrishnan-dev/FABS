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
        Schema::create('lorry_invoice_display', function (Blueprint $table) {
            $table->id();
            $table->enum('loom_type',['Floor Looms', 'Frame Looms', 'Backstrap', 'Loom Table']);            
            $table->enum('order_type', ['Market Orders', 'Limit Orders', 'Stop Loss']);
            $table->string('CL_No');
            $table->string('design_name');
            $table->string('party_name');
            $table->date('date_from');
            $table->date('date_to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lorry_invoice_display');
    }
};
