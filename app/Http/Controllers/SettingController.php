<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class SettingController extends Controller
{
    public function edit(){
        $setting = Setting::all()->where('id', 1)->first();
        return view('dashboard.settings.edit', compact(['setting']));
    }
    public function update(Request $request,Setting $setting){
        $setting = Setting::all()->where('id', 1)->first();
        $request->validate([
            'sitename'      => 'required|string',
            'email'         => 'required|email',
            'address'       => 'required',
            'phone'         => 'required',
            'desc'          => 'required|string',
            'logo'          => 'nullable',
            'banner'        => 'nullable',
            'facebook'      => 'required',
            'twitter'       => 'required',
            'youtube'       => 'required',
        ]);

        $data = $request->except(['banner', 'logo']);
        if ($request->logo) {
            Image::make($request->logo)->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/settings/' . $request->logo->hashName()));
            Storage::disk('public_uploads')->delete('settings/' . $setting->logo);
            $data['logo']  = $request->logo->hashName();
        } else {
            $data['logo']  = $setting->logo;
        }

        if ($request->banner) {
            Image::make($request->banner)->resize(1920, 720)->save(public_path('uploads/settings/' . $request->banner->hashName()));
            Storage::disk('public_uploads')->delete('settings/' . $setting->banner);
            $data['banner']  = $request->banner->hashName();
        } else {
            $data['banner']  = $setting->banner;
        }

        $setting->update($request->all());

        session()->flash('success', __('تم تعديل البيانات بنجاح'));
        return redirect()->route('front.home');

    }
}
