<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TournamentController extends Controller
{
    //view tournament
    public function viewTournament(){

        request()->validate([
            'match_name' => 'required',

        ]);

        $match_name = request('match_name');
        $match_start_date = request('match_start_date');
        $match_fee = request('match_fee');

        $tournaments = DB::table('tournaments')->select('match_name','match_start_date','match_fee')->get();

        return view('some-view')->with('tournaments', $tournaments);

    }
    public function displayTournament(){

        request()->validate([
            'match_name' => 'required',

        ]);

        $match_name = request('match_name');
        $match_type = request('match_type');
        

        $tournaments = DB::table('tournaments')->select('match_name','match_type')->get();

        return view('some-view')->with('tournaments', $tournaments);

    }
    //insert payment summary
    public function paymentSummary(){

        request()->validate([
            'userID' => 'required',
            'paymentDate' => 'required',
        ]);


        $userID = request('userID');
        $tournamentID = request('tournamentID');
        $matchfee = request('matchfee');
        $isEnoughBalance = false;

        //step1: check if the user have enough balance in their ewallet
        $userBalanceAmount = User::where('userID', $userID)->value('balanceAmount');

        //payment for match
        $matchfee = Tournaments::where('id', $tournamentID)->value('matchfee');

            if($userBalanceAmount >= $matchfee){
                $isEnoughBalance = true;
            }else{
                return ['message' => 'Not enough amount'];
            }

            if($isEnoughBalance){
                //step2: deduct the amount from their existing balance if step 1 true
                User::where('userID', $userID)->decrement('balanceAmount', $matchfee);

                //step3: create the payment if and only if step2 is true
                $rowsEffected = Tournament::create([
                    'userID' => $userID,
                    'trainingID' => $trainingID,
                    'paymentDate' => request('paymentDate'),
                    'paymentStatus' => request('paymentStatus')
                ]);
                return ['message' => 'Payment Successful!', 'data' => $rowsEffected];
            }
        
}
