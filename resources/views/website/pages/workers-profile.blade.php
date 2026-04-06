@extends('website.layouts.app')
@section('title', 'Worker Profile')
@section('content')
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

    <style>
        .w-12.h-1.bg-pink-500.rounded-full.active {
            background: linear-gradient(to right, #A2A3CF, #FD73A7);
        }

        .testimonail-main {
            box-shadow: rgb(233 30 99 / 16%) 0px 3px 8px;
        }

        .tesitmonial-text {
            box-shadow: rgb(233 30 99 / 12%) 0px 2px 23px;
        }
    </style>



    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-4 md:px-[5%] px-4">
        <a href="{{ url('/') }}" class="hover:underline">Home</a> &gt;
        <a href="{{ url('workers') }}" class="hover:underline">{{ $worker->position->name ?? '' }}</a> &gt;
        <span class="text-gray-700 font-medium">{{ $worker->name }}</span>
    </div>

    <!-- Profile Card -->
    <div class="bg-white rounded-lg shadow md:mx-[5%] mx-4 flex flex-col md:flex-row lg:gap-[50px] md:gap-[15px] p-[30px]">

        <!-- Left: Image -->
        <div class="flex-shrink-0">
            <img src="{{ url($worker->image) }}" alt="{{ $worker->name }}" class=" rounded-lg w-64 h-auto object-cover">
        </div>

        <!-- Right: Details -->
        <div class="flex-1">
            <h2 class="text-xl font-semibold">{{ $worker->name }}</h2>

            <!-- Rating -->
            <div class="flex items-center mt-1">
                @if (count($worker->reviews) > 0)
                    <div class="flex items-center">
                        <div class="flex">
                            @php
                                $rating = $worker->averageRating();
                                $fullStars = floor($rating);
                                $hasHalfStar = $rating - $fullStars >= 0.5;
                            @endphp

                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $fullStars)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-[30px] w-[30px] text-yellow-400"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @elseif ($i == $fullStars + 1 && $hasHalfStar)
                                    <div class="relative">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-[30px] w-[30px] text-gray-300"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <div class="absolute inset-0 overflow-hidden w-1/2">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-[30px] w-[30px] text-yellow-400" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </div>
                                    </div>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-[30px] w-[30px] text-gray-300"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endif
                            @endfor
                        </div>
                    </div>
                    <span class="ml-2 text-sm text-gray-600">{{ number_format($worker->averageRating(), 1) }}/5</span>
                @else
                    No reviews
                @endif
            </div>

            <!-- Info Rows -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-sm text-gray-700 mt-4">
                <p><span class="font-semibold">Nationality:</span> {{ $worker->location->name ?? '' }}</p>
                <p><span class="font-semibold">Member Since:</span> {{ date('F Y', strtotime($worker->created_at)) }}</p>
                {{-- <p>
                    <span class="font-semibold">Average Response Time:</span>
                    <span class="text-green-600">1 hour</span>
                </p> --}}
                @if (count($worker->appointments) > 0)
                    @php
                        $last_delivery = $worker->appointments->where('status', 'completed')->first()->updated_at ?? '';
                    @endphp
                    @if ($last_delivery)
                        <p><span class="font-semibold">Last Delivery:</span>
                            {{ date('F d, Y', strtotime($last_delivery)) }} </p>
                    @endif
                @endif
                @php
                    $workerLanguages = json_decode($worker->languages, true) ?? [];
                @endphp
                @if ($workerLanguages)
                    <p class="md:col-span-2">
                        <span class="font-semibold">Languages:</span>
                        @foreach ($workerLanguages as $workerLanguage)
                            @if ($loop->first)
                                {{ $workerLanguage }}
                            @else
                                {{ ', ' . $workerLanguage }}
                            @endif
                        @endforeach
                    </p>
                @endif
            </div>

            <!-- Bio -->
            <p class="my-[40px] text-gray-600 text-sm leading-relaxed w-[100%] md:max-w-[700px] ">
                {{ $worker->bio }}
            </p>

            <!-- Buttons -->
            <div class="flex flex-wrap gap-3 mt-6">
                <a href="{{ route('chat') . '?worker=' . str_replace(' ', '-', strtolower($worker->name)) }}"
                    class="bg-pink-500 text-white md:px-5 px-11 py-2 rounded font-medium hover:bg-pink-600 transition">
                    Chat with {{ $worker->name }}
                </a>
            </div>
        </div>

    </div>




    @if (count($worker->reviews) > 0)
        <div class="w-full max-w-xl px-4 ml-[auto] mr-[auto] mt-[50px] mb-[50px]">
            <!-- Slider Container -->
            <div class="relative bg-[#fff]  rounded-xl border border-pink-100 pb-[50px] testimonail-main">

                <!-- Slides Wrapper -->
                <div class="overflow-hidden">
                    <div id="slider" class="flex transition-transform duration-500 ease-in-out">

                        @foreach ($worker->reviews as $review)
                            <!-- Slide 1 -->
                            <div class="min-w-full bg-white ">
                                <!-- Quote -->
                                <div
                                    class="rounded-xl border border-pink-100 p-8 text-center relative pt-10 pb-16 tesitmonial-text">
                                    <div class="text-4xl text-purple-300 absolute top-3 left-4">
                                        <img src="{{ url('assets/images/vector2.png') }}" alt="">
                                    </div>
                                    <p class="text-[16px] text-[#607D8B] leading-relaxed mx-[30px]">
                                        "{{ $review->message }}"
                                    </p>
                                    <div class="text-4xl text-purple-300 absolute bottom-3 right-4">
                                        <img src="{{ url('assets/images/vector1.png') }}" alt="">
                                    </div>
                                </div>

                                <!-- Avatar -->
                                <div class="flex justify-center -mt-12 ">
                                    <img src="https://randomuser.me/api/portraits/women/79.jpg" style="z-index: 9"
                                        class="w-20 h-20 rounded-full border-4 border-white object-cover shadow-lg bg-yellow-300" />
                                </div>

                                <!-- Name, Stars, Role -->
                                <div class="text-center mt-4">@php
                                    $rating = $review->rating;
                                    $fullStars = floor($rating);
                                    $hasHalfStar = $rating - $fullStars >= 0.5;
                                @endphp
                                    <div class="text-yellow-400 text-xl mb-1 flex justify-center">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $fullStars)
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @elseif ($i == $fullStars + 1 && $hasHalfStar)
                                                <div class="relative">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                    <div class="absolute inset-0 overflow-hidden w-1/2">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20"
                                                            fill="currentColor">
                                                            <path
                                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @endif
                                        @endfor

                                    </div>
                                    <h3 class="font-bold text-md">{{ number_format($review->rating, 0) }} / 5</h3>
                                    <p class="text-sm text-gray-600 font-semibold">{{ $review->user->name ?? '' }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Arrows -->
                <div class="flex justify-center items-center px-6 gap-[250px]">
                    <button id="prev" class="text-pink-500 text-xl hover:text-pink-700">
                        <img src="{{ url('assets/images/arrow_left.png') }}" alt="Locksmith"
                            class="rounded-lg mb-3 w-full h-48 object-cover cursor-pointer" style="height: 100%";>
                    </button>
                    <button id="next" class="text-pink-500 text-xl hover:text-pink-700">
                        <img src="{{ url('assets/images/arrow_right.png') }}" alt="Locksmith" style="height: 100%"
                            class="rounded-lg mb-3 w-full h-48 object-cover cursor-pointer">
                    </button>
                </div>

                <!-- Dots -->
                <div class="flex justify-center gap-2 mt-3" id="dots">
                    @foreach ($worker->reviews as $index => $review)
                        <div class="w-12 h-1 rounded-full  {{ $index == 0 ? 'bg-pink-500 active' : 'bg-purple-200' }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        {{-- No reviews --}}
    @endif

    <div class="flex justify-center mb-[20px]">
        <h3 class="color-[#000] font-[700]">Might You Like</h3>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-[50px]">

        @foreach ($otherWorkers as $worker)
            <!-- CARD -->
            <div class="bg-white rounded-lg shadow p-4 card-section">
                <img src="{{ url('assets/images/plumber1.png') }}" alt="Locksmith"
                    class="rounded-lg mb-3 w-full   object-cover">
                <p class="text-sm text-gray-500 mb-1">Alicante</p>
                <h3 class="text-lg font-semibold">Plumbers</h3>

                <!-- Rating -->
                <div class="flex items-center mt-2">
                    <div class="text-yellow-400 flex">
                        ★ ★ ★ ★ ★
                    </div>
                    <span class="text-sm text-gray-500 ml-2">4.8/5</span>
                </div>

                <!-- Profile -->
                <div class="flex items-center mt-4">
                    <div class="w-8 h-8 rounded-full bg-gray-200 mr-3"></div>
                    <a href="{{ route('workersProfile', ['worker' => $worker]) }}" class="text-sm text-gray-700">Michael
                        Lee</a>
                </div>

                <!-- Price -->
                <div class="mt-4">
                    <span class="bg-black text-white px-3 py-1 text-sm rounded">$100<span
                            class="text-xs ml-1">/hr</span></span>
                </div>
            </div>
        @endforeach

    </div>


    {{-- @include('website.components.paymentmodal') --}}
    @include('website.components.appointment-modal')


    <!-- JavaScript -->
    <script>
        const slider = document.getElementById("slider");
        const dots = document.querySelectorAll("#dots div");
        let currentIndex = 0;
        let totalReviews = "{{ $worker->reviews->count() }}"

        function updateSlider() {
            slider.style.transform = `translateX(-${currentIndex * 100}%)`;
            dots.forEach((dot, i) => {
                dot.className = i === currentIndex ?
                    "w-12 h-1 bg-pink-500 rounded-full active" :
                    "w-12 h-1 bg-purple-200 rounded-full";
            });
        }

        document.getElementById("next").addEventListener("click", () => {
            currentIndex = (currentIndex + 1) % totalReviews;
            updateSlider();
        });

        document.getElementById("prev").addEventListener("click", () => {
            currentIndex = (currentIndex - 1 + totalReviews) % totalReviews;
            updateSlider();
        });
    </script>
@endsection
