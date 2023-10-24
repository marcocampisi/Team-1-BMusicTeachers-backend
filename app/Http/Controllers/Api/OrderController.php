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

            $sponsorization_teacher = SponsorizationTeacher::where('teacher_id', $request->teacher_id)->first();

            if (isset($sponsorization_teacher->sponsored_until)) {
                $old_sponsored_until = Carbon::parse($sponsorization_teacher->sponsored_until);
            }

            $current_date = Carbon::now();

            if ($sponsorization_teacher && $old_sponsored_until > $current_date) {
                $update_sponsorization_teacher = SponsorizationTeacher::create([
                    'sponsorization_id' => $sponsorization->id,
                    'teacher_id' => $request->teacher_id,
                    'sponsored_start' => $old_sponsored_until,
                    'sponsored_until' => $old_sponsored_until->copy()->addHours($sponsorization->duration)
                ]);

                $update_sponsorization_teacher->save();

            } else {
                $new_sponsorization_teacher = SponsorizationTeacher::create([
                    'sponsorization_id' => $request->sponsorization,
                    'teacher_id' => $request->teacher_id,
                    'sponsored_start' => $current_date,
                    'sponsored_until' => $current_date->copy()->addHours($sponsorization->duration)
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
