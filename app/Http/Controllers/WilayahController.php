<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function index()
    {
        $wilayah = Wilayah::withCount('jemaat')->get();
        return view('content.sig.wilayah.index', compact('wilayah'));
    }

    public function create()
    {
        return view('content.sig.wilayah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'keterangan' => 'nullable',
        ]);

        Wilayah::create($request->only(['nama', 'keterangan']));

        return redirect()->route('wilayah.index')->with('success', 'Wilayah berhasil ditambahkan');
    }

    public function show(string $id)
    {
        return redirect()->route('wilayah.index');
    }

    public function edit(string $id)
    {
        $wilayah = Wilayah::findOrFail($id);
        return view('content.sig.wilayah.edit', compact('wilayah'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'keterangan' => 'nullable',
        ]);

        $wilayah = Wilayah::findOrFail($id);
        $wilayah->update($request->only(['nama', 'keterangan']));

        return redirect()->route('wilayah.index')->with('success', 'Wilayah berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $wilayah = Wilayah::findOrFail($id);
        $wilayah->delete();

        return redirect()->route('wilayah.index')->with('success', 'Wilayah berhasil dihapus');
    }
}
