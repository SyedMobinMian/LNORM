<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SetLocale;

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\InvoiceController;

// ==========================
// Public Routes (with Locale)
// ==========================
Route::middleware([SetLocale::class])->group(function () {

    // Welcome Page
    Route::get('/', function () {
        return view('welcome');
    });

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Language Switch
    Route::get('lang/{locale}', function ($locale) {
        $available = ['en', 'ar', 'de', 'hi', 'ur', 'tr', 'fr', 'zh_CN', 'ps'];
        if (in_array($locale, $available)) {
            session(['locale' => $locale]);
        }
        return redirect()->back();
    })->name('lang.switch');
});


// ==========================
// Admin Routes (with Prefix)
// ==========================
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['web', SetLocale::class])
    ->group(function () {

    // Admin Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');

    // Client Module
    Route::resource('clients', ClientController::class);

    // Invoice Module (fixed route naming)
    Route::resource('invoices', InvoiceController::class);
});
