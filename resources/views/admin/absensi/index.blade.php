@extends('layouts.main')

@section('title', 'Absensi')

@section('content')
<div class="p-6 w-full h-full bg-white/60 rounded-xl shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Absensi - Pilih Kelas</h2>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse($kelas as $k)
            <a href="{{ route('admin.absensi.show', $k->id) }}"
               class="p-5 rounded-xl bg-white border border-gray-200 shadow-sm hover:shadow transition">
                <div class="text-lg font-semibold text-gray-800">{{ $k->nama_kelas }}</div>
                <div class="text-sm text-gray-500 mt-1">
                    Status: <span class="font-medium">{{ $k->status }}</span>
                </div>
                <div class="mt-4 inline-flex items-center text-sm font-semibold text-yellow-700">
                    Kelola Absensi →
                </div>
            </a>
        @empty
            <div class="text-gray-500 italic">Belum ada kelas.</div>
        @endforelse
    </div>
</div>
@endsection
