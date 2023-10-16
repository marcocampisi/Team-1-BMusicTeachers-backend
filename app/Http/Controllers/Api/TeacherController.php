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
        $teachers=Teacher::with('subject', 'rating', 'review', 'sponsorization')
        ->orderByRaw('sponsored_until >= NOW() DESC, sponsored_until', 'asc')->paginate(10);

        dd($teacher);
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
