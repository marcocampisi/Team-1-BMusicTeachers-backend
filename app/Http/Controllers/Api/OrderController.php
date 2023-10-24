<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sponsorization\OrderRequest;
use App\Models\Sponsorization;
use Braintree\Gateway;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();

        $data = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway)
    {
        $sponsorization = Sponsorization::find($request->sponsorization);

        $result = $gateway->transaction()->sale([
            'amount' => $sponsorization->price,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if($result->success) {
            $data = [
                'success' => true,
                'message' => 'Transazione eseguita'
            ];

            return response()->json($data);
        } else {
            $data = [
                'success' => true,
                'message' => 'Transazione fallita'
            ];
            return response()->json($data, 401);
        }

        return 'make payment';
    }
}
