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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('financial_year_from');
            $table->string('financial_year_to');
            $table->string('company_name');
            $table->string('nature_of_business')->nullable();
            $table->text('address')->nullable();
            $table->string('place')->nullable();
            $table->string('pin')->nullable();
            $table->string('std')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('fax')->nullable();
            $table->string('tel')->nullable();
            $table->string('income_tax_no')->nullable();
            $table->string('sales_tax_no')->nullable();
            $table->string('cst_no')->nullable();
            $table->string('password');
            $table->string('type')->nullable();
            $table->string('short_name')->nullable();
            $table->string('email')->nullable();
            $table->string('tin_no')->nullable();
            $table->string('ecc_no')->nullable();
            $table->string('cerc_no')->nullable();
            $table->string('range')->nullable();
            $table->string('division')->nullable();
            $table->decimal('commission_rate', 8, 2)->nullable();
            $table->string('location_code_no')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('default_year')->nullable();
            $table->text('remarks')->nullable();
            $table->enum('types', ['single', 'many'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
