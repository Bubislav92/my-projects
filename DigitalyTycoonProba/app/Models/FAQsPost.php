<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FAQsPost extends Model
{
    use HasTranslations;

    protected $table = 'f_a_qs_posts';

    protected $fillable = [
        'header_title',
        'question',
        'answer',
        'logo_image',
        'header_image',

        'home',
        'about_us',
        'faqs',
        'infos',
        'contact',
        'banner_title',
        'banner_subtitle',
        'banner_description',
        'step_title_first',
        'step_title_second',
        'step_title_third',
        'step_title_fourth',
        'step_item_first',
        'step_item_second',
        'step_item_third',
        'step_item_fourth',
        'faq_section_title',
        'faq_section_description',
        'cta_section_item_first',
        'cta_section_item_second',
        'cta_section_item_third',
        'cta_section_contact_item_first',
        'cta_section_contact_item_second',
        'cta_section_contact_item_third',
        'cta_section_contact_item_foruth',
        'firstname',
        'lastname',
        'email',
        'subject',
        'message',
        'send_message',
    ];

    public array $translatable = [
        'header_title',
        'question',
        'answer',

        'home',
        'about_us',
        'faqs',
        'infos',
        'contact',
        'banner_title',
        'banner_subtitle',
        'banner_description',
        'step_title_first',
        'step_title_second',
        'step_title_third',
        'step_title_fourth',
        'step_item_first',
        'step_item_second',
        'step_item_third',
        'step_item_fourth',
        'faq_section_title',
        'faq_section_description',
        'cta_section_item_first',
        'cta_section_item_second',
        'cta_section_item_third',
        'cta_section_contact_item_first',
        'cta_section_contact_item_second',
        'cta_section_contact_item_third',
        'cta_section_contact_item_foruth',
        'firstname',
        'lastname',
        'email',
        'subject',
        'message',
        'send_message',
    ];

    protected $casts = [
        'header_title' => 'array',
        'question' => 'array',
        'answer' => 'array',

        'home' => 'array',
        'about_us' => 'array',
        'faqs' => 'array',
        'infos' => 'array',
        'contact' => 'array',
        'banner_title' => 'array',
        'banner_subtitle' => 'array',
        'banner_description' => 'array',
        'step_title_first' => 'array',
        'step_title_second' => 'array',
        'step_title_third' => 'array',
        'step_title_fourth' => 'array',
        'step_item_first' => 'array',
        'step_item_second' => 'array',
        'step_item_third' => 'array',
        'step_item_fourth' => 'array',
        'faq_section_title' => 'array',
        'faq_section_description' => 'array',
        'cta_section_item_first' => 'array',
        'cta_section_item_second' => 'array',
        'cta_section_item_third' => 'array',
        'cta_section_contact_item_first' => 'array',
        'cta_section_contact_item_second' => 'array',
        'cta_section_contact_item_third' => 'array',
        'cta_section_contact_item_foruth' => 'array',
        'firstname' => 'array',
        'lastname' => 'array',
        'email' => 'array',
        'subject' => 'array',
        'message' => 'array',
        'send_message' => 'array',
    ];
}
