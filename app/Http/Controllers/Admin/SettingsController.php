<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function socialLogin()
    {
        return view('admin.settings.social_login');
    }

    public function smtp()
    {
        return view('admin.settings.smtp_settings');
    }

    public function payment()
    {
        return view('admin.settings.payment_method');
    }

    public function fileSystem()
    {
        return view('admin.settings.file_system');
    }

    public function featureActivate()
    {
        return view('admin.settings.feature_activate');
    }

    public function update(Request $request)
    {
        foreach ($request->type as $type) {
            $business_settings = Setting::where('key', $type)->first();
            if ($business_settings != null) {
                if ($request->hasFile($type)) {
                    $image = $request->file($type);
                    $name = uniqid() . ".jpg";
                    $path = public_path('images/logos');
                    $image->move($path, $name);
                    $business_settings->value = $name;
                } else {
                    if ($business_settings->key == "site_logo" || $business_settings->key == "site_favicon" || $business_settings->key == "site_banner" || $business_settings->key == "meta_image") {
                        if ($business_settings->value == null) {
                            $business_settings->value = $request[$type];
                        }
                    } else {
                        $business_settings->value = $request[$type];
                    }
                }
                $business_settings->save();
            } else {
                $business_settings = new Setting;
                $business_settings->key = $type;
                if ($request->hasFile($type)) {
                    $image = $request->file($type);
                    $name = uniqid() . ".jpg";
                    $path = public_path('images/logos');
                    $image->move($path, $name);
                    $business_settings->value = $name;
                } else {
                    $business_settings->value = $request[$type];
                }
                $business_settings->status_id = 1;
                $business_settings->save();
            }
        }
        return back();
    }
}
