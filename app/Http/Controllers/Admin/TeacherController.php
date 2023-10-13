<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use App\Http\Requests\Teacher\StoreTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Http\Controllers\Controller;
use App\Models\User;

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
        //
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        //
        $formData=$request->validated();

        $teacher=Teacher::create(
        [
            
        ]);

        return redirect()->route('admin.teachers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
        return view('teachers.show', compact('teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
        return view('admin.teachers.edit', compact('teachers'));
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
           
            ]
        );

        return redirect()->route('admin.teachers.index',);
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
