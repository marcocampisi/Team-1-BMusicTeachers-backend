<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\StoreTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
//helpers
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $teachers=Teacher::all();

        return view('user.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //funzione necessaria per menu servizi nella view create 
        $services=Teacher::pluck('service')->unique();
        $subjects=Subject::all();

        return view('user.teachers.create', compact('services', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        //

        $formData=$request->validated();
        $photo_path = null;
        $cv_path = null;

        if (isset($formData['photo'])) {
            $photo_path = Storage::put('uploads/images', $formData['photo']);
        }

        if (isset($formData['cv'])) {
            $cv_path = Storage::put('uploads/pdf', $formData['cv']);
        }
        
        $teacher = Teacher::create(
        [
            'user_id'=>$formData['user_id'],
            'bio'=>  $formData['bio'],
            'cv' =>  $cv_path,
            'photo' =>  $photo_path,
            'phone' =>  $formData['phone'],
            'service' =>  $formData['service'],
        ]);
        
        if (isset($formData['subjects'])) {
            foreach ($formData['subjects'] as $subjectId) {
                                                
                $teacher->subjects()->attach($subjectId); 
            }
        }

        $user = User::find(auth()->user()->id);
        $user->teacher_id = $teacher->id;
        $user->save();

        return redirect()->route('user.teachers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return view('user.teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        if (auth()->user()->id !== $teacher->user_id) {
            return abort(403);
        }
        
        $services=Teacher::pluck('service')->unique();
        $subjects=Subject::all();

        return view('user.teachers.edit', compact('services','teacher', 'subjects') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        //
        $formData=$request->validated();

        if (auth()->user()->id !== $teacher->user_id) {
            return abort(403);
        }

        $photo_path = $teacher->photo;
        if (isset($formData['photo'])) {
            if ($teacher->photo){
                Storage::delete($teacher->photo);
            }           
            $photo_path = Storage::put('uploads/images', $formData['photo']);
        }

        $cv_path = $teacher->cv;
        if (isset($formData['cv'])) {
            if ($teacher->cv){
                Storage::delete($teacher->cv);
            }
            $cv_path = Storage::put('uploads/pdf', $formData['cv']);
        }
        
        if (isset($formData['subjects'])) {
            $teacher->subjects()->sync($formData['subjects']);
        }
        
    
        $teacher->update(
        [
            'bio'=> $formData['bio'],
            'cv' => $cv_path,
            'photo' => $photo_path,
            'phone' => $formData['phone'],
            'service' => $formData['service'],
        ]
        );

        return redirect()->route('user.teachers.show', compact('teacher'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
        if (auth()->user()->id !== $teacher->user_id) {
            return abort(403);
        }
        
        Teacher::destroy($teacher->id);
        User::destroy(auth()->user()->id);
        
        return redirect()->route('user.teachers.index');
    }
}
