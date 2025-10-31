@extends('layouts.main')

@section('title', 'Sertifikat Saya')

@section('content')
<div class="p-6 w-full h-full bg-white/60 rounded-xl shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Sertifikat Saya</h2>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="p-3 text-left border-b">Nomor Sertifikat</th>
                    <th class="p-3 text-center border-b">Kelas</th>
                    <th class="p-3 text-center border-b">Tanggal Diterbitkan</th>
                    <th class="p-3 text-center border-b">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($sertifikat as $s)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3 border-b font-medium">{{ $s->nomor_sertifikat }}</td>
                        <td class="p-3 border-b text-center">{{ $s->kelas->nama_kelas ?? '-' }}</td>
                        <td class="p-3 border-b text-center">
                            {{ \Carbon\Carbon::parse($s->tanggal_diterbitkan)->format('d M Y') }}
                        </td>
                        <td class="p-3 border-b text-center">
                            @if ($s->link)
                                <a href="{{ route('user.sertifikat.download', $s->id) }}" 
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-1 rounded-md text-sm shadow transition">
                                   Lihat / Download
                                </a>
                            @else
                                <span class="text-gray-400 italic">Belum tersedia</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center p-6 text-gray-500 italic">
                            Belum ada sertifikat yang diterbitkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: @json(session('success')),
    confirmButtonColor: '#FACC15',
});
</script>
@endif
@endsection
