<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Faq;
use App\Models\Testimonial;
use App\Models\WhatsappClick;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'packages' => Package::count(),
            'faqs' => Faq::count(),
            'testimonials' => Testimonial::count(),
            'whatsapp_clicks_30d' => WhatsappClick::where('created_at', '>=', now()->subDays(30))->count(),
        ];

        $topPackageClicks = WhatsappClick::query()
            ->where('source', 'package')
            ->whereNotNull('package_id')
            ->where('created_at', '>=', now()->subDays(30))
            ->select('package_id', DB::raw('count(*) as clicks'))
            ->groupBy('package_id')
            ->orderByDesc('clicks')
            ->with('package')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'topPackageClicks'));
    }
}
