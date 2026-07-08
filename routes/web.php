<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController as PublicContactController;
use App\Http\Controllers\CoverageController;
use App\Http\Controllers\ServicePolicyController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\WhatsAppRedirectController;

// Admin controllers
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [AboutController::class, 'index'])->name('about');
Route::get('/paket', [PackageController::class, 'index'])->name('packages');
Route::get('/cek-coverage', [CoverageController::class, 'index'])->name('coverage');
Route::get('/bantuan', [SupportController::class, 'index'])->name('support');
Route::get('/ketentuan-layanan', [ServicePolicyController::class, 'index'])->name('policy');
Route::get('/kontak', [PublicContactController::class, 'index'])->name('contact');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

// WhatsApp redirects with lightweight click tracking
Route::get('/wa/paket/{package:slug}', [WhatsAppRedirectController::class, 'package'])->name('wa.package');
Route::get('/wa/coverage', [WhatsAppRedirectController::class, 'coverage'])->name('wa.coverage');
Route::get('/wa/support', [WhatsAppRedirectController::class, 'support'])->name('wa.support');
Route::get('/wa/general', [WhatsAppRedirectController::class, 'general'])->name('wa.general');

// Sitemap & Robots
Route::get('/sitemap.xml', [HomeController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [HomeController::class, 'robots'])->name('robots');

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Login (no auth required)
    Route::get('/login', [AdminController::class, 'loginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    // Protected routes (auth required)
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Packages
        Route::prefix('packages')->name('packages.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\PackageController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Admin\PackageController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\Admin\PackageController::class, 'store'])->name('store');
            Route::post('/reorder', [\App\Http\Controllers\Admin\PackageController::class, 'reorder'])->name('reorder');
            Route::get('/{id}/edit', [\App\Http\Controllers\Admin\PackageController::class, 'edit'])->name('edit');
            Route::put('/{id}', [\App\Http\Controllers\Admin\PackageController::class, 'update'])->name('update');
            Route::delete('/{id}', [\App\Http\Controllers\Admin\PackageController::class, 'destroy'])->name('destroy');
        });

        // FAQs
        Route::prefix('faqs')->name('faqs.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\FaqController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Admin\FaqController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\Admin\FaqController::class, 'store'])->name('store');
            Route::post('/reorder', [\App\Http\Controllers\Admin\FaqController::class, 'reorder'])->name('reorder');
            Route::get('/{id}/edit', [\App\Http\Controllers\Admin\FaqController::class, 'edit'])->name('edit');
            Route::put('/{id}', [\App\Http\Controllers\Admin\FaqController::class, 'update'])->name('update');
            Route::delete('/{id}', [\App\Http\Controllers\Admin\FaqController::class, 'destroy'])->name('destroy');
        });

        // Testimonials
        Route::prefix('testimonials')->name('testimonials.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\TestimonialController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Admin\TestimonialController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\Admin\TestimonialController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [\App\Http\Controllers\Admin\TestimonialController::class, 'edit'])->name('edit');
            Route::put('/{id}', [\App\Http\Controllers\Admin\TestimonialController::class, 'update'])->name('update');
            Route::delete('/{id}', [\App\Http\Controllers\Admin\TestimonialController::class, 'destroy'])->name('destroy');
        });

        // Contact (singleton - edit only)
        Route::prefix('contact')->name('contacts.')->group(function () {
            Route::get('/edit', [\App\Http\Controllers\Admin\ContactController::class, 'edit'])->name('edit');
            Route::put('/', [\App\Http\Controllers\Admin\ContactController::class, 'update'])->name('update');
        });

        // Pages
        Route::prefix('pages')->name('pages.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\PageController::class, 'index'])->name('index');
            Route::get('/{slug}/edit', [\App\Http\Controllers\Admin\PageController::class, 'edit'])->name('edit');
            Route::put('/{slug}', [\App\Http\Controllers\Admin\PageController::class, 'update'])->name('update');
        });

        // Settings (singleton)
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/edit', [\App\Http\Controllers\Admin\SettingController::class, 'edit'])->name('edit');
            Route::put('/', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('update');
        });
    });
});
