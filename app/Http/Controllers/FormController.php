<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormSubmission;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:50|regex:/^62[0-9]{8,}$/',
            'package_interest' => 'nullable|string|max:255',
            'address' => 'required|string',
            'message' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Mohon periksa kembali input Anda.');
        }

        try {
            FormSubmission::create([
                'id' => \Illuminate\Support\Str::uuid(),
                'name' => $request->name,
                'whatsapp' => $request->whatsapp,
                'package_interest' => $request->package_interest,
                'address' => $request->address,
                'message' => $request->message,
                'status' => 'new',
            ]);

            return back()
                ->with('success', 'Terima kasih! Kami akan segera menghubungi Anda via WhatsApp.');

        } catch (\Exception $e) {
            return back()
                ->with('error', 'Terjadi kesalahan. Silakan coba lagi atau hubungi kami via WhatsApp.')
                ->withInput();
        }
    }
}
