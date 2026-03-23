<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $page = \App\Models\Page::bySlug('area')->first();
        $areas = \App\Models\ServiceArea::active()->ordered()->get();
        $contact = \App\Models\Contact::getContact();

        return view('areas', compact('page', 'areas', 'contact'));
    }
}
