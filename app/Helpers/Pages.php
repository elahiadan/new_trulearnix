<?php

use App\Models\Page;
use App\Models\Setting;

function pages()
{
    $data = Page::where('status_id', 1)->get();
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
