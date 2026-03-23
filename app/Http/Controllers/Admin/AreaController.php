<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceArea;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $areas = ServiceArea::orderBy('sort_order')->get();
        return view('admin.areas.index', compact('areas'));
    }

    public function create()
    {
        return view('admin.areas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:service_areas,slug',
            'description' => 'nullable|string',
            'status' => 'required|in:available,coming_soon,paused',
            'coverage_detail' => 'nullable|string',
            'estimated_available' => 'nullable|date',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        // Handle checkbox
        $validated['is_active'] = $request->has('is_active');

        ServiceArea::create($validated);

        return redirect()->route('admin.areas.index')->with('success', 'Area berhasil ditambahkan');
    }

    public function edit($id)
    {
        $area = ServiceArea::findOrFail($id);
        return view('admin.areas.edit', compact('area'));
    }

    public function update(Request $request, $id)
    {
        $area = ServiceArea::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:service_areas,slug,' . $id,
            'description' => 'nullable|string',
            'status' => 'required|in:available,coming_soon,paused',
            'coverage_detail' => 'nullable|string',
            'estimated_available' => 'nullable|date',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        // Handle checkbox
        $validated['is_active'] = $request->has('is_active');

        $area->update($validated);

        return redirect()->route('admin.areas.index')->with('success', 'Area berhasil diperbarui');
    }

    public function destroy($id)
    {
        $area = ServiceArea::findOrFail($id);
        $area->delete();

        return redirect()->route('admin.areas.index')->with('success', 'Area berhasil dihapus');
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*.id' => 'required|string|exists:service_areas,id',
            'order.*.position' => 'required|integer',
        ]);

        foreach ($request->order as $item) {
            ServiceArea::where('id', $item['id'])->update(['sort_order' => $item['position']]);
        }

        return response()->json(['success' => true]);
    }
}
