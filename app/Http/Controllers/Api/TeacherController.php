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
        $teachers = Teacher::with('subjects', 'ratings', 'reviews', 'sponsorization')
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

    public function search(Request $request)
    {
        $searchQuery = $request->input('searchQuery');
        $subjectQuery = $request->input('subjectQuery');

        $query = Teacher::leftJoin('sponsorization_teacher', 'sponsorization_teacher.teacher_id', '=', 'teachers.id')
            ->leftJoin('subject_teacher', 'subject_teacher.teacher_id', '=', 'teachers.id')
            ->leftJoin('subjects', 'subjects.id', '=', 'subject_teacher.subject_id')
            ->leftJoin('users', 'users.id', '=', 'teachers.user_id')
            ->select('teachers.*', 'sponsorization_teacher.sponsored_until', 'users.first_name', 'users.last_name', 'subjects.name AS subject_name');

            $query->where(function ($q) use ($searchQuery, $subjectQuery) {
                $q->when($searchQuery, function ($userQuery) use ($searchQuery) {
                    $userQuery->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%$searchQuery%"]);
                });
    
                $q->when($subjectQuery, function ($GINO) use ($subjectQuery) {
                    $GINO->where('name', 'like', "%$subjectQuery%");
                });
            });
    
        $teachers = $query->distinct()->get();

        return response()->json([
            'results' => $teachers
        ]);
    }

    public function show(string $id)
    {
        $teacher = Teacher::with('subjects', 'ratings', 'reviews', 'sponsorization', 'user')->where('id', $id)->first();

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
