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
    Schema::create('invoices', function (Blueprint $table) {
        $table->id();
        $table->string('invoice_number')->unique();
        $table->unsignedBigInteger('client_id');
        $table->date('invoice_date');
        $table->date('due_date')->nullable();
        $table->decimal('total', 15, 2);
        $table->decimal('tax', 15, 2)->default(0);
        $table->decimal('discount', 15, 2)->default(0);
        $table->enum('status', ['draft', 'sent', 'paid', 'overdue'])->default('draft');
        $table->text('notes')->nullable();
        $table->timestamps();

        $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
