<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RingController extends Controller
{
    public function index()
    {
      return view('pages.rings');
    }
}
