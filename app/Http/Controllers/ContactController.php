<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $page = \App\Models\Page::bySlug('contact')->first();
        $contact = \App\Models\Contact::getContact();
        $packages = \App\Models\Package::active()->ordered()->get();

        return view('contact', compact('page', 'contact', 'packages'));
    }
}
