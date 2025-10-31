<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sertifikat;

class UserSertifikatController extends Controller
{
    // Menampilkan semua sertifikat milik user yang login
    public function index()
    {
        $user = Auth::user();

        $sertifikat = Sertifikat::with('kelas')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('user.sertifikat.index', compact('sertifikat'));
    }

    // Jika kamu ingin menyediakan file download langsung dari link Google Drive
    public function download($id)
    {
        $sertifikat = Sertifikat::findOrFail($id);

        // Cegah user lain mengakses sertifikat orang lain
        if ($sertifikat->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak');
        }

        // Kalau link Google Drive, arahkan langsung ke link-nya
        if ($sertifikat->link) {
            return redirect()->away($sertifikat->link);
        }

        // Kalau nanti file disimpan di storage lokal, bisa gunakan ini:
        // return response()->download(storage_path('app/public/sertifikat/' . $sertifikat->file));

        return back()->with('error', 'Link sertifikat belum tersedia.');
    }
}
