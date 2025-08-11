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
        Schema::create('payment_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('payment_id')->nullable();
            $table->string('capture_id')->nullable(); // capture ID из PayPal-а
            $table->string('product_name')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('currency')->nullable()->default('USD');
            $table->string('status')->nullable(); // пример: COMPLETED, FAILED
            $table->string('event')->nullable(); // нпр. payment_completed, refund_initiated
            $table->json('payload')->nullable(); // raw JSON од PayPal API
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_logs');
    }
};
