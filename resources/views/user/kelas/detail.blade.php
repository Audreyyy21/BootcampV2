@extends('layouts.main')

@section('title', 'Detail Kelas')

@section('content')
<div class="p-6 w-full h-full bg-white/60 rounded-xl shadow">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-semibold text-gray-800">{{ $jadwal->kelas->nama_kelas }}</h2>
            <p class="text-sm text-gray-600">Detail kelas aktif kamu</p>
        </div>
        <a href="{{ url()->previous() }}"
           class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium px-4 py-2 rounded-lg transition">
            ← Kembali
        </a>
    </div>

    <div class="grid md:grid-cols-2 gap-4">
        <div class="p-4 bg-white rounded-xl border border-gray-200">
            <div class="text-sm text-gray-500">Periode</div>
            <div class="font-semibold text-gray-800">
                {{ $jadwal->tanggal_mulai ?? '-' }} s/d {{ $jadwal->tanggal_selesai ?? '-' }}
            </div>
        </div>

        <div class="p-4 bg-white rounded-xl border border-gray-200">
            <div class="text-sm text-gray-500">Status</div>
            <div class="font-semibold text-gray-800">{{ ucfirst($jadwal->status) }}</div>
        </div>
    </div>

    <div class="mt-6 p-5 bg-white rounded-xl border border-gray-200">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Link Google Meet</h3>

        @if($jadwal->gmeet_link)
            <a href="{{ $jadwal->gmeet_link }}" target="_blank"
               class="inline-flex bg-green-500 hover:bg-green-600 text-white font-semibold px-5 py-2 rounded-lg transition">
                Join Google Meet
            </a>
            <p class="text-sm text-gray-600 mt-3 break-all">{{ $jadwal->gmeet_link }}</p>
        @else
            <p class="text-sm text-gray-500 italic">Link Google Meet belum tersedia.</p>
        @endif
    </div>
</div>
@endsection
