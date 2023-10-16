<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\Teacher;

class TeacherController extends Controller
{
    //
    public function index()
    {
        //
        $teachers=Teacher::join('sponsorization_teacher', 'teacher_id', '=', 'sponsorization_teacher.teacher_id')
            ->with('subjects', 'ratings', 'reviews', 'sponsorization')
            ->orderByRaw('sponsored_until >= NOW() DESC, sponsored_until')->paginate(10);

        dd($teachers);
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


    /*
    public function index()
    {
        

        return response()->json([
            'success' => true,
            'results' => $posts
        ]);
    }

    public function show(string $slug)
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
