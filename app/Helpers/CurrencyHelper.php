<?php

namespace App\Helpers;

use NumberFormatter;
use Illuminate\Support\Facades\App;

class CurrencyHelper
{
    // Return full formatted amount
    public static function format($amount, $currency = null, $locale = null): string
    {
        $locale = $locale ?? App::getLocale();

        $currencyMap = [
            'en' => 'USD',  // English - United States Dollar
            'ar' => 'EGP',  // Arabic - Egyptian Pound
            'de' => 'EUR',  // German - Euro
            'hi' => 'INR',  // Hindi - Indian Rupee
            'ur' => 'PKR',  // Urdu - Pakistani Rupee
            'tr' => 'TRY',  // Turkish Lira
            'fr' => 'EUR',  // French - Euro
            'zh' => 'CNY',  // Chinese Yuan
            'fa' => 'AFN',  // Afghan Afghani (for Persian/Afghan)
        ];

        $currency = $currency ?? ($currencyMap[$locale] ?? 'USD');

        $formatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);

        return $formatter->formatCurrency($amount, $currency);
    }

    // Return only currency symbol
    public static function symbol($locale = null): string
    {
        $locale = $locale ?? App::getLocale();

        $currencyMap = [
            'en' => 'USD',  // English - United States Dollar
            'ar' => 'EGP',  // Arabic - Egyptian Pound
            'de' => 'EUR',  // German - Euro
            'hi' => 'INR',  // Hindi - Indian Rupee
            'ur' => 'PKR',  // Urdu - Pakistani Rupee
            'tr' => 'TRY',  // Turkish Lira
            'fr' => 'EUR',  // French - Euro
            'zh' => 'CNY',  // Chinese Yuan
            'fa' => 'AFN',  // Afghan Afghani (for Persian/Afghan)
        ];

        $currency = $currencyMap[$locale] ?? 'USD';

        $formatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);
        $symbol = $formatter->getSymbol(NumberFormatter::CURRENCY_SYMBOL);

        return $symbol;
    }
}
