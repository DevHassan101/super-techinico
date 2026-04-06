<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'SuperTecnico24')</title>
    <link rel="shortcut icon" href="https://sty1.devmail-sty.online/super-tec/public/assets/images/logo.png"
        type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    @stack('head')
</head>

<body>
    @include('website.components.header')
    <main>
        @yield('content')
    </main>
    @include('website.components.footer')
    @stack('script')
    <!-- Toggle Script -->
    <script>
        const toggleBtn = document.getElementById('menu-toggle');
        const navLinks = document.getElementById('nav-links');

        toggleBtn.addEventListener('click', () => {
            navLinks.classList.toggle('hidden');
        });
    </script>
</body>

</html>
