<div class="w-64 shadow-2xl rounded-tr-4xl h-full rounded-2xl bg-white flex flex-col justify-between ">
    <div class="py-4">
        <nav class="flex flex-col gap-5 px-4">
            @if (Auth::user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 font-semibold rounded-2xl bg-white hover:bg-yellow-400 hover:text-white transition-all duration-200 ease-in-out shadow-sm border border-gray-300
            {{ request()->routeIs('admin.dashboard') ? 'bg-yellow-400 text-black' : 'bg-white text-black' }}">
                <span class="mr-3">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>

                </span>
                Dashboard Admin
            </a>
            <a href="{{ route('admin.register') }}" class="flex items-center px-4 py-3 font-semibold rounded-2xl bg-white hover:bg-yellow-400 hover:text-white transition-all duration-200 ease-in-out shadow-sm border border-gray-300
            {{ request()->routeIs('admin.register') ? 'bg-yellow-400 text-black' : 'bg-white text-black' }}">
                <span class="mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                    </svg>
                </span>
                Registrasi Peserta
            </a>
            <a href="{{ route('admin.kelas.index') }}" class="flex items-center px-4 py-3 font-semibold rounded-2xl bg-white hover:bg-yellow-400 hover:text-white transition-all duration-200 ease-in-out shadow-sm border border-gray-300
            {{ request()->routeIs('admin.kelas.index') ? 'bg-yellow-400 text-black' : 'bg-white text-black' }}">
                <span class="mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>

                </span>
                Kelas
            </a>
            <a href="{{ route('admin.jadwal.index') }}" class="flex items-center px-4 py-3 font-semibold rounded-2xl bg-white hover:bg-yellow-400 hover:text-white transition-all duration-200 ease-in-out shadow-sm border border-gray-300
            {{ request()->routeIs('admin.jadwal.index') ? 'bg-yellow-400 text-black' : 'bg-white text-black' }}">
                <span class="mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>


                </span>
                Jadwal
            </a>
            <a href="{{ route('admin.sertifikat.index') }}" class="flex items-center px-4 py-3 font-semibold rounded-2xl bg-white hover:bg-yellow-400 hover:text-white transition-all duration-200 ease-in-out shadow-sm border border-gray-300
            {{ request()->routeIs('admin.sertifikat.index') ? 'bg-yellow-400 text-black' : 'bg-white text-black' }}">
                <span class="mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                </span>
                Sertifikat
            </a>
            @endif
            @if (Auth::user()->role === 'user')
            <a href="{{ route('user.dashboard') }}" class="flex items-center px-4 py-3 font-semibold rounded-2xl bg-white hover:bg-yellow-400 hover:text-white transition-all duration-200 ease-in-out shadow-sm border border-gray-300
            {{ request()->routeIs('user.dashboard') ? 'bg-yellow-400 text-black' : 'bg-white text-black' }}">
                <span class="mr-3">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>

                </span>
                Dashboard User
            </a>
            <a href="{{ route('user.kelas.aktif') }}" class="flex items-center px-4 py-3 font-semibold rounded-2xl bg-white hover:bg-yellow-400 hover:text-white transition-all duration-200 ease-in-out shadow-sm border border-gray-300
            {{ request()->routeIs('user.kelas.aktif') ? 'bg-yellow-400 text-black' : 'bg-white text-black' }}">
                <span class="mr-3">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>
                </span>
                Kelas
            </a>
            <a href="{{ route('user.kelas.histori') }}" class="flex items-center px-4 py-3 font-semibold rounded-2xl bg-white hover:bg-yellow-400 hover:text-white transition-all duration-200 ease-in-out shadow-sm border border-gray-300
            {{ request()->routeIs('user.kelas.histori') ? 'bg-yellow-400 text-black' : 'bg-white text-black' }}">
                <span class="mr-3">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
                </span>
                Histori Kelas
            </a>
            <a href="{{ route('user.sertifikat.index') }}" class="flex items-center px-4 py-3 font-semibold rounded-2xl bg-white hover:bg-yellow-400 hover:text-white transition-all duration-200 ease-in-out shadow-sm border border-gray-300
            {{ request()->routeIs('') ? 'bg-yellow-400 text-black' : 'bg-white text-black' }}">
                <span class="mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                    </svg>

                </span>
                Sertifikat
            </a>
            @endif
        </nav>
    </div>
    <div class="px-4 mb-2 rounded-2xl">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="flex items-center  justify-center w-full px-4 py-3 mb-2 text-black font-semibold border border-gray-300 rounded-2xl hover:bg-yellow-400 hover:text-white transition-all duration-200 ease-in-out shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                </svg>
                <span class="">Log Out</span>
            </button>
        </form>
    </div>
</div>