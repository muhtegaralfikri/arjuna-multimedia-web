<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\ServiceArea;
use App\Models\Faq;
use App\Models\FormSubmission;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'packages' => Package::count(),
            'areas' => ServiceArea::count(),
            'active_areas' => ServiceArea::where('status', 'available')->count(),
            'faqs' => Faq::count(),
            'forms' => FormSubmission::where('status', 'new')->count(),
        ];

        $recentSubmissions = FormSubmission::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentSubmissions'));
    }
}
