@extends('layouts.main')

@section('title', 'Riwayat Kelas Saya')

@section('content')

<div class="p-6 w-full h-full bg-white rounded-xl shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Riwayat Kelas Saya</h2>
        <a href="{{ route('user.kelas.aktif') }}" class="text-yellow-600 hover:underline">Kembali ke Kelas Aktif</a>
    </div>
    @if($jadwalHistori->isEmpty())
    <p class="text-gray-500 italic text-center">Belum ada riwayat kelas yang pernah diambil.</p>
@else
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="p-3 text-left border-b">Kelas</th>
                    <th class="p-3 text-center border-b">Tanggal Mulai</th>
                    <th class="p-3 text-center border-b">Tanggal Selesai</th>
                    <th class="p-3 text-center border-b">Status</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($jadwalHistori as $j)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3 border-b font-medium text-gray-800">{{ $j->kelas->nama_kelas }}</td>
                        <td class="p-3 border-b text-center">{{ $j->tanggal_mulai ?? '-' }}</td>
                        <td class="p-3 border-b text-center">{{ $j->tanggal_selesai ?? '-' }}</td>
                        <td class="p-3 border-b text-center">
                            @if($j->status === 'selesai')
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">Selesai</span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">Batal</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
</div>
@endsection