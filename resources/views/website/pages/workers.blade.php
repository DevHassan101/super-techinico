@extends('website.layouts.app')
@section('title', 'Workers')
@section('content')
    @push('head')
        <style>
            /* Platform Hairline */
            @font-face {
                font-family: 'Platform';
                src: url("{{ asset('assets/fonts/Platform-Hairline.woff2')}}") format('woff2'),
                    url("{{ asset('assets/fonts/Platform-Hairline.woff')}}") format('woff'),
                    url("{{ asset('assets/fonts/Platform-Hairline.ttf')}}") format('truetype');
                font-weight: 100;
                font-style: normal;
            }

            @font-face {
                font-family: 'Platform';
                src: url("{{ asset('assets/fonts/Platform-HairlineItalic.woff2')}}") format('woff2'),
                    url("{{ asset('assets/fonts/Platform-HairlineItalic.woff')}}") format('woff'),
                    url("{{ asset('assets/fonts/Platform-HairlineItalic.ttf')}}") format('truetype');
                font-weight: 100;
                font-style: italic;
            }

            /* Platform Light */
            @font-face {
                font-family: 'Platform';
                src: url("{{ asset('assets/fonts/Platform-Light.woff2')}}") format('woff2'),
                    url("{{ asset('assets/fonts/Platform-Light.woff')}}") format('woff'),
                    url("{{ asset('assets/fonts/Platform-Light.ttf')}}") format('truetype');
                font-weight: 300;
                font-style: normal;
            }

            @font-face {
                font-family: 'Platform';
                src: url("{{ asset('assets/fonts/Platform-LightItalic.woff2')}}") format('woff2'),
                    url("{{ asset('assets/fonts/Platform-LightItalic.woff')}}") format('woff'),
                    url("{{ asset('assets/fonts/Platform-LightItalic.ttf')}}") format('truetype');
                font-weight: 300;
                font-style: italic;
            }

            /* Platform Regular */
            @font-face {
                font-family: 'Platform';
                src: url("{{ asset('assets/fonts/Platform-Regular.woff2')}}") format('woff2'),
                    url("{{ asset('assets/fonts/Platform-Regular.woff')}}") format('woff'),
                    url("{{ asset('assets/fonts/Platform-Regular.ttf')}}") format('truetype');
                font-weight: 400;
                font-style: normal;
            }

            @font-face {
                font-family: 'Platform';
                src: url("{{ asset('assets/fonts/Platform-RegularItalic.woff2')}}") format('woff2'),
                    url("{{ asset('assets/fonts/Platform-RegularItalic.woff')}}") format('woff'),
                    url("{{ asset('assets/fonts/Platform-RegularItalic.ttf')}}") format('truetype');
                font-weight: 400;
                font-style: italic;
            }

            /* Platform Medium */
            @font-face {
                font-family: 'Platform';
                src: url("{{ asset('assets/fonts/Platform-Medium.woff2')}}") format('woff2'),
                    url("{{ asset('assets/fonts/Platform-Medium.woff')}}") format('woff'),
                    url("{{ asset('assets/fonts/Platform-Medium.ttf')}}") format('truetype');
                font-weight: 500;
                font-style: normal;
            }

            @font-face {
                font-family: 'Platform';
                src: url("{{ asset('assets/fonts/Platform-MediumItalic.woff2')}}") format('woff2'),
                    url("{{ asset('assets/fonts/Platform-MediumItalic.woff')}}") format('woff'),
                    url("{{ asset('assets/fonts/Platform-MediumItalic.ttf')}}") format('truetype');
                font-weight: 500;
                font-style: italic;
            }

            /* Platform Bold */
            @font-face {
                font-family: 'Platform';
                src: url("{{ asset('assets/fonts/Platform-Bold.woff2')}}") format('woff2'),
                    url("{{ asset('assets/fonts/Platform-Bold.woff')}}") format('woff'),
                    url("{{ asset('assets/fonts/Platform-Bold.ttf')}}") format('truetype');
                font-weight: 700;
                font-style: normal;
            }

            @font-face {
                font-family: 'Platform';
                src: url("{{ asset('assets/fonts/Platform-BoldItalic.woff2')}}") format('woff2'),
                    url("{{ asset('assets/fonts/Platform-BoldItalic.woff')}}") format('woff'),
                    url("{{ asset('assets/fonts/Platform-BoldItalic.ttf')}}") format('truetype');
                font-weight: 700;
                font-style: italic;
            }


            * {
                font-family: 'Platform', sans-serif;
            }
        </style>

        <style>
            .range-thumb::-webkit-slider-thumb {
                appearance: none;
                height: 16px;
                width: 16px;
                background-color: #f472b6;
                border-radius: 9999px;
                pointer-events: auto;
                cursor: pointer;
                margin-top: -7px;
            }

            .range-thumb::-moz-range-thumb {
                height: 16px;
                width: 16px;
                background-color: #f472b6;
                border-radius: 9999px;
                pointer-events: auto;
                cursor: pointer;
            }

            .range-thumb::-webkit-slider-runnable-track {
                height: 1px;
            }

            .range-thumb::-moz-range-track {
                height: 1px;
            }

            .card-section {
                position: relative;
                z-index: 1;
                border-radius: 10px;
                overflow: hidden;
                transition: all linear 0.5s;
            }

            .card-section::before {
                content: "";
                position: absolute;
                inset: 0;
                border-radius: 10px;
                padding: 2px;
                background: transparent;

                -webkit-mask:
                    linear-gradient(#fff 0 0) content-box,
                    linear-gradient(#fff 0 0);
                -webkit-mask-composite: xor;
                mask-composite: exclude;
                z-index: -1;
            }

            .card-section:hover::before {
                background: linear-gradient(to right, #A86F01, #DDA605);

            }


            .loader {
                height: 80px;
                aspect-ratio: 1;
                padding: 10px;
                border-radius: 50%;
                box-sizing: border-box;
                position: relative;
                mask: conic-gradient(#000 0 0) content-box exclude, conic-gradient(#000 0 0);
                filter: blur(12px);
            }

            .loader:before {
                content: "";
                position: absolute;
                inset: 0;
                background: repeating-conic-gradient(#0000 0 5%, #C02942, #0000 20% 50%);
                animation: l2 1.5s linear infinite;
            }

            @keyframes l2 {
                to {
                    rotate: 1turn
                }
            }
        </style>
    @endpush


    <div class="grid gap-[50px] md:grid-cols-4 grid-cols-1 px-[5%] mb-[50px] mt-[50px]">
        <div class="md:col-1 col-span-3">
            <b>
                Price
            </b>
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <label for="min-price " class="text-[14px]">Min Price</label>
                    <input type="number" id="min-price"
                        class="w-[100%] border border-gray-200 p-2 rounded placeholder-gray-400" placeholder="€20"
                        value="0">
                </div>
                <div>
                    <label for="max-price" class="text-[14px]">Max Price</label>
                    <input type="number" id="max-price"
                        class="w-[100%] border border-gray-200 p-2 rounded placeholder-gray-400" placeholder="€1,390"
                        value="1500">
                </div>
            </div>

            <div class="w-full max-w-md mx-auto text-center mt-5">
                <!-- Slider Track -->
                <div class="relative h-6">
                    <!-- Base track -->
                    <div class="absolute top-1/2 -translate-y-1/2 w-full h-1 bg-gray-300 rounded-full"></div>
                    <!-- Fill Track -->
                    <div id="range-fill" class="absolute top-1/2 -translate-y-1/2 h-1 bg-pink-400 rounded-full"></div>

                    <!-- Range inputs -->
                    <input id="min-range" type="range" min="0" max="1500" value="0" step="10"
                        class="transform translate-y-[10px] range-thumb w-full absolute top-0 left-0 appearance-none bg-transparent pointer-events-none z-10">
                    <input id="max-range" type="range" min="0" max="1500" value="1500" step="10"
                        class="transform translate-y-[10px] range-thumb w-full absolute top-0 left-0 appearance-none bg-transparent pointer-events-none z-10">
                </div>

                <!-- Output Values -->
                <div class="mt-4 text-lg font-semibold text-gray-900">
                    <span id="min-val">€480</span> - <span id="max-val">€940</span>
                </div>
            </div>



        </div>
        <div class="col-span-3">
            <div>
                <form class="flex flex-wrap gap-2 items-center mb-[50px]">
                    <!-- Keyword Input with Search Icon -->
                    <div class="flex items-center border border-gray-300 rounded px-3 py-2  md:w-[40%] w-[100%]">
                        <input type="text" placeholder="Enter Keywords" id="keyword"
                            class="outline-none flex-grow text-sm text-gray-700 placeholder-gray-400" />
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>
                    </div>

                    <!-- Service Category Dropdown -->
                    <select id="position"
                        class="border border-gray-300 rounded px-3 py-[10px] text-sm text-[#99A1AF] md:w-46 w-[48%]">
                        <option selected value="">All Services</option>
                        @foreach ($positions as $position)
                            <option value="{{ $position->id }}" @selected($position->name == request()->get('position'))>{{ $position->name }}</option>
                        @endforeach
                    </select>

                    <!-- Location Dropdown -->
                    <select id="location"
                        class="border border-gray-300 rounded px-3 py-[10px] text-sm text-[#99A1AF] lg:w-46 md:w-[40%] w-[48%]">
                        <option selected value="">All Location</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}" @selected($location->name == request()->get('location'))>{{ $location->name }}</option>
                        @endforeach
                    </select>

                    <!-- Search Button -->
                    <button type="button" onclick="getWorkers()"
                        class="bg-[#FF71A6] text-white px-6 py-2 rounded text-sm hover:bg-pink-600 transition md:w-22 w-[100%] cursor-pointer"
                        style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                        Search
                    </button>
                </form>
            </div>

            <div class="flex justify-center items-center col-span-3 my-20 hidden" id="loader">
                <div class="loader"></div>
            </div>
            <div class="mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6" id="worker-cards"></div>
        </div>
    </div>

    @push('script')
        <script>
            const minRange = document.getElementById('min-range');
            const maxRange = document.getElementById('max-range');
            const rangeFill = document.getElementById('range-fill');
            const minVal = document.getElementById('min-val');
            const maxVal = document.getElementById('max-val');
            const minPrice = document.getElementById('min-price');
            const maxPrice = document.getElementById('max-price');
            const maxValue = 1500;

            function debounce(func, delay) {
                let timeoutId;
                return function(...args) {
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(() => func.apply(this, args), delay);
                };
            }

            const debouncedGetWorkers = debounce(getWorkers, 300);

            function updateRangeFromSlider() {
                let min = parseInt(minRange.value);
                let max = parseInt(maxRange.value);

                if (min >= max) {
                    min = max - 10;
                    min = Math.max(min, 0);
                    minRange.value = min;
                }

                if (max <= min + 10) {
                    max = min + 10;
                    max = Math.min(max, maxValue);
                    maxRange.value = max;
                }

                updateUI(min, max);
                debouncedGetWorkers();
            }

            function updateRangeFromInput() {
                let min = parseInt(minPrice.value);
                let max = parseInt(maxPrice.value);


                if (isNaN(min)) min = 0;
                if (isNaN(max)) max = maxValue;

                if (min >= max) {
                    min = max - 10;
                }

                if (max <= min + 10) {
                    max = min + 10;
                }


                min = Math.max(0, min);
                max = Math.min(maxValue, max);

                minRange.value = min;
                maxRange.value = max;

                updateUI(min, max);
                debouncedGetWorkers();
            }

            function updateUI(min, max) {
                const percentMin = (min / maxValue) * 100;
                const percentMax = (max / maxValue) * 100;

                rangeFill.style.left = `${percentMin}%`;
                rangeFill.style.width = `${percentMax - percentMin}%`;

                minVal.textContent = `€${min}`;
                maxVal.textContent = `€${max}`;

                minPrice.value = min;
                maxPrice.value = max;
            }


            minRange.addEventListener('input', updateRangeFromSlider);
            maxRange.addEventListener('input', updateRangeFromSlider);
            minPrice.addEventListener('input', updateRangeFromInput);
            maxPrice.addEventListener('input', updateRangeFromInput);
            window.addEventListener('DOMContentLoaded', () => {
                updateRangeFromSlider();
            });

            function getWorkers() {
                let keyword = document.getElementById('keyword').value;
                let place = document.getElementById('location').value;
                let position = document.getElementById('position').value;

                $.ajax({
                    type: "GET",
                    url: "{{ url('get-workers') }}",
                    data: {
                        keyword: keyword,
                        location: place,
                        position: position,
                        minPrice: minPrice.value,
                        maxPrice: maxPrice.value,
                    },
                    beforeSend: function() {
                        $('#loader').removeClass('hidden');
                        $('#worker-cards').empty();
                    },
                    success: function(response) {
                        $('#loader').addClass('hidden');

                        if (response.error) {
                            let div = document.createElement('div');
                            div.classList.add('flex', 'justify-center', 'items-center', 'my-10', 'col-span-3');

                            let child = document.createElement('div');
                            let svg = document.createElement('div');
                            svg.innerHTML = `<svg width="200px" height="200px" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                                <defs>
                                                    <style>.cls-1{fill:none;stroke:#000000;stroke-linecap:round;stroke-linejoin:round;}</style>
                                                </defs>
                                                <path class="cls-1" d="M42.58,13.78V6.36H40.72V4.5H25.86V6.36H24V17.5H22.14v1.86H20.28v1.86h-3.7v1.86H14.72v1.84H11V23.08H9.14V21.22H7.28V17.5H5.42V28.64H7.28V30.5H9.14v1.86H11v1.86h1.86v1.86h1.86V43.5h3.7V41.64H16.58V39.78h1.84V37.92h1.86V36.08h1.86v1.84H24V43.5h3.72V41.64H25.86V34.22h1.86V32.36h1.86V28.64h1.84V23.08h1.86v1.84h1.86v-3.7H31.42V17.5h7.44V15.64H33.28V13.78Zm-13-5.56H27.72V6.36h1.86Z"/>
                                            </svg>`;

                            let message = document.createElement('h1');
                            message.textContent = 'Something went wrong';
                            message.classList.add('text-red-500', 'text-center', 'mt-4', 'text-lg',
                                'font-semibold');

                            child.appendChild(svg);
                            child.appendChild(message);
                            div.appendChild(child);

                            $('#worker-cards').html(div);
                            return;
                        }

                        $('#worker-cards').html(response.html);
                    }
                });
            }
        </script>
    @endpush

    @push('head')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endpush
@endsection
