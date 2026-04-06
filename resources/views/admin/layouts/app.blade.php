<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') - Super Técnico 24</title>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/styles.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        pink: "#ff74a8",
                        green: "#2bc15a",
                        badge: "#f8a75b",
                        grey: "#797979",
                    },
                    fontFamily: {
                        figtree: ["Figtree", "sans-serif"],
                    },
                },
            },
        };
    </script>
    <style>
        /* Platform Hairline */
        @font-face {
            font-family: 'Platform';
            src: url("{{asset('assets/fonts/Platform-Hairline.woff2')}}") format('woff2'),
                url("{{asset('assets/fonts/Platform-Hairline.woff')}}") format('woff'),
                url("{{asset('assets/fonts/Platform-Hairline.ttf')}}") format('truetype');
            font-weight: 100;
            font-style: normal;
        }

        @font-face {
            font-family: 'Platform';
            src: url("{{asset('assets/fonts/Platform-HairlineItalic.woff2')}}") format('woff2'),
                url("{{asset('assets/fonts/Platform-HairlineItalic.woff')}}") format('woff'),
                url("{{asset('assets/fonts/Platform-HairlineItalic.ttf')}}") format('truetype');
            font-weight: 100;
            font-style: italic;
        }

        /* Platform Light */
        @font-face {
            font-family: 'Platform';
            src: url("{{asset('assets/fonts/Platform-Light.woff2')}}") format('woff2'),
                url("{{asset('assets/fonts/Platform-Light.woff')}}") format('woff'),
                url("{{asset('assets/fonts/Platform-Light.ttf')}}") format('truetype');
            font-weight: 300;
            font-style: normal;
        }

        @font-face {
            font-family: 'Platform';
            src: url("{{asset('assets/fonts/Platform-LightItalic.woff2')}}") format('woff2'),
                url("{{asset('assets/fonts/Platform-LightItalic.woff')}}") format('woff'),
                url("{{asset('assets/fonts/Platform-LightItalic.ttf')}}") format('truetype');
            font-weight: 300;
            font-style: italic;
        }

        /* Platform Regular */
        @font-face {
            font-family: 'Platform';
            src: url("{{asset('assets/fonts/Platform-Regular.woff2')}}") format('woff2'),
                url("{{asset('assets/fonts/Platform-Regular.woff')}}") format('woff'),
                url("{{asset('assets/fonts/Platform-Regular.ttf')}}") format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: 'Platform';
            src: url("{{asset('assets/fonts/Platform-RegularItalic.woff2')}}") format('woff2'),
                url("{{asset('assets/fonts/Platform-RegularItalic.woff')}}") format('woff'),
                url("{{asset('assets/fonts/Platform-RegularItalic.ttf')}}") format('truetype');
            font-weight: 400;
            font-style: italic;
        }

        /* Platform Medium */
        @font-face {
            font-family: 'Platform';
            src: url("{{asset('assets/fonts/Platform-Medium.woff2')}}") format('woff2'),
                url("{{asset('assets/fonts/Platform-Medium.woff')}}") format('woff'),
                url("{{asset('assets/fonts/Platform-Medium.ttf')}}") format('truetype');
            font-weight: 500;
            font-style: normal;
        }

        @font-face {
            font-family: 'Platform';
            src: url("{{asset('assets/fonts/Platform-MediumItalic.woff2')}}") format('woff2'),
                url("{{asset('assets/fonts/Platform-MediumItalic.woff')}}") format('woff'),
                url("{{asset('assets/fonts/Platform-MediumItalic.ttf')}}") format('truetype');
            font-weight: 500;
            font-style: italic;
        }

        /* Platform Bold */
        @font-face {
            font-family: 'Platform';
            src: url("{{asset('assets/fonts/Platform-Bold.woff2')}}") format('woff2'),
                url("{{asset('assets/fonts/Platform-Bold.woff')}}") format('woff'),
                url("{{asset('assets/fonts/Platform-Bold.ttf')}}") format('truetype');
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: 'Platform';
            src: url("{{asset('assets/fonts/Platform-BoldItalic.woff2')}}") format('woff2'),
                url("{{asset('assets/fonts/Platform-BoldItalic.woff')}}") format('woff'),
                url("{{asset('assets/fonts/Platform-BoldItalic.ttf')}}") format('truetype');
            font-weight: 700;
            font-style: italic;
        }


        * {
            font-family: 'Platform', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-50">
    <div class="app-container">
        @include('admin.layouts.sidebar')
        <!-- Main Content -->
        <div class="main-content">
            @include('admin.layouts.header')
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const hamburgerBtn = document.getElementById('hamburger-btn');
        const closeBtn = document.getElementById('close-sidebar');

        hamburgerBtn.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            closeBtn.classList.remove('hidden'); // ðŸ‘ˆ Show close button
        });

        closeBtn.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            closeBtn.classList.add('hidden'); // ðŸ‘ˆ Hide close button
        });

        // Optional: Click outside to close
        document.addEventListener('click', function(e) {
            if (!sidebar.contains(e.target) && !hamburgerBtn.contains(e.target)) {
                sidebar.classList.add('-translate-x-full');
                closeBtn.classList.add('hidden'); // ðŸ‘ˆ Hide on outside click too
            }
        });
    </script>

    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
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
