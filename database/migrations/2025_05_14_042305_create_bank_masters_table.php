<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('bank_masters', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name');
            $table->string('account_number');
            $table->string('ifsc_code')->nullable();
            $table->string('branch')->nullable();
            $table->unsignedBigInteger('ledger_id')->nullable(); // Optional FK
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('bank_masters');
    }
};
    