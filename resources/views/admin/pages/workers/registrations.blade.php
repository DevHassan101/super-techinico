@extends('admin.layouts.app')
@section('page-title', 'Registrations')
@section('title', 'Registrations')
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
                    Showing {{ $workers->total() }} Registration Request
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

        <!-- Registration Requests List -->
        <div class="workers-list">
            @forelse ($workers as $worker)
                <!-- Request 1 -->
                <div class="worker-item searchable-item">
                    <div class="worker-info flex flex-row">
                        <img src="{{ asset($worker->image) }}" alt="Worker" class="worker-avatar" />
                        <div>
                            <h3 class="worker-name">{{ $worker->name }}</h3>
                            <span class="worker-position">{{ $worker->position->name ?? '' }}</span>
                        </div>
                    </div>

                    <div class="worker-detail">
                        <div class="detail-icon price-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 28"
                                fill="none">
                                <path
                                    d="M12 7.84083C8.59854 7.84083 5.65344 10.2033 4.91556 13.5238L2.49909 24.3979C2.48137 24.4776 2.47242 24.5591 2.47242 24.6408C2.47242 25.2594 2.97386 25.7608 3.59242 25.7608H20.4076C20.4893 25.7608 20.5708 25.7519 20.6505 25.7342C21.2544 25.6 21.6351 25.0017 21.5009 24.3979L19.0844 13.5238C18.3466 10.2033 15.4015 7.84083 12 7.84083ZM12 5.60083C16.4514 5.60083 20.3055 8.69249 21.2711 13.0378L23.6876 23.9119C24.0901 25.7234 22.948 27.5183 21.1365 27.9208C20.8972 27.974 20.6527 28.0008 20.4076 28.0008H3.59242C1.73675 28.0008 0.232422 26.4965 0.232422 24.6408C0.232422 24.3957 0.259252 24.1513 0.312433 23.9119L2.7289 13.0378C3.69453 8.69249 7.54865 5.60083 12 5.60083Z"
                                    fill="white" />
                                <path
                                    d="M14.2401 12.3208C14.8586 12.3208 15.3601 12.8223 15.3601 13.4408C15.3601 14.0594 14.8586 14.5608 14.2401 14.5608H11.4401C11.1308 14.5608 10.8801 14.8115 10.8801 15.1208C10.8801 15.4301 11.1308 15.6808 11.4401 15.6808H12.5601C14.1065 15.6808 15.3601 16.9344 15.3601 18.4808C15.3601 20.0272 14.1065 21.2808 12.5601 21.2808H9.76009C9.14153 21.2808 8.64009 20.7794 8.64009 20.1608C8.64009 19.5423 9.14153 19.0408 9.76009 19.0408H12.5601C12.8694 19.0408 13.1201 18.7901 13.1201 18.4808C13.1201 18.1715 12.8694 17.9208 12.5601 17.9208H11.4401C9.89369 17.9208 8.64009 16.6672 8.64009 15.1208C8.64009 13.5744 9.89369 12.3208 11.4401 12.3208H14.2401Z"
                                    fill="white" />
                                <path
                                    d="M10.8801 11.2008C10.8801 10.5823 11.3816 10.0808 12.0001 10.0808C12.6187 10.0808 13.1201 10.5823 13.1201 11.2008V13.4408C13.1201 14.0594 12.6187 14.5609 12.0001 14.5609C11.3816 14.5609 10.8801 14.0594 10.8801 13.4408V11.2008Z"
                                    fill="white" />
                                <path
                                    d="M13.1201 22.4009C13.1201 23.0194 12.6187 23.5209 12.0001 23.5209C11.3816 23.5209 10.8801 23.0194 10.8801 22.4009V20.1609C10.8801 19.5423 11.3816 19.0409 12.0001 19.0409C12.6187 19.0409 13.1201 19.5423 13.1201 20.1609V22.4009Z"
                                    fill="white" />
                                <path
                                    d="M10.7999 6.3049C11.0297 6.87921 10.7503 7.53102 10.176 7.76075C9.60168 7.99047 8.94988 7.71113 8.72015 7.13681L6.48015 1.53681C6.11615 0.626805 7.01396 -0.27875 7.92706 0.0774282C8.76575 0.404583 9.39084 0.560854 9.76005 0.560854C9.85196 0.560854 9.92814 0.541212 10.0945 0.470538C10.1386 0.451774 10.1905 0.428866 10.3121 0.375041C10.8914 0.121175 11.349 0.000854115 12 0.000854115C12.6496 0.000854115 13.1144 0.121494 13.6956 0.37291C13.8431 0.437485 13.902 0.463167 13.9541 0.484641C14.0977 0.543771 14.1668 0.560854 14.24 0.560854C14.5877 0.560854 15.2184 0.403177 16.0811 0.0743089C16.9931 -0.27332 17.8824 0.630639 17.5199 1.53681L15.2799 7.13681C15.0502 7.71113 14.3984 7.99047 13.8241 7.76075C13.2498 7.53102 12.9704 6.87921 13.2002 6.3049L14.6095 2.78159C14.4807 2.79441 14.3576 2.80085 14.24 2.80085C13.8313 2.80085 13.4925 2.71705 13.1012 2.55591C13.0239 2.52409 12.9393 2.48716 12.8063 2.4288C12.482 2.28853 12.2983 2.24085 12 2.24085C11.7046 2.24085 11.5312 2.28647 11.2113 2.42667C11.1014 2.47535 11.0317 2.5061 10.9705 2.53211C10.551 2.71038 10.2001 2.80085 9.76005 2.80085C9.64176 2.80085 9.5188 2.79471 9.39098 2.7825L10.7999 6.3049Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class="detail-content">
                            <span class="detail-main">${{ $worker->price }}</span>
                            <span class="detail-sub">Per Hour</span>
                        </div>
                    </div>

                    <div class="worker-detail">
                        <div class="detail-icon location-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M12 0C6.93398 0 2.8125 4.12148 2.8125 9.1875C2.8125 10.8091 3.24094 12.4034 4.05145 13.7979C4.24041 14.123 4.45162 14.4398 4.67934 14.7396L11.6008 24H12.3991L19.3207 14.7397C19.5483 14.4398 19.7595 14.1231 19.9485 13.7979C20.7591 12.4034 21.1875 10.8091 21.1875 9.1875C21.1875 4.12148 17.066 0 12 0ZM12 12.2344C10.32 12.2344 8.95312 10.8675 8.95312 9.1875C8.95312 7.50745 10.32 6.14062 12 6.14062C13.68 6.14062 15.0469 7.50745 15.0469 9.1875C15.0469 10.8675 13.68 12.2344 12 12.2344Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class="detail-content">
                            <span class="detail-main">{{ $worker->location->name ?? '' }}</span>
                            <span class="detail-sub">Location</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="status-tag status-pending">Pending</div>
                        <button class="btn-icon accept-registration" data-id="{{ $worker->id }}" title="Approve">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="18" viewBox="0 0 22 18"
                                fill="none">
                                <path
                                    d="M20.86 2.39192C21.288 3.49592 20.689 4.25192 19.53 4.99792C18.595 5.59792 17.404 6.24992 16.142 7.36292C14.904 8.45392 13.697 9.76892 12.624 11.0629C11.706 12.1738 10.832 13.3204 10.004 14.4999C9.59 15.0909 9.011 15.9729 9.011 15.9729C8.80322 16.2939 8.51707 16.5566 8.17956 16.7363C7.84205 16.916 7.46431 17.0067 7.082 16.9999C6.69991 16.9977 6.32474 16.8977 5.99218 16.7095C5.65962 16.5214 5.38072 16.2513 5.182 15.9249C4.183 14.2479 3.413 13.5849 3.059 13.3479C2.112 12.7099 1 12.6179 1 11.1339C1 9.95492 1.995 8.99992 3.222 8.99992C4.089 9.03192 4.894 9.37292 5.608 9.85292C6.064 10.1589 6.547 10.5649 7.049 11.0979C7.72176 10.1799 8.4214 9.2818 9.147 8.40492C10.304 7.00992 11.67 5.51292 13.135 4.22092C14.575 2.95092 16.24 1.76192 18.005 1.13392C19.155 0.723916 20.433 1.28692 20.86 2.39192Z"
                                    stroke="#FF71A6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
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
        <div class="md:flex justify-between md:items-center mt-10">
            <div class="page-info">
                Showing {{ $workers->count() }} from {{ $workers->total() }} data
            </div>

            <div class="pagination flex items-center gap-2">
                <!-- Previous Button -->
                @if ($workers->onFirstPage())
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
                    <a href="{{ $workers->previousPageUrl() }}" class="pagination-arrow flex items-center gap-1">
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
                    @for ($page = 1; $page <= $workers->lastPage(); $page++)
                        <a href="{{ $workers->url($page) }}"
                            class="pagination-item {{ $workers->currentPage() == $page ? 'active bg-pink-400 text-white' : '' }}">
                            {{ $page }}
                        </a>
                    @endfor
                </div>

                <!-- Next Button -->
                @if ($workers->hasMorePages())
                    <a href="{{ $workers->nextPageUrl() }}" class="pagination-arrow flex items-center gap-1">
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


    <script>
        $('.accept-registration').click(function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            $.ajax({
                type: "PUT",
                url: "{{ route('admin.workers.status') }}",
                data: {
                    id: id
                },
                headers: {
                    'x-csrf-token': "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response);
                    window.location.reload();
                }
            });
        });
    </script>
@endsection
