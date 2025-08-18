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
            $table->json('header_text')->nullable();
            $table->json('header_description')->nullable();
            $table->string('header_image')->nullable();
            $table->json('section_text')->nullable();
            $table->json('menu_first_title')->nullable();
            $table->json('menu_second_title')->nullable();
            $table->json('menu_third_title')->nullable();
            $table->json('menu_fourth_title')->nullable();
            $table->json('menu_first_subtitle')->nullable();
            $table->json('menu_second_subtitle')->nullable();
            $table->json('menu_third_subtitle')->nullable();
            $table->json('menu_fourth_subtitle')->nullable();
            $table->json('menu_first_description')->nullable();
            $table->json('menu_second_description')->nullable();
            $table->json('menu_third_description')->nullable();
            $table->json('menu_fourth_description')->nullable();
            $table->string('menu_first_image')->nullable();
            $table->string('menu_second_image')->nullable();
            $table->string('menu_third_image')->nullable();
            $table->string('menu_fourth_image')->nullable();
            $table->json('home')->nullable();
            $table->json('about_us')->nullable();
            $table->json('faqs')->nullable();
            $table->json('contact')->nullable();
            $table->json('firstname')->nullable();
            $table->json('lastname')->nullable();
            $table->json('email')->nullable();
            $table->json('message')->nullable();
            $table->json('send_message')->nullable();
            $table->json('button_first')->nullable();
            $table->json('button_second')->nullable();
            $table->json('header_text_item_first')->nullable();
            $table->json('header_text_item_second')->nullable();
            $table->json('section_heading_title_first')->nullable();
            $table->json('section_heading_title_second')->nullable();
            $table->json('section_heading_description')->nullable();
            $table->json('skill_first')->nullable();
            $table->json('skill_second')->nullable();
            $table->json('skill_third')->nullable();
            $table->json('step_first')->nullable();
            $table->json('step_second')->nullable();
            $table->json('step_third')->nullable();
            $table->json('cta_section_item_first')->nullable();
            $table->json('cta_section_item_second')->nullable();
            $table->json('cta_section_item_third')->nullable();
            $table->json('cta_section_item_fourth')->nullable();
            $table->json('cta_section_contact_item_first')->nullable();
            $table->json('cta_section_contact_item_second')->nullable();
            $table->json('cta_section_contact_item_third')->nullable();
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
