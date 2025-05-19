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
        Schema::create('lorries', function (Blueprint $table) {
            $table->id();
            $table->enum('loom_type',['Floor Looms', 'Frame Looms', 'Backstrap', 'Loom Table']);            
            $table->enum('sales_no', ['A', 'B', 'C', 'D']);
            $table->integer('no_value')->nullable();
            $table->date('date');
            $table->string('party_name');
            $table->string('place_name');
            $table->string('attn');
            $table->string('GRN_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lorries');
    }
};
