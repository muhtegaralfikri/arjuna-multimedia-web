<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('sort_order')->get();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:packages,slug',
            'speed' => 'required|string|max:50',
            'speed_value' => 'required|integer',
            'price_monthly' => 'required|numeric',
            'installation_fee' => 'required|numeric',
            'quota' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'features' => 'nullable|string',
            'category' => 'required|in:home,business',
            'is_popular' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        // Convert features from comma-separated string to array
        $validated['features'] = $validated['features'] ? array_map('trim', explode(',', $validated['features'])) : [];

        // Handle checkboxes - default to false if not sent
        $validated['is_popular'] = $request->has('is_popular');
        $validated['is_active'] = $request->has('is_active');

        Package::create($validated);

        return redirect()->route('admin.packages.index')->with('success', 'Paket berhasil ditambahkan');
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:packages,slug,' . $id,
            'speed' => 'required|string|max:50',
            'speed_value' => 'required|integer',
            'price_monthly' => 'required|numeric',
            'installation_fee' => 'required|numeric',
            'quota' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'features' => 'nullable|string',
            'category' => 'required|in:home,business',
            'is_popular' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        // Convert features from comma-separated string to array
        $validated['features'] = $validated['features'] ? array_map('trim', explode(',', $validated['features'])) : [];

        // Handle checkboxes - default to false if not sent
        $validated['is_popular'] = $request->has('is_popular');
        $validated['is_active'] = $request->has('is_active');

        $package->update($validated);

        return redirect()->route('admin.packages.index')->with('success', 'Paket berhasil diperbarui');
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return redirect()->route('admin.packages.index')->with('success', 'Paket berhasil dihapus');
    }
}
