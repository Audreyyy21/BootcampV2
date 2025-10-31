@extends('layouts.main')

@section('title', 'Daftar Sertifikat')

@section('content')
<div class="p-6 w-full h-full bg-white/60 rounded-xl shadow w-full">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Daftar Sertifikat</h2>
        <a href="{{ route('admin.sertifikat.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium px-5 py-2 rounded-lg shadow transition">
            + Tambah Sertifikat
        </a>
    </div>

    <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
        <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
    <tr>
        <th class="p-3 text-left border-b">Nomor Sertifikat</th>
        <th class="p-3 text-center border-b">Nama Peserta</th>
        <th class="p-3 text-center border-b">Kelas</th>
        <th class="p-3 text-center border-b">Tanggal Diterbitkan</th>
        <th class="p-3 text-center border-b">Link</th>
        <th class="p-3 text-center border-b">Aksi</th>
    </tr>
</thead>
<tbody class="text-gray-700">
@forelse($sertifikat as $s)
<tr class="hover:bg-gray-50 transition">
    <td class="p-3 border-b font-medium">{{ $s->nomor_sertifikat }}</td>
    <td class="p-3 border-b text-center">{{ $s->user->name }}</td>
    <td class="p-3 border-b text-center">{{ $s->kelas->nama_kelas }}</td>
    <td class="p-3 border-b text-center">{{ \Carbon\Carbon::parse($s->tanggal_diterbitkan)->format('d M Y') }}</td>
    <td class="p-3 border-b text-center">
        @if ($s->link)
            <a href="{{ $s->link }}" target="_blank" class="text-blue-600 hover:underline">Lihat Sertifikat</a>
        @else
            <span class="text-gray-400 italic">Belum ada link</span>
        @endif
    </td>
    <td class="p-3 border-b text-center">
        <form action="{{ route('admin.sertifikat.destroy', $s->id) }}" method="POST" class="delete-form">
            @csrf
            @method('DELETE')
            <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm shadow transition delete-btn">Hapus</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center p-4 text-gray-500 italic">Belum ada sertifikat yang diterbitkan.</td>
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

<script>
document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function () {
        const form = this.closest('.delete-form');
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data sertifikat akan dihapus permanen.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DC2626',
            cancelButtonColor: '#6B7280',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    });
});
</script>
@endsection
