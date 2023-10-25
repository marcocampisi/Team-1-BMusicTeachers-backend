<?php

namespace App\Http\Controllers\User;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Trova il professore con le relazioni di valutazioni
        $teacher = auth()->user()->teacher;
    
        if (!$teacher) {
            return response()->json([
                'success' => false,
                'message' => 'Insegnante non trovato.'
            ], 404);
        }
    
        $currentYear = date('Y');
        $startYear = $currentYear - 5; // Calcola l'anno di inizio (massimo 5 anni precedenti)
    
        $monthlyAverages = [];
        $yearlyAverages = [];
    
        // Loop attraverso gli anni
        for ($year = $startYear; $year <= $currentYear; $year++) {
            $startDate = "{$year}-01-01";
            $endDate = "{$year}-12-31";
    
            // Filtra le valutazioni basate sulla tabella pivot per l'anno specifico
            $ratingsForYear = $teacher->ratings()
                ->whereBetween('rating_teacher.created_at', [$startDate, $endDate])
                ->get();
    
            // Calcola la media dei voti e il numero di voti annuali
            $average = $ratingsForYear->avg('value');
            $numRatings = $ratingsForYear->count();
    
            $yearlyAverages[] = [
                'year' => $year,
                'average' => $average,
                'numRatings' => $numRatings,
            ];
        }
    
        // Loop attraverso i mesi dell'anno corrente
        for ($month = 1; $month <= 12; $month++) {
            $startDate = "{$currentYear}-$month-01";
            $endDate = date('Y-m-t', strtotime($startDate));
    
            // Filtra le valutazioni basate sulla tabella pivot per il mese specifico
            $ratingsForMonth = $teacher->ratings()
                ->whereBetween('rating_teacher.created_at', [$startDate, $endDate])
                ->get();
    
            // Calcola la media dei voti e il numero di voti mensili
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
