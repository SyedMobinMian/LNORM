<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.index', [
            'currency' => Setting::get('currency', 'USD'),
            'currency_position' => Setting::get('currency_position', 'left'),
            'language' => Setting::get('language', 'en'),
        ]);
    }

    public function store(Request $request)
    {
        Setting::set('currency', $request->currency);
        Setting::set('currency_position', $request->currency_position);
        Setting::set('language', $request->language);

        return back()->with('success', 'Settings updated successfully.');
    }
}
