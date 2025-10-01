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
        Schema::create('user_jobs', function (Blueprint $table) {
            $table->id();
            // Веза са послодавцем (Корисник/Компанија)
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete(); 

            // Основни подаци о послу
            $table->string('title');
            $table->text('description');
            $table->string('location'); // 'Београд', 'Remote', 'Хибридно'
            $table->decimal('salary_min', 10, 2)->nullable();
            $table->decimal('salary_max', 10, 2)->nullable();
            
            // Класификација
            $table->enum('employment_type', ['full-time', 'part-time', 'contract', 'internship'])->default('full-time');
            $table->enum('experience_level', ['junior', 'mid', 'senior', 'director'])->default('mid');
            
            // Апликација
            $table->string('application_link')->nullable();
            $table->string('application_email')->nullable();
            $table->timestamp('expires_at')->nullable();
            
            // Статус и статистика
            $table->boolean('is_active')->default(true);
            $table->integer('views_count')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_jobs');
    }
};
