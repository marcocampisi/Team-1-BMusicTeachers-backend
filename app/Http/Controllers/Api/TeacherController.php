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
        //
        // $teachers=Teacher::join('sponsorization_teacher', 'teacher_id', '=', 'sponsorization_teacher.teacher_id')
        //     ->with('subjects', 'ratings', 'reviews', 'sponsorization')
        //     ->orderByRaw('sponsored_until >= NOW() DESC, sponsored_until')->paginate(10);

        $sponsoredTeachers=Teacher::with('subjects', 'ratings', 'reviews', 'sponsorization')
            ->join('sponsorization_teacher', 'teachers.id', '=', 'sponsorization_teacher.teacher_id')
            ->orderByRaw('sponsorization_teacher.sponsored_until >= NOW() DESC, sponsorization_teacher.sponsored_until');

        $nonSponsoredTeachers = Teacher::with('subjects', 'ratings', 'reviews', 'sponsorization')
        ->whereNotExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('sponsorization_teacher')
                ->whereColumn('teachers.id', 'sponsorization_teacher.teacher_id');
        });
        
        $teachers = $sponsoredTeachers->union($nonSponsoredTeachers);

        dd($teachers);

        return response()->json([
            'success' => true,
            // 'results' => $teachers
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
