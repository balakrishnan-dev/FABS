<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Migration for ledger_masters table
        public function up()
        {
            Schema::create('ledger_masters', function (Blueprint $table) {
                $table->id();
                $table->string('ledger_name');
                $table->unsignedBigInteger('group_id');
                $table->string('balance_type');
                $table->decimal('opening_balance', 10, 2);
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('ledger_masters');
        }

};
