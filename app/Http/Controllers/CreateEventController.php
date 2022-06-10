<?php

namespace App\Http\Controllers;

use App\Models\tournament;
use App\Models\User;
use App\Models\Registration;
use Illuminate\Http\Request;

/* RAFIQ PUNYA */

class CreateEventController extends Controller
{
    public function index(){
        $value = request('event');
        if($value == 'internal'){
            return view('tournament.create.create_internal_form');

        }else if($value == '3rd'){
            return view('tournament.create.create_tournament_form');

        }else if($value == 'friendly'){
            return view('tournament.create.create_match_form');
        }else{
            return;
        }
    }

    public function choose(){
        return view('choose_player');
    }

    public function storeInternal(Request $request){
        $tournament = new tournament();

        $tournament->id = null;
        $tournament->match_type = 'internal';
        $tournament->match_name = request('match_name');
        $tournament->match_venue = request('match_venue');
        $tournament->match_start_date = request('match_start_date');
        $tournament->match_end_date = request('match_end_date');
        $tournament->match_start_time = request('match_time');
        $tournament->finished = '0';
        $tournament->match_fee = request('match_fee');

        // TODO: fetch image link
        $OgImageName =  $request->banner_image->getClientOriginalName();
        $request->banner_image->storeAs('banner_image', $OgImageName, 'public');
        $ImgPath = asset('/storage/banner_image/'.$OgImageName);
        $tournament->image_url = $ImgPath;
        // error_log($ImgPath);
        $tournament->save();

        return redirect('/createEvent');
    }

    public function store3rd(Request $request){
        $tournament = new tournament();

        $tournament->id = null;
        $tournament->match_type = '3rd';
        $tournament->match_name = request('match_name');
        $tournament->match_venue = request('match_venue');
        $tournament->match_start_date = request('match_start_date');
        $tournament->match_end_date = request('match_end_date');
        $tournament->match_start_time = request('match_time');
        $tournament->finished = '0';
        $tournament->match_fee = request('match_fee');
        $tournament->image_url = 'test';

        // TODO: fetch image link
        // $tournament->ImageLink = null;
        // $OgImageName =  $request->banner_image->getPathname();
        // $request->banner_image->storeAs('banner_image', $OgImageName, 'public');
        // $ImgPath = asset('/storage/banner_image/'.$OgImageName);
        // $tournament->image_url = $ImgPath;
        // dd($OgImageName);

        // $tournament->save();

        return redirect('/createEvent');
    }

    public function storeFriendly(){
        $tournament = new tournament();

        $tournament->id = null;
        $tournament->match_type = 'friendly';
        $tournament->match_name = request('match_name');
        $tournament->match_venue = request('match_venue');
        $tournament->match_start_date = request('match_start_date');
        $tournament->match_end_date = request('match_end_date');
        $tournament->match_start_time = request('match_time');
        $tournament->finished = '0';
        $tournament->match_fee = request('match_fee');
        $tournament->image_url = null;
        $tournament->chat_url = null;

        error_log($tournament);
        // $tournament->save();
        return redirect('/eventType/choose');
    }

    public function directPlayer(){
        $members = User::all();
        // $tournament = tournament::select('MatchId')->orderByDesc('MatchId')->limit(1)->get();
        // error_log($tournament[0]->MatchId);
        // dd($members);
        return view('tournament.create.choose_player', [
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
