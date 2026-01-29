@extends('layouts.main')

@section('title', 'Absensi Kelas')

@section('content')
<div class="p-6 w-full h-full bg-white/60 rounded-xl shadow">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-6">
        <div>
            <h2 class="text-2xl font-semibold text-gray-800">Absensi Kelas: {{ $kelas->nama_kelas }}</h2>
            <p class="text-sm text-gray-600">Ceklis peserta yang hadir, lalu simpan.</p>
        </div>
        <a href="{{ route('admin.absensi.index') }}"
           class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium px-4 py-2 rounded-lg transition">
            ← Kembali
        </a>
    </div>

    <form method="POST" action="{{ route('admin.absensi.update', $kelas->id) }}">
        @csrf

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="p-3 text-center border-b w-28">Hadir</th>
                        <th class="p-3 text-left border-b">Nama</th>
                        <th class="p-3 text-left border-b">Email</th>
                        <th class="p-3 text-center border-b">Mulai</th>
                        <th class="p-3 text-center border-b">Selesai</th>
                        <th class="p-3 text-center border-b">Status</th>
                        <th class="p-3 text-center border-b">Waktu Absen</th>
                        <th class="p-3 text-center border-b">GMeet</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse($peserta as $p)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-3 border-b text-center">
                                <input type="checkbox"
                                       name="hadir[]"
                                       value="{{ $p->id }}"
                                       class="w-5 h-5 accent-yellow-500"
                                       {{ $p->is_hadir ? 'checked' : '' }}>
                            </td>
                            <td class="p-3 border-b font-medium text-gray-800">{{ $p->user->name ?? '-' }}</td>
                            <td class="p-3 border-b">{{ $p->user->email ?? '-' }}</td>
                            <td class="p-3 border-b text-center">{{ $p->tanggal_mulai ?? '-' }}</td>
                            <td class="p-3 border-b text-center">{{ $p->tanggal_selesai ?? '-' }}</td>
                            <td class="p-3 border-b text-center">
                                @if($p->status === 'aktif')
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Aktif</span>
                                @elseif($p->status === 'selesai')
                                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">Selesai</span>
                                @else
                                    <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm font-semibold">Batal</span>
                                @endif
                            </td>
                            <td class="p-3 border-b text-center">
                                {{ $p->hadir_at ? $p->hadir_at->format('d M Y H:i') : '-' }}
                            </td>
                            <td class="p-3 border-b text-center">
    @if($p->gmeet_link)
        <a href="{{ $p->gmeet_link }}" target="_blank"
           class="text-blue-600 hover:underline font-semibold">
           Join
        </a>
    @else
        -
    @endif
</td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-6 text-center text-gray-500 italic">
                                Belum ada peserta pada kelas ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-5 flex justify-end">
            <button type="submit"
                class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-5 py-2 rounded-lg shadow transition">
                Simpan Absensi
            </button>
        </div>
    </form>
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
@endsection
