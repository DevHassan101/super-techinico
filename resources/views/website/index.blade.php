@extends('website.layouts.app')
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
            src: url("{{ asset('/assets/fonts/Platform-MediumItalic.woff2') }}")
        }
        }

        ") format('woff2'),
     url("{{ asset('assets/fonts/Platform-MediumItalic.woff') }}")
        }
        }

        ") format('woff'),
     url("{{ asset('assets/fonts/Platform-MediumItalic.ttf') }}")
        }
        }

        ") format('truetype');
     font-weight: 500;
        font-style: italic;
        }

        /* Platform Bold */
        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-Bold.woff2') }}")
        }
        }

        ") format('woff2'),
     url("{{ asset('assets/fonts/Platform-Bold.woff') }}")
        }
        }

        ") format('woff'),
     url("{{ asset('assets/fonts/Platform-Bold.ttf') }}")
        }
        }

        ") format('truetype');
     font-weight: 700;
        font-style: normal;
        }

        @font-face {
            font-family: 'Platform';
            src: url("{{ asset('assets/fonts/Platform-BoldItalic.woff2') }}")
        }
        }

        ") format('woff2'),
     url("{{ asset('assets/fonts/Platform-BoldItalic.woff') }}")
        }
        }

        ") format('woff'),
     url("{{ asset('assets/fonts/Platform-BoldItalic.ttf') }}")
        }
        }

        ") format('truetype');
     font-weight: 700;
        font-style: italic;
        }


        * {
            font-family: 'Platform', sans-serif;
        }
    </style>

    <style>
        .slider-wrapper {
            overflow: hidden;
            position: relative;
            width: 100%;
        }

        .slider-track {
            display: flex;
            transition: transform 0.4s ease-in-out;
        }

        .feature-box {
            min-width: 100%;
            box-sizing: border-box;
            padding: 1.5rem;
            background-color: #fff;
            border-radius: 10px;
            margin-right: 20px;

        }

        .carousel-controls {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 1.5rem;
        }

        .carousel-arrow {
            cursor: pointer;
            transition: transform 0.2s;
        }

        .carousel-arrow:hover {
            transform: scale(1.2);
        }

        .h-2.w-2.md\:w-3.md\:h-3.rounded-full.cursor-pointer.transition-all.duration-300.bg-pink-500.w-4 {
            width: 20px;
        }






        .slide {
            flex: 0 0 50.3333%;
            box-sizing: border-box;
            transition: all 0.3s ease;
            transform: translateX(-50px);
        }

        .active {
            transform: scale(1);
            opacity: 1;
            border-color: #ec4899 !important;
            transform: translateX(-350px);
        }

        .left,
        .right {
            opacity: 0.5;
            transform: translate()
        }

        .left {
            transform: translateX(-450px);
        }

        .right {
            transform: translateX(-250px);
        }


        .left .border.pt-10.pb-14.px-10.shadow-md.bg-white.h-\[180px\] {
            border: none !important;
            box-shadow: none
        }

        .right .border.pt-10.pb-14.px-10.shadow-md.bg-white.h-\[180px\] {
            border: #FFCADE solid 1px;
            box-shadow: none;
        }

        .active .border.pt-10.pb-14.px-10.shadow-md.bg-white.h-\[180px\] {
            border: #FFCADE solid 1px;
            box-shadow: none;
            border-image: linear-gradient(to right, #FFCADE, #fff) 1;
        }

        div#carouselDots {
            margin-top: 40px;
        }

        #carouselDots div:nth-last-child(1),
        #carouselDots div:nth-last-child(2) {
            display: none;
        }

        .search-section {
            display: flex;
            justify-content: center;
        }

        .how-it-works {
            display: flex;
            justify-content: center;
        }


        @media(max-width:1024px) {
            div#slider-track {
                justify-content: center;
            }

            .left {
                transform: translateX(0px) !important;
            }

            .right {
                transform: translateX(0px) !important;
            }

            .active {
                transform: translateX(0px) !important;
            }

            .slide {
                flex: 0 0 100% !important;
                transform: translate(0px);
            }
        }
    </style>

    <section class="main-banner  flex items-center">
        <div class="w-full md:px-[5%] z-[100]">
            <div class="text-center">
                <h1 class="text-[#000000] font-bold md:text-[34px] text-[24px]">
                    Most <span class="text-[#FF71A6]">Popular</span> workers We Have
                </h1>
                <p class="text-[20px] w-[300px] mx-auto my-3">
                    It is a long established fact that a reader will be distracted
                </p>
            </div>
            <div class="mt-5 relative">
                <!--<div class="relative w-full overflow-hidden" style="max-width: 100%;">-->
                <!--    <div id="carouselTrack" class="flex items-end transition-transform duration-500 h-[340px]">-->
                <!--        @foreach ($workers as $worker)-->
                <!--            <div class="min-w-[50%] md:min-w-1/4 md:p-2 p-[10px]" style="transform: translate(0px, 20px);">-->
                <!--                <div-->
                <!--                    class="worker-card border-2 bg-[url('{{ asset($worker->image) }}')] bg-center bg-cover h-[320px] hover:border-[#EBB608] hover:h-[340px] flex items-end rounded-b transition-all duration-300 ease-in-out">-->
                <!--                    <div class=" w-full">-->
                <!--                        <h6 class="text-white text-center">{{ $worker->name }}</h6>-->
                <!--                        <div class="worker-card-footer">-->
                <!--                            <div class="flex items-center p-1 text-white">-->
                <!--                                <svg width="18" height="17" viewBox="0 0 18 17" fill="none"-->
                <!--                                    xmlns="http://www.w3.org/2000/svg">-->
                <!--                                    <path-->
                <!--                                        d="M8.56088 13.7L4.41088 16.2C4.22754 16.3167 4.03588 16.3667 3.83588 16.35C3.63588 16.3333 3.46088 16.2667 3.31088 16.15C3.16088 16.0333 3.04421 15.8877 2.96088 15.713C2.87754 15.5383 2.86088 15.3423 2.91088 15.125L4.01088 10.4L0.335876 7.225C0.169209 7.075 0.0652091 6.904 0.0238758 6.712C-0.0174575 6.52 -0.00512426 6.33267 0.0608757 6.15C0.126876 5.96733 0.226876 5.81733 0.360876 5.7C0.494876 5.58267 0.678209 5.50767 0.910876 5.475L5.76088 5.05L7.63588 0.6C7.71921 0.4 7.84854 0.25 8.02388 0.15C8.19921 0.0499999 8.37821 0 8.56088 0C8.74354 0 8.92254 0.0499999 9.09788 0.15C9.27321 0.25 9.40254 0.4 9.48588 0.6L11.3609 5.05L16.2109 5.475C16.4442 5.50833 16.6275 5.58333 16.7609 5.7C16.8942 5.81667 16.9942 5.96667 17.0609 6.15C17.1275 6.33333 17.1402 6.521 17.0989 6.713C17.0575 6.905 16.9532 7.07567 16.7859 7.225L13.1109 10.4L14.2109 15.125C14.2609 15.3417 14.2442 15.5377 14.1609 15.713C14.0775 15.8883 13.9609 16.034 13.8109 16.15C13.6609 16.266 13.4859 16.3327 13.2859 16.35C13.0859 16.3673 12.8942 16.3173 12.7109 16.2L8.56088 13.7Z"-->
                <!--                                        fill="#FFC83A" />-->
                <!--                                </svg>-->
                <!--                                <span class="pl-1">-->
                <!--                                    {{ $worker->averageRating() }}-->
                <!--                                </span>-->
                <!--                            </div>-->

                <!--                            <div class="flex items-center p-1 text-white">-->

                <!--                                <svg width="14" height="20" viewBox="0 0 14 20" fill="none"-->
                <!--                                    xmlns="http://www.w3.org/2000/svg">-->
                <!--                                    <path-->
                <!--                                        d="M13.12 7.18842C13.12 6.32695 12.9503 5.47391 12.6207 4.67801C12.291 3.88212 11.8078 3.15895 11.1986 2.5498C10.5895 1.94065 9.8663 1.45744 9.0704 1.12777C8.27451 0.798097 7.42147 0.628418 6.56 0.628418C5.69853 0.628418 4.84549 0.798097 4.0496 1.12777C3.2537 1.45744 2.53053 1.94065 1.92138 2.5498C1.31223 3.15895 0.829021 3.88212 0.49935 4.67801C0.169679 5.47391 -1.28369e-08 6.32695 0 7.18842C0 8.48823 0.383291 9.69715 1.03554 10.7168H1.02805L6.56 19.3713L12.092 10.7168H12.0854C12.761 9.66398 13.1201 8.43934 13.12 7.18842ZM6.56 9.99985C5.81436 9.99985 5.09926 9.70364 4.57202 9.1764C4.04477 8.64915 3.74857 7.93406 3.74857 7.18842C3.74857 6.44278 4.04477 5.72768 4.57202 5.20044C5.09926 4.67319 5.81436 4.37699 6.56 4.37699C7.30564 4.37699 8.02074 4.67319 8.54798 5.20044C9.07523 5.72768 9.37143 6.44278 9.37143 7.18842C9.37143 7.93406 9.07523 8.64915 8.54798 9.1764C8.02074 9.70364 7.30564 9.99985 6.56 9.99985Z"-->
                <!--                                        fill="white" />-->
                <!--                                </svg>-->
                <!--                                <span class="pl-1">-->
                <!--                                    {{ $worker->location->name }}-->
                <!--                                </span>-->

                <!--                            </div>-->
                <!--                        </div>-->

                <!--                    </div>-->
                <!--                </div>-->

                <!--            </div>-->
                <!--        @endforeach-->

                <!--        {{-- <div class="min-w-[50%] md:min-w-1/4 md:p-2 p-[10px]" style="transform: translate(0px, 20px);">-->
                <!--            <div-->
                <!--                class="worker-card border-2 bg-[url('{{ url('assets/images/electrician.png') }}')] bg-center bg-cover h-[320px] hover:border-[#EBB608] hover:h-[340px] flex items-end rounded-b transition-all duration-300 ease-in-out">-->
                <!--                <div class=" w-full">-->
                <!--                    <h6 class="text-white text-center">Alexa</h6>-->
                <!--                    <div class="worker-card-footer">-->
                <!--                        <div class="flex items-center p-1 text-white">-->
                <!--                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none"-->
                <!--                                xmlns="http://www.w3.org/2000/svg">-->
                <!--                                <path-->
                <!--                                    d="M8.56088 13.7L4.41088 16.2C4.22754 16.3167 4.03588 16.3667 3.83588 16.35C3.63588 16.3333 3.46088 16.2667 3.31088 16.15C3.16088 16.0333 3.04421 15.8877 2.96088 15.713C2.87754 15.5383 2.86088 15.3423 2.91088 15.125L4.01088 10.4L0.335876 7.225C0.169209 7.075 0.0652091 6.904 0.0238758 6.712C-0.0174575 6.52 -0.00512426 6.33267 0.0608757 6.15C0.126876 5.96733 0.226876 5.81733 0.360876 5.7C0.494876 5.58267 0.678209 5.50767 0.910876 5.475L5.76088 5.05L7.63588 0.6C7.71921 0.4 7.84854 0.25 8.02388 0.15C8.19921 0.0499999 8.37821 0 8.56088 0C8.74354 0 8.92254 0.0499999 9.09788 0.15C9.27321 0.25 9.40254 0.4 9.48588 0.6L11.3609 5.05L16.2109 5.475C16.4442 5.50833 16.6275 5.58333 16.7609 5.7C16.8942 5.81667 16.9942 5.96667 17.0609 6.15C17.1275 6.33333 17.1402 6.521 17.0989 6.713C17.0575 6.905 16.9532 7.07567 16.7859 7.225L13.1109 10.4L14.2109 15.125C14.2609 15.3417 14.2442 15.5377 14.1609 15.713C14.0775 15.8883 13.9609 16.034 13.8109 16.15C13.6609 16.266 13.4859 16.3327 13.2859 16.35C13.0859 16.3673 12.8942 16.3173 12.7109 16.2L8.56088 13.7Z"-->
                <!--                                    fill="#FFC83A" />-->
                <!--                            </svg>-->
                <!--                            <span class="pl-1">-->
                <!--                                4.9-->
                <!--                            </span>-->
                <!--                        </div>-->

                <!--                        <div class="flex items-center p-1 text-white">-->

                <!--                            <svg width="14" height="20" viewBox="0 0 14 20" fill="none"-->
                <!--                                xmlns="http://www.w3.org/2000/svg">-->
                <!--                                <path-->
                <!--                                    d="M13.12 7.18842C13.12 6.32695 12.9503 5.47391 12.6207 4.67801C12.291 3.88212 11.8078 3.15895 11.1986 2.5498C10.5895 1.94065 9.8663 1.45744 9.0704 1.12777C8.27451 0.798097 7.42147 0.628418 6.56 0.628418C5.69853 0.628418 4.84549 0.798097 4.0496 1.12777C3.2537 1.45744 2.53053 1.94065 1.92138 2.5498C1.31223 3.15895 0.829021 3.88212 0.49935 4.67801C0.169679 5.47391 -1.28369e-08 6.32695 0 7.18842C0 8.48823 0.383291 9.69715 1.03554 10.7168H1.02805L6.56 19.3713L12.092 10.7168H12.0854C12.761 9.66398 13.1201 8.43934 13.12 7.18842ZM6.56 9.99985C5.81436 9.99985 5.09926 9.70364 4.57202 9.1764C4.04477 8.64915 3.74857 7.93406 3.74857 7.18842C3.74857 6.44278 4.04477 5.72768 4.57202 5.20044C5.09926 4.67319 5.81436 4.37699 6.56 4.37699C7.30564 4.37699 8.02074 4.67319 8.54798 5.20044C9.07523 5.72768 9.37143 6.44278 9.37143 7.18842C9.37143 7.93406 9.07523 8.64915 8.54798 9.1764C8.02074 9.70364 7.30564 9.99985 6.56 9.99985Z"-->
                <!--                                    fill="white" />-->
                <!--                            </svg>-->
                <!--                            <span class="pl-1">-->
                <!--                                Valencia-->
                <!--                            </span>-->

                <!--                        </div>-->
                <!--                    </div>-->

                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="min-w-[50%] md:min-w-1/4 md:p-2 p-[10px]" style="transform: translate(0px, 20px);">-->
                <!--            <div-->
                <!--                class="worker-card border-2 bg-[url('{{ url('assets/images/carpenter.png') }}')] bg-center bg-cover h-[320px] hover:border-[#EBB608] hover:h-[340px] flex items-end rounded-b transition-all duration-300 ease-in-out">-->
                <!--                <div class=" w-full">-->
                <!--                    <h6 class="text-white text-center">Alexa</h6>-->
                <!--                    <div class="worker-card-footer">-->
                <!--                        <div class="flex items-center p-1 text-white">-->
                <!--                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none"-->
                <!--                                xmlns="http://www.w3.org/2000/svg">-->
                <!--                                <path-->
                <!--                                    d="M8.56088 13.7L4.41088 16.2C4.22754 16.3167 4.03588 16.3667 3.83588 16.35C3.63588 16.3333 3.46088 16.2667 3.31088 16.15C3.16088 16.0333 3.04421 15.8877 2.96088 15.713C2.87754 15.5383 2.86088 15.3423 2.91088 15.125L4.01088 10.4L0.335876 7.225C0.169209 7.075 0.0652091 6.904 0.0238758 6.712C-0.0174575 6.52 -0.00512426 6.33267 0.0608757 6.15C0.126876 5.96733 0.226876 5.81733 0.360876 5.7C0.494876 5.58267 0.678209 5.50767 0.910876 5.475L5.76088 5.05L7.63588 0.6C7.71921 0.4 7.84854 0.25 8.02388 0.15C8.19921 0.0499999 8.37821 0 8.56088 0C8.74354 0 8.92254 0.0499999 9.09788 0.15C9.27321 0.25 9.40254 0.4 9.48588 0.6L11.3609 5.05L16.2109 5.475C16.4442 5.50833 16.6275 5.58333 16.7609 5.7C16.8942 5.81667 16.9942 5.96667 17.0609 6.15C17.1275 6.33333 17.1402 6.521 17.0989 6.713C17.0575 6.905 16.9532 7.07567 16.7859 7.225L13.1109 10.4L14.2109 15.125C14.2609 15.3417 14.2442 15.5377 14.1609 15.713C14.0775 15.8883 13.9609 16.034 13.8109 16.15C13.6609 16.266 13.4859 16.3327 13.2859 16.35C13.0859 16.3673 12.8942 16.3173 12.7109 16.2L8.56088 13.7Z"-->
                <!--                                    fill="#FFC83A" />-->
                <!--                            </svg>-->
                <!--                            <span class="pl-1">-->
                <!--                                4.9-->
                <!--                            </span>-->
                <!--                        </div>-->

                <!--                        <div class="flex items-center p-1 text-white">-->

                <!--                            <svg width="14" height="20" viewBox="0 0 14 20" fill="none"-->
                <!--                                xmlns="http://www.w3.org/2000/svg">-->
                <!--                                <path-->
                <!--                                    d="M13.12 7.18842C13.12 6.32695 12.9503 5.47391 12.6207 4.67801C12.291 3.88212 11.8078 3.15895 11.1986 2.5498C10.5895 1.94065 9.8663 1.45744 9.0704 1.12777C8.27451 0.798097 7.42147 0.628418 6.56 0.628418C5.69853 0.628418 4.84549 0.798097 4.0496 1.12777C3.2537 1.45744 2.53053 1.94065 1.92138 2.5498C1.31223 3.15895 0.829021 3.88212 0.49935 4.67801C0.169679 5.47391 -1.28369e-08 6.32695 0 7.18842C0 8.48823 0.383291 9.69715 1.03554 10.7168H1.02805L6.56 19.3713L12.092 10.7168H12.0854C12.761 9.66398 13.1201 8.43934 13.12 7.18842ZM6.56 9.99985C5.81436 9.99985 5.09926 9.70364 4.57202 9.1764C4.04477 8.64915 3.74857 7.93406 3.74857 7.18842C3.74857 6.44278 4.04477 5.72768 4.57202 5.20044C5.09926 4.67319 5.81436 4.37699 6.56 4.37699C7.30564 4.37699 8.02074 4.67319 8.54798 5.20044C9.07523 5.72768 9.37143 6.44278 9.37143 7.18842C9.37143 7.93406 9.07523 8.64915 8.54798 9.1764C8.02074 9.70364 7.30564 9.99985 6.56 9.99985Z"-->
                <!--                                    fill="white" />-->
                <!--                            </svg>-->
                <!--                            <span class="pl-1">-->
                <!--                                Valencia-->
                <!--                            </span>-->

                <!--                        </div>-->
                <!--                    </div>-->

                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="min-w-[50%] md:min-w-1/4 md:p-2 p-[10px]" style="transform: translate(0px, 20px);">-->
                <!--            <div-->
                <!--                class="worker-card border-2 bg-[url('{{ url('assets/images/male-carpenter.jpg') }}')] bg-center bg-cover h-[320px] hover:border-[#EBB608] hover:h-[340px] flex items-end rounded-b transition-all duration-300 ease-in-out">-->
                <!--                <div class=" w-full">-->
                <!--                    <h6 class="text-white text-center">Alexa</h6>-->
                <!--                    <div class="worker-card-footer">-->
                <!--                        <div class="flex items-center p-1 text-white">-->
                <!--                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none"-->
                <!--                                xmlns="http://www.w3.org/2000/svg">-->
                <!--                                <path-->
                <!--                                    d="M8.56088 13.7L4.41088 16.2C4.22754 16.3167 4.03588 16.3667 3.83588 16.35C3.63588 16.3333 3.46088 16.2667 3.31088 16.15C3.16088 16.0333 3.04421 15.8877 2.96088 15.713C2.87754 15.5383 2.86088 15.3423 2.91088 15.125L4.01088 10.4L0.335876 7.225C0.169209 7.075 0.0652091 6.904 0.0238758 6.712C-0.0174575 6.52 -0.00512426 6.33267 0.0608757 6.15C0.126876 5.96733 0.226876 5.81733 0.360876 5.7C0.494876 5.58267 0.678209 5.50767 0.910876 5.475L5.76088 5.05L7.63588 0.6C7.71921 0.4 7.84854 0.25 8.02388 0.15C8.19921 0.0499999 8.37821 0 8.56088 0C8.74354 0 8.92254 0.0499999 9.09788 0.15C9.27321 0.25 9.40254 0.4 9.48588 0.6L11.3609 5.05L16.2109 5.475C16.4442 5.50833 16.6275 5.58333 16.7609 5.7C16.8942 5.81667 16.9942 5.96667 17.0609 6.15C17.1275 6.33333 17.1402 6.521 17.0989 6.713C17.0575 6.905 16.9532 7.07567 16.7859 7.225L13.1109 10.4L14.2109 15.125C14.2609 15.3417 14.2442 15.5377 14.1609 15.713C14.0775 15.8883 13.9609 16.034 13.8109 16.15C13.6609 16.266 13.4859 16.3327 13.2859 16.35C13.0859 16.3673 12.8942 16.3173 12.7109 16.2L8.56088 13.7Z"-->
                <!--                                    fill="#FFC83A" />-->
                <!--                            </svg>-->
                <!--                            <span class="pl-1">-->
                <!--                                4.9-->
                <!--                            </span>-->
                <!--                        </div>-->

                <!--                        <div class="flex items-center p-1 text-white">-->

                <!--                            <svg width="14" height="20" viewBox="0 0 14 20" fill="none"-->
                <!--                                xmlns="http://www.w3.org/2000/svg">-->
                <!--                                <path-->
                <!--                                    d="M13.12 7.18842C13.12 6.32695 12.9503 5.47391 12.6207 4.67801C12.291 3.88212 11.8078 3.15895 11.1986 2.5498C10.5895 1.94065 9.8663 1.45744 9.0704 1.12777C8.27451 0.798097 7.42147 0.628418 6.56 0.628418C5.69853 0.628418 4.84549 0.798097 4.0496 1.12777C3.2537 1.45744 2.53053 1.94065 1.92138 2.5498C1.31223 3.15895 0.829021 3.88212 0.49935 4.67801C0.169679 5.47391 -1.28369e-08 6.32695 0 7.18842C0 8.48823 0.383291 9.69715 1.03554 10.7168H1.02805L6.56 19.3713L12.092 10.7168H12.0854C12.761 9.66398 13.1201 8.43934 13.12 7.18842ZM6.56 9.99985C5.81436 9.99985 5.09926 9.70364 4.57202 9.1764C4.04477 8.64915 3.74857 7.93406 3.74857 7.18842C3.74857 6.44278 4.04477 5.72768 4.57202 5.20044C5.09926 4.67319 5.81436 4.37699 6.56 4.37699C7.30564 4.37699 8.02074 4.67319 8.54798 5.20044C9.07523 5.72768 9.37143 6.44278 9.37143 7.18842C9.37143 7.93406 9.07523 8.64915 8.54798 9.1764C8.02074 9.70364 7.30564 9.99985 6.56 9.99985Z"-->
                <!--                                    fill="white" />-->
                <!--                            </svg>-->
                <!--                            <span class="pl-1">-->
                <!--                                Valencia-->
                <!--                            </span>-->

                <!--                        </div>-->
                <!--                    </div>-->

                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="min-w-[50%] md:min-w-1/4 md:p-2 p-[10px]" style="transform: translate(0px, 20px);">-->
                <!--            <div-->
                <!--                class="worker-card border-2 bg-[url('{{ url('assets/images/jenny.jpg') }}')] bg-center bg-cover h-[320px] hover:border-[#EBB608] hover:h-[340px] flex items-end rounded-b transition-all duration-300 ease-in-out">-->
                <!--                <div class=" w-full">-->
                <!--                    <h6 class="text-white text-center">Alexa</h6>-->
                <!--                    <div class="worker-card-footer">-->
                <!--                        <div class="flex items-center p-1 text-white">-->
                <!--                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none"-->
                <!--                                xmlns="http://www.w3.org/2000/svg">-->
                <!--                                <path-->
                <!--                                    d="M8.56088 13.7L4.41088 16.2C4.22754 16.3167 4.03588 16.3667 3.83588 16.35C3.63588 16.3333 3.46088 16.2667 3.31088 16.15C3.16088 16.0333 3.04421 15.8877 2.96088 15.713C2.87754 15.5383 2.86088 15.3423 2.91088 15.125L4.01088 10.4L0.335876 7.225C0.169209 7.075 0.0652091 6.904 0.0238758 6.712C-0.0174575 6.52 -0.00512426 6.33267 0.0608757 6.15C0.126876 5.96733 0.226876 5.81733 0.360876 5.7C0.494876 5.58267 0.678209 5.50767 0.910876 5.475L5.76088 5.05L7.63588 0.6C7.71921 0.4 7.84854 0.25 8.02388 0.15C8.19921 0.0499999 8.37821 0 8.56088 0C8.74354 0 8.92254 0.0499999 9.09788 0.15C9.27321 0.25 9.40254 0.4 9.48588 0.6L11.3609 5.05L16.2109 5.475C16.4442 5.50833 16.6275 5.58333 16.7609 5.7C16.8942 5.81667 16.9942 5.96667 17.0609 6.15C17.1275 6.33333 17.1402 6.521 17.0989 6.713C17.0575 6.905 16.9532 7.07567 16.7859 7.225L13.1109 10.4L14.2109 15.125C14.2609 15.3417 14.2442 15.5377 14.1609 15.713C14.0775 15.8883 13.9609 16.034 13.8109 16.15C13.6609 16.266 13.4859 16.3327 13.2859 16.35C13.0859 16.3673 12.8942 16.3173 12.7109 16.2L8.56088 13.7Z"-->
                <!--                                    fill="#FFC83A" />-->
                <!--                            </svg>-->
                <!--                            <span class="pl-1">-->
                <!--                                4.9-->
                <!--                            </span>-->
                <!--                        </div>-->

                <!--                        <div class="flex items-center p-1 text-white">-->

                <!--                            <svg width="14" height="20" viewBox="0 0 14 20" fill="none"-->
                <!--                                xmlns="http://www.w3.org/2000/svg">-->
                <!--                                <path-->
                <!--                                    d="M13.12 7.18842C13.12 6.32695 12.9503 5.47391 12.6207 4.67801C12.291 3.88212 11.8078 3.15895 11.1986 2.5498C10.5895 1.94065 9.8663 1.45744 9.0704 1.12777C8.27451 0.798097 7.42147 0.628418 6.56 0.628418C5.69853 0.628418 4.84549 0.798097 4.0496 1.12777C3.2537 1.45744 2.53053 1.94065 1.92138 2.5498C1.31223 3.15895 0.829021 3.88212 0.49935 4.67801C0.169679 5.47391 -1.28369e-08 6.32695 0 7.18842C0 8.48823 0.383291 9.69715 1.03554 10.7168H1.02805L6.56 19.3713L12.092 10.7168H12.0854C12.761 9.66398 13.1201 8.43934 13.12 7.18842ZM6.56 9.99985C5.81436 9.99985 5.09926 9.70364 4.57202 9.1764C4.04477 8.64915 3.74857 7.93406 3.74857 7.18842C3.74857 6.44278 4.04477 5.72768 4.57202 5.20044C5.09926 4.67319 5.81436 4.37699 6.56 4.37699C7.30564 4.37699 8.02074 4.67319 8.54798 5.20044C9.07523 5.72768 9.37143 6.44278 9.37143 7.18842C9.37143 7.93406 9.07523 8.64915 8.54798 9.1764C8.02074 9.70364 7.30564 9.99985 6.56 9.99985Z"-->
                <!--                                    fill="white" />-->
                <!--                            </svg>-->
                <!--                            <span class="pl-1">-->
                <!--                                Valencia-->
                <!--                            </span>-->

                <!--                        </div>-->
                <!--                    </div>-->

                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="min-w-[50%] md:min-w-1/4 md:p-2 p-[10px]" style="transform: translate(0px, 20px);">-->
                <!--            <div-->
                <!--                class="worker-card border-2 bg-[url('{{ url('assets/images/jenny.jpg') }}')] bg-center bg-cover h-[320px] hover:border-[#EBB608] hover:h-[340px] flex items-end rounded-b transition-all duration-300 ease-in-out">-->
                <!--                <div class=" w-full">-->
                <!--                    <h6 class="text-white text-center">Alexa</h6>-->
                <!--                    <div class="worker-card-footer">-->
                <!--                        <div class="flex items-center p-1 text-white">-->
                <!--                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none"-->
                <!--                                xmlns="http://www.w3.org/2000/svg">-->
                <!--                                <path-->
                <!--                                    d="M8.56088 13.7L4.41088 16.2C4.22754 16.3167 4.03588 16.3667 3.83588 16.35C3.63588 16.3333 3.46088 16.2667 3.31088 16.15C3.16088 16.0333 3.04421 15.8877 2.96088 15.713C2.87754 15.5383 2.86088 15.3423 2.91088 15.125L4.01088 10.4L0.335876 7.225C0.169209 7.075 0.0652091 6.904 0.0238758 6.712C-0.0174575 6.52 -0.00512426 6.33267 0.0608757 6.15C0.126876 5.96733 0.226876 5.81733 0.360876 5.7C0.494876 5.58267 0.678209 5.50767 0.910876 5.475L5.76088 5.05L7.63588 0.6C7.71921 0.4 7.84854 0.25 8.02388 0.15C8.19921 0.0499999 8.37821 0 8.56088 0C8.74354 0 8.92254 0.0499999 9.09788 0.15C9.27321 0.25 9.40254 0.4 9.48588 0.6L11.3609 5.05L16.2109 5.475C16.4442 5.50833 16.6275 5.58333 16.7609 5.7C16.8942 5.81667 16.9942 5.96667 17.0609 6.15C17.1275 6.33333 17.1402 6.521 17.0989 6.713C17.0575 6.905 16.9532 7.07567 16.7859 7.225L13.1109 10.4L14.2109 15.125C14.2609 15.3417 14.2442 15.5377 14.1609 15.713C14.0775 15.8883 13.9609 16.034 13.8109 16.15C13.6609 16.266 13.4859 16.3327 13.2859 16.35C13.0859 16.3673 12.8942 16.3173 12.7109 16.2L8.56088 13.7Z"-->
                <!--                                    fill="#FFC83A" />-->
                <!--                            </svg>-->
                <!--                            <span class="pl-1">-->
                <!--                                4.9-->
                <!--                            </span>-->
                <!--                        </div>-->

                <!--                        <div class="flex items-center p-1 text-white">-->

                <!--                            <svg width="14" height="20" viewBox="0 0 14 20" fill="none"-->
                <!--                                xmlns="http://www.w3.org/2000/svg">-->
                <!--                                <path-->
                <!--                                    d="M13.12 7.18842C13.12 6.32695 12.9503 5.47391 12.6207 4.67801C12.291 3.88212 11.8078 3.15895 11.1986 2.5498C10.5895 1.94065 9.8663 1.45744 9.0704 1.12777C8.27451 0.798097 7.42147 0.628418 6.56 0.628418C5.69853 0.628418 4.84549 0.798097 4.0496 1.12777C3.2537 1.45744 2.53053 1.94065 1.92138 2.5498C1.31223 3.15895 0.829021 3.88212 0.49935 4.67801C0.169679 5.47391 -1.28369e-08 6.32695 0 7.18842C0 8.48823 0.383291 9.69715 1.03554 10.7168H1.02805L6.56 19.3713L12.092 10.7168H12.0854C12.761 9.66398 13.1201 8.43934 13.12 7.18842ZM6.56 9.99985C5.81436 9.99985 5.09926 9.70364 4.57202 9.1764C4.04477 8.64915 3.74857 7.93406 3.74857 7.18842C3.74857 6.44278 4.04477 5.72768 4.57202 5.20044C5.09926 4.67319 5.81436 4.37699 6.56 4.37699C7.30564 4.37699 8.02074 4.67319 8.54798 5.20044C9.07523 5.72768 9.37143 6.44278 9.37143 7.18842C9.37143 7.93406 9.07523 8.64915 8.54798 9.1764C8.02074 9.70364 7.30564 9.99985 6.56 9.99985Z"-->
                <!--                                    fill="white" />-->
                <!--                            </svg>-->
                <!--                            <span class="pl-1">-->
                <!--                                Valencia-->
                <!--                            </span>-->

                <!--                        </div>-->
                <!--                    </div>-->

                <!--                </div>-->
                <!--            </div>-->
                <!--        </div> --}}-->



                <!--    </div>-->

                    <!-- Buttons -->
                <!--    {{-- <button onclick="prevSlide()"-->
                <!--        class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white px-3 py-2 shadow">-->
                <!--        ‹-->
                <!--    </button>-->
                <!--    <button onclick="nextSlide()"-->
                <!--        class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white px-3 py-2 shadow">-->
                <!--        ›-->
                <!--    </button> --}}-->

                <!--    <div id="carouselDots" class="flex justify-center gap-2 mt-4">-->
                <!--    </div>-->

                <!--</div>-->
                <div class="relative w-full overflow-hidden" style="max-width: 100%;">
                    <div id="carouselTrack" class="flex items-end transition-transform duration-500 h-[340px]">
                        <div class="min-w-[50%] md:min-w-1/4 md:p-2 p-[10px]" style="transform: translate(0px, 20px);">
                            <div
                                class="worker-card border-2 bg-[url('{{ url('assets/images/Carmelo.jpg') }}')] bg-center bg-cover h-[320px] hover:border-[#EBB608] hover:h-[340px] flex items-end rounded-b transition-all duration-300 ease-in-out">
                                <div class=" w-full">
                                    <h6 class="text-white text-center">Carmelo</h6>
                                    <div class="worker-card-footer">
                                        <div class="flex items-center p-1 text-white">
                                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.56088 13.7L4.41088 16.2C4.22754 16.3167 4.03588 16.3667 3.83588 16.35C3.63588 16.3333 3.46088 16.2667 3.31088 16.15C3.16088 16.0333 3.04421 15.8877 2.96088 15.713C2.87754 15.5383 2.86088 15.3423 2.91088 15.125L4.01088 10.4L0.335876 7.225C0.169209 7.075 0.0652091 6.904 0.0238758 6.712C-0.0174575 6.52 -0.00512426 6.33267 0.0608757 6.15C0.126876 5.96733 0.226876 5.81733 0.360876 5.7C0.494876 5.58267 0.678209 5.50767 0.910876 5.475L5.76088 5.05L7.63588 0.6C7.71921 0.4 7.84854 0.25 8.02388 0.15C8.19921 0.0499999 8.37821 0 8.56088 0C8.74354 0 8.92254 0.0499999 9.09788 0.15C9.27321 0.25 9.40254 0.4 9.48588 0.6L11.3609 5.05L16.2109 5.475C16.4442 5.50833 16.6275 5.58333 16.7609 5.7C16.8942 5.81667 16.9942 5.96667 17.0609 6.15C17.1275 6.33333 17.1402 6.521 17.0989 6.713C17.0575 6.905 16.9532 7.07567 16.7859 7.225L13.1109 10.4L14.2109 15.125C14.2609 15.3417 14.2442 15.5377 14.1609 15.713C14.0775 15.8883 13.9609 16.034 13.8109 16.15C13.6609 16.266 13.4859 16.3327 13.2859 16.35C13.0859 16.3673 12.8942 16.3173 12.7109 16.2L8.56088 13.7Z"
                                                    fill="#FFC83A" />
                                            </svg>
                                            <span class="pl-1">
                                                4.9
                                            </span>
                                        </div>

                                        <div class="flex items-center p-1 text-white">

                                            <svg width="14" height="20" viewBox="0 0 14 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.12 7.18842C13.12 6.32695 12.9503 5.47391 12.6207 4.67801C12.291 3.88212 11.8078 3.15895 11.1986 2.5498C10.5895 1.94065 9.8663 1.45744 9.0704 1.12777C8.27451 0.798097 7.42147 0.628418 6.56 0.628418C5.69853 0.628418 4.84549 0.798097 4.0496 1.12777C3.2537 1.45744 2.53053 1.94065 1.92138 2.5498C1.31223 3.15895 0.829021 3.88212 0.49935 4.67801C0.169679 5.47391 -1.28369e-08 6.32695 0 7.18842C0 8.48823 0.383291 9.69715 1.03554 10.7168H1.02805L6.56 19.3713L12.092 10.7168H12.0854C12.761 9.66398 13.1201 8.43934 13.12 7.18842ZM6.56 9.99985C5.81436 9.99985 5.09926 9.70364 4.57202 9.1764C4.04477 8.64915 3.74857 7.93406 3.74857 7.18842C3.74857 6.44278 4.04477 5.72768 4.57202 5.20044C5.09926 4.67319 5.81436 4.37699 6.56 4.37699C7.30564 4.37699 8.02074 4.67319 8.54798 5.20044C9.07523 5.72768 9.37143 6.44278 9.37143 7.18842C9.37143 7.93406 9.07523 8.64915 8.54798 9.1764C8.02074 9.70364 7.30564 9.99985 6.56 9.99985Z"
                                                    fill="white" />
                                            </svg>
                                            <span class="pl-1">
                                                 Alicante, Valencia
                                            </span>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="min-w-[50%] md:min-w-1/4 md:p-2 p-[10px]" style="transform: translate(0px, 20px);">
                            <div
                                class="worker-card border-2 bg-[url('{{ url('assets/images/Cristian.jpg') }}')] bg-center bg-cover h-[320px] hover:border-[#EBB608] hover:h-[340px] flex items-end rounded-b transition-all duration-300 ease-in-out">
                                <div class=" w-full">
                                    <h6 class="text-white text-center">Cristian</h6>
                                    <div class="worker-card-footer">
                                        <div class="flex items-center p-1 text-white">
                                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.56088 13.7L4.41088 16.2C4.22754 16.3167 4.03588 16.3667 3.83588 16.35C3.63588 16.3333 3.46088 16.2667 3.31088 16.15C3.16088 16.0333 3.04421 15.8877 2.96088 15.713C2.87754 15.5383 2.86088 15.3423 2.91088 15.125L4.01088 10.4L0.335876 7.225C0.169209 7.075 0.0652091 6.904 0.0238758 6.712C-0.0174575 6.52 -0.00512426 6.33267 0.0608757 6.15C0.126876 5.96733 0.226876 5.81733 0.360876 5.7C0.494876 5.58267 0.678209 5.50767 0.910876 5.475L5.76088 5.05L7.63588 0.6C7.71921 0.4 7.84854 0.25 8.02388 0.15C8.19921 0.0499999 8.37821 0 8.56088 0C8.74354 0 8.92254 0.0499999 9.09788 0.15C9.27321 0.25 9.40254 0.4 9.48588 0.6L11.3609 5.05L16.2109 5.475C16.4442 5.50833 16.6275 5.58333 16.7609 5.7C16.8942 5.81667 16.9942 5.96667 17.0609 6.15C17.1275 6.33333 17.1402 6.521 17.0989 6.713C17.0575 6.905 16.9532 7.07567 16.7859 7.225L13.1109 10.4L14.2109 15.125C14.2609 15.3417 14.2442 15.5377 14.1609 15.713C14.0775 15.8883 13.9609 16.034 13.8109 16.15C13.6609 16.266 13.4859 16.3327 13.2859 16.35C13.0859 16.3673 12.8942 16.3173 12.7109 16.2L8.56088 13.7Z"
                                                    fill="#FFC83A" />
                                            </svg>
                                            <span class="pl-1">
                                                4.9
                                            </span>
                                        </div>

                                        <div class="flex items-center p-1 text-white">

                                            <svg width="14" height="20" viewBox="0 0 14 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.12 7.18842C13.12 6.32695 12.9503 5.47391 12.6207 4.67801C12.291 3.88212 11.8078 3.15895 11.1986 2.5498C10.5895 1.94065 9.8663 1.45744 9.0704 1.12777C8.27451 0.798097 7.42147 0.628418 6.56 0.628418C5.69853 0.628418 4.84549 0.798097 4.0496 1.12777C3.2537 1.45744 2.53053 1.94065 1.92138 2.5498C1.31223 3.15895 0.829021 3.88212 0.49935 4.67801C0.169679 5.47391 -1.28369e-08 6.32695 0 7.18842C0 8.48823 0.383291 9.69715 1.03554 10.7168H1.02805L6.56 19.3713L12.092 10.7168H12.0854C12.761 9.66398 13.1201 8.43934 13.12 7.18842ZM6.56 9.99985C5.81436 9.99985 5.09926 9.70364 4.57202 9.1764C4.04477 8.64915 3.74857 7.93406 3.74857 7.18842C3.74857 6.44278 4.04477 5.72768 4.57202 5.20044C5.09926 4.67319 5.81436 4.37699 6.56 4.37699C7.30564 4.37699 8.02074 4.67319 8.54798 5.20044C9.07523 5.72768 9.37143 6.44278 9.37143 7.18842C9.37143 7.93406 9.07523 8.64915 8.54798 9.1764C8.02074 9.70364 7.30564 9.99985 6.56 9.99985Z"
                                                    fill="white" />
                                            </svg>
                                            <span class="pl-1">
                                                Alicante, Valencia
                                            </span>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="min-w-[50%] md:min-w-1/4 md:p-2 p-[10px]" style="transform: translate(0px, 20px);">
                            <div
                                class="worker-card border-2 bg-[url('{{ url("assets/images/Nicolas.jpg") }}')] bg-center bg-cover h-[320px] hover:border-[#EBB608] hover:h-[340px] flex items-end rounded-b transition-all duration-300 ease-in-out">
                                <div class=" w-full">
                                    <h6 class="text-white text-center">Nicolas</h6>
                                    <div class="worker-card-footer">
                                        <div class="flex items-center p-1 text-white">
                                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.56088 13.7L4.41088 16.2C4.22754 16.3167 4.03588 16.3667 3.83588 16.35C3.63588 16.3333 3.46088 16.2667 3.31088 16.15C3.16088 16.0333 3.04421 15.8877 2.96088 15.713C2.87754 15.5383 2.86088 15.3423 2.91088 15.125L4.01088 10.4L0.335876 7.225C0.169209 7.075 0.0652091 6.904 0.0238758 6.712C-0.0174575 6.52 -0.00512426 6.33267 0.0608757 6.15C0.126876 5.96733 0.226876 5.81733 0.360876 5.7C0.494876 5.58267 0.678209 5.50767 0.910876 5.475L5.76088 5.05L7.63588 0.6C7.71921 0.4 7.84854 0.25 8.02388 0.15C8.19921 0.0499999 8.37821 0 8.56088 0C8.74354 0 8.92254 0.0499999 9.09788 0.15C9.27321 0.25 9.40254 0.4 9.48588 0.6L11.3609 5.05L16.2109 5.475C16.4442 5.50833 16.6275 5.58333 16.7609 5.7C16.8942 5.81667 16.9942 5.96667 17.0609 6.15C17.1275 6.33333 17.1402 6.521 17.0989 6.713C17.0575 6.905 16.9532 7.07567 16.7859 7.225L13.1109 10.4L14.2109 15.125C14.2609 15.3417 14.2442 15.5377 14.1609 15.713C14.0775 15.8883 13.9609 16.034 13.8109 16.15C13.6609 16.266 13.4859 16.3327 13.2859 16.35C13.0859 16.3673 12.8942 16.3173 12.7109 16.2L8.56088 13.7Z"
                                                    fill="#FFC83A" />
                                            </svg>
                                            <span class="pl-1">
                                                4.9
                                            </span>
                                        </div>

                                        <div class="flex items-center p-1 text-white">

                                            <svg width="14" height="20" viewBox="0 0 14 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.12 7.18842C13.12 6.32695 12.9503 5.47391 12.6207 4.67801C12.291 3.88212 11.8078 3.15895 11.1986 2.5498C10.5895 1.94065 9.8663 1.45744 9.0704 1.12777C8.27451 0.798097 7.42147 0.628418 6.56 0.628418C5.69853 0.628418 4.84549 0.798097 4.0496 1.12777C3.2537 1.45744 2.53053 1.94065 1.92138 2.5498C1.31223 3.15895 0.829021 3.88212 0.49935 4.67801C0.169679 5.47391 -1.28369e-08 6.32695 0 7.18842C0 8.48823 0.383291 9.69715 1.03554 10.7168H1.02805L6.56 19.3713L12.092 10.7168H12.0854C12.761 9.66398 13.1201 8.43934 13.12 7.18842ZM6.56 9.99985C5.81436 9.99985 5.09926 9.70364 4.57202 9.1764C4.04477 8.64915 3.74857 7.93406 3.74857 7.18842C3.74857 6.44278 4.04477 5.72768 4.57202 5.20044C5.09926 4.67319 5.81436 4.37699 6.56 4.37699C7.30564 4.37699 8.02074 4.67319 8.54798 5.20044C9.07523 5.72768 9.37143 6.44278 9.37143 7.18842C9.37143 7.93406 9.07523 8.64915 8.54798 9.1764C8.02074 9.70364 7.30564 9.99985 6.56 9.99985Z"
                                                    fill="white" />
                                            </svg>
                                            <span class="pl-1">
                                                Alicante
                                            </span>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="min-w-[50%] md:min-w-1/4 md:p-2 p-[10px]" style="transform: translate(0px, 20px);">
                            <div
                                class="worker-card border-2 bg-[url('{{ url('assets/images/Brenda.jpg') }}')] bg-center bg-cover h-[320px] hover:border-[#EBB608] hover:h-[340px] flex items-end rounded-b transition-all duration-300 ease-in-out">
                                <div class=" w-full">
                                    <h6 class="text-white text-center">Brenda</h6>
                                    <div class="worker-card-footer">
                                        <div class="flex items-center p-1 text-white">
                                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.56088 13.7L4.41088 16.2C4.22754 16.3167 4.03588 16.3667 3.83588 16.35C3.63588 16.3333 3.46088 16.2667 3.31088 16.15C3.16088 16.0333 3.04421 15.8877 2.96088 15.713C2.87754 15.5383 2.86088 15.3423 2.91088 15.125L4.01088 10.4L0.335876 7.225C0.169209 7.075 0.0652091 6.904 0.0238758 6.712C-0.0174575 6.52 -0.00512426 6.33267 0.0608757 6.15C0.126876 5.96733 0.226876 5.81733 0.360876 5.7C0.494876 5.58267 0.678209 5.50767 0.910876 5.475L5.76088 5.05L7.63588 0.6C7.71921 0.4 7.84854 0.25 8.02388 0.15C8.19921 0.0499999 8.37821 0 8.56088 0C8.74354 0 8.92254 0.0499999 9.09788 0.15C9.27321 0.25 9.40254 0.4 9.48588 0.6L11.3609 5.05L16.2109 5.475C16.4442 5.50833 16.6275 5.58333 16.7609 5.7C16.8942 5.81667 16.9942 5.96667 17.0609 6.15C17.1275 6.33333 17.1402 6.521 17.0989 6.713C17.0575 6.905 16.9532 7.07567 16.7859 7.225L13.1109 10.4L14.2109 15.125C14.2609 15.3417 14.2442 15.5377 14.1609 15.713C14.0775 15.8883 13.9609 16.034 13.8109 16.15C13.6609 16.266 13.4859 16.3327 13.2859 16.35C13.0859 16.3673 12.8942 16.3173 12.7109 16.2L8.56088 13.7Z"
                                                    fill="#FFC83A" />
                                            </svg>
                                            <span class="pl-1">
                                                4.9
                                            </span>
                                        </div>

                                        <div class="flex items-center p-1 text-white">

                                            <svg width="14" height="20" viewBox="0 0 14 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.12 7.18842C13.12 6.32695 12.9503 5.47391 12.6207 4.67801C12.291 3.88212 11.8078 3.15895 11.1986 2.5498C10.5895 1.94065 9.8663 1.45744 9.0704 1.12777C8.27451 0.798097 7.42147 0.628418 6.56 0.628418C5.69853 0.628418 4.84549 0.798097 4.0496 1.12777C3.2537 1.45744 2.53053 1.94065 1.92138 2.5498C1.31223 3.15895 0.829021 3.88212 0.49935 4.67801C0.169679 5.47391 -1.28369e-08 6.32695 0 7.18842C0 8.48823 0.383291 9.69715 1.03554 10.7168H1.02805L6.56 19.3713L12.092 10.7168H12.0854C12.761 9.66398 13.1201 8.43934 13.12 7.18842ZM6.56 9.99985C5.81436 9.99985 5.09926 9.70364 4.57202 9.1764C4.04477 8.64915 3.74857 7.93406 3.74857 7.18842C3.74857 6.44278 4.04477 5.72768 4.57202 5.20044C5.09926 4.67319 5.81436 4.37699 6.56 4.37699C7.30564 4.37699 8.02074 4.67319 8.54798 5.20044C9.07523 5.72768 9.37143 6.44278 9.37143 7.18842C9.37143 7.93406 9.07523 8.64915 8.54798 9.1764C8.02074 9.70364 7.30564 9.99985 6.56 9.99985Z"
                                                    fill="white" />
                                            </svg>
                                            <span class="pl-1">
                                                Alicante, valencia, madrid, barcelona
                                            </span>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="carouselDots" class="flex justify-center gap-2 mt-4">
                    </div>

                </div>
            </div>
        </div>
    </section>
    <div class="bg-[#FF71A6] p-[70px] w-[100%] mt-[-200px]">
    </div>
    <!-- Search Section -->
    <!--<section class="search-section !px-[5%] mb-10 mt-[100px]">-->
    <!--    <div class="container">-->
    <!--        <form action="{{url('workers')}}" method="get">-->
    <!--        <div class="search-container">-->
    <!--            <div class="sm:flex gap-[10px] mb-[10px]">-->
    <!--                <div class="mb-[10px] sm:mb-none search-input">-->
    <!--                    <select class="form-control" name="location">-->
    <!--                        <option>Select city</option>-->
    <!--                        @foreach ($locations as $location)-->
    <!--                            <option value="{{ $location->name }}">{{ $location->name }}</option>-->
    <!--                        @endforeach-->
    <!--                    </select>-->
    <!--                    <i class="fas fa-chevron-down"></i>-->
    <!--                </div>-->
    <!--                <div class="search-input">-->
    <!--                    <select class="form-control" name="position">-->
    <!--                        <option>Choose Tecnico</option>-->
    <!--                        @foreach ($positions as $position)-->
    <!--                            <option value="{{ $position->name }}">{{ $position->name }}</option>-->
    <!--                        @endforeach-->
    <!--                    </select>-->
    <!--                    <i class="fas fa-chevron-down"></i>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <textarea class="search-textarea" placeholder="Write what you need" rows="10"></textarea>-->
    <!--            <button class="primary-btn rounded search-button">Send</button>-->
    <!--        </div>-->
    <!--    </form>-->
    <!--    </div>-->
    <!--</section>-->
    <section class="search-section !px-[5%] mb-10 mt-[100px]">
        <div class="container">
            <form id="send-message" method="get">
                <div class="search-container">
                    <span class="text-red-500 mb-5 {{Auth::id() ? '!hidden' : ''}}">
                        <b>Note: </b> <span id="error-msg">Please login first to send message</span>
                    </span>
                    <div class="sm:flex gap-[10px] mb-[10px] mt-3">
                        <div class="mb-[10px] sm:mb-none search-input">
                            <select class="form-control" name="location" required id="city">
                                <option value="">Select city</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                @endforeach
                            </select>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="search-input">
                            <select class="form-control" name="position" required id="position">
                                <option value="">Choose Tecnico</option>
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                                @endforeach
                            </select>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    <textarea class="search-textarea" required placeholder="Write what you need" id="message" rows="10"></textarea>
                    <button id="send-message-btn" class="primary-btn rounded search-button {{Auth::id() ? '' : '!cursor-not-allowed'}}">Send</button>
                </div>
            </form>
        </div>
    </section>

    <!-- How it Works Section -->
    <section class="how-it-works !px-[5%]  mb-10">
        <div class="container">
            <h2 class="pb-5 text-center text-[30px] sm:text-[32px] md:text-[34px] lg:text-[36px] font-bold">How <span
                    class="text-[#ff7bac]">SuperTecnico</span> Works</h2>
            <div>
                {{-- <img src="https://placehold.co/800x450?text=Video+Thumbnail" alt="How it works" class="video-image">
                <div class="play-button">
                    <i class="fas fa-play"></i>
                </div> --}}
                <iframe width="100%" height="415" src="https://www.youtube.com/embed/BHACKCNDMW8"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen class=" shadow-md"></iframe>
            </div>
        </div>
    </section>



    <section class="why-choose-section px-[5%] mb-10 text-center">
        <div class="container max-w-[100%] mx-auto">
            <h2 class="text-[30px] sm:text-[32px] md:text-[34px] lg:text-[36px] font-black mb-6">
                Why <span class="text-[#ff7bac]">choose</span> SuperTecnico24?
            </h2>

            <div class="relative overflow-hidden">




                {{-- <div id="slider-track" class="flex transition-transform duration-500 ease-in-out w-full">
                    <div class="min-w-full px-2">
                        <div class="border border-[#ff7bac] pt-10 pb-14 px-10 sm:px-20 shadow-md bg-white h-[180px]">
                            <p class="text-[16px] leading-relaxed">
                                Speed – Connect simultaneously with all technicians in your city and choose
                                the best and most immediately available one.
                            </p>
                        </div>
                    </div>
                    <div class="min-w-full px-2">
                        <div class="border border-[#ff7bac] pt-10 pb-14 px-10 sm:px-20 shadow-md bg-white h-[180px]">
                            <p class="text-[16px] leading-relaxed">
                                Reliability – All technicians are verified and reviewed, ensuring quality
                                and trusted service every time.
                            </p>
                        </div>
                    </div>
                    <div class="min-w-full px-2">
                        <div class="border border-[#ff7bac] pt-10 pb-14 px-20 shadow-md bg-white h-[180px]">
                            <p class="text-[16px] leading-relaxed">
                                Support – 24/7 support to resolve your issues and concerns quickly and
                                efficiently.
                            </p>
                        </div>
                    </div>
                </div> --}}


                <!-- Slider Container -->


                <!-- Slider Container -->
                <div id="slider-container" class="overflow-hidden w-full mx-auto max-w-[100%]">
                    <div id="slider-track" class="flex gap-[20px] transition-transform duration-500 ease-in-out"
                        style="    transform: translateX(-160px);">
                        <div class="slide px-2">
                            <div class="border pt-10 pb-14 px-10 shadow-md bg-white h-[180px]">
                                <p>Speed – Connect simultaneously with all technicians in your city and choose
                                    the best and most immediately available one.
                                </p>
                            </div>
                        </div>
                        <div class="slide px-2">
                            <div class="border pt-10 pb-14 px-10 shadow-md bg-white h-[180px]">
                                <p>Speed – Connect simultaneously with all technicians in your city and choose
                                    the best and most immediately available one.
                                </p>
                            </div>
                        </div>
                        <div class="slide px-2">
                            <div class="border pt-10 pb-14 px-10 shadow-md bg-white h-[180px]">
                                <p>Speed – Connect simultaneously with all technicians in your city and choose
                                    the best and most immediately available one.</p>
                            </div>
                        </div>
                        <div class="slide px-2">
                            <div class="border pt-10 pb-14 px-10 shadow-md bg-white h-[180px]">
                                <p>Speed – Connect simultaneously with all technicians in your city and choose
                                    the best and most immediately available one.</p>
                            </div>
                        </div>
                        <div class="slide px-2">
                            <div class="border pt-10 pb-14 px-10 shadow-md bg-white h-[180px]">
                                <p>Speed – Connect simultaneously with all technicians in your city and choose
                                    the best and most immediately available one.</p>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

            <div class="flex justify-center gap-6 mt-6">
                <button id="prevBtn" class="text-black hover:text-[#ff7bac] transition cursor-pointer">
                    <svg width="16" height="14" viewBox="0 0 16 14" fill="currentColor" class="hover:stroke-red-500"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7L7 1M1 7L7 13M1 7L15 7" stroke="black" class="hover:stroke-[#ff7bac]" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <button id="nextBtn" class="text-[#ff7bac] hover:text-black transition cursor-pointer">
                    <svg width="16" height="14" viewBox="0 0 16 14" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 7L9 1M15 7L9 13M15 7L1 7" stroke="black" class="hover:stroke-[#ff7bac]"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </section>





    <!-- Become a Technician Section -->
    <section class="text-center !px-[5%] mb-10 flex justify-center">
        <div class="container">
            <h2 class="text-[30px] sm:text-[32px] md:text-[34px] lg:text-[36px] font-bold mb-5">Become a <span
                    class="text-[#ff7bac]">SuperTecnico!</span></h2>
            <p class="mb-4">Connect with thousands of potential customers in your city.</p>
            <p class="mb-4">Earn extra income, Receive daily requests, Get paid by your clients</p>

            <div class="sm:flex align-stretch mt-[30px] border-t pt-[30px]">
                <div class="become-image">
                    <img src="{{ url('assets/images/tutor.webp') }}" alt="Become a Technician" cl>
                </div>
                <div class="become-content">
                    <h3>Become a SuperTecnico</h3>
                    <p>Connect with thousands of potential customers in your city.</p>
                    <div class="pl-10 !my-10">
                        <ul class="list-disc font-bold">
                            <li>Earn extra income</li>
                            <li>Receive daily requests</li>
                            <li>Get paid by your clients</li>
                        </ul>
                    </div>
                    <div class="text-center !mt-20">
                        <a href="{{route('register')}}" class="become-action">Become A SuperTecnico</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @push('head')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endpush
    @push('script')
        <script>
            jQuery('#send-message').submit(function(e) {
                e.preventDefault();
                let userId = "{{ Auth::id() }}";
                if (!userId) {
                    return;
                }
                $.ajax({
                    type: "POST",
                    url: "{{ route('send-message-all') }}",
                    data: {
                        location: $('#city').val(),
                        position: $('#position').val(),
                        message: $('#message').val()
                    },
                    beforeSend: function() {
                        $('#send-message-btn').text("Sending...");
                        $('#send-message-btn').attr("disabled", true);
                        $('#send-message-btn').addClass("!cursor-not-allowed");
                    },
                    headers: {
                        'x-csrf-token': "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.error) {
                            console.error(response.message);
                            return;
                        }
                        $('#city').val(null);
                        $('#position').val(null);
                        $('#message').val(null);
                        $('#send-message-btn').text("Send");
                        $('#send-message-btn').attr("disabled", false);
                        $('#send-message-btn').removeClass("!cursor-not-allowed");
                    }
                });
            });
            let currentIndex = 1;
            const track = document.getElementById('carouselTrack');
            const dotsContainer = document.getElementById('carouselDots');

            const slides = [...track.children];
            const firstClone = slides[0].cloneNode(true);
            const lastClone = slides[slides.length - 1].cloneNode(true);

            firstClone.setAttribute('data-clone', 'first');
            lastClone.setAttribute('data-clone', 'last');

            track.insertBefore(lastClone, track.firstChild);
            track.appendChild(firstClone);

            const totalSlides = track.children.length;

            function updateCarousel(animated = true) {
                const slideWidth = track.children[0].offsetWidth;
                track.style.transition = animated ? 'transform 0.5s ease' : 'none';
                track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
                prevTranslate = -currentIndex * slideWidth;
                updateDots();
            }

            function nextSlide() {
                if (currentIndex >= totalSlides - 1) return;
                currentIndex++;
                updateCarousel();
            }

            function prevSlide() {
                if (currentIndex <= 0) return;
                currentIndex--;
                updateCarousel();
            }

            function createDots() {
                for (let i = 0; i < totalSlides - 2; i++) {
                    const dot = document.createElement("div");
                    dot.className = "h-2 w-2 md:w-3 md:h-3 rounded-full bg-gray-400 cursor-pointer transition-all duration-300";
                    dot.addEventListener("click", () => {
                        currentIndex = i + 1;
                        updateCarousel();
                    });
                    dotsContainer.appendChild(dot);
                }
                updateDots();
            }

            function updateDots() {
                const dots = dotsContainer.children;
                for (let i = 0; i < dots.length; i++) {
                    if (i === currentIndex - 1) {
                        dots[i].classList.remove("bg-gray-400");
                        dots[i].classList.add("bg-pink-500", "w-4");
                    } else {
                        dots[i].classList.remove("bg-pink-500", "w-4");
                        dots[i].classList.add("bg-gray-400", "w-2");
                    }
                }
            }

            track.addEventListener('transitionend', () => {
                if (track.children[currentIndex].getAttribute('data-clone') === 'first') {
                    currentIndex = 1;
                    updateCarousel(false);
                }
                if (track.children[currentIndex].getAttribute('data-clone') === 'last') {
                    currentIndex = totalSlides - 2;
                    updateCarousel(false);
                }
            });

            window.addEventListener('resize', () => updateCarousel(false));
            window.addEventListener('load', () => {
                createDots();
                updateCarousel(false);
            });

            // Swipe / Drag Support
            let isDragging = false;
            let startPos = 0;
            let currentTranslate = 0;
            let prevTranslate = 0;

            track.addEventListener('mousedown', dragStart);
            track.addEventListener('touchstart', dragStart, {
                passive: true
            });

            track.addEventListener('mousemove', dragMove);
            track.addEventListener('touchmove', dragMove, {
                passive: true
            });

            track.addEventListener('mouseup', dragEnd);
            track.addEventListener('mouseleave', dragEnd);
            track.addEventListener('touchend', dragEnd);

            function dragStart(e) {
                isDragging = true;
                startPos = getPositionX(e);
                track.style.transition = "none";
            }

            function dragMove(e) {
                if (!isDragging) return;
                const currentPosition = getPositionX(e);
                const movedBy = currentPosition - startPos;
                currentTranslate = prevTranslate + movedBy;
                track.style.transform = `translateX(${currentTranslate}px)`;
            }

            function dragEnd() {
                if (!isDragging) return;
                isDragging = false;
                const moved = currentTranslate - prevTranslate;
                const slideWidth = track.children[0].offsetWidth;

                if (moved < -50) {
                    nextSlide();
                } else if (moved > 50) {
                    prevSlide();
                } else {
                    updateCarousel();
                }
            }

            function getPositionX(e) {
                return e.type.includes('mouse') ? e.pageX : e.touches[0].clientX;
            }
            setInterval(() => {
                nextSlide()
            }, 3600);
        </script>

        {{-- old slider --}}

        {{-- <script>
            document.addEventListener("DOMContentLoaded", () => {
                const track = document.getElementById("slider-track");
                const slides = track.children;
                const totalSlides = slides.length;
                let currentSlide = 0;

                const updateSlider = () => {
                    const slideWidth = slides[0].offsetWidth;
                    track.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
                };

                document.getElementById("nextBtn").addEventListener("click", () => {
                    if (currentSlide < totalSlides - 1) {
                        currentSlide++;
                        updateSlider();
                    }
                });

                document.getElementById("prevBtn").addEventListener("click", () => {
                    if (currentSlide > 0) {
                        currentSlide--;
                        updateSlider();
                    }
                });

                window.addEventListener("resize", updateSlider); // maintain position on resize
            });
        </script> --}}

        {{-- old slider --}}

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const track = document.getElementById("slider-track");
                const slides = track.querySelectorAll(".slide");
                const totalSlides = slides.length;
                let currentSlide = 1;
                let step = 0; // For accumulating -20px on every movement

                const updateSlider = () => {
                    const slideWidth = slides[0].offsetWidth;
                    const offset = (slideWidth * currentSlide) - slideWidth;
                    track.style.transform = `translateX(-${offset}px)`;

                    slides.forEach((slide, index) => {
                        slide.classList.remove("left", "right", "active");
                        slide.style.transform = "";

                        if (index === currentSlide - 1) {
                            slide.classList.add("left");
                            slide.style.transform = `translateX(-${450 + step}px)`;
                        } else if (index === currentSlide) {
                            slide.classList.add("active");
                            slide.style.transform = `translateX(-${350 + step}px)`;
                        } else if (index === currentSlide + 1) {
                            slide.classList.add("right");
                            slide.style.transform = `translateX(-${250 + step}px)`;
                        }
                    });
                };

                document.getElementById("nextBtn").addEventListener("click", () => {
                    currentSlide++;
                    step += 20;
                    if (currentSlide > totalSlides - 2) {
                        currentSlide = 1;
                        step = 0;
                    }
                    updateSlider();
                });

                document.getElementById("prevBtn").addEventListener("click", () => {
                    currentSlide--;
                    step += 20;
                    if (currentSlide < 1) {
                        currentSlide = totalSlides - 2;
                        step = 0;
                    }
                    updateSlider();
                });

                window.addEventListener("resize", updateSlider);
                updateSlider();
            });
        </script>
    @endpush
@endsection
