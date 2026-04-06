@forelse ($workers as $worker)
    <!-- CARD -->
    <div class="bg-white rounded-lg shadow p-4 card-section">
        <img src="{{ url($worker->image) }}" alt="Locksmith" class="rounded-lg mb-3 w-full   object-cover">
        <p class="text-sm text-gray-500 mb-1">{{ $worker->location->name ?? '' }}</p>
        <h3 class="text-lg font-semibold">{{ $worker->position->name ?? '' }}</h3>

        <!-- Rating -->
        <div class="flex items-center mt-2">
            @if (count($worker->reviews) > 0)
                <div class="flex items-center border-l border-amber-500 pl-2">
                    <div class="flex">
                        @php
                            $rating = $worker->averageRating();
                            $fullStars = floor($rating);
                            $hasHalfStar = $rating - $fullStars >= 0.5;
                        @endphp

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
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400"
                                            viewBox="0 0 20 20" fill="currentColor">
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
                </div>
                <span class="text-sm text-gray-500 ml-2">{{ number_format($worker->averageRating(), 1) }}/5</span>
            @else
                No reviews
            @endif

        </div>

        <!-- Profile -->
        <div class="flex items-center mt-4">
            <div class="w-8 h-8 rounded-full bg-gray-200 mr-3"></div>
            <a href="{{ route('workersProfile', ['worker' => str_replace(' ', '-', strtolower($worker->name))]) }}"
                class="text-sm text-gray-700">{{ $worker->name }}</a>
        </div>

        <!-- Price -->
        <div class="mt-4">
            <span class="bg-black text-white px-3 py-1 text-sm rounded">€{{ $worker->price }}<span
                    class="text-xs ml-1">/hr</span></span>
        </div>
    </div>
@empty
    <div class="flex justify-center items-center my-5 col-span-3">
        <div>
            <svg width="200px" height="200px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 17C9.85038 16.3697 10.8846 16 12 16C13.1154 16 14.1496 16.3697 15 17" stroke="#FF71A6"
                    stroke-width="1.5" stroke-linecap="round" />
                <ellipse cx="15" cy="10.5" rx="1" ry="1.5" fill="#FF71A6" />
                <ellipse cx="9" cy="10.5" rx="1" ry="1.5" fill="#FF71A6" />
                <path opacity="0.5"
                    d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                    stroke="#FF71A6" stroke-width="1.5" />
            </svg>
            <h1 class="text-red-500 font-semibold text-lg text-center">
                No worker found
            </h1>
        </div>
    </div>
@endforelse
