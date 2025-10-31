@extends('layouts.main')

@section('title', 'Register Peserta')

@section('content')
    <div class="w-full h-full bg-white/60 shadow-lg rounded-2xl flex items-center justify-center p-8">
        <div class="bg-white border border-yellow-400 w-1/2 p-5 rounded-2xl">
            <form action="{{ url('/register') }}" method="POST" id="register" class="space-y-3">
                @csrf
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-yellow-500">
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-yellow-500">
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Password</label>
                    <input type="password" name="password" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-yellow-500">
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-yellow-500">
                </div>
                <div class="flex justify-center items-center w-32 mt-5">
                    <button type="submit" id="submitBtn"
                        class="w-full bg-yellow-400 text-white py-2 rounded-lg font-semibold hover:bg-yellow-600 transition flex justify-center items-center gap-2">
                        <svg id="loadingSpinner" class="w-5 h-5 animate-spin hidden"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                        </svg>
                        <span id="buttonText">Buat Akun</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- SweetAlert2 --}}
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
        const form = document.querySelector('#register');
        const button = document.querySelector('#submitBtn');
        const spinner = document.querySelector('#loadingSpinner');
        const buttonText = document.querySelector('#buttonText');

        form.addEventListener('submit', () => {
            spinner.classList.remove('hidden');
            buttonText.textContent = 'Membuat...';
            button.disabled = true;
        });
    </script>
@endsection
