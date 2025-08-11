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
        Schema::create('about_posts', function (Blueprint $table) {
            $table->id();

            // Glavni tekstualni sadržaji - Svi moraju biti JSON tipa za Spatie Translatable
            $table->json('header_text')->nullable();
            $table->json('header_description')->nullable();
            $table->json('section_text')->nullable();

            // Naslovi menija
            $table->json('menu_first_title')->nullable();
            $table->json('menu_second_title')->nullable();
            $table->json('menu_third_title')->nullable();
            $table->json('menu_fourth_title')->nullable();

            // Podnaslovi menija
            $table->json('menu_first_subtitle')->nullable();
            $table->json('menu_second_subtitle')->nullable();
            $table->json('menu_third_subtitle')->nullable();
            $table->json('menu_fourth_subtitle')->nullable();

            // Opisi menija
            $table->json('menu_first_description')->nullable();
            $table->json('menu_second_description')->nullable();
            $table->json('menu_third_description')->nullable();
            $table->json('menu_fourth_description')->nullable();

            // Slike - Ove kolone ne treba da budu JSON ako putanja do slike nije prevođena
            // Ako slike nisu specifične za jezik, ostavi ih kao string.
            // Ako su slike specifične za jezik, onda ih takođe treba pretvoriti u JSON.
            $table->string('header_image')->nullable(); 
            $table->string('menu_first_image')->nullable();
            $table->string('menu_second_image')->nullable();
            $table->string('menu_third_image')->nullable();
            $table->string('menu_fourth_image')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_posts');
    }
};
