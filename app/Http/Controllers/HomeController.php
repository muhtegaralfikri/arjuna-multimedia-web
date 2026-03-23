<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $page = \App\Models\Page::bySlug('home')->first();
        return view('home', compact('page'));
    }

    public function sitemap()
    {
        $pages = \App\Models\Page::all(['slug', 'updated_at']);
        $packages = \App\Models\Package::active()->get(['slug', 'updated_at']);
        $areas = \App\Models\ServiceArea::active()->get(['slug', 'updated_at']);

        return response()->view('sitemap', compact('pages', 'packages', 'areas'))
            ->header('Content-Type', 'application/xml');
    }

    public function robots()
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Disallow: /admin\n";
        $content .= "Disallow: /api/admin\n";
        $content .= "\nSitemap: " . url('/sitemap.xml');

        return response($content)->header('Content-Type', 'text/plain');
    }
}
