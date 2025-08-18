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
        Schema::create('f_a_qs_contents', function (Blueprint $table) {
            $table->id();

            $table->json('home')->nullable();
            $table->json('about_us')->nullable();
            $table->json('faqs')->nullable();
            $table->json('infos')->nullable();
            $table->json('contact')->nullable();
            $table->json('banner_title')->nullable();
            $table->json('banner_subtitle')->nullable();
            $table->json('banner_description')->nullable();
            $table->json('step_title_first')->nullable();
            $table->json('step_title_second')->nullable();
            $table->json('step_title_third')->nullable();
            $table->json('step_title_fourth')->nullable();
            $table->json('step_item_first')->nullable();
            $table->json('step_item_second')->nullable();
            $table->json('step_item_third')->nullable();
            $table->json('step_item_fourth')->nullable();
            $table->json('faq_section_title')->nullable();
            $table->json('faq_section_description')->nullable();
            $table->json('cta_section_item_first')->nullable();
            $table->json('cta_section_item_second')->nullable();
            $table->json('cta_section_item_third')->nullable();
            $table->json('cta_section_contact_item_first')->nullable();
            $table->json('cta_section_contact_item_second')->nullable();
            $table->json('cta_section_contact_item_third')->nullable();
            $table->json('cta_section_contact_item_foruth')->nullable();
            $table->json('firstname')->nullable();
            $table->json('lastname')->nullable();
            $table->json('email')->nullable();
            $table->json('subject')->nullable();
            $table->json('message')->nullable();
            $table->json('send_message')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f_a_qs_contents');
    }
};
