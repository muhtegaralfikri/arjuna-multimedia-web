<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormSubmission;
use Illuminate\Http\Request;

class FormSubmissionController extends Controller
{
    public function index()
    {
        $submissions = FormSubmission::latest()->get();
        return view('admin.forms.index', compact('submissions'));
    }

    public function show($id)
    {
        $submission = FormSubmission::findOrFail($id);
        return view('admin.forms.show', compact('submission'));
    }

    public function update(Request $request, $id)
    {
        $submission = FormSubmission::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:new,contacted,converted,lost',
            'notes' => 'nullable|string',
        ]);

        $submission->update($validated);

        return redirect()->route('admin.forms.show', $id)->with('success', 'Status berhasil diperbarui');
    }

    public function destroy($id)
    {
        $submission = FormSubmission::findOrFail($id);
        $submission->delete();

        return redirect()->route('admin.forms.index')->with('success', 'Form submission berhasil dihapus');
    }
}
