<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $success = true;
        $results = Subject::all();
        return response()->json(compact('success', 'results'));
    }
}
