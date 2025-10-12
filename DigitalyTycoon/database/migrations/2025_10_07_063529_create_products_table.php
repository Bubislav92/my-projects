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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // --- POLJA KOJA SE PREVODE (JSON za Spatie Translatable) ---
            $table->json('name');           // Naziv projekta/templejta
            $table->string('slug')->unique(); // Slug za URL 
            $table->json('short_description'); // Kratak opis
            $table->json('description');    // Detaljan opis
            
            // --- POLJA KOJA SE NE PREVODE (Standardni tipovi) ---
            
            // Finansije i Cene
            $table->decimal('price', 8, 2);
            $table->decimal('discount_price', 8, 2)->nullable();
            
            // Fajlovi, Slike i Linkovi
            $table->string('image_url')->nullable();      // Putanja do glavne slike
            $table->string('demo_url')->nullable();       // Link do probne verzije
            $table->string('download_path')->nullable(); // Putanja do ZIP fajla za preuzimanje
            
            // Status i Specifikacije
            $table->string('technologies')->nullable();
            $table->boolean('is_published')->default(false);
            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
