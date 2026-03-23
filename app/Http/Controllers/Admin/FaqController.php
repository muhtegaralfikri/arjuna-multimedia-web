<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('sort_order')->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'category' => 'required|in:general,technical,billing,installation',
            'sort_order' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
        ]);

        // Handle checkbox
        $validated['is_published'] = $request->has('is_published');

        Faq::create($validated);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ berhasil ditambahkan');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $validated = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'category' => 'required|in:general,technical,billing,installation',
            'sort_order' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
        ]);

        // Handle checkbox
        $validated['is_published'] = $request->has('is_published');

        $faq->update($validated);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ berhasil diperbarui');
    }

    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ berhasil dihapus');
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*.id' => 'required|string|exists:faqs,id',
            'order.*.position' => 'required|integer',
        ]);

        foreach ($request->order as $item) {
            Faq::where('id', $item['id'])->update(['sort_order' => $item['position']]);
        }

        return response()->json(['success' => true]);
    }
}
