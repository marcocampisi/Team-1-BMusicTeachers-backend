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
        ->orderBy('sponsorization_teacher.sponsored_until', 'desc')
        ->get();

        return response()->json([
            'success' => true,
            'results' => $teachers
        ]);
    }

    public function show(Teacher $teacher)
    {

        return response()->json([

        ]);
    }

    /*public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->first();

        if ($post) {
            return response()->json([
                'success' => true,
                'results' => $post
            ], 200);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Not found'
            ], 404);
        }
    }

    */
}
