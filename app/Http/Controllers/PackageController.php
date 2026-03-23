<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $page = \App\Models\Page::bySlug('package')->first();
        $packages = \App\Models\Package::active()->ordered()->get();
        $contact = \App\Models\Contact::getContact();

        return view('packages', compact('page', 'packages', 'contact'));
    }
}
