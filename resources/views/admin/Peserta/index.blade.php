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
                    <th class="p-3 text-left border-b font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($peserta as $p)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-3 py-4 border-b font-medium text-gray-800">{{ $p->name }}</td>
                        <td class="px-3 py-4 border-b">{{ $p->email }}</td>

                        {{-- Kolom aksi --}}
                        <td class="px-3 py-4 border-b border-l flex items-center gap-3">
                            

                            {{-- Edit button --}}
                            <a href="{{ route('admin.peserta.edit', $p->id) }}"
                                class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white text-sm rounded-md transition">
                                Edit
                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('admin.peserta.delete', $p->id) }}" 
                                method="POST"
                                onsubmit="return confirm('Hapus peserta ini?')">
                                @csrf
                                @method('DELETE')
                                <button 
                                    class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white text-sm rounded-md transition">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-6 text-center text-gray-500 italic">
                            Belum ada peserta yang terdaftar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
