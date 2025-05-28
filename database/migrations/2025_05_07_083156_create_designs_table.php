<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('designs', function (Blueprint $table) {
            $table->id();
            $table->string('loom_type');
            $table->string('order_type');
            $table->string('cl_no');
            $table->string('design_name');
            $table->string('po_no')->nullable();
            $table->string('weaving_type');
            $table->decimal('pick', 8, 2)->nullable();
            $table->decimal('read', 8, 2)->nullable();
            $table->decimal('rate_per_mts', 10, 2)->nullable();
            $table->string('width')->nullable();
            $table->decimal('weaver_mts', 10, 2)->nullable();
            $table->decimal('order_mts', 10, 2)->nullable();
            $table->decimal('weft_mts', 10, 2)->nullable();
            $table->date('order_date')->nullable();
            $table->string('count')->nullable();
            $table->string('buyer_name');
            $table->string('attention')->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designs');
    }
};
