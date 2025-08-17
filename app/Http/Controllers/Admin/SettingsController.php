<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function socialLogin()
    {
        abort(404);
        return view('admin.settings.social_login');
    }

    public function smtp()
    {
        abort(404);
        return view('admin.settings.smtp_settings');
    }

    public function payment()
    {
        abort(404);
        return view('admin.settings.payment_method');
    }

    public function fileSystem()
    {
        abort(404);
        return view('admin.settings.file_system');
    }

    public function featureActivate()
    {
        abort(404);
        return view('admin.settings.feature_activate');
    }

    public function tax()
    {
        abort(404);
        return view('admin.settings.tax.index');
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
                $business_settings->status = 1;
                $business_settings->save();
            }
        }
        return back();
    }
}
