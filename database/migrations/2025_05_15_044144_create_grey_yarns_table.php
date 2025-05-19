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
    Schema::create('grey_yarns', function (Blueprint $table) {
        $table->id();
        $table->string('count');
        $table->string('group_name');
        $table->string('yarn_name');
        $table->string('count_name');
        $table->string('type')->nullable(); // Optional (e.g., Cotton type)
        $table->string('unit')->nullable(); // Dropdown: Tex, Decitex, Denier
        $table->string('warp_otam');
        $table->string('weft_otam');
        $table->string('seer_warp_otam');
        $table->date('purchase_date')->nullable();
        $table->integer('opening_stock')->default(0);
        $table->integer('pootu')->nullable();
        $table->integer('bondhu_bundle')->nullable();
        $table->string('pootu_bondhu')->nullable();
        $table->string('pootu_bundle')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grey_yarns');
    }
};
