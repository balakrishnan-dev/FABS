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
        Schema::create('weaving_masters', function (Blueprint $table) {
            $table->id();
            $table->string('loom_type');
            $table->string('design_name');
            $table->string('cl_no');
            $table->string('party_name');
            $table->string('shade');
            $table->date('weaving_date')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weaving_masters');
    }
};
