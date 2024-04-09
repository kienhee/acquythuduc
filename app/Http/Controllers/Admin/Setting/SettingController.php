<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::where('id', 1)->first();
        return view('admin.setting.index', compact('setting'));
    }
    public function updateSetting(Request $request)
    {
        $data = $request->validate([
            'phone' => 'required|string',
            'address' => 'required',
            'email' => 'required|email',
            'map' => 'required',
            'about'=>"nullable"
        ]);
            if ($request->hasFile('image')) {
      $file = $request->file('image');

      $filename = $file->hashName();
      $path = $file->storePubliclyAs('public/photos/1/posts', $filename);
      $url = Storage::url($path);
      $data['image'] = $url;
    }
        $check = Setting::where('id', 1)->update($data);
        if ($check) {
            return back()->with('msgSuccess', 'Update successful');
        }
        return back()->with('msgError', 'Update failed!');
    }

    public function changeLang($locale)
    {

        if (!in_array($locale, ['en', 'vi'])) {
            abort(404);
        }
        Session::put('language', $locale);
        return redirect()->back();
    }
}
