<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            }
            return redirect()->intended('/user/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ])->onlyInput('email');
    }


    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'user',
        ]);
        return redirect()->back()->with('success', 'Akun berhasil dibuat!');
    }

    public function peserta()
    {
        $peserta = User::where('role', 'user')->get();
        return view('admin.peserta.index', compact('peserta'));
    }

   public function editPeserta($id)
    {
        $peserta = User::findOrFail($id);
        return view('admin.peserta.edit', compact('peserta'));
    }

    public function updatePeserta(Request $request, $id)
    {
        $peserta = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $peserta->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.peserta.index')->with('success', 'Data peserta berhasil diperbarui');
    }

    public function deletePeserta($id)
    {
        $peserta = User::findOrFail($id);
        $peserta->delete();

        return back()->with('success', 'Peserta berhasil dihapus');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
