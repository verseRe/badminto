<?php

namespace App\Http\Controllers;

use App\Models\tournament;
use App\Models\member;
use App\Models\Registration;
use Illuminate\Http\Request;

class CreateEventController extends Controller
{
    public function index(){
        $value = request('event');
        if($value == 'internal'){
            return view('create_internal_form');

        }else if($value == '3rd'){
            return view('create_tournament_form');

        }else if($value == 'friendly'){
            return view('create_match_form');
        }else{
            return;
        }
    }

    public function choose(){
        return view('choose_player');
    }

    public function storeInternal(Request $request){
        $tournament = new tournament();

        $tournament->MatchId = null;
        $tournament->MatchType = 'internal';
        $tournament->MatchName = request('match_name');
        $tournament->MatchVenue = request('match_venue');
        $tournament->MatchStartDate = request('match_start_date');
        $tournament->MatchEndDate = request('match_end_date');
        $tournament->MatchStartTime = request('match_time');
        $tournament->Finished = '0';
        $tournament->MatchFee = request('match_fee');
        $tournament->ChatLink = null;

        // TODO: fetch image link
        $OgImageName =  $request->banner_image->getClientOriginalName();
        $request->banner_image->storeAs('banner_image', $OgImageName, 'public');
        $ImgPath = asset('/storage/banner_image/'.$OgImageName);
        $tournament->ImageLink = $ImgPath;
        // error_log($ImgPath);
        $tournament->save();

        return redirect('/createEvent');
    }

    public function store3rd(Request $request){
        $tournament = new tournament();

        $tournament->MatchId = null;
        $tournament->MatchType = '3rd';
        $tournament->MatchName = request('match_name');
        $tournament->MatchVenue = request('match_venue');
        $tournament->MatchStartDate = request('match_start_date');
        $tournament->MatchEndDate = request('match_end_date');
        $tournament->MatchStartTime = request('match_time');
        $tournament->Finished = '0';
        $tournament->MatchFee = request('match_fee');
        $tournament->ChatLink = null;
        // TODO: fetch image link
        // $tournament->ImageLink = null;
        $OgImageName =  $request->banner_image->getClientOriginalName();
        $request->banner_image->storeAs('banner_image', $OgImageName, 'public');
        $ImgPath = asset('/storage/banner_image/'.$OgImageName);
        $tournament->ImageLink = $ImgPath;
        // error_log($ImgPath);

        $tournament->save();

        return redirect('/createEvent');
    }

    public function storeFriendly(){
        $tournament = new tournament();

        $tournament->MatchId = null;
        $tournament->MatchType = 'friendly';
        $tournament->MatchName = request('match_name');
        $tournament->MatchVenue = request('match_venue');
        $tournament->MatchStartDate = request('match_start_date');
        $tournament->MatchEndDate = request('match_end_date');
        $tournament->MatchStartTime = request('match_time');
        $tournament->Finished = '0';
        $tournament->MatchFee = request('match_fee');
        $tournament->ImageLink = null;
        $tournament->ChatLink = null;

        error_log($tournament);
        // $tournament->save();
        return redirect('/eventType/choose');
    }

    public function directPlayer(){
        $members = member::all();
        // $tournament = tournament::select('MatchId')->orderByDesc('MatchId')->limit(1)->get();
        // error_log($tournament[0]->MatchId);
        // dd($members);
        return view('choose_player', [
            'members' => $members,
            // 'tournament' => $tournament
        ]);
    }

    public function insertRegister(){
        $tournament = tournament::select('MatchId')->orderByDesc('MatchId')->limit(1)->get();
        $matchId = $tournament[0]->MatchId;
        $playersArray = request('players');
        dd($playersArray);
        foreach($playersArray as $player){
            error_log($player);
            //TODO: Create new instance for registration model
            $registration = new registration();

            //TODO: Insert data into registration table in db
            $registration->UserId = $player;
            $registration->MatchId = $matchId;
            $registration->PaymentId = null;
            $registration->PaymentStatus = 0;
            $registration->IsFriendly = 0;
            $registration->AcceptStatus = null;

            error_log($registration);
        }

    }
}
