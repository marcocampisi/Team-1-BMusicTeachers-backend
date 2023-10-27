<?php

namespace App\Http\Controllers\User;

use App\Models\Review;
use App\Http\Requests\Review\StoreReviewRequest;
use App\Http\Requests\Review\UpdateReviewRequest;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->user()->teacher_id) {
            return redirect()->route('user.teachers.create');         
        }

        $teacherID = auth()->user()->teacher_id;

        $reviews = Review::where('teacher_id', $teacherID)->get();

        return view('user.reviews.index', compact('reviews')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request)
    {
        $data = request()->validate();

        Review::create($data);

        return redirect()->route('reviews.index')->with('success', 'Recensione creata correttamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        if (!auth()->user()->teacher_id) {
            return redirect()->route('user.teachers.create');  
        }
        
        return view('user.reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('user.reviews.index');
    }
}
