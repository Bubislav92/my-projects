<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost; // Importujte model za blog clanke

class BlogController extends Controller
{
    public function index()
    {
        // Dohvati sve objavljene clanke sortirane po datumu
        $posts = BlogPost::where('is_published', true)
                     ->whereNotNull('published_at')
                     ->orderBy('published_at', 'desc')
                     ->get();

        // Odvojite istaknute (featured) clanke
        $featuredPosts = $posts->where('is_featured', true)->take(3);

        // Odvojite sve ostale clanke
        $allPosts = $posts->where('is_featured', false);

        // Prosledite podatke view-u
        return view('blog.index', compact('featuredPosts', 'allPosts'));
    }

    public function show($slug)
    {
        // Nadji clanak po slug-u, ili prikazi 404 stranicu ako ga ne nadje
        $post = BlogPost::where('slug', $slug)
                    ->where('is_published', true)
                    ->whereNotNull('published_at')
                    ->firstOrFail();

        // Prosledi pronadjeni clanak show view-u
        return view('blog.show', compact('post'));
    }
}