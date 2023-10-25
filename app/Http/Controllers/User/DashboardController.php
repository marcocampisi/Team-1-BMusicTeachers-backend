<?php

namespace App\Http\Controllers\User;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        // Trova il professore con le relazioni di valutazioni
        $teacher = auth()->user()->teacher;
    
        if (!$teacher) {
            return response()->json([
                'success' => false,
                'message' => 'Insegnante non trovato.'
            ], 404);
        }
    
        $monthlyAverages = [];
    
        // Loop attraverso i mesi dell'anno corrente
        $currentYear = date('Y');
    
        for ($month = 1; $month <= 12; $month++) {
            $startDate = "{$currentYear}-{$month}-01";
            $endDate = date('Y-m-t', strtotime($startDate));
    
            // Filtra le valutazioni basate sulla tabella pivot
            $ratingsForMonth = $teacher->ratings()
                ->whereBetween('rating_teacher.created_at', [$startDate, $endDate])
                ->get();
    
            // Calcola la media dei voti e il numero di voti
            $average = $ratingsForMonth->avg('value');
            $numVoti = $ratingsForMonth->count();
    
            $monthlyAverages[] = [
                'mese' => date('Y-m', strtotime($startDate)),
                'media' => $average,
                'num_voti' => $numVoti,
            ];
        }
    
        return view('user.dashboard', compact('monthlyAverages'));
    }
}
