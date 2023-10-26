<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\Message\StoreMessageRequest;
use App\Http\Requests\Message\UpdateMessageRequest;
use App\Models\Message;
use App\Http\Controllers\Controller;
use App\Models\Teacher;

class MessageController extends Controller
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

        $messages = Message::where('teacher_id', $teacherID)->get();

        return view('user.messages.index', compact('messages')); 
    }

    /**admin
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();

        return view('user.messages.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request)
    {
        $formData= $request()->validated();

        Message::create($formData);

        return redirect()->route('user.messages.index')->with('success', 'Messaggio creato correttamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        if (!auth()->user()->teacher_id) {
            return redirect()->route('user.teachers.create');      
        }
        
        return view('user.messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('user.messages.index')->with('success', 'Messaggio eliminato correttamente.');
    }
}
