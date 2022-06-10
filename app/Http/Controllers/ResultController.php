<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\Result;

class ResultController extends Controller
{
    /**
     * Display a listing of finished tournaments.
     */
    public function index()
    {
        $tp_tournaments = Tournament::all()->where('match_type', '3rd Party')->where('finished', '1'); //Fetch finished 3rd party tournaments from DB
        $int_tournaments = Tournament::all()->where('match_type', 'Internal')->where('finished', '1'); //Fetch finished internal tournaments from DB
        return view("tournament.result.index", ['tp_tournaments' => $tp_tournaments, 'int_tournaments' => $int_tournaments]);
    }

    /**
     * Display participants ranking for the selected tournament.
     */
    public function resultView(Request $request)
    {
        // SELECT users.name, results.userID, place FROM results JOIN users ON users.userID=results.UserID WHERE tournamentID = '5';
        $match_id = $request->input('match_id');
        $users = Result::select('users.name', 'results.userID', 'place')->join('users', 'users.userID', '=', 'results.userID')->where('tournamentID', $match_id)->get(); //Fetch participants
        return view("tournament.result.edit_result_form", ['users' => $users]);
    }

    /**
     * Update the rankings of results
     */
    public function update(Request $request) {

        $match_id = $request->input('match_id');
        $participants = $request->participant_list;

        foreach ($participants as $playerID) {
            $input_name = "rank_" . $playerID;
            $ranking = $request->$input_name;

            Result::where('tournamentID', $match_id)->where('userID', $playerID)->update([
                'place' => $ranking
            ],);
        }

        // Display success message
        return redirect()->back()->with('message','The results have been updated successfully!');
    }
}
