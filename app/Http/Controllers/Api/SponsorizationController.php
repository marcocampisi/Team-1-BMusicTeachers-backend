<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SponsorizationResource;
use App\Models\Sponsorization;
use Illuminate\Http\Request;

class SponsorizationController extends Controller
{
    public function index(Request $request)
    {
        $sponsorizations = Sponsorization::all();

        return SponsorizationResource::collection($sponsorizations);
    }
}
