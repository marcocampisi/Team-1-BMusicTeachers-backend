<?php

namespace App\Http\Controllers\User;

use App\Models\Sponsorization;
use App\Http\Requests\Sponsorization\StoreSponsorizationRequest;
use App\Http\Requests\Sponsorization\UpdateSponsorizationRequest;
use App\Http\Controllers\Controller;

class SponsorizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->user()->teacher_id) {
            return redirect()->route('user.teachers.create');  
        }
        
        $sponsorizations = Sponsorization::all();

        return view('user.sponsorizations.index', compact('sponsorizations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSponsorizationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sponsorization $sponsorization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sponsorization $sponsorization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSponsorizationRequest $request, Sponsorization $sponsorization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sponsorization $sponsorization)
    {
        //
    }
}
