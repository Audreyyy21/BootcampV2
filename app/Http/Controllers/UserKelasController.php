<?php

namespace App\Http\Controllers;

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
            ->get();

        return view('user.kelas.aktif', compact('jadwalAktif'));
    }

    public function histori()
    {
        $user = Auth::user();
        $jadwalHistori = $user->jadwal()
            ->whereIn('status', ['selesai', 'batal'])
            ->with('kelas')
            ->get();

        return view('user.kelas.histori', compact('jadwalHistori'));
    }
}
