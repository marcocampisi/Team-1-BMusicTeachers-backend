<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index(){
        $success = true;
        $results = Rating::all();
        return response()->json(compact('success', 'results'));
    }

    public function store(Request $request){
        $request->validate([
            'data.teacher_id' => 'nullable|exists:teachers,id',
            'data.rating_id' => 'required|exists:ratings,id',
        ]);
    
        $rating = new Rating();
        $rating->save(); 
    
        if ($request->input('data.teacher_id')) {
            $rating->teachers()->attach($request->input('data.teacher_id'));
        }
    
        // Collega anche il rating_id alla tabella pivot, se necessario
        $rating->teachers()->attach($request->input('data.rating_id'));
    
        return response()->json([
            'success' => true,
            'message' => 'Valutazione salvata con successo',
        ], 200);
    }




}
