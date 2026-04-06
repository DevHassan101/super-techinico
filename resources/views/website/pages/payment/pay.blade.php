@extends('website.layouts.app')
@section('title', 'Pay')
@section('content')
<style>
    .apple-pay-button {
    -webkit-appearance: -apple-pay-button;
    -apple-pay-button-type: plain;
    -apple-pay-button-style: black;
    height: 44px;
    width: 100%;
}
</style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Checkout</div>

                    <div class="card-body">
                        <h3>Select a payment method</h3>

                        <div class="payment-methods">
                            <!-- Stripe Credit Card Payment -->
                            <div class="payment-method">
                                <h4>Credit Card</h4>
                                <button id="stripe-button" class="btn btn-primary">Pay with Card</button>
                            </div>

                            <!-- PayPal Payment -->
                            <div class="payment-method">
                                <h4>PayPal</h4>
                                <button id="paypal-button" class="btn btn-primary">Pay with PayPal</button>
                            </div>

                            <!-- Google Pay Button -->
                            <div class="payment-method">
                                <h4>Google Pay</h4>
                                <div id="google-pay-button"></div>
                            </div>

                            <!-- Apple Pay Button -->
                            <div class="payment-method">
                                <h4>Apple Pay</h4>
                                <div id="apple-pay-button"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <!-- Include Stripe.js -->
    <script src="https://js.stripe.com/v3/"></script>
    <!-- Include Google Pay API -->
    <script src="https://pay.google.com/gp/p/js/pay.js"></script>

    <script>
        // Stripe Setup
        const stripe = Stripe('{{ config('services.stripe.key') }}');

        document.getElementById('stripe-button').addEventListener('click', function() {
            fetch('/process-stripe', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
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
            fetch('/process-paypal', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
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

        const googlePayButton = googlePayClient.createButton({
            onClick: onGooglePayButtonClicked,
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
                        'stripe:publishableKey': '{{ config('services.stripe.key') }}'
                    }
                }
            }]
        });

        document.getElementById('google-pay-button').appendChild(googlePayButton);

        function onGooglePayButtonClicked() {
            let stripePublishableKey = '{{ config('services.stripe.key') }}';
            // Create payment data request
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
                            'stripe:publishableKey': stripePublishableKey // Make sure this variable is defined
                        }
                    }
                }],
                merchantInfo: {
                    merchantName: 'Your Store Name',
                    merchantId: 'Your Merchant ID' // Optional for most integrations
                },
                transactionInfo: {
                    totalPriceStatus: 'FINAL',
                    totalPrice: '100.00', // Replace with your actual amount
                    currencyCode: 'USD',
                    countryCode: 'US'
                }
            };

            // Show Google Pay payment sheet
            googlePayClient.loadPaymentData(paymentDataRequest)
                .then(function(paymentData) {
                    // Extract payment token
                    const paymentToken = paymentData.paymentMethodData.tokenizationData.token;

                    // Send the payment token to your server
                    return fetch('/process-google-pay', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                        body: JSON.stringify({
                            paymentToken: paymentToken,
                            amount: 100.00 // Replace with your actual amount
                        })
                    });
                })
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    if (data.success) {
                        // Payment was successful
                        window.location.href = '/payment/success';
                    } else {
                        // Payment failed
                        alert(data.error || 'Payment failed');
                    }
                })
                .catch(function(error) {
                    // Handle errors
                    console.error('Google Pay error:', error);
                    alert(
                        'There was an error processing your payment with Google Pay. Please try another payment method.');
                });
        }

   // Apple Pay Setup
if (window.ApplePaySession && ApplePaySession.canMakePayments()) {
    // Create and style Apple Pay button
    const applePayButton = document.createElement('button');
    applePayButton.className = 'apple-pay-button';
    applePayButton.style.display = 'inline-block';
    applePayButton.style.width = '100%';
    applePayButton.style.height = '44px';
    applePayButton.style.backgroundImage = '-webkit-named-image(apple-pay-logo-white)';
    applePayButton.style.backgroundPosition = '50% 50%';
    applePayButton.style.backgroundSize = '100% 60%';
    applePayButton.style.backgroundRepeat = 'no-repeat';
    applePayButton.style.backgroundColor = 'black';
    applePayButton.style.borderRadius = '5px';
    applePayButton.addEventListener('click', beginApplePaySession);
    
    document.getElementById('apple-pay-button').innerHTML = '';
    document.getElementById('apple-pay-button').appendChild(applePayButton);
} else {
    document.getElementById('apple-pay-button').innerHTML = '<p>Apple Pay is not available on this device/browser</p>';
}

function beginApplePaySession() {
    // Define the payment request
    const paymentRequest = {
        countryCode: 'US',
        currencyCode: 'USD',
        supportedNetworks: ['visa', 'masterCard', 'amex', 'discover'],
        merchantCapabilities: ['supports3DS'],
        total: {
            label: 'Your Store Name',
            amount: '100.00'
        }
    };
    
    // Create an Apple Pay session
    const session = new ApplePaySession(3, paymentRequest);
    
    // Handle merchant validation
    session.onvalidatemerchant = function(event) {
        fetch('/validate-apple-pay-merchant', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                validationURL: event.validationURL
            })
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(merchantSession) {
            session.completeMerchantValidation(merchantSession);
        })
        .catch(function(error) {
            console.error('Apple Pay validation error:', error);
            session.abort();
        });
    };
    
    // Handle payment authorization
    session.onpaymentauthorized = function(event) {
        fetch('/process-apple-pay', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                payment: event.payment,
                amount: '100.00'
            })
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            if (data.success) {
                session.completePayment(ApplePaySession.STATUS_SUCCESS);
                window.location.href = '/payment/success';
            } else {
                session.completePayment(ApplePaySession.STATUS_FAILURE);
                alert(data.error || 'Payment failed');
            }
        })
        .catch(function(error) {
            console.error('Apple Pay processing error:', error);
            session.completePayment(ApplePaySession.STATUS_FAILURE);
        });
    };
    
    // Start the session
    session.begin();
}
    </script>
@endpush
