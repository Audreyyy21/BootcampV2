@extends('layouts.main')

@section('title', 'Tambah Sertifikat')

@section('content')
<div class="p-6 bg-white rounded-xl shadow w-full">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Tambah Sertifikat</h2>

    <form action="{{ route('admin.sertifikat.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium text-gray-700 mb-1">Nama Peserta</label>
            <select name="user_id" class="border rounded-lg w-full px-3 py-2">
                <option value="">-- Pilih Peserta --</option>
                @foreach($users as $u)
                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                @endforeach
            </select>
            @error('user_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1">Kelas</label>
            <select name="kelas_id" class="border rounded-lg w-full px-3 py-2">
                <option value="">-- Pilih Kelas Aktif --</option>
                @foreach($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                @endforeach
            </select>
            @error('kelas_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1">Link Sertifikat (Opsional)</label>
            <input type="url" name="link" class="border rounded-lg w-full px-3 py-2" placeholder="https://drive.google.com/..." value="{{ old('link') }}">
            @error('link') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-5 py-2 rounded-lg shadow transition">
            Simpan Sertifikat
        </button>
    </form>
</div>
@endsection
