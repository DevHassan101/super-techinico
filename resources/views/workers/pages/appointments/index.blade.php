@extends('workers.layouts.app')
@section('title', 'Appointments')
@section('page-title', 'Appointments')
@section('content')
    <div class="content-wrapper">
        <!-- Search and Filter Section -->
        <!-- <div class="flex justify-between items-center mb-6">
                                                    <div class="search-container">
                                                        <input type="text" placeholder="Search something here..." class="search-input" id="appointmentSearch">
                                                        <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                                    </div>
                                                    <div class="relative">
                                                        <select class="sort-dropdown" id="sortDropdown">
                                                            <option value="newest">Newest</option>
                                                            <option value="oldest">Oldest</option>
                                                            <option value="price-high">Price: High to Low</option>
                                                            <option value="price-low">Price: Low to High</option>
                                                        </select>
                                                    </div>
                                                </div> -->

        <!-- Appointments List Section -->
        <div class="mb-6">
            <div class="info-header md:flex gap-[20px] justify-between">
                <div class="md:mb-[0px] mb-[20px]">
                    <div class="info-title font-bold">
                        All Appointments
                    </div>
                    <div class="info-subtitle">Based your preferences</div>
                </div>
                <div class="search-container md:w-[45%]">
                    <input type="text" placeholder="Search something here..." class="search-input"
                        id="appointmentSearch">
                    <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 28 28" fill="none">
                        <path
                            d="M15.7534 24.4969C8.99037 24.4969 3.50781 19.0144 3.50781 12.2514C3.50781 5.48829 8.99031 0.00585938 15.7534 0.00585938C22.5164 0.00585938 27.9989 5.48835 27.9989 12.2514C27.9989 19.0145 22.5164 24.4969 15.7534 24.4969ZM15.7534 3.50461C10.9226 3.50461 7.00656 7.42067 7.00656 12.2514C7.00656 17.0822 10.9226 20.9982 15.7534 20.9982C20.5841 20.9982 24.5002 17.0822 24.5002 12.2514C24.5002 7.42067 20.5841 3.50461 15.7534 3.50461Z"
                            fill="#BFBFBF" />
                        <path
                            d="M1.75951 27.9948C1.29451 27.9975 0.847591 27.8149 0.517469 27.4874C-0.168521 26.8071 -0.173043 25.6995 0.50734 25.0135C0.510716 25.0101 0.514093 25.0067 0.517469 25.0034L7.09506 18.4258C7.80517 17.7398 8.93693 17.7594 9.62292 18.4695C10.3089 19.1796 10.2893 20.3114 9.57921 20.9973L3.00155 27.4874C2.67143 27.8149 2.22452 27.9975 1.75951 27.9948Z"
                            fill="#BFBFBF" />
                    </svg>
                </div>
                <div>
                    {{-- <button
                        class="flex items-center gap-[20px] px-4 py-2 border border-purple-200 rounded-[10px] shadow-sm">
                        <!-- Left Icon -->
                        <img src="{{ asset('worker/assets/images/newet.svg') }}" alt="">

                        <!-- Text -->
                        <span class="text-gray-700 font-medium">Newest</span>

                        <!-- Right Dropdown Icon -->
                        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 10.96l3.71-3.73a.75.75 0 111.08 1.04l-4.25 4.25a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button> --}}
                </div>
            </div>

            <!-- Appointments List -->
            <div class="workers-list">
                @forelse ($appointments as $appointment)
                    <div class="worker-item searchable-item">
                        <div class="worker-info flex flex-row">
                            {{-- <img src="{{ asset('worker/assets/images/person.png') }}" alt="Worker"
                                class="worker-avatar" /> --}}
                            <div>
                                <h3 class="worker-name">{{ $appointment->user->name ?? '' }}</h3>
                                {{-- <span class="worker-position">Electricians</span> --}}
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
                                <span class="detail-main">${{ $appointment->amount }}</span>
                                <span class="detail-sub">Total amount</span>
                            </div>
                        </div>

                        {{-- <div class="worker-detail">
                            <div class="detail-icon location-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M12 0C6.93398 0 2.8125 4.12148 2.8125 9.1875C2.8125 10.8091 3.24094 12.4034 4.05145 13.7979C4.24041 14.123 4.45162 14.4398 4.67934 14.7396L11.6008 24H12.3991L19.3207 14.7397C19.5483 14.4398 19.7595 14.1231 19.9485 13.7979C20.7591 12.4034 21.1875 10.8091 21.1875 9.1875C21.1875 4.12148 17.066 0 12 0ZM12 12.2344C10.32 12.2344 8.95312 10.8675 8.95312 9.1875C8.95312 7.50745 10.32 6.14062 12 6.14062C13.68 6.14062 15.0469 7.50745 15.0469 9.1875C15.0469 10.8675 13.68 12.2344 12 12.2344Z"
                                        fill="white" />
                                </svg>
                            </div>
                            <div class="detail-content">
                                <span class="detail-main">Valencia</span>
                                <span class="detail-sub">Location</span>
                            </div>
                        </div> --}}

                        <div class="flex items-center gap-3">
                            <div class="status-tag status-pending">
                                {{ date('g:i A', strtotime($appointment->booking_time)) }}</div>
                            <button class="btn-icon" title="Approve">
                                {{ date('jS M', strtotime($appointment->booking_date)) }}
                                {{-- 2nd Mar --}}
                            </button>
                        </div>
                    </div>

                @empty
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        <div class="md:flex justify-between items-center">
            <div class="page-info">
                Showing {{ $appointments->count() }} from {{ $appointments->total() }} data
            </div>

            <div class="pagination">
                @if ($appointments->onFirstPage())
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
                    <a href="{{ $appointments->previousPageUrl() }}" class="pagination-arrow flex items-center gap-1">
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
                    @for ($page = 1; $page <= $appointments->lastPage(); $page++)
                        <a href="{{ $appointments->url($page) }}"
                            class="pagination-item {{ $appointments->currentPage() == $page ? 'active bg-pink-400 text-white' : '' }}">
                            {{ $page }}
                        </a>
                    @endfor
                </div>

                <!-- Next Button -->
                @if ($appointments->hasMorePages())
                    <a href="{{ $appointments->nextPageUrl() }}" class="pagination-arrow flex items-center gap-1">
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
