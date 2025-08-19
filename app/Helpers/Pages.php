<?php

use App\Models\Page;
use App\Models\Country;
use App\Models\Setting;

function pages()
{
    $data = Page::where('status', 1)->get();
    return $data;
}

function addon_is_activated($param)
{
    return $param;
}

if (!function_exists('get_setting')) {
    function get_setting($key)
    {
        $setting = Setting::where('key', $key)->first();
        return $setting == null ? null : $setting->value;
    }
}

if (!function_exists('convertPrice')) {
    function convertPrice($inrPrice, $currencyCode = 'INR')
    {
        $rate = Country::where('currency_code', $currencyCode)->value('rate_to_inr') ?? 1;
        return ceil($inrPrice * $rate);
    }
}

if (!function_exists('allCurrencies')) {
    function allCurrencies()
    {
        return Country::where('status', 1)->orderBy('currency_code')->get();
    }
}

if (!function_exists('translate')) {
    function translate($value)
    {
        return $value;
    }
}

if (!function_exists('renderHtml')) {
    function renderHtml($str)
    {
        $allowedTags = '<h1><h2><h3><h4><h5><h6><p><br><b><i><u><strong><em><ul><ol><li><a><blockquote><code><pre>';
        $clean = strip_tags($str, $allowedTags);

        $clean = preg_replace('/\s*on\w+="[^"]*"/i', '', $clean);
        $clean = preg_replace("/\s*on\w+='[^']*'/i", '', $clean);

        // $clean = preg_replace('/\s*style="[^"]*"/i', '', $clean);
        // $clean = preg_replace("/\s*style='[^']*'/i", '', $clean);

        $clean = preg_replace_callback('/(href|src)=([\'"])(.*?)\2/i', function ($matches) {
            $attr = $matches[1];
            $quote = $matches[2];
            $url = trim($matches[3]);
            if (preg_match('/^\s*javascript:/i', $url)) {
                return '';
            }
            return $attr . '=' . $quote . $url . $quote;
        }, $clean);

        return $clean;
    }
}
