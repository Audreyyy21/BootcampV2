<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserKelasController extends Controller
{
    public function aktif()
    {
        $user = Auth::user();

        $jadwalAktif = $user->jadwal()
            ->where('status', 'aktif')
            ->with('kelas')
            ->latest()
            ->get();

        return view('user.kelas.aktif', compact('jadwalAktif'));
    }

    public function histori()
    {
        $user = Auth::user();

        $jadwalHistori = $user->jadwal()
            ->whereIn('status', ['selesai', 'batal'])
            ->with('kelas')
            ->latest()
            ->get();

        return view('user.kelas.histori', compact('jadwalHistori'));
    }

    // ✅ DETAIL: dipakai saat user klik card
    public function detail(Jadwal $jadwal)
    {
        // keamanan: user cuma boleh buka jadwal miliknya sendiri
        if ($jadwal->user_id !== Auth::id()) {
            abort(403);
        }

        $jadwal->load('kelas');

        return view('user.kelas.detail', compact('jadwal'));
    }
}
