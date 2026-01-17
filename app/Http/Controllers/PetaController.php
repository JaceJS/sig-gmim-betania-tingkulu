<?php

namespace App\Http\Controllers;

use App\Models\Jemaat;
use App\Models\Pengaturan;
use Illuminate\Http\Request;

class PetaController extends Controller
{
    public function index()
    {
        $pengaturan = Pengaturan::all()->pluck('value', 'key')->toArray();
        return view('content.sig.peta.index', compact('pengaturan'));
    }

    public function data()
    {
        $jemaat = Jemaat::with('wilayah')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'nama' => $item->nama_kepala_keluarga,
                'alamat' => $item->alamat,
                'wilayah' => $item->wilayah->nama ?? '-',
                'jumlah_anggota' => $item->jumlah_anggota,
                'lat' => (float) $item->latitude,
                'lng' => (float) $item->longitude,
            ];
        });

        return response()->json($jemaat);
    }
}
