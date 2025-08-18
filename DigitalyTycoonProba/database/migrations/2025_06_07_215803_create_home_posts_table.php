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
        Schema::create('home_posts', function (Blueprint $table) {
            $table->id();
            
            // Tekstualna prevodiva polja (JSON)
            $table->json('home')->nullable();
            $table->json('services')->nullable();
            $table->json('projects')->nullable();
            $table->json('infos')->nullable();
            $table->json('contact')->nullable();
            $table->json('about_us')->nullable();
            $table->json('faqs')->nullable();
            $table->json('banner_title')->nullable();
            $table->json('banner_subtitle')->nullable();
            $table->json('banner_text_item_first')->nullable();
            $table->json('banner_text_item_second')->nullable();
            $table->json('banner_text_item_third')->nullable();
            $table->json('banner_text_item_fourth')->nullable();
            $table->json('banner_description')->nullable();
            $table->json('button_first')->nullable();
            $table->json('button_second')->nullable();
            $table->json('service_title_first')->nullable();
            $table->json('service_title_second')->nullable();
            $table->json('service_title_third')->nullable();
            $table->json('service_title_fourth')->nullable();
            $table->json('service_description')->nullable();
            $table->json('service_item_first')->nullable();
            $table->json('service_item_second')->nullable();
            $table->json('service_item_third')->nullable();
            $table->json('service_item_fourth')->nullable();
            $table->json('project_title_first')->nullable();
            $table->json('project_title_second')->nullable();
            $table->json('project_title_third')->nullable();
            $table->json('project_description')->nullable();
            $table->json('project_subtitle_first')->nullable();
            $table->json('project_subtitle_second')->nullable();
            $table->json('project_subtitle_third')->nullable();
            $table->json('project_subtitle_fourth')->nullable();
            $table->json('project_subtitle_fifth')->nullable();
            $table->json('project_subtitle_sixth')->nullable();
            $table->json('info_title_first')->nullable();
            $table->json('info_title_second')->nullable();
            $table->json('info_title_third')->nullable();
            $table->json('info_title_fourth')->nullable();
            $table->json('info_description_first')->nullable();
            $table->json('skill_step_first')->nullable();
            $table->json('skill_step_second')->nullable();
            $table->json('skill_step_third')->nullable();
            $table->json('info_description_second')->nullable();
            $table->json('cta_section_item_first')->nullable();
            $table->json('cta_section_item_second')->nullable();
            $table->json('cta_section_item_third')->nullable();
            $table->json('cta_section_contact_item_first')->nullable();
            $table->json('cta_section_contact_item_second')->nullable();
            $table->json('cta_section_contact_item_third')->nullable();
            $table->json('firstname')->nullable();
            $table->json('lastname')->nullable();
            $table->json('email')->nullable();
            $table->json('subject')->nullable();
            $table->json('message')->nullable();
            $table->json('send_message')->nullable();

            // Slike (string)
            $table->string('service_image_first')->nullable();
            $table->string('service_image_second')->nullable();
            $table->string('service_image_third')->nullable();
            $table->string('service_image_fourth')->nullable();
            $table->string('project_image_first')->nullable();
            $table->string('project_image_second')->nullable();
            $table->string('project_image_third')->nullable();
            $table->string('project_image_fourth')->nullable();
            $table->string('project_image_fifth')->nullable();
            $table->string('project_image_sixth')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_posts');
    }
};
