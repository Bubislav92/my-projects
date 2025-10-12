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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();

            // ✅ Podaci o kupcu
            $table->string('customer_name');
            $table->string('customer_email');

            // ✅ Informacije o proizvodu
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('product_name');
            $table->decimal('amount', 10, 2);
            $table->string('currency', 10)->default('USD');

            // ✅ Podaci o plaćanju
            $table->string('payment_method', ['stripe', 'paypal']);
            $table->string('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->string('payment_id')->nullable(); // ID iz Stripe/PayPal sistema

            // ✅ Link za preuzimanje
            $table->string('download_path')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
