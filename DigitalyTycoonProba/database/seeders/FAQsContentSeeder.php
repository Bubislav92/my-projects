<?php

namespace Database\Seeders;

use App\Models\FAQsContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FAQsContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FAQsContent::create([
            'home' => [
                'en' => 'Home',
                'sr' => 'Почетна',
                'ru' => 'Главная',
                'de' => 'Startseite',
                'es' => 'Inicio',
                'fr' => 'Accueil',
                'zh' => '首页',
            ],
            'about_us' => [
                'en' => 'About us',
                'sr' => 'О нама',
                'ru' => 'О нас',
                'de' => 'Über uns',
                'es' => 'Sobre nosotros',
                'fr' => 'À propos',
                'zh' => '关于我们',
            ],
            'faqs' => [
                'en' => 'Faqs',
                'sr' => 'Честа питања',
                'ru' => 'Часто задаваемые вопросы',
                'de' => 'Häufige Fragen',
                'es' => 'Preguntas frecuentes',
                'fr' => 'FAQ',
                'zh' => '常见问题',
            ],
            'infos' => [
                'en' => 'Infos',
                'sr' => 'Информације',
                'ru' => 'Информация',
                'de' => 'Informationen',
                'es' => 'Información',
                'fr' => 'Informations',
                'zh' => '信息',
            ],
            'contact' => [
                'en' => 'Contact',
                'sr' => 'Контакт',
                'ru' => 'Контакты',
                'de' => 'Kontakt',
                'es' => 'Contacto',
                'fr' => 'Contact',
                'zh' => '联系我们',
            ],
            'firstname' => [
                'en' => 'Firstname',
                'sr' => 'Име',
                'ru' => 'Имя',
                'de' => 'Vorname',
                'es' => 'Nombre',
                'fr' => 'Prénom',
                'zh' => '名',
            ],
            'lastname' => [
                'en' => 'Lastname',
                'sr' => 'Презиме',
                'ru' => 'Фамилия',
                'de' => 'Nachname',
                'es' => 'Apellido',
                'fr' => 'Nom de famille',
                'zh' => '姓',
            ],
            'email' => [
                'en' => 'Email',
                'sr' => 'Имејл',
                'ru' => 'Электронная почта',
                'de' => 'E-Mail',
                'es' => 'Correo electrónico',
                'fr' => 'E-mail',
                'zh' => '电子邮件',
            ],
            'subject' => [
                'en' => 'Subject',
                'sr' => 'Наслов',
                'ru' => 'Тема',
                'de' => 'Betreff',
                'es' => 'Asunto',
                'fr' => 'Sujet',
                'zh' => '主题',
            ],
            'message' => [
                'en' => 'Message',
                'sr' => 'Порука',
                'ru' => 'Сообщение',
                'de' => 'Nachricht',
                'es' => 'Mensaje',
                'fr' => 'Message',
                'zh' => '信息',
            ],
            'send_message' => [
                'en' => 'Send Message',
                'sr' => 'Пошаљи поруку',
                'ru' => 'Отправить сообщение',
                'de' => 'Nachricht senden',
                'es' => 'Enviar mensaje',
                'fr' => 'Envoyer le message',
                'zh' => '发送信息',
            ],
        ]);
    }
}
