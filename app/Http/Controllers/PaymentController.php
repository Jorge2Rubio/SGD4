<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller{

    public function pay(Request $request){
        $amount = $request->input('amount') * 100; // Convert to cents
    
        if ($amount < 200000) {
            return back()->with('error', 'Minimum donation amount is PHP 2000.00');
        }
    
        $data = [
            'data' => [
               'attributes' => [
                    'line_items' => [
                        [
                            'currency'    => 'PHP',
                            'amount'      => $amount,
                            'description' => 'Donation', 
                            'name'        => 'Donation',
                            'quantity'    => 1, 
                        ] 
                    ],
                    'payment_method_types' => [
                        'card',
                        'gcash',
                    ],
                    'success_url' => url('/success'),
                    'cancel_url' => url('/cancel'),
                    'description' => 'Donation Payment'
                ],
            ]
        ];
    
        $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions')
            ->withHeader('Content-Type: application/json')
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic '.base64_encode(env('AUTH_PAY').':'))
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
    
    
    

    public function success(){
        $sessionId = Session::get('session_id');
        dd($sessionId);
    }

    public function listUser(){
        $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions/cs_UPtdFRb1eoaiQVx7MHc3NyUo')
        ->withHeader('Content-Type: application/json')
        ->withHeader('accept: application/json')
        ->withHeader('Authorization: Basic '.base64_encode(env('AUTH_PAY').':'))
        ->asJson()
        ->get();

        dd($response);
    }
}
