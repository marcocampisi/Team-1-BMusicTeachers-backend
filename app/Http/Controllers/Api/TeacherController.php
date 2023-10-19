<?php

namespace App\Http\Controllers\Api;

use App\Models\Teacher;
use Illuminate\Http\Request;

//Models
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    //
    public function index()
    {
        $teachers=Teacher::with('subjects', 'ratings', 'reviews', 'sponsorization')
        ->leftJoin('sponsorization_teacher', 'sponsorization_teacher.teacher_id', '=', 'teachers.id')
        ->leftJoin('users', 'users.id', '=', 'teachers.user_id')
        ->select('teachers.*', 'sponsorization_teacher.sponsored_until', 'users.first_name', 'users.last_name')
        ->distinct()
        ->orderBy('sponsorization_teacher.sponsored_until', 'desc')
        ->get();

        return response()->json([
            'success' => true,
            'results' => $teachers
        ]);
    }

    public function search(Request $request , $seachQuery)
    {

        $teachers = Teacher::whereHas('user', function ($query) use ($seachQuery) {
            $query->where('first_name', 'LIKE', "%$seachQuery%")
                ->orWhere('last_name', 'LIKE', "%$seachQuery%");
        })->get();

        dd($teachers);
        
        return response()->json([
            'results' => $teachers
        ]);
    }

    
    public function show(string $id)
    {
        $teacher = Teacher::where('id', $id)->first();

        if ($teacher) {
            return response()->json([
                'success' => true,
                'results' => $teacher
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Teacher not found',
            ], 404);
        }
    }
}
