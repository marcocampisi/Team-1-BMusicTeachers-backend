<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Teacher;
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

        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //funzione necessaria per menu servizi nella view create 
        $services=Teacher::pluck('service')->unique();

        return view('admin.teachers.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        //

        $formData=$request->validated();

        // dd($formData);
        $photo_path = null;
        $cv_path = null;

        if (isset($formData['photo'])) {
            $photo_path = Storage::put('uploads/images', $formData['photo']);
        }

        if (isset($formData['cv'])) {
            $photo_path = Storage::put('uploads/pdf', $formData['cv']);
        }

       

        
        Teacher::create(
        [
            'user_id'=>$formData['user_id'],
            'bio'=>  $formData['bio'],
            'cv' =>  $cv_path,
            'photo' =>  $photo_path,
            'phone' =>  $formData['phone'],
            'service' =>  $formData['service'],
        ]);
        

        return redirect()->route('admin.teachers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return view('admin.teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        $services=Teacher::pluck('service')->unique();

        return view('admin.teachers.edit', compact('services'), compact('teacher'), );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        //
        $formData=$request->validated();
        
        
    
        $teacher->update(
        [
            'bio'=> $formData['bio'],
            'cv' => $formData['cv'],
            'photo' => $formData['photo'],
            'phone' => $formData['phone'],
            'service' => $formData['service'],
        ]
        );

        return redirect()->route('admin.teachers.show', compact('teacher'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
        $teacher=Teacher::destroy($teacher->id);
        
        return redirect()->route('admin.teachers.index');
    }
}
