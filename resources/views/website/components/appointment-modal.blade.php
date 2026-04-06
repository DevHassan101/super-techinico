<!-- Modal -->
<div id="appointment-modal"
    class="fixed inset-0 bg-[#000000c2] bg-opacity-30 flex items-center justify-center z-[200] {{ session('appointment-failed') ? '' : 'hidden' }}">
    <form action="{{ route('appointment.store') }}" method="post" id="booking-form">
        @csrf
        <div
            class="bg-white rounded-md shadow-lg max-w-[800px] w-full py-6 md:px-[180px] px-[15px] md:mx-[20px] mx-[10px] relative">

            <!-- Close Button -->
            <button id="closeAppointmentModal"
                class="absolute top-2 right-3 text-2xl font-bold text-black hover:text-pink-500">
                &times;
            </button>
            <!-- Section Title -->
            <h2 class="font-semibold mb-3 flex items-center gap-2">
                Booking information
            </h2>
            <input type="hidden" name="worker_id" id="worker_id" value="{{ $worker->id ?? '' }}">
            <div class="border rounded p-4 space-y-2">
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label for="">Booking Date</label>
                        <input type="date" class="border w-full rounded p-2" name="booking_date"
                            min="{{ \Carbon\Carbon::tomorrow()->toDateString() }}" value="{{ old('booking_date') }}"
                            placeholder="Enter booking date" required>
                        @error('booking_date')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="">Booking Time</label>
                        <input type="time" class="border w-full rounded p-2" name="booking_time"
                            value="{{ old('booking_time') }}" required placeholder="Enter booking time">
                        @error('booking_time')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="">Amount</label>
                    <input type="number" class="border w-full rounded p-2" name="amount" value="{{ old('amount') }}"
                        required placeholder="Enter amount">
                    @error('amount')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="">Details</label>
                    <textarea name="details" class="border w-full rounded p-2" id="" rows="3" required
                        placeholder="Write about your task">{{ old('details') }}</textarea>
                    @error('details')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="">Address</label>
                    <textarea name="address" class="border w-full rounded p-2" id="" value="" rows="3" required
                        placeholder="House no, street, state, zipcode">{{ old('address') }}</textarea>
                    @error('address')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mt-6 text-center">
                <button class="bg-pink-500 hover:bg-pink-600 text-white font-medium py-2 px-8 rounded-md shadow">
                    Make appointment request
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    const modal = document.getElementById("appointment-modal");
    const openBtn = document.getElementById("openAppointmentModal");
    const closeBtn = document.getElementById("closeAppointmentModal");

    openBtn.addEventListener("click", () => {
        modal.classList.remove("hidden");
    });

    closeBtn.addEventListener("click", () => {
        modal.classList.add("hidden");
    });
    const form = document.getElementById('booking-form');

    form.addEventListener('submit', function(event) {
        const submitButton = form.querySelector('button[type="submit"]');

        if (form.getAttribute('data-submitted') === 'true') {
            event.preventDefault();
            return;
        }

        form.setAttribute('data-submitted', 'true');
        submitButton.disabled = true;

        setTimeout(() => {
            submitButton.disabled = false;
            form.removeAttribute('data-submitted');
        }, 5000);
    });
</script>
