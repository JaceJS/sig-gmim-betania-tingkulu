<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::orderBy('tanggal', 'desc')->get();
        return view('content.sig.kegiatan.index', compact('kegiatan'));
    }

    public function create()
    {
        return view('content.sig.kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'nullable',
            'tempat' => 'required|max:255',
            'deskripsi' => 'nullable',
        ]);

        Kegiatan::create($request->all());

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function show(string $id)
    {
        return redirect()->route('kegiatan.index');
    }

    public function edit(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('content.sig.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'nullable',
            'tempat' => 'required|max:255',
            'deskripsi' => 'nullable',
        ]);

        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update($request->all());

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus');
    }
}
