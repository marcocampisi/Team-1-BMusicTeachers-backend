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
            ->where('teachers.id', $id)
            ->get();

        return response()->json([
            'success' => true,
            'results' => $teacherDataset
        ]);
    }
}
