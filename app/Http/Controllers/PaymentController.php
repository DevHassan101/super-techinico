<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Services\PaymentService;
use App\Exceptions\PaymentException;
use App\Models\Appointment;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    private $paymentService;
    private $paypalProvider;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
        $this->paypalProvider = new \Srmklive\PayPal\Services\PayPal;
        $this->paypalProvider->setApiCredentials(config('paypal'));
    }

    public function checkout()
    {
        return view('payment.checkout');
    }

     public function processStripe(Request $request)
    {
        try {
            // Get appointment ID from request or session
            $appointmentId = $request->appointment_id;
            $appointment =  Appointment::findOrFail($appointmentId);
            $session = $this->paymentService->createStripeCheckout([
                'product_name' => 'Appointment #' . $appointmentId . ' Booking Fee',
                'amount' => 20.00,
                'currency' => 'eur',
                'appointment_id' => $appointmentId,
                'user_id' => auth()->id()
            ]);
            $appointment->update([
                'payment_session_id' => $session->id
            ]);

            return response()->json(['id' => $session->id]);
        } catch (PaymentException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function processPayPal(Request $request)
    {
        try {
            $appointmentId = $request->appointment_id;
            $response = $this->paymentService->createPayPalOrder([
                'product_name' => 'Appointment #' . $appointmentId . ' Booking Fee',
                'amount' => 20.00,
                'currency' => 'eur',
                'appointment_id' => $appointmentId,
                'user_id' => auth()->id()
            ]);

            if (isset($response['id']) && $response['id'] != null) {
                Appointment::find($appointmentId)->update([
                    'payment_session_id' =>  $response['id']
                ]);
    
                foreach ($response['links'] as $link) {
                    if ($link['rel'] === 'approve') {
                        return response()->json(['redirect_url' => $link['href']]);
                    }
                }
            }

            return response()->json(['error' => 'Unable to create PayPal order'], 500);
        } catch (PaymentException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function paypalSuccess(Request $request)
    {
        $token = $request->token;
        $appointmentId = $request->appointment_id;

        try {
            $this->paypalProvider->getAccessToken();
            $response = $this->paypalProvider->capturePaymentOrder($token);

            if (isset($response['status']) && $response['status'] == 'COMPLETED') {
                return redirect()->route('payment.success', ['appointment_id' => $appointmentId, 'session_id' => $token]);
            }

            return redirect()->route('payment.failed')->with('error', 'Payment failed');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('payment.failed')->with('error', $e->getMessage());
        }
    }

    public function processApplePay(Request $request)
    {
        try {
            $paymentIntent = $this->paymentService->processApplePay(
                $request->payment_method_id,
                $request->amount
            );

            return response()->json(['success' => true]);
        } catch (PaymentException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function processGooglePay(Request $request)
    {
        try {
            $appointmentId = $request->appointment_id;
            $amount = $request->amount ?? 20;
            $currency = $request->currency ?? 'EUR';
            $paymentToken = $request->paymentToken;

            $tokenData = json_decode($paymentToken, true);

            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

            $paymentMethod = \Stripe\PaymentMethod::create([
                'type' => 'card',
                'card' => [
                    'token' => $tokenData['id'], // Extract the token ID
                ],
            ]);

            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $amount * 100, // Convert to cents
                'currency' => strtolower($currency),
                'payment_method' => $paymentMethod->id,
                'confirmation_method' => 'manual',
                'confirm' => true,
                'return_url' => route('payment.success', ['appointment_id' => $appointmentId]),
                'metadata' => [
                    'appointment_id' => $appointmentId,
                    'payment_method' => 'google_pay',
                ],
            ]);

            if ($paymentIntent->status === 'succeeded') {
                // Update appointment status
                $appointment = Appointment::findOrFail($appointmentId);
                $appointment->payment_session_id = $tokenData['id'];
                $appointment->save();

                return response()->json(['success' => true, 'session_id' => $tokenData['id']]);
            } else if ($paymentIntent->status === 'requires_action') {
                // 3D Secure authentication required
                return response()->json([
                    'success' => false,
                    'requires_action' => true,
                    'payment_intent_client_secret' => $paymentIntent->client_secret,
                ]);
            } else {
                return response()->json(['success' => false, 'error' => 'Payment failed']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }


    public function success(Request $request)
    {
        $appointmentId = $request->appointment_id;
        $sessionId = $request->session_id;
        Appointment::where('payment_session_id', $sessionId)->findOrFail($appointmentId)->update([
            'status' => 'confirmed'
        ]);
        return view('website.pages.payment.success');
    }
    public function cancel()
    {
        return view('website.pages.payment.cancel');
    }
    public function failed(Request $request)
    {
        $appointmentId = $request->appointment_id;
        $errorMessage = $request->error ?? 'The payment could not be processed at this time.';

        // Log the failed payment
        Log::error('Payment failed for appointment #' . $appointmentId . ': ' . $errorMessage);

        // Update appointment status to 'payment_failed' if necessary
        if ($appointmentId) {
            $appointment = Appointment::find($appointmentId);
            if ($appointment) {
                $appointment->payment_status = 'payment_failed';
                $appointment->save();
            }
        }

        return view('website.pages.payment.failed', [
            'appointment_id' => $appointmentId,
            'error_message' => $errorMessage
        ]);
    }
    public function paypalCancel ()
    {
        return view('website.pages.payment.cancel');
    }
}