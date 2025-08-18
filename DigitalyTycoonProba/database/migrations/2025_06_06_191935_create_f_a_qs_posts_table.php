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
        Schema::create('f_a_qs_posts', function (Blueprint $table) {
            $table->id();
            $table->json('header_title')->nullable();
            $table->json('question')->nullable();
            $table->json('answer')->nullable();
            $table->string('logo_image')->nullable();
            $table->string('header_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f_a_qs_posts');
    }
};
