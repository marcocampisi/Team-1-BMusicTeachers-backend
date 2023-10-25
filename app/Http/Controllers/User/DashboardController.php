<?php

namespace App\Http\Controllers\User;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $teacher = auth()->user()->teacher;
    
        if (!$teacher) {
            return response()->json([
                'success' => false,
                'message' => 'Insegnante non trovato.'
            ], 404);
        }
    
        $currentYear = date('Y');
        $startYear = $currentYear - 5;
    
        $monthlyAverages = [];
        $yearlyAverages = [];
    
        for ($year = $startYear; $year <= $currentYear; $year++) {
            $startDate = "{$year}-01-01";
            $endDate = "{$year}-12-31";
    
            $ratingsForYear = $teacher->ratings()
                ->whereBetween('rating_teacher.created_at', [$startDate, $endDate])
                ->get();
    
            $average = $ratingsForYear->avg('value');
            $numRatings = $ratingsForYear->count();
    
            $yearlyAverages[] = [
                'year' => $year,
                'average' => $average,
                'numRatings' => $numRatings,
            ];
        }
    
        for ($month = 1; $month <= 12; $month++) {
            $startDate = "{$currentYear}-$month-01";
            $endDate = date('Y-m-t', strtotime($startDate));
    
            $ratingsForMonth = $teacher->ratings()
                ->whereBetween('rating_teacher.created_at', [$startDate, $endDate])
                ->get();
    
            $average = $ratingsForMonth->avg('value');
            $numRatings = $ratingsForMonth->count();
    
            $monthlyAverages[] = [
                'month' => date('Y-m', strtotime($startDate)),
                'average' => $average,
                'numRatings' => $numRatings,
            ];
        }
    
        return view('user.dashboard', compact('monthlyAverages', 'yearlyAverages'));
    }
    
}
