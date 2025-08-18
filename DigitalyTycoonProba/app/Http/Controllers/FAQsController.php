<?php

namespace App\Http\Controllers;

use App\Models\FAQsPost;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FAQsController extends Controller
{
  public function index()
  {
    $faqContent = FAQsPost::find(21);
    $faqs = FAQsPost::all();
    
    return view('pages.faqs', [
      'faqContent' => $faqContent,
      'faqs' => $faqs
    ]);
  }
}
