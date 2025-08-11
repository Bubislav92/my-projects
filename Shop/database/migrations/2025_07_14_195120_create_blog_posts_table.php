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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique(); // Jedinstven slug za URL
            $table->text('excerpt')->nullable(); // Kratak opis (za listu postova)
            $table->longText('content'); // Sadržaj blog posta (duži tekst)
            $table->boolean('is_featured')->default(false); // Da li je istaknut post
            $table->boolean('is_published')->default(false); // Da li je objavljen
            $table->timestamp('published_at')->nullable(); // Datum objavljivanja
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
