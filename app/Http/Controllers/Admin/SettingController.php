<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSettings;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = SiteSettings::firstOrFail();
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = SiteSettings::firstOrFail();

        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_url' => 'nullable|url|max:255',
            'logo_url' => 'nullable|string|max:500',
            'favicon_url' => 'nullable|string|max:500',
            'brand_color_primary' => 'nullable|string|max:20',
            'brand_color_secondary' => 'nullable|string|max:20',
            'google_analytics_id' => 'nullable|string|max:50',
            'gtm_id' => 'nullable|string|max:50',
            'google_business_profile_url' => 'nullable|url|max:500',
            'maintenance_mode' => 'boolean',
        ]);

        $settings->update($validated);

        return redirect()->route('admin.settings.edit')->with('success', 'Pengaturan berhasil disimpan');
    }
}
