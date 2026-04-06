@extends('website.layouts.app')
@section('title', 'About us')
@section('content')
    <div class="bg-gray-100 text-gray-900">
        <div class="container mx-auto px-6 py-12">
            <!-- Title Section -->
            <div class="text-center mb-12">
                <h1 class="text-5xl font-bold text-[#ff7bac]">About Us</h1>
                <p class="text-lg text-gray-600 mt-4">Connecting local professionals with users in need of services</p>
            </div>

            <!-- Mission Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="flex justify-center items-center">
                    <img src="{{ asset('assets/images/plumber1.png') }}" alt="Our Mission"
                        class="rounded-lg shadow-xl w-full md:w-3/4">
                </div>
                <div class="flex flex-col justify-center">
                    <h2 class="text-3xl font-semibold text-gray-800">Our Mission</h2>
                    <p class="mt-4 text-lg text-gray-600">Our platform connects users with skilled professionals like
                        plumbers, electricians, and locksmiths for a quick, reliable, and easy way to get help. Whether it's
                        a simple repair or an urgent issue, we're here to bring quality services to your doorstep.</p>
                </div>
            </div>

            <!-- Values Section -->
            <div class="mt-12 text-center">
                <h2 class="text-4xl font-semibold text-[#ff7bac]">Our Values</h2>
                <p class="mt-4 text-lg text-gray-600">We are driven by the following values:</p>
                <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                    <div class="flex flex-col items-center rounded-xl shadow-2xl p-10 bg-white">
                        <div class="text-[#ff7bab93] text-5xl mb-4">
                            <svg fill="#ff7bab" width="100px" height="100px" viewBox="0 0 36 36" version="1.1"
                                preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>users-solid</title>
                                <path class="clr-i-solid clr-i-solid-path-1"
                                    d="M12,16.14q-.43,0-.87,0a8.67,8.67,0,0,0-6.43,2.52l-.24.28v8.28H8.54v-4.7l.55-.62.25-.29a11,11,0,0,1,4.71-2.86A6.59,6.59,0,0,1,12,16.14Z">
                                </path>
                                <path class="clr-i-solid clr-i-solid-path-2"
                                    d="M31.34,18.63a8.67,8.67,0,0,0-6.43-2.52,10.47,10.47,0,0,0-1.09.06,6.59,6.59,0,0,1-2,2.45,10.91,10.91,0,0,1,5,3l.25.28.54.62v4.71h3.94V18.91Z">
                                </path>
                                <path class="clr-i-solid clr-i-solid-path-3"
                                    d="M11.1,14.19c.11,0,.2,0,.31,0a6.45,6.45,0,0,1,3.11-6.29,4.09,4.09,0,1,0-3.42,6.33Z">
                                </path>
                                <path class="clr-i-solid clr-i-solid-path-4"
                                    d="M24.43,13.44a6.54,6.54,0,0,1,0,.69,4.09,4.09,0,0,0,.58.05h.19A4.09,4.09,0,1,0,21.47,8,6.53,6.53,0,0,1,24.43,13.44Z">
                                </path>
                                <circle class="clr-i-solid clr-i-solid-path-5" cx="17.87" cy="13.45" r="4.47">
                                </circle>
                                <path class="clr-i-solid clr-i-solid-path-6"
                                    d="M18.11,20.3A9.69,9.69,0,0,0,11,23l-.25.28v6.33a1.57,1.57,0,0,0,1.6,1.54H23.84a1.57,1.57,0,0,0,1.6-1.54V23.3L25.2,23A9.58,9.58,0,0,0,18.11,20.3Z">
                                </path>
                                <rect x="0" y="0" width="36" height="36" fill-opacity="0" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold">Customer First</h3>
                        <p class="text-gray-600">We put our users at the heart of everything we do, ensuring great
                            experiences and satisfaction with every service.</p>
                    </div>
                    <div class="flex flex-col items-center rounded-xl shadow-2xl p-10 bg-white">
                        <div class="text-[#ff7bac] text-5xl mb-4">
                            <svg fill="#ff7bab" height="100px" width="100px" version="1.1" id="Capa_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 330 330" xml:space="preserve">
                                <g>
                                    <path
                                        d="M315,120h-22.688c-1.588-4.487-3.416-8.893-5.477-13.196l16.05-16.05c5.858-5.858,5.858-15.355,0.001-21.213
                                            l-42.426-42.427c-2.813-2.813-6.629-4.394-10.607-4.394c-3.978,0-7.793,1.58-10.606,4.394l-16.051,16.05
                                            c-4.304-2.061-8.708-3.888-13.196-5.476V15c0-8.284-6.716-15-15-15h-60c-8.284,0-15,6.716-15,15v22.688
                                            c-4.488,1.588-8.893,3.416-13.195,5.476l-16.051-16.05c-5.857-5.858-15.355-5.858-21.213,0L27.114,69.541
                                            c-5.858,5.858-5.858,15.355,0,21.213l16.05,16.051c-2.06,4.303-3.887,8.707-5.475,13.195H15c-8.284,0-15,6.716-15,15v60
                                            c0,8.284,6.716,15,15,15h22.689c1.588,4.487,3.416,8.893,5.475,13.195l-16.05,16.051c-2.813,2.813-4.394,6.628-4.394,10.606
                                            c0,3.979,1.58,7.794,4.394,10.607l42.428,42.426c5.858,5.857,15.355,5.857,21.212,0l16.052-16.049
                                            c4.304,2.06,8.707,3.888,13.194,5.476V315c0,8.284,6.716,15,15,15h60c8.284,0,15-6.716,15-15v-22.689
                                            c4.488-1.588,8.893-3.415,13.196-5.476l16.052,16.05c5.857,5.857,15.354,5.858,21.212-0.001l42.426-42.426
                                            c5.858-5.858,5.858-15.355,0-21.213l-16.05-16.05c2.061-4.303,3.889-8.708,5.477-13.196H315c8.284,0,15-6.716,15-15v-60
                                            C330,126.716,323.284,120,315,120z M300,180h-18.781c-6.846,0-12.822,4.634-14.527,11.264c-2.435,9.469-6.213,18.573-11.227,27.058
                                            c-3.482,5.893-2.533,13.397,2.308,18.237l13.294,13.294l-21.213,21.213l-13.295-13.293c-4.839-4.839-12.342-5.789-18.234-2.308
                                            c-8.485,5.012-17.591,8.79-27.063,11.229C184.633,268.399,180,274.375,180,281.22V300h-30v-18.78
                                            c0-6.844-4.633-12.82-11.261-14.526c-9.471-2.438-18.575-6.216-27.062-11.229c-5.894-3.482-13.395-2.532-18.234,2.308
                                            l-13.295,13.293l-21.215-21.214l13.294-13.294c4.841-4.84,5.79-12.343,2.308-18.236c-5.012-8.483-8.789-17.588-11.228-27.061
                                            C61.602,184.633,55.625,180,48.781,180H30v-30h18.781c6.844,0,12.82-4.633,14.526-11.261c2.438-9.474,6.216-18.579,11.228-27.062
                                            c3.482-5.893,2.533-13.396-2.308-18.236L58.934,80.147l21.214-21.213l13.294,13.293c4.84,4.84,12.344,5.79,18.236,2.308
                                            c8.484-5.013,17.59-8.79,27.062-11.229C145.367,61.601,150,55.625,150,48.78V30h30v18.78c0,6.844,4.633,12.82,11.261,14.526
                                            c9.474,2.439,18.579,6.216,27.063,11.229c5.894,3.481,13.396,2.532,18.236-2.308l13.294-13.293l21.213,21.213l-13.294,13.294
                                            c-4.841,4.84-5.79,12.344-2.308,18.237c5.014,8.484,8.791,17.588,11.227,27.058c1.705,6.629,7.682,11.263,14.527,11.263H300V180z" />
                                                                        <path d="M186.394,132.394L152,166.787l-9.394-9.393c-5.857-5.858-15.355-5.858-21.213,0c-5.858,5.858-5.858,15.355,0,21.213l20,20
                                            C144.322,201.536,148.161,203,152,203c3.839,0,7.678-1.464,10.606-4.394l45-45c5.858-5.858,5.858-15.355,0-21.213
                                            C201.749,126.535,192.251,126.535,186.394,132.394z" />
                                </g>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold">Efficiency</h3>
                        <p class="text-gray-600">We aim to make service requests seamless and fast, connecting users to
                            professionals with ease and speed.</p>
                    </div>
                    <div class="flex flex-col items-center rounded-xl shadow-2xl p-10 bg-white">
                        <div class="text-[#ff7babc4] text-5xl mb-4">
                            <svg width="100px" height="100px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                id="secure" class="icon glyph">
                                <path
                                    d="M19.42,3.83,12.24,2h0A.67.67,0,0,0,12,2a.67.67,0,0,0-.2,0h0L4.58,3.83A2,2,0,0,0,3.07,5.92l.42,5.51a12,12,0,0,0,7.24,10.11l.88.38h0a.91.91,0,0,0,.7,0h0l.88-.38a12,12,0,0,0,7.24-10.11l.42-5.51A2,2,0,0,0,19.42,3.83ZM15.71,9.71l-4,4a1,1,0,0,1-1.42,0l-2-2a1,1,0,0,1,1.42-1.42L11,11.59l3.29-3.3a1,1,0,0,1,1.42,1.42Z"
                                    style="fill:#ff7bab"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold">Reliability</h3>
                        <p class="text-gray-600">We ensure that all technicians are qualified and reliable, providing
                            transparent reviews to help users make informed decisions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
