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
        Schema::create('sizing_masters', function (Blueprint $table) {
            $table->id();
            $table->string('loom_type');
            $table->string('order_type');
            $table->string('cl_no');
            $table->string('particulars');
            $table->string('sizing_name');
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
        Schema::dropIfExists('sizing_masters');
    }
};
