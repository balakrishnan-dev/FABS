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
        Schema::create('gst_configurations', function (Blueprint $table) {
            $table->id();
            $table->string('gst_status');
            $table->decimal('gst_percentage', 5, 2);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('gst_configurations');
    }
    
};
