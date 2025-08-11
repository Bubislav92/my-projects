<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NecklaceController extends Controller
{
  public function index()
  {
    return view('pages.necklaces');
  }
}
