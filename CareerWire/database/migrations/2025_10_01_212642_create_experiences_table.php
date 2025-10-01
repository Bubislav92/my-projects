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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            // Веза са корисником
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); 

            // Основни подаци о искуству
            $table->string('title'); // Назив позиције
            $table->string('company_name'); 
            $table->string('location')->nullable();
            
            // Време и статус
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('is_current')->default(false); // Да ли је тренутно запослење
            $table->text('description')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
