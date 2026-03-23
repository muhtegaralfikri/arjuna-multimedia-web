<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $page = \App\Models\Page::bySlug('faq')->first();
        $faqs = \App\Models\Faq::published()->ordered()->get();

        return view('faq', compact('page', 'faqs'));
    }
}
