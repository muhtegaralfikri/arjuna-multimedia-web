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
            'email' => ['nullable', 'string', 'max:255', 'regex:/\A[A-Za-z0-9._%+\-]+@[A-Za-z0-9.\-]+\.[A-Za-z]{2,}\z/'],
            'address' => 'required|string|max:1000',
            'google_maps_link' => 'nullable|url|max:1000',
            'google_maps_embed' => 'nullable|string|max:2000',
            'operating_hours' => 'nullable|string|max:500',
            'instagram_url' => 'nullable|url|max:500',
            'facebook_url' => 'nullable|url|max:500',
            'tiktok_url' => 'nullable|url|max:500',
        ]);

        $contact->update($validated);

        Contact::clearCache();

        return redirect()->route('admin.contacts.edit')->with('success', 'Kontak berhasil diperbarui');
    }
}
