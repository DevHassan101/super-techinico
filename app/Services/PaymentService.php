<?php

namespace App\Services;

use Exception;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Exceptions\PaymentException;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentService
{
    private $stripeKey;
    private $paypalProvider;

    public function __construct()
    {
        $this->stripeKey = config('services.stripe.secret');
        $this->paypalProvider = new PayPalClient;
        $this->paypalProvider->setApiCredentials(config('paypal'));
    }

   
    public function createStripeCheckout($data)
    {
        try {
            Stripe::setApiKey($this->stripeKey);

            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'eur', // Force EUR currency here
                            'product_data' => [
                                'name' => $data['product_name'],
                            ],
                            'unit_amount' => $data['amount'] * 100, // Convert to cents
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}&appointment_id=' . ($data['appointment_id'] ?? null),
                'cancel_url' => route('payment.cancel') . '?appointment_id=' . ($data['appointment_id'] ?? null),
                'metadata' => [
                    'appointment_id' => $data['appointment_id'] ?? null,
                    'user_id' => auth()->id(),
                ],
            ]);

            return $session;
        } catch (Exception $e) {
            throw new PaymentException($e->getMessage());
        }
    }

     public function createPayPalOrder($data)
    {
        try {
            $this->paypalProvider->getAccessToken();

            $appointmentId = $data['appointment_id'] ?? null;

            $response = $this->paypalProvider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('payment.paypal.success') . '?appointment_id=' . $appointmentId,
                    "cancel_url" => route('payment.paypal.cancel') . '?appointment_id=' . $appointmentId,
                ],
                "purchase_units" => [
                    [
                        "reference_id" => "appointment-" . $appointmentId,
                        "amount" => [
                            "currency_code" => "EUR",
                            "value" => $data['amount']
                        ],
                        "description" => $data['product_name']
                    ]
                ]
            ]);
            return $response;
        } catch (Exception $e) {
            throw new PaymentException($e->getMessage());
        }
    }

    public function processApplePay($paymentMethodId, $amount)
    {
        try {
            Stripe::setApiKey($this->stripeKey);
            
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $amount * 100,
                'currency' => 'eur',
                'payment_method' => $paymentMethodId,
                'confirmation_method' => 'manual',
                'confirm' => true,
            ]);
            
            return $paymentIntent;
        } catch (Exception $e) {
            throw new PaymentException($e->getMessage());
        }
    }

    public function processGooglePay($paymentMethodId, $amount)
    {
        // Similar to Apple Pay processing
        return $this->processApplePay($paymentMethodId, $amount);
    }
}