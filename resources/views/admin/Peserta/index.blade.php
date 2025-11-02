@extends('layouts.main')

@section('title', 'Data Peserta')

@section('content')
<div class="p-6 w-full h-full bg-white/60 rounded-xl shadow">
    
    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Data Peserta</h2>
    </div>

    {{-- Tabel --}}
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="p-3 text-left border-b font-medium">Nama</th>
                    <th class="p-3 text-left border-b font-medium">Email</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($peserta as $p)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3 border-b font-medium text-gray-800">{{ $p->name }}</td>
                        <td class="p-3 border-b">{{ $p->email }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="p-6 text-center text-gray-500 italic">
                            Belum ada peserta yang terdaftar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
