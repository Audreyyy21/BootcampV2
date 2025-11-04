@extends('layouts.main')

@section('title', 'Edit Peserta')

@section('content')
<div class="p-6 w-full h-full bg-white/60 rounded-xl shadow">

    <h2 class="text-2xl font-semibold text-gray-800 mb-6">
        Edit Peserta: {{ $peserta->name }}
    </h2>

    <form action="{{ route('admin.peserta.update', $peserta->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div>
            <label class="block font-medium text-gray-700 mb-1">Nama</label>
            <input type="text" 
                name="name" 
                class="border rounded-lg w-full px-3 py-2" 
                value="{{ old('name', $peserta->name) }}">
            @error('name') 
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
            @enderror
        </div>

        {{-- Email --}}
        <div>
            <label class="block font-medium text-gray-700 mb-1">Email</label>
            <input type="email" 
                name="email" 
                class="border rounded-lg w-full px-3 py-2" 
                value="{{ old('email', $peserta->email) }}">
            @error('email') 
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
            @enderror
        </div>

        <button type="submit" 
            class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-5 py-2 rounded-lg shadow transition">
            Simpan Perubahan
        </button>
    </form>

    {{-- Hapus Peserta --}}
    <form action="{{ route('admin.peserta.delete', $peserta->id) }}" 
          method="POST" 
          class="mt-6 border-t pt-4">
        @csrf
        @method('DELETE')

        <button type="submit"
            onclick="return confirm('Yakin ingin menghapus peserta ini?')"
            class="bg-red-500 hover:bg-red-600 text-white font-semibold px-5 py-2 rounded-lg shadow transition">
            Hapus Peserta
        </button>
    </form>

</div>
@endsection
