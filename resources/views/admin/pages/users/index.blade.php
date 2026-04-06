@extends('admin.layouts.app')
@section('page-title', 'Users')
@section('title', 'Users')
@section('content')
    <div class="content-card">
        <!-- Search Bar -->
        <div class="bg-[#fff] rounded-lg p-[10px] pl-[30px] mb-[40px]"
            style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px">
            <div class="search-container w-[100%] max-w-[200px] border-[1px] rounded-[10px]">
                <input type="text" placeholder="search..." class="search-input" id="searchRequests" />
                <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
        </div>

        <!-- Info Header -->
        <div class="info-header md:flex gap-[20px] justify-between">
            <div class="md:mb-[0px] mb-[20px]">
                <div class="info-title font-bold">
                    Showing {{ $users->total() }} Registration Request
                </div>
                <div class="info-subtitle">Based on your preferences</div>
            </div>
            <div>
                {{-- <button class="flex items-center gap-[20px] px-4 py-2 border border-purple-200 rounded-[10px] shadow-sm">
                    <!-- Left Icon -->
                    <img src="{{ asset('admin/assets/images/newet.svg') }}" alt="" />

                    <!-- Text -->
                    <span class="text-gray-700 font-medium">Newest</span>

                    <!-- Right Dropdown Icon -->
                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 10.96l3.71-3.73a.75.75 0 111.08 1.04l-4.25 4.25a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </button> --}}
            </div>
        </div>

        <!-- Users List -->
        <div class="workers-list">
            @forelse ($users as $user)
                <div class="worker-item grid grid-cols-3 searchable-item">
                    <div class="worker-info flex flex-row">
                        <img src="{{ asset($user->image ?? 'admin/assets/images/person.png') }}" alt="Worker"
                            class="worker-avatar" />
                        <div>
                            <h3 class="worker-name">{{ $user->name }}</h3>
                            {{-- <span class="worker-position">{{$user->position}}</span> --}}
                        </div>
                    </div>



                    <div class="worker-detail">
                        <div class="detail-icon location-icon p-[5px] bg-[#fff]"
                            style="box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="26" viewBox="0 0 31 26"
                                fill="none">
                                <g filter="url(#filter0_d_115_2532)">
                                    <path
                                        d="M26.4551 2.35425C26.3573 1.7009 26.0288 1.10419 25.5289 0.672288C25.029 0.240385 24.3909 0.00187684 23.7303 0H6.76381C6.1032 0.00187684 5.46512 0.240385 4.96525 0.672288C4.46537 1.10419 4.13679 1.7009 4.03906 2.35425L15.2471 9.60675L26.4551 2.35425Z"
                                        fill="#FF71A6" />
                                </g>
                                <g filter="url(#filter1_d_115_2532)">
                                    <path
                                        d="M15.6572 11.1295C15.5359 11.208 15.3945 11.2497 15.25 11.2497C15.1055 11.2497 14.9641 11.208 14.8427 11.1295L4 4.11403V15.2328C4.00079 15.9663 4.29255 16.6696 4.81124 17.1883C5.32993 17.707 6.03321 17.9987 6.76675 17.9995H23.7332C24.4668 17.9987 25.1701 17.707 25.6888 17.1883C26.2075 16.6696 26.4992 15.9663 26.5 15.2328V4.11328L15.6572 11.1295Z"
                                        fill="#FF71A6" />
                                </g>
                                <defs>
                                    <filter id="filter0_d_115_2532" x="0.0390625" y="0" width="30.4141" height="17.6074"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dy="4" />
                                        <feGaussianBlur stdDeviation="2" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                            result="effect1_dropShadow_115_2532" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_115_2532"
                                            result="shape" />
                                    </filter>
                                    <filter id="filter1_d_115_2532" x="0" y="4.11328" width="30.5" height="21.8867"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dy="4" />
                                        <feGaussianBlur stdDeviation="2" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                            result="effect1_dropShadow_115_2532" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_115_2532"
                                            result="shape" />
                                    </filter>
                                </defs>
                            </svg>
                        </div>
                        <div class="detail-content">
                            <span class="detail-main">{{ $user->email }}</span>
                            {{-- <span class="detail-sub">Location</span> --}}
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3">
                        <form action="{{ route('admin.users.destroy', ['user' => $user]) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn-icon" title="Approve">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="18"
                                    viewBox="0 0 14 18" fill="none">
                                    <path
                                        d="M11 6V16H3V6H11ZM9.5 0H4.5L3.5 1H0V3H14V1H10.5L9.5 0ZM13 4H1V16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4Z"
                                        fill="#FF71A6" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="flex justify-center items-center">
                    <div>
                        <svg width="200px" height="200px" viewBox="0 0 32 32" enable-background="new 0 0 32 32"
                            id="_x3C_Layer_x3E_" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">

                            <g id="search_x2C__magnifier_x2C__magnifying_x2C__emoji_x2C__happy">

                                <g id="XMLID_1949_">

                                    <g id="XMLID_2132_">

                                        <path d="M12,14.521h2c0,0.55-0.45,1-1,1S12,15.07,12,14.521z" fill="#263238"
                                            id="XMLID_2137_" />

                                        <path
                                            d="M17.5,13c0.27,0,0.5,0.23,0.5,0.5S17.77,14,17.5,14S17,13.77,17,13.5S17.23,13,17.5,13z     "
                                            fill="#263238" id="XMLID_2134_" />

                                        <path
                                            d="M8.5,13C8.77,13,9,13.23,9,13.5S8.77,14,8.5,14S8,13.77,8,13.5S8.23,13,8.5,13z"
                                            fill="#263238" id="XMLID_2133_" />

                                    </g>

                                </g>

                                <g id="XMLID_1838_">

                                    <g id="XMLID_4088_">

                                        <line fill="none" id="XMLID_4094_" stroke="#455A64" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-miterlimit="10" x1="23.43" x2="21.214"
                                            y1="23.401" y2="21.186" />

                                        <path
                                            d="     M29.914,27.086l-3.5-3.5c-0.756-0.756-2.072-0.756-2.828,0C23.208,23.964,23,24.466,23,25s0.208,1.036,0.586,1.414l3.5,3.5     c0.378,0.378,0.88,0.586,1.414,0.586s1.036-0.208,1.414-0.586S30.5,29.034,30.5,28.5S30.292,27.464,29.914,27.086z"
                                            fill="none" id="XMLID_4093_" stroke="#455A64" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-miterlimit="10" />

                                        <circle cx="13" cy="13" fill="none" id="XMLID_4092_" r="11.5"
                                            stroke="#455A64" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-miterlimit="10" />

                                        <path d="     M12,14.521h2c0,0.55-0.45,1-1,1S12,15.07,12,14.521z" fill="none"
                                            id="XMLID_4091_" stroke="#455A64" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-miterlimit="10" />

                                        <path
                                            d="     M17.5,13c0.27,0,0.5,0.23,0.5,0.5S17.77,14,17.5,14S17,13.77,17,13.5S17.23,13,17.5,13z"
                                            fill="none" id="XMLID_4090_" stroke="#455A64" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-miterlimit="10" />

                                        <path
                                            d="     M8.5,13C8.77,13,9,13.23,9,13.5S8.77,14,8.5,14S8,13.77,8,13.5S8.23,13,8.5,13z"
                                            fill="none" id="XMLID_4089_" stroke="#455A64" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-miterlimit="10" />

                                    </g>

                                    <g id="XMLID_3004_">

                                        <line fill="none" id="XMLID_4087_" stroke="#263238" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-miterlimit="10" x1="23.43" x2="21.214"
                                            y1="23.401" y2="21.186" />

                                        <path
                                            d="     M29.914,27.086l-3.5-3.5c-0.756-0.756-2.072-0.756-2.828,0C23.208,23.964,23,24.466,23,25s0.208,1.036,0.586,1.414l3.5,3.5     c0.378,0.378,0.88,0.586,1.414,0.586s1.036-0.208,1.414-0.586S30.5,29.034,30.5,28.5S30.292,27.464,29.914,27.086z"
                                            fill="none" id="XMLID_3009_" stroke="#263238" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-miterlimit="10" />

                                        <circle cx="13" cy="13" fill="none" id="XMLID_3008_" r="11.5"
                                            stroke="#263238" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-miterlimit="10" />

                                        <path d="     M12,14.521h2c0,0.55-0.45,1-1,1S12,15.07,12,14.521z" fill="none"
                                            id="XMLID_3007_" stroke="#263238" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-miterlimit="10" />

                                        <path
                                            d="     M17.5,13c0.27,0,0.5,0.23,0.5,0.5S17.77,14,17.5,14S17,13.77,17,13.5S17.23,13,17.5,13z"
                                            fill="none" id="XMLID_3006_" stroke="#263238" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-miterlimit="10" />

                                        <path
                                            d="     M8.5,13C8.77,13,9,13.23,9,13.5S8.77,14,8.5,14S8,13.77,8,13.5S8.23,13,8.5,13z"
                                            fill="none" id="XMLID_3005_" stroke="#263238" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-miterlimit="10" />

                                    </g>

                                </g>

                            </g>

                        </svg>
                        <h1 class="text-center text-lg text-red-500">
                            No record found
                        </h1>

                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <!-- Pagination -->
        <div class="md:flex justify-between md:items-center mt-10">
            <div class="page-info">Showing {{ $users->count() }} from {{ $users->total() }} users</div>

            <div class="pagination flex items-center gap-2">
                <!-- Previous Button -->
                @if ($users->onFirstPage())
                    <span class="pagination-arrow opacity-50 cursor-not-allowed flex items-center gap-1">
                        <svg width="15" height="15" fill="none" viewBox="0 0 15 15">
                            <path d="M7 13.5L1 7.5L7 1.5" stroke="#FF71A6" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M14 13.5L8 7.5L14 1.5" stroke="#FF71A6" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        Previous
                    </span>
                @else
                    <a href="{{ $users->previousPageUrl() }}" class="pagination-arrow flex items-center gap-1">
                        <svg width="15" height="15" fill="none" viewBox="0 0 15 15">
                            <path d="M7 13.5L1 7.5L7 1.5" stroke="#FF71A6" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M14 13.5L8 7.5L14 1.5" stroke="#FF71A6" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        Previous
                    </a>
                @endif

                <!-- Page Numbers -->
                <div class="flex bg-[#ECDEFF] gap-[10px] rounded-[10px] px-2 py-1">
                    @for ($page = 1; $page <= $users->lastPage(); $page++)
                        <a href="{{ $users->url($page) }}"
                            class="pagination-item {{ $users->currentPage() == $page ? 'active bg-pink-400 text-white' : '' }}">
                            {{ $page }}
                        </a>
                    @endfor
                </div>

                <!-- Next Button -->
                @if ($users->hasMorePages())
                    <a href="{{ $users->nextPageUrl() }}" class="pagination-arrow flex items-center gap-1">
                        Next
                        <svg width="15" height="15" fill="none" viewBox="0 0 15 15">
                            <path d="M8 13.5L14 7.5L8 1.5" stroke="#FF71A6" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M1 13.5L7 7.5L1 1.5" stroke="#FF71A6" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </a>
                @else
                    <span class="pagination-arrow opacity-50 cursor-not-allowed flex items-center gap-1">
                        Next
                        <svg width="15" height="15" fill="none" viewBox="0 0 15 15">
                            <path d="M8 13.5L14 7.5L8 1.5" stroke="#FF71A6" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M1 13.5L7 7.5L1 1.5" stroke="#FF71A6" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                @endif
            </div>
        </div>

    </div>
@endsection
