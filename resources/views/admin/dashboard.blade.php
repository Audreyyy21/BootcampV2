@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="w-full h-full bg-white/60 shadow-lg rounded-2xl p-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-blue-600">Dashboard Admin</h2>
        </div>
    
        <p class="text-gray-700 mb-4">
            Halo, <span class="font-semibold">{{ auth()->user()->name }}</span> 👋
        </p>
    
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="p-6 border rounded-xl bg-blue-50">
                <h3 class="font-semibold text-blue-700 mb-2">Kelola Pengguna</h3>
                <p class="text-sm text-gray-600">Lihat dan atur semua akun pengguna.</p>
            </div>
    
            <div class="p-6 border rounded-xl bg-green-50">
                <h3 class="font-semibold text-green-700 mb-2">Statistik</h3>
                <p class="text-sm text-gray-600">Pantau aktivitas dan performa sistem.</p>
            </div>
    
            <div class="p-6 border rounded-xl bg-yellow-50">
                <h3 class="font-semibold text-yellow-700 mb-2">Pengaturan</h3>
                <p class="text-sm text-gray-600">Ubah konfigurasi aplikasi.</p>
            </div>
        </div>
    </div>
@endsection
