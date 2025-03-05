<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller{
    
    public function pay(Request $request){
        $data = [
            'data' => [
               'attributes' => [
                    'line_items' => [
                            [
                                    'currency'    => 'PHP',
                                    'amount'      => 1000000, //the amount shold not be less than 2000
                                    'description' => 'Donation', 
                                    'name'        => 'Donation',
                                    'quantity'    => 1, 
                            ] 
                        ],
                        'payment_method_types' => [
                            'card',
                            'gcash',
                        ],
                        'success_url' => 'http://localhost:8000',
                        'cancel_url' => 'http://localhost:8000',
                        'description' => 'text'
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
                // Handle error or response without data property
                dd('Error: Data property not found', $response);
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
