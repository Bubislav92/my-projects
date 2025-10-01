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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // Веза са корисником
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Кључ ка 'users' табели

            // Садржај објаве
            $table->text('content')->nullable();
            $table->string('media_url')->nullable(); // Путања до слике/видеа
            $table->string('media_type')->nullable(); // Тип медија: 'image', 'video', 'document'
            
            // Тип и видљивост
            $table->enum('post_type', ['post', 'article', 'poll', 'promotion'])->default('post');
            $table->enum('visibility', ['public', 'connections', 'private'])->default('public');
            
            // Статистика
            $table->integer('likes_count')->default(0);
            $table->integer('comments_count')->default(0);
            $table->integer('shares_count')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
