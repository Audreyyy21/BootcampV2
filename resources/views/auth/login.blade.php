<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex justify-center items-center">
        <div class="bg-white shadow-lg rounded-2xl p-10 w-96">
            <div class="flex flex-col items-center justify-center">
                <img src="{{ asset('images/logoymp.png') }}" alt="Logo" class="w-1/2">
            </div>

            @if($errors->any())
                <div class="bg-red-100 mt-5 text-red-600 text-sm p-3 rounded mb-4">
                    {{ $errors->first() }}
                </div>
            @endif
        
            <form action="{{ url('/login') }}" method="POST" class="space-y-4" id="loginForm">
                @csrf
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-yellow-500">
                </div>
        
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" required
                            class="w-full border border-gray-300 focus:outline-yellow-500 rounded-lg px-3 py-2 pr-10">
                        <button type="button" id="togglePassword"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-yellow-500 focus:outline-none">
                            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.34 4.5 12 4.5c4.658 0 8.575 3.008 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.66 19.5 12 19.5c-4.658 0-8.575-3.008-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <svg id="eyeOffIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hidden">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223a10.477 10.477 0 00-1.908 3.48 1.012 1.012 0 000 .594C3.46 16.478 7.35 19.5 12 19.5c1.676 0 3.27-.367 4.688-1.02M21.02 15.777a10.477 10.477 0 001.908-3.48 1.012 1.012 0 000-.594C20.54 7.522 16.65 4.5 12 4.5c-1.675 0-3.27.367-4.688 1.02M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                    <a class="text-sm hover:underline mt-2 hover:text-yellow-400 flex justify-end text-gray-700 font-medium" href="https://wa.me/6282119205610?text=Minn Saya Lupa Password">Lupa Password</a>
                </div>
                <button type="submit" id="submitBtn"
                    class="w-full bg-yellow-400 text-white py-2 rounded-lg font-semibold hover:bg-yellow-600 transition flex justify-center items-center gap-2">
                    <svg id="loadingSpinner" class="w-5 h-5 animate-spin hidden"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                    </svg>
                    <span id="buttonText">Masuk</span>
                </button>
            </form>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const passwordField = document.querySelector('#password');
        const eyeIcon = document.querySelector('#eyeIcon');
        const eyeOffIcon = document.querySelector('#eyeOffIcon');
        const form = document.querySelector('#loginForm');
        const submitBtn = document.querySelector('#submitBtn');
        const spinner = document.querySelector('#loadingSpinner');
        const buttonText = document.querySelector('#buttonText');

        togglePassword.addEventListener('click', function () {
            const isHidden = passwordField.getAttribute('type') === 'password';
            passwordField.setAttribute('type', isHidden ? 'text' : 'password');
            eyeIcon.classList.toggle('hidden', !isHidden);
            eyeOffIcon.classList.toggle('hidden', isHidden);
        });

        form.addEventListener('submit', function () {
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-70', 'cursor-not-allowed');
            spinner.classList.remove('hidden');
            buttonText.textContent = 'Memproses...';
        });
    </script>
</body>
</html>
