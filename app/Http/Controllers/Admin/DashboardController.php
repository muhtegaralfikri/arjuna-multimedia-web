<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Faq;
use App\Models\FormSubmission;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'packages' => Package::count(),
            'faqs' => Faq::count(),
            'forms' => FormSubmission::where('status', 'new')->count(),
        ];

        $recentSubmissions = FormSubmission::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentSubmissions'));
    }
}
