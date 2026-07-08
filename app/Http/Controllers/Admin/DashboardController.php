<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Faq;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'packages' => Package::count(),
            'faqs' => Faq::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
