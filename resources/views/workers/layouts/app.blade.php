<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Super Técnico 24</title>
    <link rel="stylesheet" href="{{ asset('worker/assets/css/styles.css') }} ">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">
    @stack('head')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Platform Hairline */
        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-Hairline.woff2') }}") format('woff2'),
                url("{{ asset('assets/fonts/Platform-Hairline.woff') }}") format('woff'),
                url("{{ asset('assets/fonts/Platform-Hairline.ttf') }}") format('truetype');
            font-weight: 100;
            font-style: normal;
        }

        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-HairlineItalic.woff2') }}") format('woff2'),
                url("{{ asset('assets/fonts/Platform-HairlineItalic.woff') }}") format('woff'),
                url("{{ asset('assets/fonts/Platform-HairlineItalic.ttf') }}") format('truetype');
            font-weight: 100;
            font-style: italic;
        }

        /* Platform Light */
        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-Light.woff2') }}") format('woff2'),
                url("{{ asset('assets/fonts/Platform-Light.woff') }}") format('woff'),
                url("{{ asset('assets/fonts/Platform-Light.ttf') }}") format('truetype');
            font-weight: 300;
            font-style: normal;
        }

        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-LightItalic.woff2') }}") format('woff2'),
                url("{{ asset('assets/fonts/Platform-LightItalic.woff') }}") format('woff'),
                url("{{ asset('assets/fonts/Platform-LightItalic.ttf') }}") format('truetype');
            font-weight: 300;
            font-style: italic;
        }

        /* Platform Regular */
        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-Regular.woff2') }}") format('woff2'),
                url("{{ asset('assets/fonts/Platform-Regular.woff') }}") format('woff'),
                url("{{ asset('assets/fonts/Platform-Regular.ttf') }}") format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-RegularItalic.woff2') }}") format('woff2'),
                url("{{ asset('assets/fonts/Platform-RegularItalic.woff') }}") format('woff'),
                url("{{ asset('assets/fonts/Platform-RegularItalic.ttf') }}") format('truetype');
            font-weight: 400;
            font-style: italic;
        }

        /* Platform Medium */
        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-Medium.woff2') }}") format('woff2'),
                url("{{ asset('assets/fonts/Platform-Medium.woff') }}") format('woff'),
                url("{{ asset('assets/fonts/Platform-Medium.ttf') }}") format('truetype');
            font-weight: 500;
            font-style: normal;
        }

        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-MediumItalic.woff2') }}") format('woff2'),
                url("{{ asset('assets/fonts/Platform-MediumItalic.woff') }}") format('woff'),
                url("{{ asset('assets/fonts/Platform-MediumItalic.ttf') }}") format('truetype');
            font-weight: 500;
            font-style: italic;
        }

        /* Platform Bold */
        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-Bold.woff2') }}") format('woff2'),
                url("{{ asset('assets/fonts/Platform-Bold.woff') }}") format('woff'),
                url("{{ asset('assets/fonts/Platform-Bold.ttf') }}") format('truetype');
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-BoldItalic.woff2') }}") format('woff2'),
                url("{{ asset('assets/fonts/Platform-BoldItalic.woff') }}") format('woff'),
                url("{{ asset('assets/fonts/Platform-BoldItalic.ttf') }}") format('truetype');
            font-weight: 700;
            font-style: italic;
        }


        * {
            font-family: 'Platform', sans-serif;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        pink: '#ff74a8',
                        green: '#2bc15a',
                        badge: '#f8a75b',
                        grey: '#797979'
                    },
                    fontFamily: {
                        'figtree': ['Figtree', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>

<body>
    <div class="app-container">
        @include('workers.layouts.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            @include('workers.layouts.header')

            @yield('content')
        </div>
    </div>
    <script>
        const sidebar = document.getElementById('sidebar');
        const hamburgerBtn = document.getElementById('hamburger-btn');
        const closeBtn = document.getElementById('close-sidebar');

        hamburgerBtn.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            closeBtn.classList.remove('hidden'); // 👈 Show close button
        });

        closeBtn.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            closeBtn.classList.add('hidden'); // 👈 Hide close button
        });

        // Optional: Click outside to close
        document.addEventListener('click', function(e) {
            if (!sidebar.contains(e.target) && !hamburgerBtn.contains(e.target)) {
                sidebar.classList.add('-translate-x-full');
                closeBtn.classList.add('hidden'); // 👈 Hide on outside click too
            }
        });
        // Search functionality
        const searchInputs = document.querySelectorAll(".search-input");
        searchInputs.forEach((input) => {
            input.addEventListener("input", function () {
                const searchTerm = this.value.toLowerCase();
                const items = document.querySelectorAll(".searchable-item");
    
                items.forEach((item) => {
                    const text = item.textContent.toLowerCase();
                    if (text.includes(searchTerm)) {
                        item.style.display = "";
                    } else {
                        item.style.display = "none";
                    }
                });
            });
        });
        
        
        
        
        
        document.getElementById('notification-icon').addEventListener('click', function() {
            document.querySelector('#notification-card').classList.toggle('hidden');
        });


        Pusher.logToConsole = true;

        var pusher = new Pusher('7719147038c1c6bb3e96', {
            cluster: 'ap2'
        });
        let receiverId = "{{ Auth::id() }}"
        console.log('receiver: ' + receiverId)
        var notificationChannel = pusher.subscribe('notification-' + receiverId);
        notificationChannel.bind('my-event', function(data) {
            console.log(data);
            notificationElement(data.message)
            // alert(JSON.stringify(data));
        });
        function notificationElement(message){
            let assetPath = "{{ asset('/') }}" + message.sender.image;
            console.log(assetPath);
            
            let defaultImage = "{{ asset('assets/images/person.png') }}";
            let element = `<div class="flex w-full bg-slate-100 px-3 py-2 border-b">
                        <div>
                            <img src="${message.sender.image ? assetPath : defaultImage}" alt=""
                                class="h-10 w-10 rounded-full">
                        </div>
                        <div class="px-2 w-full">
                            <p class="flex justify-between">
                                <span class="text-[#595959] font-semibold">
                                    ${message.sender.name}
                                </span>
                                <span class="text-xs font-light text-slate-400">
                                    ${message.created_at}
                                </span>
                            </p>
                            <p class="text-sm text-slate-500">
                                ${message.message}
                            </p>
                        </div>
                    </div>`;
                    $('#notification-list').prepend(element);
                    let len = $('.notification-badge').text();
                    $('.notification-badge').text(parseInt(len) + 1);
        }
        $.ajax({
            type: "GET",
            url: "{{url('workers/unread-messages')}}",
            success: function (response) {
                if (response.error) {
                    return;
                }
                let messages = response.messages;
                messages.forEach(message => {
                    notificationElement(message)
                });
                $('.notification-badge').text(messages.length);
                
            }
        });
    </script>
    <script src="{{ asset('worker/assets/js/main.js') }}"></script>
    @stack('script')
</body>

</html>
