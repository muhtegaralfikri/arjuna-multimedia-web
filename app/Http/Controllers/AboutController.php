<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $page = \App\Models\Page::bySlug('about')->first();
        return view('about', compact('page'));
    }
}
