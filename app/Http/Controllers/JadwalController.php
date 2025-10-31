<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with(['user', 'kelas'])->latest()->get();
        return view('admin.jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $users = User::all();
        $kelas = Kelas::where('status', 'aktif')->get();
        return view('admin.jadwal.create', compact('users', 'kelas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date',
            'status' => 'required|in:aktif,selesai,batal',
        ]);

        Jadwal::create($data);

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function edit(Jadwal $jadwal)
    {
        $users = User::all();
        $kelas = Kelas::all();
        return view('admin.jadwal.edit', compact('jadwal', 'users', 'kelas'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date',
            'status' => 'required|in:aktif,selesai,batal',
        ]);

        $jadwal->update($data);

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}
