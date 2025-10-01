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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            
            // Корисник који је лајковао
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            
            // Полиморфна релација: likeable_id и likeable_type
            $table->morphs('likeable');
            
            // Осигурава да један корисник може лајковати исту ствар само једном
            $table->unique(['user_id', 'likeable_id', 'likeable_type']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
