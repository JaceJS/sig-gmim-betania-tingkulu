<?php

namespace App\Http\Controllers;

use App\Models\Jemaat;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class JemaatController extends Controller
{
    public function index()
    {
        $jemaat = Jemaat::with('wilayah')->get();
        return view('content.sig.jemaat.index', compact('jemaat'));
    }

    public function create()
    {
        $wilayah = Wilayah::all();
        return view('content.sig.jemaat.create', compact('wilayah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'wilayah_id' => 'required|exists:wilayah,id',
            'nama_kepala_keluarga' => 'required|max:255',
            'alamat' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'no_telepon' => 'nullable|max:20',
            'jumlah_anggota' => 'required|integer|min:1',
            'keterangan' => 'nullable',
        ]);

        Jemaat::create($request->all());

        return redirect()->route('jemaat.index')->with('success', 'Data jemaat berhasil ditambahkan');
    }

    public function show(string $id)
    {
        return redirect()->route('jemaat.index');
    }

    public function edit(string $id)
    {
        $jemaat = Jemaat::findOrFail($id);
        $wilayah = Wilayah::all();
        return view('content.sig.jemaat.edit', compact('jemaat', 'wilayah'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'wilayah_id' => 'required|exists:wilayah,id',
            'nama_kepala_keluarga' => 'required|max:255',
            'alamat' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'no_telepon' => 'nullable|max:20',
            'jumlah_anggota' => 'required|integer|min:1',
            'keterangan' => 'nullable',
        ]);

        $jemaat = Jemaat::findOrFail($id);
        $jemaat->update($request->all());

        return redirect()->route('jemaat.index')->with('success', 'Data jemaat berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $jemaat = Jemaat::findOrFail($id);
        $jemaat->delete();

        return redirect()->route('jemaat.index')->with('success', 'Data jemaat berhasil dihapus');
    }
}
