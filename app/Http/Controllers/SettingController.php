<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Carbon\Carbon;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function dataSetting($id)
    {
        $setting = Setting::find($id);
        return view('setting.edit', compact('setting'));

        // $setting->isi = $request->isi;
        // $setting->isi2 = $request->isi2;
        // $setting->save();
    }

    public function resetSetting(Setting $setting)
    {
        $setting->isi = $setting->isi2;
        $setting->save();
        return redirect('setting/' . $setting->id)->with('status', 'Reset Setting Berhasil');
    }

    public function updateSetting(Request $request, Setting $setting)
    {
        $path = storage_path('app/public/images/setting/');
        // code to make dir and subdir
        !is_dir($path) &&
            mkdir($path, 0777, true);
        $arrayimg = [1, 10, 14];
        $arraynonimg = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13];
        if (in_array($setting->id, ($arrayimg))) {
            if ($request->has('isi')) {
                $path = storage_path('app/public/images/setting/');
                $name = $setting->kode . Carbon::now()->format('YmdHis') . '.' . $request->isi->extension();
                Storage::delete('public/images/setting/' . $setting->isi);
                if (in_array($setting->id, ([1, 14]))) {
                    Image::make($request->file('isi'))
                        ->resize(800, 500)
                        ->save($path . $name);
                } else {
                    Image::make($request->file('isi'))
                        ->save($path . $name);
                }
                $setting->isi = $name;
                $setting->save();
                return redirect('setting/' . $setting->id)->with('status', ' Gambar Diperbaharui');
            }
        } elseif (in_array($setting->id, ($arraynonimg))) {
            $setting->isi = $request->isi;
            $setting->save();
            return redirect('setting/' . $setting->id)->with('status', $setting->judul . ' Berhasil Diperbaharui');
        } else {
            return redirect('setting/');
        }
    }
}
