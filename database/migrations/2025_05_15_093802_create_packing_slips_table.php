<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackingSlipsTable extends Migration
{
    public function up()
    {
        Schema::create('packing_slips', function (Blueprint $table) {
            $table->id();
            $table->enum('loom_type', ['Floor Looms', 'Frame Looms', 'Backstrap', 'Looms Table']);
            $table->enum('order_type', ['Market Orders', 'Limit Orders', 'Stop Loss']);
            $table->enum('no', ['A', 'B', 'C', 'D']);
            $table->integer('no_value')->nullable();
            $table->date('date');
            $table->string('party_name');
            $table->string('place_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('packing_slips');
    }
}
