@extends('layouts.main')

@section('title', 'Pengaturan Akun')

@section('content')

<div class="p-6 w-full bg-white/70 backdrop-blur-md rounded-xl shadow">

    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Pengaturan Akun</h2>

    {{-- Alert sukses --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-md mb-4 text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded-md mb-4 text-sm">
            <ul class="list-disc pl-4">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('setting.update') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Email --}}
        <div>
            <label class="font-medium text-gray-700">Email</label>
            <input type="email" 
                   name="email"
                   value="{{ old('email', auth()->user()->email) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-yellow-500"
                   required>
        </div>

        {{-- Password --}}
        <div>
            <label class="font-medium text-gray-700">Password Baru (opsional)</label>
            <input type="password" 
                   name="password"
                   placeholder="Isi jika ingin ganti password"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-yellow-500">
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end">
            <button type="submit"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition font-semibold">
                Simpan Perubahan
            </button>
        </div>

    </form>
</div>

@endsection
