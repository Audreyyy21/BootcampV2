<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Website')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body class="bg-gray-50 text-gray-800"
      style="background-image: white;
            background-size: cover;
             background-position: center;
             background-repeat: no-repeat;">

    <div class="flex h-screen overflow-hidden">

        <div class="m-5 backdrop-blur-md">
            @include('components.sidebar')
        </div>

        <div class="flex-1 flex flex-col overflow-y-auto">
            
            <div class="my-5 mr-5">
                @include('components.topbar')
            </div>

            <main class="flex-1 mb-5 mr-5">
                @yield('content')
            </main>

        </div>
    </div>

</body>
</html>
