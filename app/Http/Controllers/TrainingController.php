<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;

class TrainingController extends Controller
{
    public function index()
    {

        $trainings = Training::all();

        return view('training.book', [
            'trainings' => $trainings
        ]);
    }

    public function summary($id)
    {

        $training = Training::findOrFail($id);

        return view('summary', [
            'training' => $training
        ]);
    }
}