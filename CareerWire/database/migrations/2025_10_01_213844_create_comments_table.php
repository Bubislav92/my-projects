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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            // Веза са корисником који коментарише
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); 

            // Полиморфна релација: commentable_id (ID поста/слике/коментара) и commentable_type (модел)
            $table->morphs('commentable'); // Додаје commentable_id и commentable_type
            
            // Садржај коментара
            $table->text('content');
            
            // Статистика (Ако желимо лајкове на коментарима)
            $table->integer('likes_count')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
