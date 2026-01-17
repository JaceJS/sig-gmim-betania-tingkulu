<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index()
    {
        $pengaturan = Pengaturan::all()->pluck('value', 'key')->toArray();
        return view('content.sig.pengaturan.index', compact('pengaturan'));
    }

    public function create()
    {
        return redirect()->route('pengaturan.index');
    }

    public function store(Request $request)
    {
        return redirect()->route('pengaturan.index');
    }

    public function show(string $id)
    {
        return redirect()->route('pengaturan.index');
    }

    public function edit(string $id)
    {
        return redirect()->route('pengaturan.index');
    }

    public function update(Request $request, string $id)
    {
        // Update all settings
        $settings = [
            'nama_gereja' => $request->input('nama_gereja'),
            'alamat_gereja' => $request->input('alamat_gereja'),
            'latitude_gereja' => $request->input('latitude_gereja'),
            'longitude_gereja' => $request->input('longitude_gereja'),
            'telepon_gereja' => $request->input('telepon_gereja'),
        ];

        foreach ($settings as $key => $value) {
            Pengaturan::updateOrCreate(
                ['key' => $key],
                ['value' => $value ?? '']
            );
        }

        return redirect()->route('pengaturan.index')->with('success', 'Pengaturan berhasil disimpan');
    }

    public function destroy(string $id)
    {
        return redirect()->route('pengaturan.index');
    }
}
