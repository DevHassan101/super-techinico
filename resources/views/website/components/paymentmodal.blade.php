<style>
    .google-pay-button {
        height: 48px;
        /* You can customize this height */
        width: 200px;
        /* You can customize this width */
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
        /* Center the button horizontally */
    }
</style>

<!-- Modal -->
<div id="paymentModal"
    class="fixed inset-0 bg-[#000000c2] bg-opacity-30 flex items-center justify-center z-[200] {{ session('appointment-failed') ? '' : 'hidden' }}">
    <form action="{{ route('appointment.confirmed') }}" method="post" id="payment-form">
        @csrf
        <div
            class="bg-white rounded-md shadow-lg max-w-[800px] w-full py-6 md:px-[180px] px-[15px] md:mx-[20px] mx-[10px] relative">

            <!-- Close Button -->
            <button id="closeModal" type="button"
                class="absolute top-2 right-3 text-2xl font-bold text-black hover:text-pink-500">
                &times;
            </button>

            <!-- Title -->
            <p class="text-sm mb-4">€20 to the platform to confirm the appointment.</p>
            <input type="hidden" value="{{ $appointment->id }}" name="appointment_id">

            <div class="grid sm:grid-cols-2 gap-5">
                <div class="payment-method">
                    {{-- <h4>Credit Card</h4> --}}
                    <button type="button" id="stripe-button"
                        class="cursor-pointer rounded border border-[#A165BD] overflow-hidden bg-[#A165BD] text-white h-15 w-[150px] flex justify-center">
                        <img src="{{ asset('assets/images/stripe.png') }}" alt="" srcset="" class="h-full">
                    </button>
                </div>
                <!-- PayPal Payment -->
                <div class="payment-method">
                    <button type="button" id="paypal-button"
                        class="cursor-pointer rounded border border-[#F3C63D] overflow-hidden bg-[#F3C63D] text-white h-15 w-[150px] flex justify-center">
                        <img src="{{ asset('assets/images/paypal.png') }}" alt="" srcset="" class="h-full">
                    </button>
                </div>

                <!-- Google Pay Button -->
                <div class="payment-method">
                    {{-- <h4>Google Pay</h4> --}}
                    <div id="google-pay-button"></div>
                    {{-- <div id="google-pay-button" class="cursor-pointer rounded border border-black overflow-hidden bg-black text-white h-15 w-[150px] flex justify-center items-center"></div> --}}
                </div>

            </div>


            <!-- Section Title -->
            {{-- <h2 class="font-semibold mb-3 flex items-center gap-2">

                Payment information
            </h2> --}}

            <!-- Payment Form -->
            {{-- <div class="border rounded p-4 space-y-4">
                <h4 class="font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-700" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M2 4h20v2H2zm0 4h20v12H2zm2 2v8h16v-8H4zm6 1h2v2h-2zm0 3h2v2h-2z" />
                    </svg>
                    Card
                    
                </h4>
                <p id="error-message" class="text-sm text-red-500"></p>

                <!-- Row 1 -->
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="w-full md:w-1/2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Card number</label>
                        <input id="card-number" type="text" placeholder=" " maxlength="19" class="border rounded px-3 py-2 w-full text-sm" />
                    </div>
                    <div class="w-full md:w-1/4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Expiration</label>
                        <input type="text" id="expiration" placeholder=" " class="border rounded px-3 py-2 w-full text-sm" />
                    </div>
                    <div class="w-full md:w-1/4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Security code</label>
                        <input type="text" id="security-code" placeholder=" " maxlength="3" class="border rounded px-3 py-2 w-full text-sm" />
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                        <select class="border rounded px-3 py-2 w-full text-sm" id="country">
                            <option value="">Select country</option>
                            <option>Germany</option>
                            <option>Spain</option>
                            <option>France</option>
                        </select>
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Zip code</label>
                        <input type="text" placeholder=" " id="zip-code" class="border rounded px-3 py-2 w-full text-sm" />
                    </div>
                </div>
            </div> --}}


            <!-- Pay Now Button -->
            {{-- <div class="mt-6 text-center">
                <button class="bg-pink-500 hover:bg-pink-600 text-white font-medium py-2 px-8 rounded-md shadow">
                    Confirm appointment
                </button>
            </div> --}}

        </div>
    </form>
</div>

<script>
    const modal = document.getElementById("paymentModal");
    const openBtn = document.getElementById("openModal");
    const closeBtn = document.getElementById("closeModal");

    openBtn.addEventListener("click", () => {
        modal.classList.remove("hidden");
    });

    closeBtn.addEventListener("click", () => {
        modal.classList.add("hidden");
    });

    // document.getElementById('card-number').addEventListener('input', function(e) {
    //     let input = e.target.value.replace(/\D/g, '');
    //     let formattedInput = '';

    //     for (let i = 0; i < input.length; i += 4) {
    //         formattedInput += input.substring(i, i + 4) + ' ';
    //     }

    //     e.target.value = formattedInput.trim();
    // });


    // document.getElementById('expiration').addEventListener('input', function(e) {
    //     let input = e.target.value.replace(/\D/g, '');
    //     if (input.length > 2) {
    //         input = input.substring(0, 2) + '/' + input.substring(2, 4);
    //     }
    //     e.target.value = input;
    // });


    // document.getElementById('payment-form').addEventListener('submit', function(e) {

    //     document.getElementById('error-message').style.display = 'none';

    //     let cardNumber = document.getElementById('card-number').value.replace(/\s/g, '');
    //     let expiration = document.getElementById('expiration').value;
    //     let securityCode = document.getElementById('security-code').value;
    //     let country = document.getElementById('country').value;
    //     let zipCode = document.getElementById('zip-code').value;

    //     if (!/^\d{16}$/.test(cardNumber)) {
    //         e.preventDefault();
    //         showError('Card number should be 16 digits.');
    //         return;
    //     }

    //     if (!/^\d{2}\/\d{2}$/.test(expiration)) {
    //         e.preventDefault();
    //         showError('Expiration date should be in MM/YY format.');
    //         return;
    //     }

    //     if (!/^\d{3}$/.test(securityCode)) {
    //         e.preventDefault();
    //         showError('Security code should be 3 digits.');
    //         return;
    //     }

    //     if (!country) {
    //         e.preventDefault();
    //         showError('Please select a country.');
    //         return;
    //     }

    //     if (!zipCode) {
    //         e.preventDefault();
    //         showError('Please enter a zip code.');
    //         return;
    //     }

    //     // alert('Payment information is valid. Proceeding...');
    // });


    // function showError(message) {
    //     document.getElementById('error-message').textContent = message;
    //     document.getElementById('error-message').style.display = 'block';
    // }
</script>


<!-- Include Stripe.js -->
<script src="https://js.stripe.com/v3/"></script>
<!-- Include Google Pay API -->
<script src="https://pay.google.com/gp/p/js/pay.js"></script>

<script>
    // Stripe Setup
    const stripe = Stripe('{{ config('services.stripe.key') }}');

    // Get appointment info
    const appointmentId = {{ $appointment->id ?? 'null' }};
    const amount = 20;
    const currency = 'EUR';

    // alert(appointmentId)

    let processStripe = "{{ url('process-stripe') }}";
    document.getElementById('stripe-button').addEventListener('click', function() {
        fetch(processStripe, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    appointment_id: appointmentId,
                    amount: amount,
                    currency: currency
                })
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(session) {
                return stripe.redirectToCheckout({
                    sessionId: session.id
                });
            })
            .then(function(result) {
                if (result.error) {
                    alert(result.error.message);
                }
            });
    });


    // PayPal Setup
    document.getElementById('paypal-button').addEventListener('click', function() {
        const appointmentId = {{ $appointment->id ?? 'null' }};
        let processPayPal = "{{ url('process-paypal') }}";
        fetch(processPayPal, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    appointment_id: appointmentId
                })
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                if (data.redirect_url) {
                    window.location.href = data.redirect_url;
                } else if (data.error) {
                    alert(data.error);
                }
            });
    });



    // Google Pay Setup
    const googlePayClient = new google.payments.api.PaymentsClient({
        environment: 'TEST' // Use 'PRODUCTION' for live
    });

    // First check if Google Pay is available
    googlePayClient.isReadyToPay({
        apiVersion: 2,
        apiVersionMinor: 0,
        allowedPaymentMethods: [{
            type: 'CARD',
            parameters: {
                allowedAuthMethods: ['PAN_ONLY', 'CRYPTOGRAM_3DS'],
                allowedCardNetworks: ['AMEX', 'DISCOVER', 'MASTERCARD', 'VISA']
            }
        }]
    }).then(function(response) {
        if (response.result) {
            // Google Pay is available, create button
            const googlePayButton = googlePayClient.createButton({
                onClick: onGooglePayButtonClicked,
                buttonType: 'pay',
                buttonColor: 'black'
            });
            document.getElementById('google-pay-button').innerHTML = '';
            document.getElementById('google-pay-button').appendChild(googlePayButton);
        } else {
            console.log('Google Pay is not available');
            document.getElementById('google-pay-button').innerHTML =
                'Google Pay is not available on this device/browser';
        }
    }).catch(function(err) {
        console.error('Google Pay isReadyToPay error:', err);
    });

    function onGooglePayButtonClicked() {
        const stripePublishableKey = '{{ config('services.stripe.key') }}';
        const appointmentId = '{{ $appointment->id ?? null }}';
        const paymentDataRequest = {
            apiVersion: 2,
            apiVersionMinor: 0,
            allowedPaymentMethods: [{
                type: 'CARD',
                parameters: {
                    allowedAuthMethods: ['PAN_ONLY', 'CRYPTOGRAM_3DS'],
                    allowedCardNetworks: ['AMEX', 'DISCOVER', 'MASTERCARD', 'VISA']
                },
                tokenizationSpecification: {
                    type: 'PAYMENT_GATEWAY',
                    parameters: {
                        gateway: 'stripe',
                        'stripe:version': '2020-08-27',
                        'stripe:publishableKey': stripePublishableKey
                    }
                }
            }],
            merchantInfo: {
                merchantName: 'Supertecinico',
            },
            transactionInfo: {
                totalPriceStatus: 'FINAL',
                totalPrice: '20.00',
                currencyCode: 'EUR',
                countryCode: 'GB'
            }
        };

        // Show Google Pay payment sheet
        googlePayClient.loadPaymentData(paymentDataRequest)
            .then(function(paymentData) {
                console.log('Payment data', paymentData);
                const paymentToken = paymentData.paymentMethodData.tokenizationData.token;
                let processGoogleGay ="{{url('process-google-pay')}}";
                return fetch(processGoogleGay, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        paymentToken: paymentToken,
                        amount: 20.00,
                        currency: 'EUR',
                        appointment_id: appointmentId
                    })
                });
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                if (data.success) {
                    let baseUrl = "{{url('/')}}";
                    window.location.href = baseUrl + '/payment/success?appointment_id=' + appointmentId + '&session_id=' +
                        data.session_id;
                } else {
                    alert(data.error || 'Payment failed');
                }
            })
            .catch(function(error) {
                console.error('Google Pay error:', error);
                alert(
                    'There was an error processing your payment with Google Pay. Please try another payment method.'
                );
            });
    }
</script>
