@extends('layouts.main')

@section('title', 'Daftar Kelas')

@section('content')

<div class="p-6 w-full h-full bg-white rounded-xl shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Daftar Kelas</h2>
        <a href="{{ route('admin.kelas.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium px-5 py-2 rounded-lg shadow transition">
            + Tambah Kelas
        </a>
    </div>
    <div class="overflow-x-auto">
    <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
        <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
            <tr>
                <th class="p-3 text-left border-b">Nama Kelas</th>
                <th class="p-3 text-center border-b">Gambar</th>
                <th class="p-3 text-center border-b">Harga</th>
                <th class="p-3 text-center border-b">Status</th>
                <th class="p-3 text-center border-b w-40">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @forelse($kelas as $k)
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-3 border-b font-medium text-gray-800">{{ $k->nama_kelas }}</td>
                    <td class="p-3 border-b text-center">
                        @if($k->gambar)
                            <img src="{{ asset('storage/' . $k->gambar) }}" 
                                 alt="{{ $k->nama_kelas }}" 
                                 class="w-20 h-20 object-cover rounded-lg mx-auto border">
                        @else
                            <span class="text-gray-400 italic">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td class="p-3 border-b text-center font-semibold text-gray-900">
                        Rp {{ number_format($k->harga, 0, ',', '.') }}
                    </td>
                    <td class="p-3 border-b text-center">
                        @if($k->status === 'aktif')
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Aktif</span>
                        @else
                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm font-semibold">Nonaktif</span>
                        @endif
                    </td>
                    <td class="p-3 border-b text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.kelas.edit', $k->id) }}" 
                               class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-sm shadow transition">
                                Edit
                            </a>
                            <form action="{{ route('admin.kelas.destroy', $k->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm shadow transition delete-btn">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-6 text-center text-gray-500 italic">
                        Belum ada kelas yang tersedia.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
<script>
Swal.fire({
icon: 'success',
title: 'Berhasil!',
text: @json(session('success')),
confirmButtonColor: '#FACC15',
confirmButtonText: 'OK'
})
</script>
@endif

<script> document.querySelectorAll('.delete-btn').forEach(button => { button.addEventListener('click', function () { const form = this.closest('.delete-form'); Swal.fire({ title: 'Yakin ingin menghapus?', text: "Data kelas akan dihapus permanen.", icon: 'warning', showCancelButton: true, confirmButtonColor: '#DC2626', cancelButtonColor: '#6B7280', confirmButtonText: 'Ya, hapus!', cancelButtonText: 'Batal' }).then((result) => { if (result.isConfirmed) { form.submit(); } }) }); }); </script>


@endsection