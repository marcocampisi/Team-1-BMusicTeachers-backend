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
        $searchQuery = $request->input('data.searchQuery');
        $subjectQuery = $request->input('data.subjectQuery');
        
        $query = Teacher::leftJoin('sponsorization_teacher', 'sponsorization_teacher.teacher_id', '=', 'teachers.id')
            ->leftJoin('users', 'users.id', '=', 'teachers.user_id')
            ->select('teachers.*', 'users.first_name', 'users.last_name', 'sponsorization_teacher.sponsored_until')
            ->groupBy('teachers.id', 'sponsorization_teacher.sponsored_until')
            ->with('subjects')
            ->where(function ($query) use ($searchQuery, $subjectQuery) {
                $query->when($searchQuery, function ($userQuery) use ($searchQuery) {
                    $userQuery->whereRaw("CONCAT(users.first_name, ' ', users.last_name) LIKE ?", ["%$searchQuery%"]);
                });
        
                $query->when($subjectQuery, function ($subjectNameQuery) use ($subjectQuery) {
                    $subjectNameQuery->whereHas('subjects', function ($query) use ($subjectQuery) {
                        $query->where('name', 'like', "%$subjectQuery%");
                    });
                });
            });
        
            $teachers = $query
            ->orderByRaw('ISNULL(sponsorization_teacher.sponsored_until), sponsorization_teacher.sponsored_until')
            ->get();
        
        return response()->json([
            'results' => $teachers
        ]);
    }

    public function chart(string $id)
    {
        $teacherDataset = Teacher::with('messages', 'ratings', 'reviews')
        ->leftJoin('rating_teacher', 'teachers.id', '=', 'rating_teacher.teacher_id')
        ->leftJoin('ratings', 'rating_teacher.rating_id', '=', 'ratings.id')
        ->leftJoin('messages', 'messages.teacher_id', '=', 'teachers.id')
        ->leftJoin('reviews', 'reviews.teacher_id', '=', 'teachers.id')
        ->where('teachers.id', $id)
        ->select('messages.*', 'ratings.*', 'rating_teacher.*', 'reviews.*');

        return response()->json([
            'results' => $teacherDataset
        ]);
    }

    public function show(string $id)
    {
        $teacher = Teacher::with('subjects', 'ratings', 'reviews', 'sponsorization', 'user')
        ->leftJoin('sponsorization_teacher', 'teachers.id', '=', 'sponsorization_teacher.teacher_id')
        ->leftJoin('users', 'teachers.user_id', '=', 'users.id')
        ->where('teachers.id', $id)
        ->select('teachers.*', 'users.first_name', 'users.last_name', 'sponsorization_teacher.sponsored_until')
        ->first();
    
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

