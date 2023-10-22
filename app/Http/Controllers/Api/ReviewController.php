<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'data.name' => 'required|string',
            'data.content' => 'required|string',
            'data.teacher_id' => 'nullable|exists:teachers,id',
        ]);

    
        $review = new Review();
        $review->name = $request->input('data.name');
        $review->content = $request->input('data.content');
        $review->teacher_id = $request->input('data.teacher_id');
    

        $review->save();
    

        return response()->json([
            'success' => true,
            'message' => 'Testimonianza salvata con successo',
        ], 200);
    }
}
