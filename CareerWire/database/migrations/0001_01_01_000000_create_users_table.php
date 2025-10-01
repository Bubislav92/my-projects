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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            // ОСНОВНИ ПОДАЦИ И АУТЕНТИФИКАЦИЈА
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            
            // ПРОФЕСИОНАЛНИ ПРОФИЛ
            $table->string('headline', 100)->nullable();
            $table->text('bio')->nullable();
            $table->string('location')->nullable();
            $table->string('avatar')->nullable();
            $table->string('background_image')->nullable();
            $table->string('website_url')->nullable();
            $table->string('linkedin_url')->nullable();

            // ПОДЕШАВАЊА И УПРАВЉАЊЕ
            $table->enum('role', ['individual', 'company', 'admin'])->default('individual');
            $table->boolean('is_active')->default(true);
            $table->integer('profile_views')->default(0);
            $table->timestamp('last_login_at')->nullable();
            
            // ПРИВАТНОСТ И КОНТАКТ
            $table->boolean('is_public')->default(true);
            $table->enum('contact_privacy', ['public', 'connections', 'private'])->default('connections');
            $table->string('phone', 20)->nullable();
            $table->date('birth_date')->nullable();
            
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};