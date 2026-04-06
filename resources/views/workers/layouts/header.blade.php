<!-- Header -->
<header class="header">
    <button id="hamburger-btn" class="block lg:hidden p-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
    <h1 class="text-2xl font-bold">@yield('page-title')</h1>
        <div class="flex items-center">
        <div class="relative z-[220]">
            <div id="notification-icon" class="notification-icon mr-6 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                </svg>
                <div class="notification-badge"></div>
            </div>

            <div id="notification-card" class="hidden w-[300px] sm:w-[400px] rounded border  absolute right-[20px] left-auto mt-2 bg-white">
                <div class="flex justify-between px-2 py-1">
                    <span class="text-sm font-bold text-slate-600">
                        Notifications
                    </span>
                    <a href="{{url('workers/mark-all-read')}}" class="text-sm text-[#ff74a8]">Mark all as read</a>
                </div>
                <div class="max-h-[300px] overflow-auto" id="notification-list">
                </div>
            </div>
        </div>

        <div class="relative inline-block text-left">
            <!-- Trigger -->
            <button onclick="toggleDropdown()" class="flex items-center space-x-2 focus:outline-none">
                <img src="{{ asset(Auth::user()->image) }}" alt="{{ Auth::user()->name }}" class="w-8 h-8 rounded-full">
                <div class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</div>
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>

            <!-- Dropdown -->
            <div id="profileDropdown"
                class="absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg py-2 z-50 hidden transition duration-150 ease-in-out">
                <a href="{{ route('worker.profile.index') }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Log out</button>
                </form>
            </div>
        </div>

    </div>
</header>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('profileDropdown');
        dropdown.classList.toggle('hidden');
    }

    // Optional: close dropdown if clicked outside
    window.addEventListener('click', function(e) {
        const dropdown = document.getElementById('profileDropdown');
        const trigger = dropdown.previousElementSibling;

        if (!dropdown.contains(e.target) && !trigger.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>
