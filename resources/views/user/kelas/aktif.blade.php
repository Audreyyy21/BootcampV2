@extends('layouts.main')

@section('title', 'Kelas Aktif Saya')

@section('content')

<div class="p-6 w-full h-full bg-white/60 rounded-xl shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Kelas Aktif Saya</h2>
    </div>
    @if($jadwalAktif->isEmpty())
    <p class="text-gray-500 italic text-center">Belum ada kelas aktif yang sedang berlangsung.</p>
    @else
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($jadwalAktif as $j)
    <a href="{{ route('user.kelas.detail', $j->id) }}"
       class="block border rounded-xl shadow-sm hover:shadow-md transition bg-gray-50 overflow-hidden">
        
        <img src="{{ asset('storage/' . $j->kelas->gambar) }}" 
             alt="{{ $j->kelas->nama_kelas }}" 
             class="w-full h-40 object-cover">

        <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $j->kelas->nama_kelas }}</h3>
            <p class="text-gray-600 text-sm mb-2">{{ $j->kelas->deskripsi }}</p>
            <p class="text-gray-700 text-sm">
                <strong>Mulai:</strong> {{ $j->tanggal_mulai ?? '-' }}<br>
                <strong>Selesai:</strong> {{ $j->tanggal_selesai ?? '-' }}
            </p>

            <div class="flex items-center justify-between mt-3">
                <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">
                    {{ ucfirst($j->status) }}
                </span>

                <span class="text-yellow-700 font-semibold text-sm">
                    Lihat Detail →
                </span>
            </div>
        </div>
    </a>
@endforeach

    </div>
@endif
</div>
@endsection
