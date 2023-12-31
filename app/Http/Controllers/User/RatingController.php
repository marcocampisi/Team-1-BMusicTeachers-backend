<?php

namespace App\Http\Controllers\User;

use App\Models\Rating;
use App\Http\Requests\Rating\StoreRatingRequest;
use App\Http\Requests\Rating\UpdateRatingRequest;
use App\Http\Controllers\Controller;

use App\Models\Teacher;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->user()->teacher_id) {
            return redirect()->route('user.teachers.create');   
        }

        $rating = Rating::all();

        return view('ratings.index', compact('ratings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('ratings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRatingRequest $request)
    {
        //
        $formData=$request->validated();

        $rating=Rating::create(
        [
         
        ]);

        return redirect()->route('user.teachers.show');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        //
        return view('ratings.edit', compact('ratings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRatingRequest $request, Rating $rating)
    {
        //
        $formData=$request->validated();

    
        $rating->update(
            [
 
            ]
        );

        return redirect()->route('ratings.index',);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
