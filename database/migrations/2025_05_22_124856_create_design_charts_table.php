<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignChartsTable extends Migration
{
    public function up()
    {
        Schema::create('design_charts', function (Blueprint $table) {
            $table->id();

            // Basic Info
            $table->string('loom_type')->nullable();
            $table->string('order_type')->nullable();
            $table->string('cl_no')->nullable();
            $table->string('design_name')->nullable();

            // Weaving Specifications
            $table->float('read')->nullable();
            $table->float('pick')->nullable();
            $table->float('width')->nullable();
            $table->decimal('order_mts', 10, 2)->nullable();
            $table->float('warp_ends')->nullable();

            // Additional Specs
            $table->string('r_reed')->nullable();
            $table->string('pick_text')->nullable();

            // Weight and Meterage – use decimal for precision
            $table->float('wa_weet', 10, 2)->nullable();      // Warp Actual Weight
            $table->decimal('we_weet', 10, 2)->nullable();      // Weft Actual Weight
            $table->decimal('weft_mts', 10, 2)->nullable();     // Weft in Meters
            $table->string('pin')->nullable();
            $table->decimal('we_ord_mts', 10, 2)->nullable();   // Weft Order Meters
            $table->decimal('wea_wt', 10, 2)->nullable();       // Weaving Actual Weight
            $table->decimal('warp_wt', 10, 2)->nullable();      // Warp Weight
            $table->decimal('total_picks', 10, 2)->nullable();  // Total Picks

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('design_charts');
    }
}
