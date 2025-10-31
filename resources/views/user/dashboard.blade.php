@extends('layouts.main')

@section('title', 'Sedang Berjalan')

@section('content')
    <div class="w-full h-full bg-white shadow-lg rounded-2xl p-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-green-600">Dashboard User</h2>
        </div>
    
        <p class="text-gray-700 mb-4">
            Selamat datang, <span class="font-semibold">{{ auth()->user()->name }}</span> 🎉
        </p>
    
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="p-6 border rounded-xl bg-green-50">
                <h3 class="font-semibold text-green-700 mb-2">Profil Saya</h3>
                <p class="text-sm text-gray-600">Lihat dan ubah data pribadi Anda.</p>
            </div>
    
            <div class="p-6 border rounded-xl bg-blue-50">
                <h3 class="font-semibold text-blue-700 mb-2">Aktivitas</h3>
                <p class="text-sm text-gray-600">Cek aktivitas terbaru Anda.</p>
            </div>
        </div>
    </div>
@endsection

