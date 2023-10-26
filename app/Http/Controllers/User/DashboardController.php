<?php

namespace App\Http\Controllers\User;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        if (!auth()->user()->teacher_id) {
            return redirect()->route('user.teachers.create');
           
        }

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
        $monthlyMessagesCounts = [];
        $yearlyMessagesCounts = [];

        for ($year = $startYear; $year <= $currentYear; $year++) {
            // Filtra i rating per l'anno corrente
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

            // Filtra i messaggi per l'anno corrente e conta il numero di messaggi
            $messagesForYear = $teacher->messages()
                ->whereBetween('created_at', [$startDate, $endDate])
                ->get();

            $yearlyMessagesCounts[] = [
                'year' => $year,
                'numMessages' => $messagesForYear->count(),
            ];
        }

        for ($month = 1; $month <= 12; $month++) {
            // Filtra i rating per il mese corrente
            $startDate = "{$currentYear}-$month-01";
            $endDate = date('Y-m-t', strtotime($startDate));

            setlocale(LC_TIME, 'it_IT');
            $monthName = strftime('%b', strtotime($startDate));

            $ratingsForMonth = $teacher->ratings()
                ->whereBetween('rating_teacher.created_at', [$startDate, $endDate])
                ->get();

            $average = $ratingsForMonth->avg('value');
            $numRatings = $ratingsForMonth->count();

            $monthlyAverages[] = [
                'month' => $monthName,
                'average' => $average,
                'numRatings' => $numRatings,
            ];

            // Filtra i messaggi per il mese corrente e conta il numero di messaggi
            $messagesForMonth = $teacher->messages()
                ->whereBetween('created_at', [$startDate, $endDate])
                ->get();

            $monthlyMessagesCounts[] = [
                'month' => $monthName,
                'numMessages' => $messagesForMonth->count(),
            ];
        }

        //Messages Data

        return view('user.dashboard', compact('monthlyAverages', 'yearlyAverages', 'monthlyMessagesCounts', 'yearlyMessagesCounts'));
    }
    
}
