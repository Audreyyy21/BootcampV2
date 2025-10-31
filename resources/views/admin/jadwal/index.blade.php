@extends('layouts.main')

@section('title', 'Daftar Jadwal')

@section('content')

<div class="p-6 w-full h-full bg-white/60 rounded-xl shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Daftar Jadwal</h2>
        <a href="{{ route('admin.jadwal.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium px-5 py-2 rounded-lg shadow transition">
            + Tambah Jadwal
        </a>
    </div>
    <div class="overflow-x-auto">
    <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
        <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
            <tr>
                <th class="p-3 text-left border-b">User</th>
                <th class="p-3 text-left border-b">Kelas</th>
                <th class="p-3 text-center border-b">Mulai</th>
                <th class="p-3 text-center border-b">Selesai</th>
                <th class="p-3 text-center border-b">Status</th>
                <th class="p-3 text-center border-b w-40">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @forelse($jadwal as $j)
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-3 border-b font-medium text-gray-800">{{ $j->user->name ?? '-' }}</td>
                    <td class="p-3 border-b">{{ $j->kelas->nama_kelas ?? '-' }}</td>
                    <td class="p-3 border-b text-center">{{ $j->tanggal_mulai ?? '-' }}</td>
                    <td class="p-3 border-b text-center">{{ $j->tanggal_selesai ?? '-' }}</td>
                    <td class="p-3 border-b text-center">
                        @if($j->status === 'aktif')
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Aktif</span>
                        @elseif($j->status === 'selesai')
                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">Selesai</span>
                        @else
                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm font-semibold">Batal</span>
                        @endif
                    </td>
                    <td class="p-3 border-b text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.jadwal.edit', $j->id) }}" 
                               class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-sm shadow transition">
                                Edit
                            </a>
                            <form action="{{ route('admin.jadwal.destroy', $j->id) }}" method="POST" class="delete-form">
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
                    <td colspan="6" class="p-6 text-center text-gray-500 italic">
                        Belum ada jadwal yang tersedia.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>

{{-- SweetAlert2 --}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Alert sukses --}}
@if (session('success'))

<script> Swal.fire({ icon: 'success', title: 'Berhasil!', text: @json(session('success')), confirmButtonColor: '#FACC15', confirmButtonText: 'OK' }) </script>

@endif

{{-- Konfirmasi hapus --}}

<script> document.querySelectorAll('.delete-btn').forEach(button => { button.addEventListener('click', function () { const form = this.closest('.delete-form'); Swal.fire({ title: 'Yakin ingin menghapus?', text: "Data jadwal akan dihapus permanen.", icon: 'warning', showCancelButton: true, confirmButtonColor: '#DC2626', cancelButtonColor: '#6B7280', confirmButtonText: 'Ya, hapus!', cancelButtonText: 'Batal' }).then((result) => { if (result.isConfirmed) { form.submit(); } }) }); }); </script>

@endsection