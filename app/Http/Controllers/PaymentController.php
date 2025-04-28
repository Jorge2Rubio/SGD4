<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Session;
use App\Models\Donation;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'amount' => 'required|numeric|min:2000'
        ]);

        $amount = $validated['amount'] * 100;

        // Save donor info in session
        Session::put('donor_info', [
            'name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'email' => $validated['email'],
        ]);

        $data = [
            'data' => [
                'attributes' => [
                    'line_items' => [
                        [
                            'currency' => 'PHP',
                            'amount' => $amount,
                            'description' => 'Donation',
                            'name' => 'Donation',
                            'quantity' => 1,
                        ]
                    ],
                    'payment_method_types' => ['card', 'gcash'],
                    'success_url' => url('/success'),
                    'cancel_url' => url('/cancel'),
                    'description' => 'Donation Payment',
                    'billing' => [
                        'name' => $validated['first_name'] . ' ' . $validated['last_name'],
                        'email' => $validated['email'],
                    ]
                ],
            ]
        ];

        $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions')
            ->withHeader('Content-Type: application/json')
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic ' . base64_encode(env('AUTH_PAY') . ':'))
            ->withData($data)
            ->asJson()
            ->post();

        if (isset($response->data)) {
            Session::put('session_id', $response->data->id);
            return redirect()->to($response->data->attributes->checkout_url);
        } else {
            return back()->with('error', 'Payment request failed.');
        }
    }

    public function success()
    {
        $sessionId = Session::get('session_id');
        $donorInfo = Session::get('donor_info');

        if (!$sessionId) {
            return redirect('/')->with('error', 'No active session found.');
        }

        $response = Curl::to("https://api.paymongo.com/v1/checkout_sessions/{$sessionId}")
            ->withHeader('Content-Type: application/json')
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic ' . base64_encode(env('AUTH_PAY') . ':'))
            ->asJson()
            ->get();

        if (!isset($response->data)) {
            return redirect('/')->with('error', 'Transaction fetch failed.');
        }

        $attributes = $response->data->attributes;

        $donorName = $attributes->billing->name ?? $donorInfo['name'] ?? 'Anonymous';
        $donorEmail = $attributes->billing->email ?? $donorInfo['email'] ?? null;

        Donation::create([
            'checkout_id' => $sessionId,
            'donor_name' => $donorName,
            'email' => $donorEmail,
            'amount' => $attributes->line_items[0]->amount / 100,
            'status' => $attributes->status ?? 'paid',
        ]);

        return view('success', [
            'donorName' => $donorName,
            'amount' => $attributes->line_items[0]->amount / 100,
            'sessionId' => $sessionId,
        ]);
    }

    public function listUser()
    {
        $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions/cs_UPtdFRb1eoaiQVx7MHc3NyUo')
            ->withHeader('Content-Type: application/json')
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic ' . base64_encode(env('AUTH_PAY') . ':'))
            ->asJson()
            ->get();

        dd($response);
    }
}
