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
    Schema::create('clients', function (Blueprint $table) {
        $table->id();
        $table->string('customer_number')->unique();
        $table->string('company_name');
        $table->string('email')->unique()->nullable();
        $table->string('phone')->nullable();

        // Shipping Address
        $table->string('shipping_street')->nullable();
        $table->string('shipping_city')->nullable();
        $table->string('shipping_state')->nullable();
        $table->string('shipping_zip')->nullable();
        $table->string('shipping_country')->nullable();

        // Billing Address
        $table->string('billing_street')->nullable();
        $table->string('billing_city')->nullable();
        $table->string('billing_state')->nullable();
        $table->string('billing_zip')->nullable();
        $table->string('billing_country')->nullable();

        // Tax Info
        $table->string('tax_number')->nullable();
        $table->string('tax_type')->nullable();

        // Bank Info
        $table->string('bank_name')->nullable();
        $table->string('account_number')->nullable();
        $table->string('bank_code')->nullable();
        $table->string('account_holder')->nullable();

        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
