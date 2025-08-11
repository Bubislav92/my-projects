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
        Schema::create('pay_pal_settings', function (Blueprint $table) {
            $table->id();
            $table->string('sandbox_client_id')->nullable();
            $table->string('sandbox_secret')->nullable();
            $table->string('live_client_id')->nullable();
            $table->string('live_secret')->nullable();
            $table->enum('mode', ['sandbox', 'live'])->default('sandbox');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay_pal_settings');
    }
};
