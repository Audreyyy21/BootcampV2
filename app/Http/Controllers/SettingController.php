<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        return view('user.setting.index');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'email' => 'required|email',
            'password' => 'nullable|min:6'
        ]);

        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
