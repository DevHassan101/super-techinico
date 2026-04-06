<header class="md:px-[5%] px-4 relative">
    <nav class="py-5">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href="{{url('/')}}">
                <img src="{{ url('assets/images/logo.png') }}" alt="Logo">
            </a>

            <!-- Hamburger Button (Mobile) -->
            <div class="md:hidden">
                <button id="menu-toggle" class="focus:outline-none">
                    <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Navigation Links (Desktop) -->
            <div id="nav-links"
                class="hidden md:flex md:items-center md:gap-7 md:static absolute top-full left-0 w-full bg-white md:bg-transparent md:w-auto md:flex-row flex-col z-[200] shadow-md md:shadow-none">
                <ul class="flex md:flex-row flex-col gap-7 md:items-center px-4 md:px-0 py-4 md:py-0">
                    <li><a href="{{ url('/') }}"
                            class="text-[16px] hover:text-[#FF71A6] {{ request()->url() == url('/') ? 'text-[#FF71A6]' : '' }}">Home</a>
                    </li>
                    <li><a href="{{ url('about-us') }}" class="text-[16px] hover:text-[#FF71A6] {{ request()->url() == url('who-we-are') ? 'text-[#FF71A6]' : '' }}">Who We Are</a></li>
                    <li><a href="{{ url('workers') }}"
                            class="text-[16px] hover:text-[#FF71A6] {{ request()->url() == url('workers') ? 'text-[#FF71A6]' : '' }}">Workers</a>
                    </li>
                    @role('user')
                        <li>
                            <a href="{{ url('appointments') }}"
                                class="text-[16px] hover:text-[#FF71A6] {{ request()->url() == url('appointments') ? 'text-[#FF71A6]' : '' }}">
                                My Appointments
                            </a>
                        </li>
                    @endrole
                </ul>


                @auth
                    <!-- Auth Buttons (Mobile) -->
                    <div class="flex flex-col gap-3 px-4 md:hidden pb-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="icon-logout">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                            </button>
                        </form>
                    </div>
                @else
                    <div class="flex flex-col gap-3 px-4 md:hidden pb-4">
                        <a href="{{ route('login') }}" class="w-full rounded secondary-btn text-center">Sign in</a>
                        <a href="{{ route('register') }}" class="w-full rounded primary-btn text-center">Join</a>
                    </div>
                @endauth
            </div>

            @auth
                <div class="hidden md:flex items-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="icon-logout cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                        </button>
                    </form>
                </div>
            @else
                <!-- Auth Buttons (Desktop) -->
                <div class="hidden md:flex items-center">
                    <a href="{{ route('login') }}" class="w-[100px] rounded secondary-btn mr-5 text-center">Sign in</a>
                    <a href="{{ route('register') }}" class="w-[100px] rounded primary-btn text-center">Join</a>
                </div>
            @endauth
        </div>
    </nav>
</header>
