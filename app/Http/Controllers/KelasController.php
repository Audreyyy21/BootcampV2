<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::latest()->get();
        return view('admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('admin.kelas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'deskripsi'  => 'nullable|string',
            'gambar'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'harga'      => 'required|numeric',
            'status'     => 'required|in:aktif,nonaktif',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('kelas', 'public');
        }

        Kelas::create($data);

        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil ditambahkan!');
    }

    public function edit(Kelas $kela) 
    {
        return view('admin.kelas.edit', ['kelas' => $kela]);
    }

    public function update(Request $request, Kelas $kela)
    {
        $data = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'deskripsi'  => 'nullable|string',
            'gambar'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'harga'      => 'required|numeric',
            'status'     => 'required|in:aktif,nonaktif',
        ]);

        if ($request->hasFile('gambar')) {
            if ($kela->gambar && Storage::disk('public')->exists($kela->gambar)) {
                Storage::disk('public')->delete($kela->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('kelas', 'public');
        }

        $kela->update($data);

        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil diperbarui!');
    }

    public function destroy(Kelas $kela)
    {
        if ($kela->gambar && Storage::disk('public')->exists($kela->gambar)) {
            Storage::disk('public')->delete($kela->gambar);
        }

        $kela->delete();

        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil dihapus!');
    }
}
