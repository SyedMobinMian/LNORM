<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        
        $rtlLanguages = ['ar', 'ur', 'ps']; // Arabic, Urdu, Persian

        $locale = Session::get('locale', config('app.locale'));

        // App::setLocale($locale);
        App::setLocale(session('locale', config('app.locale')));


        // Optional: Share direction for RTL
        // view()->share('dir', $locale === 'ar' ? 'rtl' : 'ltr');
        view()->share('dir', in_array($locale, $rtlLanguages) ? 'rtl' : 'ltr');
        view()->share('lang', $locale);


        return $next($request);
    }
}




