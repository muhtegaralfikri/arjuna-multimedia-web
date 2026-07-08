<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class SupportController extends Controller
{
    public function index()
    {
        $contact = Contact::getContact();

        return view('support', compact('contact'));
    }
}
