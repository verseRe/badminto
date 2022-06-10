<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainings;

class AttendanceController extends Controller
{
    public function index()
    {

        $trainings = Trainings::all();

        return view('attendance', [
            'trainings' => $trainings
        ]);
    }

    public function attendance($id)
    {

        $training = Trainings::findOrFail($id);
        
        return view('attendance', [
            'training' => $training
        ]);
    }
}