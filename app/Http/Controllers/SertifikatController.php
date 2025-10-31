<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    public function index()
    {
        $sertifikat = Sertifikat::with(['user', 'kelas'])->latest()->get();
        return view('admin.sertifikat.index', compact('sertifikat'));
    }

    public function create()
    {
        // Ambil semua user
        $users = User::all();
        // Ambil kelas yang aktif saja
        $kelas = Kelas::where('status', 'aktif')->get();
        return view('admin.sertifikat.create', compact('users', 'kelas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'kelas_id' => 'required|exists:kelas,id',
            'link' => 'nullable|url',
        ]);

        $last = Sertifikat::latest()->first();
        $nextNumber = $last ? ((int) substr($last->nomor_sertifikat, -5)) + 1 : 1;
        $nomor = 'CERT-' . date('Y') . '-' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

        Sertifikat::create([
            'user_id' => $data['user_id'],
            'kelas_id' => $data['kelas_id'],
            'nomor_sertifikat' => $nomor,
            'link' => $data['link'] ?? null,
            'tanggal_diterbitkan' => now(),
        ]);

        return redirect()->route('admin.sertifikat.index')->with('success', 'Sertifikat berhasil dibuat!');
    }


    public function destroy(Sertifikat $sertifikat)
    {
        $sertifikat->delete();
        return redirect()->route('admin.sertifikat.index')->with('success', 'Sertifikat berhasil dihapus!');
    }
}
