<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function edit()
    {
        $contact = Contact::firstOrFail();
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request)
    {
        $contact = Contact::firstOrFail();

        $validated = $request->validate([
            'whatsapp_number' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'required|string',
            'google_maps_link' => 'nullable|string',
            'google_maps_embed' => 'nullable|string',
            'operating_hours' => 'nullable|string',
            'instagram_url' => 'nullable|string',
            'facebook_url' => 'nullable|string',
            'tiktok_url' => 'nullable|string',
        ]);

        $contact->update($validated);

        return redirect()->route('admin.contacts.edit')->with('success', 'Kontak berhasil diperbarui');
    }
}
