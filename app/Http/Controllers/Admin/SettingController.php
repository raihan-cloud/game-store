<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        // Ambil semua setting dan format menjadi array ['key' => 'value']
        // Ini memudahkan pemanggilan di View, contoh: $settings['site_name']
        $settings = Setting::pluck('value', 'key')->toArray();

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        // Ambil semua data input kecuali _token
        $data = $request->except('_token');

        // Loop setiap input dan update/buat ke database
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],   // Cari berdasarkan kolom 'key'
                ['value' => $value] // Update kolom 'value'
            );
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Pengaturan berhasil disimpan!');
    }
}