<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Package;

class CoverageController extends Controller
{
    public function index()
    {
        $contact = Contact::getContact();
        $packages = Package::active()->ordered()->get();

        return view('coverage', compact('contact', 'packages'));
    }
}
