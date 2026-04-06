@extends('website.layouts.app')
@section('title', 'Appointment Details')
@section('content')
    <section class="w-full md:px-[5%] my-5 rounded-xl p-5">
        <div class="sm:flex justify-between mb-5 shadow-xl rounded p-5">
            <h1 class="text-3xl font-semibold">Appointment Details</h1>
            {{-- <select name="" id="" class="border border-slate-300 rounded px-4 py-2" @disabled($appointment->status == 'pending')>
                <option value="pending" @selected($appointment->status == "pending")>pending</option>
                <option value="accepted" @selected($appointment->status == "accepted")>accepted</option>
                <option value="rejected" @selected($appointment->status == "rejected")>rejected</option>
                <option value="confirmed" @selected($appointment->status == "confirmed")>confirmed</option>
                <option value="completed" @selected($appointment->status == "completed")>completed</option>
                <option value="not_showed" @selected($appointment->status == "not_showed")>not_showed</option>
                <option value="cancelled" @selected($appointment->status == "cancelled")>cancelled</option>
            </select> --}}
            <div class="mt-4 sm:mt-0 grid grid-cols-2 gap-4">
                @if ($appointment->status == 'pending')
                    <div class="bg-yellow-500 text-white rounded-xl px-5 py-2 uppercase">
                        {{ $appointment->status }}
                    </div>
                @elseif ($appointment->status == 'accepted')
                    <div class="bg-slate-500 text-white rounded-xl px-5 py-2 uppercase">
                        {{ $appointment->status }}
                    </div>
                    <button id="openModal"
                        class="cursor-pointer border border-[#e6608e] px-5 py-2 rounded text-[#e6608e] hover:text-white hover:bg-[#e6608e]">
                        Confirmed
                    </button>
                @elseif ($appointment->status == 'rejected')
                    <div class="bg-blue-500 text-white rounded-xl px-5 py-2 uppercase">
                        {{ $appointment->status }}
                    </div>
                @elseif ($appointment->status == 'confirmed')
                    <div class="bg-green-500 text-white rounded-xl px-5 py-2 uppercase">
                        {{ $appointment->status }}
                    </div>
                    <form action="{{ route('appointment.not-showed') }}" method="post">
                        @csrf
                        <input type="hidden" value="{{ $appointment->id }}" name="appointment_id">
                        <button
                            class="cursor-pointer border border-[#e6608e] px-5 py-2 rounded text-[#e6608e] hover:text-white hover:bg-[#e6608e]">
                            Didn't appear
                        </button>
                    </form>
                    <button id="review-modal-btn"
                        class="cursor-pointer border border-[#e6608e] px-5 py-2 rounded text-[#e6608e] hover:text-white hover:bg-[#e6608e]">
                        Completed
                    </button>
                @elseif ($appointment->status == 'completed')
                    <div class="bg-[#e6608e] text-white rounded-xl px-5 py-2 uppercase">
                        {{ $appointment->status }}
                    </div>
                @elseif ($appointment->status == 'not_showed')
                    <div class="bg-red-500 text-white rounded-xl px-5 py-2 uppercase">
                        {{ str_replace('_', ' ', $appointment->status) }}
                    </div>
                @elseif ($appointment->status == 'cancelled')
                    <div class="bg-black text-white rounded-xl px-5 py-2 uppercase">
                        {{ $appointment->status }}
                    </div>
                @endif
            </div>

        </div>
        <div class="grid sm:grid-cols-2 gap-5">
            <div class="rounded shadow-2xl p-5">
                <h1 class="text-2xl font-bold">
                    Worker Details
                </h1>
                <div class="sm:flex my-5">
                    <div class="">
                        <img src="{{ asset($appointment->worker->image) }}" alt=""
                            class="h-50 w-full sm:w-50 sm:rounded-full" srcset="">
                    </div>
                    <div class="p-5">
                        <h1 class="text-2xl font-semibold">
                            {{ $appointment->worker->name }}
                        </h1>
                        <div class="text-sm text-gray-700 mt-4">
                            <p><span class="font-semibold">Nationality:</span>
                                {{ $appointment->worker->location->name ?? '' }}</p>
                            <p><span class="font-semibold">Member Since:</span>
                                {{ date('F Y', strtotime($appointment->worker->created_at)) }}</p>
                            {{-- <p>
                                <span class="font-semibold">Average Response Time:</span>
                                <span class="text-green-600">1 hour</span>
                            </p> --}}
                            @if (count($appointment->worker->appointments) > 0)
                                @php
                                    $last_delivery =
                                        $appointment->worker->appointments->where('status', 'completed')->first()->updated_at ?? '';
                                @endphp
                                @if ($last_delivery)
                                    <p><span class="font-semibold">Last Delivery:</span>
                                        {{ date('F d, Y', strtotime($last_delivery)) }} </p>
                                @endif
                            @endif
                            {{-- <p><span class="font-semibold">Last Delivery:</span> February 14, 2023</p> --}}
                            @php
                                $workerLanguages = json_decode($appointment->worker->languages, true) ?? [];
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
                    </div>
                </div>

            </div>

            <div class="rounded shadow-2xl p-5">

                <h1 class="text-2xl font-bold">
                    Appointment Details
                </h1>
                <div class="text-sm text-gray-700 mt-4">
                    <p>
                        <span class="font-semibold">Amount:</span>
                        {{ $appointment->amount ?? '' }}
                    </p>
                    <p>
                        <span class="font-semibold">Booking date:</span>
                        {{ date('d M, Y', strtotime($appointment->booking_date)) ?? '' }}
                    </p>
                    <p>
                        <span class="font-semibold">Booking time:</span>
                        {{ date('h:i A', strtotime($appointment->booking_time)) ?? '' }}
                    </p>

                </div>
                <p>
                <p class="font-semibold">Address</p>
                {{ $appointment->address ?? '' }}
                </p>
                <p>
                <p class="font-semibold">Details</p>
                {{ $appointment->details ?? '' }}
                </p>
            </div>
        </div>
    </section>

    <div id="review-modal" class="hidden h-[100vh] fixed top-0 bottom-0 right-0 left-0 bg-black/50 bg-opacity-60 z-[210]">
        <div
            class="mt-[50px] max-w-[850px] mx-auto bg-white border border-pink-100 rounded-lg py-7 md:px-[200px] px-[20px] shadow">
            <form action="{{ route('appointment.complete') }}" class="space-y-6" method="POST">
                @csrf
                <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                <!-- Name Fields -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <input type="text" name="first_name" required placeholder="First Name"
                        value="{{ explode(' ', Auth::user()->name)[0] ?? '' }}"
                        class="border border-pink-300 rounded-xl px-4 py-4 text-[12px] placeholder-pink-400 focus:outline-none w-full" />
                    <input type="text" name="last_name" required placeholder="Last Name"
                        value="{{ explode(' ', Auth::user()->name)[1] ?? '' }}"
                        class="border border-pink-300 rounded-xl px-4 py-4 text-[12px] placeholder-pink-400 focus:outline-none w-full" />
                </div>

                <!-- Checkboxes -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <label class="flex items-center space-x-2 text-sm text-gray-700">
                        <span>Had the worker come on time?</span>
                        <input type="checkbox" value="1" name="on_time" class="form-checkbox text-pink-500">
                    </label>

                    {{-- <label class="flex items-center space-x-2 text-sm text-gray-700">
                        <span>Had the worker come?</span>
                        <input type="checkbox" class="form-checkbox text-pink-500">
                    </label> --}}
                </div>
                <input type="hidden" name="rating" id="rating">

                <!-- Rating -->
                <div class="text-sm text-gray-700">
                    <p class="mb-2">Rating</p>
                    <div class="flex space-x-1 text-2xl text-gray-400">
                        <span class="star-btn cursor-pointer" data-star="1">★</span>
                        <span class="star-btn cursor-pointer" data-star="2">★</span>
                        <span class="star-btn cursor-pointer" data-star="3">★</span>
                        <span class="star-btn cursor-pointer" data-star="4">★</span>
                        <span class="star-btn cursor-pointer" data-star="5">★</span>
                    </div>
                </div>

                <!-- Message -->
                <textarea rows="6" placeholder="Message" name="message" required
                    class="w-full border-[2px] border-pink-300 rounded-3xl px-4 py-3 text-sm placeholder-pink-400 focus:outline-none resize-none"></textarea>

                <!-- Submit Button -->
                <div class="flex justify-center pt-4">
                    <button type="submit"
                        class="bg-pink-500 text-white font-semibold px-6 py-3 rounded-md shadow hover:bg-pink-600 transition cursor-pointer">
                        Submit Review
                    </button>
                </div>

            </form>
        </div>
    </div>



    @include('website.components.paymentmodal')

    @push('script')
        <script>
            document.getElementById("review-modal-btn").addEventListener('click', function() {
                document.getElementById('review-modal').classList.remove("hidden");
            });
            document.getElementById('review-modal').addEventListener('click', function(event) {
                if (event.target === this) {
                    document.getElementById('review-modal').classList.add("hidden");
                }
            });

            // Get all the star buttons
            const starBtns = document.querySelectorAll('.star-btn');

            starBtns.forEach(star => {
                star.addEventListener('click', function(e) {
                    e.preventDefault();

                    const stars = parseInt(this.getAttribute('data-star'));

                    starBtns.forEach(btn => {
                        btn.classList.remove('text-yellow-500');
                    });

                    starBtns.forEach(btn => {
                        if (parseInt(btn.getAttribute('data-star')) <= stars) {
                            btn.classList.add('text-yellow-500');
                        }
                    });
                    document.getElementById('rating').value = stars
                });
            });
        </script>
    @endpush
@endsection
