<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'data.name' => 'nullable|string',
            'data.content' => 'required|string',
            'data.teacher_id' => 'nullable|exists:teachers,id',
        ]);
    
        $message = new Message();
        $message->name = $request->input('data.name');
        $message->content = $request->input('data.content');
        $message->teacher_id = $request->input('data.teacher_id');
    

        $message->save();
    

        return response()->json([
            'success' => true,
            'message' => 'Messaggio salvato con successo',
        ], 200);
    }
}
