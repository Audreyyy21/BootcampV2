<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $kelas = Kelas::orderBy('nama_kelas')->get();
        return view('admin.absensi.index', compact('kelas'));
    }

    public function show(Kelas $kelas)
    {
        // Peserta yang sudah "ikut kelas" = data jadwal untuk kelas tersebut
        $peserta = Jadwal::with('user')
            ->where('kelas_id', $kelas->id)
            ->orderByDesc('created_at')
            ->get();

        return view('admin.absensi.show', compact('kelas', 'peserta'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        // yang diceklis
        $hadirIds = collect($request->input('hadir', []))
            ->map(fn($v) => (int) $v)
            ->values()
            ->all();

        $records = Jadwal::where('kelas_id', $kelas->id)->get();

        foreach ($records as $r) {
            $isHadir = in_array($r->id, $hadirIds, true);

            $r->is_hadir = $isHadir;
            $r->hadir_at = $isHadir ? now() : null;
            $r->save();
        }

        return redirect()
            ->route('admin.absensi.show', $kelas->id)
            ->with('success', 'Absensi berhasil disimpan.');
    }
}
