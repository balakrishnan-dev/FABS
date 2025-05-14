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
    Schema::create('year_creations', function (Blueprint $table) {
        $table->id();
        $table->string('company_name');
        $table->string('no_of_business');
        $table->string('address');
        $table->string('place');
        $table->string('pin');
        $table->string('std')->nullable();
        $table->string('phone_no')->nullable();
        $table->string('fax')->nullable();
        $table->string('email')->nullable();
        $table->string('inc_tax_pan_no')->nullable();
        $table->string('pin_no')->nullable();
        $table->string('cst_no')->nullable();
        $table->string('ecc_no')->nullable();
        $table->string('cerc_no')->nullable();
        $table->string('range')->nullable();
        $table->string('division')->nullable();
        $table->decimal('commission_rate', 10, 2)->nullable();
        $table->date('location_date')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('year_creations');
    }
};
