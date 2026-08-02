<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $page = \App\Models\Page::bySlug('home')->first();
        $popularPackages = \App\Models\Package::active()->ordered()->take(4)->get();
        $testimonials = \App\Models\Testimonial::published()->ordered()->take(3)->get();
        $homeFaqs = \App\Models\Faq::published()->ordered()->take(4)->get();

        return view('home', compact('page', 'popularPackages', 'testimonials', 'homeFaqs'));
    }

    public function sitemap()
    {
        $pages = \App\Models\Page::where('slug', '!=', 'area')->get(['slug', 'updated_at']);
        $packages = \App\Models\Package::active()->get(['slug', 'updated_at']);

        return response()->view('sitemap', compact('pages', 'packages'))
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
