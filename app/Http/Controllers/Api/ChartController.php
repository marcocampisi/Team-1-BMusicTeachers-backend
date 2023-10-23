<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function show(string $id)
    {
        $teacherDataset = Teacher::with('messages', 'ratings', 'reviews', 'user')
            ->leftJoin('users', 'users.id', '=', 'teachers.user_id')
            ->leftJoin('rating_teacher', 'teachers.id', '=', 'rating_teacher.teacher_id')
            ->leftJoin('ratings', 'rating_teacher.rating_id', '=', 'ratings.id')
            ->leftJoin('messages', 'messages.teacher_id', '=', 'teachers.id')
            ->leftJoin('reviews', 'reviews.teacher_id', '=', 'teachers.id')
            ->where('teachers.id', $id)
            ->select('teachers.*', 'messages.*', 'ratings.*', 'rating_teacher.*', 'reviews.*')
            ->get();

        return response()->json([
            'success' => true,
            'results' => $teacherDataset
        ]);
    }
}
