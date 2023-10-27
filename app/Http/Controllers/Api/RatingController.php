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


    public function store(Request $request)
    {
        $request->validate([
            'data.rating_id' => 'required|exists:ratings,id',
            'data.teacher_id' => 'nullable|exists:teachers,id', // Facoltativo
        ]);
        
        $rating = Rating::find($request->input('data.rating_id'));
        
        if (!$rating) {
            return response()->json([
                'success' => false,
                'message' => 'Valutazione non trovata.',
            ], 404);
        }
        
        $teacher = null;
        
        if ($request->has('data.teacher_id')) {
            $teacher = Teacher::find($request->input('data.teacher_id'));
        
            if (!$teacher) {
                return response()->json([
                    'success' => false,
                    'message' => 'Insegnante non trovato.',
                ], 404);
            }
        }
        
        // Collega il rating_id e teacher_id nella tabella pivot con created_at e updated_at
        $teacher->ratings()->attach($rating->id, [
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Valutazione collegata all\'insegnante con successo.',
        ], 200);
    }




}
