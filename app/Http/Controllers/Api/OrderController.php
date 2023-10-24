<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sponsorization\OrderRequest;
use App\Models\Sponsorization;
use App\Models\SponsorizationTeacher;
use Braintree\Gateway;
use Carbon\Carbon;
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

        if ($result->success) {

            $sponsorization_teacher = SponsorizationTeacher::findOrFail($request->teacher_id);

            $sponsored_start = Carbon::parse($sponsorization_teacher->sponsored_start);
            $sponsored_until = Carbon::parse($sponsorization_teacher->sponsored_until);

            if ($sponsorization_teacher && $sponsored_until > now()) {
                $update_sponsorization_teacher = SponsorizationTeacher::create([
                    'sponsorization_id' => $sponsorization->id,
                    'teacher_id' => $request->teacher_id,
                    'sponsored_start' => $sponsored_until,
                    'sponsored_until' => $sponsored_start->addHours($sponsorization->duration)
                ]);

                $update_sponsorization_teacher->save();

            } else {
                $new_sponsorization_teacher = SponsorizationTeacher::create([
                    'sponsorization_id' => $sponsorization->id,
                    'teacher_id' => $request->teacher_id,
                    'sponsored_start' => now(),
                    'sponsored_until' => now()->addHours($sponsorization->duration)
                ]);

                $new_sponsorization_teacher->save();

            }

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
