<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSettings;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = SiteSettings::first();
        
        // Provide an empty model to avoid view errors if database is empty on production
        if (!$settings) {
            $settings = new SiteSettings();
        }
        
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = SiteSettings::first();

        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'logo_url' => 'nullable|string|max:500',
            'favicon_url' => 'nullable|string|max:500',
            'google_analytics_id' => 'nullable|string|max:50',
            'gtm_id' => 'nullable|string|max:50',
            'google_business_profile_url' => 'nullable|url|max:500',
        ]);

        if ($settings) {
            $settings->update($validated);
        } else {
            SiteSettings::create($validated);
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Pengaturan berhasil disimpan');
    }
}
