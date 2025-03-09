<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    // Show payment page
    public function index()
    {
        return view('payment.index');
    }

    // Handle payment request
    public function pay(Request $request, PayPalClient $provider)
    {
        // Prepare payment details
        $paymentData = [
            'intent' => 'sale',
            'payer' => [
                'payment_method' => 'paypal',
            ],
            'transactions' => [
                [
                    'amount' => [
                        'total' => $request->amount,
                        'currency' => 'USD',
                    ],
                    'description' => 'Freelancer Payment',
                ],
            ],
            'redirect_urls' => [
                'return_url' => route('payment.success'),
                'cancel_url' => route('payment.cancel'),
            ],
        ];

        // Create payment
        $payment = $provider->createPayment($paymentData);

        // If the payment creation is successful
        if ($payment['state'] == 'created') {
            // Find the approval link to redirect to PayPal
            $approvalLink = collect($payment['links'])->where('rel', 'approval_url')->first();
            return redirect($approvalLink['href']);
        }

        return redirect()->route('payment.index')->with('error', 'Payment creation failed');
    }

    // Handle successful payment
    public function success(Request $request, PayPalClient $provider)
    {
        // Get the payment ID and payer ID
        $paymentId = $request->paymentId;
        $payerId = $request->PayerID;

        // Execute the payment
        $payment = $provider->executePayment($paymentId, $payerId);

        // If payment is successful
        if ($payment['state'] == 'approved') {
            return redirect()->route('payment.index')->with('success', 'Payment successful!');
        }

        return redirect()->route('payment.index')->with('error', 'Payment failed');
    }

    // Handle payment cancellation
    public function cancel()
    {
        return redirect()->route('payment.index')->with('error', 'Payment was cancelled');
    }
}
