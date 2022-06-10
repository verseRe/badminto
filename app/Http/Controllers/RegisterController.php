<?php

namespace App\Http\Controllers;

use App\Models\tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    //
    public function index(){

        $tournaments = tournament::all();

        return view('choose_event', [
            'tournaments' => $tournaments
        ]);
    }

    public function select($id){
        $oneTournament = tournament::findOrFail($id);
        return view('view_register_event', [
            'oneTournament' => $oneTournament,
            'matchid' => $id
        ]);

    }

        // $oneTournament = tournament::where('MatchId', $id);
        // $id = request('MatchId');
        // $oneTournament = tournament::findOrFail($id);
        // $id = request('match');
        // return redirect('/selectEvent/{{$id}}');
        
        // return function($id){
            // $oneTournament = tournament::where('MatchId', $id);
        // };
        
    public function direct(){
        $id = request('match');
        return Redirect::to('/selectEvent/'.$id);
    }

}
