@extends('layouts.main')

@section('title', 'Edit Jadwal')

@section('content')

<div class="p-6 w-full h-full bg-white/60 rounded-xl shadow-md max-w-3xl mx-auto"> <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Jadwal</h2>
    <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST" class="space-y-5">
    @csrf
    @method('PUT')

    {{-- User --}}
    <div>
        <label for="user_id" class="block text-gray-700 font-medium mb-2">User</label>
        <select name="user_id" id="user_id" class="w-full border-gray-300 rounded-lg focus:ring-yellow-400" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $jadwal->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->name }} ({{ $user->email }})
                </option>
            @endforeach
        </select>
    </div>

    {{-- Kelas --}}
    <div>
        <label for="kelas_id" class="block text-gray-700 font-medium mb-2">Kelas</label>
        <select name="kelas_id" id="kelas_id" class="w-full border-gray-300 rounded-lg focus:ring-yellow-400" required>
            @foreach($kelas as $k)
                <option value="{{ $k->id }}" {{ $jadwal->kelas_id == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kelas }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Tanggal Mulai --}}
    <div>
        <label for="tanggal_mulai" class="block text-gray-700 font-medium mb-2">Tanggal Mulai</label>
        <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ $jadwal->tanggal_mulai }}" class="w-full border-gray-300 rounded-lg focus:ring-yellow-400">
    </div>

    {{-- Tanggal Selesai --}}
    <div>
        <label for="tanggal_selesai" class="block text-gray-700 font-medium mb-2">Tanggal Selesai</label>
        <input type="date" name="tanggal_selesai" id="tanggal_selesai" value="{{ $jadwal->tanggal_selesai }}" class="w-full border-gray-300 rounded-lg focus:ring-yellow-400">
    </div>

    {{-- Status --}}
    <div>
        <label for="status" class="block text-gray-700 font-medium mb-2">Status</label>
        <select name="status" id="status" class="w-full border-gray-300 rounded-lg focus:ring-yellow-400" required>
            <option value="aktif" {{ $jadwal->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="selesai" {{ $jadwal->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            <option value="batal" {{ $jadwal->status == 'batal' ? 'selected' : '' }}>Batal</option>
        </select>
    </div>

    <div class="flex justify-end gap-3 mt-6">
        <a href="{{ route('admin.jadwal.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition">Batal</a>
        <button type="submit" class="bg-yellow-500 text-white px-5 py-2 rounded-lg hover:bg-yellow-600 transition">Perbarui</button>
    </div>
</form>
</div>

{{-- SweetAlert2 --}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
<script>
Swal.fire({
icon: 'success',
title: 'Berhasil!',
text: @json(session('success')),
confirmButtonColor: '#FACC15'
});
</script>
@endif
@endsection