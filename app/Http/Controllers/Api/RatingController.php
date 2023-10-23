<?php

namespace App\Http\Controllers\Api;

use App\Models\Rating;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    
        if ($request->input('data.teacher_id')) {
            $teacher = Teacher::find($request->input('data.teacher_id'));
    
            if (!$teacher) {
                return response()->json([
                    'success' => false,
                    'message' => 'Insegnante non trovato',
                ], 404);
            }
        }
    

        $rating = Rating::find($request->input('data.rating_id'));
    
        if (!$rating) {
            return response()->json([
                'success' => false,
                'message' => 'Valutazione non trovata',
            ], 404);
        }
    
        if ($request->input('data.teacher_id')) {
            $teacher->ratings()->attach($request->input('data.rating_id'));
        }
    
        return response()->json([
            'success' => true,
            'message' => 'Valutazione salvata con successo',
        ], 200);
    }




}
