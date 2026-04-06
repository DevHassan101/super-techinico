<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="https://sty1.devmail-sty.online/super-tec/public/assets/images/logo.png"
        type="image/x-icon">
    <title>@yield('title', 'SuperTecnico24')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link rel="stylesheet" href="{{ url('build/assets/app-e96360e9.css') }}">
    <script src="{{ url('build/assets/app-bacc5c14.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="flex items-center h-screen bg-white">
        <div class="hidden sm:!block h-screen w-[30%]">
            <img src="{{ url('assets/images/guest.jpg') }}" class="h-screen w-full" alt="">
        </div>
        <div class="h-screen pr-[5%] md:pl-[110px] pl-[5%] flex items-center w-full sm:!w-[80%]">
            <div class="w-full">
                {{ $slot }}
            </div>
        </div>
    </div>

    @stack('script')
    <script>
        function togglePassword(a, id) {
            let passwordInput = document.getElementById(id);

            let status = a.getAttribute('data-status');
            passwordInput.setAttribute('type', status);

            let newStatus = status == 'text' ? 'password' : 'text';
            a.setAttribute('data-status', newStatus);


            let showIcon = "fa-eye";
            let hideIcon = "fa-eye-slash";
            let icon = document.getElementById('icon-' + id);
            if (status == 'text') {
                icon.classList.add(showIcon)
                icon.classList.remove(hideIcon)
            } else {
                icon.classList.remove(showIcon)
                icon.classList.add(hideIcon)
            }
        }
    </script>
</body>

</html>
