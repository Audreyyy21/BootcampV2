@extends('layouts.main')

@section('title', 'Tambah Kelas')

@section('content')
<div class="p-6 w-full h-full bg-white/60 rounded-xl shadow">
    <div class="my-5">
        <a href="{{ route('admin.kelas.index') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium px-5 py-2 rounded-lg shadow transition">
                Kembali
        </a>
    </div>
    <h2 class="text-xl font-bold mb-4">Tambah Kelas Baru</h2>

    <form action="{{ route('admin.kelas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label>Nama Kelas</label>
            <input type="text" name="nama_kelas" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="w-full border p-2 rounded"></textarea>
        </div>
        <div>
            <label>Gambar</label>
            <input type="file" name="gambar" class="w-full border p-2 rounded">
        </div>
        <div>
            <label>Harga</label>
            <input type="number" name="harga" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label>Status</label>
            <select name="status" class="w-full border p-2 rounded">
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
        </div>

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
