<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\ClubInfo;
use App\Models\Tournament;
use App\Models\RegisterMatch;
use App\Models\Training;
use Illuminate\Http\Request;
use Image;

class ClubInfoController extends Controller
{

      public function displayMember(){
//RETRIEVE ALL CLUB INFORMATION
  $clubinfo= ClubInfo::all();

//TO FIND NUMBER OF TOURNAMENTS BY MONTH BY INDIVIDUALS
  $tourIndi= RegisterMatch::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
  ->whereYear('created_at', date('Y'))->where('userID', '20')->groupBY(DB::raw("Month(created_at)"))->pluck('count', 'month_name');

$labels = $tourIndi->keys();
  $data = $tourIndi->values();

//TO FIND NUMBER OF TRAININGS BY MONTH BY INDIVIDUALS
  $trainIndi= Training::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(trainingDate) as month_name"))
  ->whereYear('trainingDate', date('Y'))->where('userID', '20')->groupBY(DB::raw("Month(trainingDate)"))->pluck('count', 'month_name');

  $labelTrain = $trainIndi->keys();
    $dataTrain = $trainIndi->values();

    //FIND NUMBER OF OVERALL INTERNAL TOURnaments FOR CLUB
    $clubtour= RegisterMatch::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
    ->whereYear('created_at', date('Y'))->where('isFriendly', '0')->groupBY(DB::raw("Month(created_at)"))->pluck('count', 'month_name');

            $labelClubTour = $clubtour->keys();
              $dataClubTour = $clubtour->values();

//FIND NUMBER OF OVERALL TRAININGS FOR CLUB
    $clubtrain= Training::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(trainingDate) as month_name"))
    ->whereYear('trainingDate', date('Y'))->groupBY(DB::raw("Month(trainingDate)"))->pluck('count', 'month_name');
    $labelClubTrain = $clubtrain->keys();
      $dataClubTrain = $clubtrain->values();



    return view('statistic.homepageMember', ['clubinfo' => $clubinfo], compact('labels','data','labelTrain','dataTrain','labelClubTour',
    'dataClubTour','labelClubTrain','dataClubTrain'));

}

public function displayAdmin(){
//RETRIEVE ALL CLUB INFORMATION
$clubinfo= ClubInfo::all();

//TO FIND NUMBER OF TOURNAMENTS BY MONTH BY INDIVIDUALS
$tourIndi= RegisterMatch::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
->whereYear('created_at', date('Y'))->where('userID', '20')->groupBY(DB::raw("Month(created_at)"))->pluck('count', 'month_name');

$labels = $tourIndi->keys();
$data = $tourIndi->values();

//TO FIND NUMBER OF TRAININGS BY MONTH BY INDIVIDUALS
$trainIndi= Training::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(trainingDate) as month_name"))
->whereYear('trainingDate', date('Y'))->where('userID', '20')->groupBY(DB::raw("Month(trainingDate)"))->pluck('count', 'month_name');

$labelTrain = $trainIndi->keys();
  $dataTrain = $trainIndi->values();

  //FIND NUMBER OF OVERALL INTERNAL TOURnaments FOR CLUB
  $clubtour= RegisterMatch::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
  ->whereYear('created_at', date('Y'))->where('isFriendly', '0')->groupBY(DB::raw("Month(created_at)"))->pluck('count', 'month_name');

          $labelClubTour = $clubtour->keys();
            $dataClubTour = $clubtour->values();

//FIND NUMBER OF OVERALL TRAININGS FOR CLUB
  $clubtrain= Training::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(trainingDate) as month_name"))
  ->whereYear('trainingDate', date('Y'))->groupBY(DB::raw("Month(trainingDate)"))->pluck('count', 'month_name');
  $labelClubTrain = $clubtrain->keys();
    $dataClubTrain = $clubtrain->values();



  return view('statistic.homepageAdmin', ['clubinfo' => $clubinfo], compact('labels','data','labelTrain','dataTrain','labelClubTour',
  'dataClubTour','labelClubTrain','dataClubTrain'));

}
public function displayCommittee(){
//RETRIEVE ALL CLUB INFORMATION
$clubinfo= ClubInfo::all();

//TO FIND NUMBER OF TOURNAMENTS BY MONTH BY INDIVIDUALS
$tourIndi= RegisterMatch::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
->whereYear('created_at', date('Y'))->where('userID', '20')->groupBY(DB::raw("Month(created_at)"))->pluck('count', 'month_name');

$labels = $tourIndi->keys();
$data = $tourIndi->values();

//TO FIND NUMBER OF TRAININGS BY MONTH BY INDIVIDUALS
$trainIndi= Training::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(trainingDate) as month_name"))
->whereYear('trainingDate', date('Y'))->where('userID', '20')->groupBY(DB::raw("Month(trainingDate)"))->pluck('count', 'month_name');

$labelTrain = $trainIndi->keys();
  $dataTrain = $trainIndi->values();

  //FIND NUMBER OF OVERALL INTERNAL TOURnaments FOR CLUB
  $clubtour= RegisterMatch::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
  ->whereYear('created_at', date('Y'))->where('isFriendly', '0')->groupBY(DB::raw("Month(created_at)"))->pluck('count', 'month_name');

          $labelClubTour = $clubtour->keys();
            $dataClubTour = $clubtour->values();

//FIND NUMBER OF OVERALL TRAININGS FOR CLUB
  $clubtrain= Training::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(trainingDate) as month_name"))
  ->whereYear('trainingDate', date('Y'))->groupBY(DB::raw("Month(trainingDate)"))->pluck('count', 'month_name');
  $labelClubTrain = $clubtrain->keys();
    $dataClubTrain = $clubtrain->values();



  return view('statistic.homepageCommittee', ['clubinfo' => $clubinfo], compact('labels','data','labelTrain','dataTrain','labelClubTour',
  'dataClubTour','labelClubTrain','dataClubTrain'));

}

public function displayVisitor(){
  $clubinfo= ClubInfo::all();
  return view('statistic.homepageVisitor', ['clubinfo' => $clubinfo]);
}

  public function edit(ClubInfo $clubinfo)
  {

      return view('statistic.editInfo', ['clubinfo'=> $clubinfo]);

  }


  public function fetch_image($id){
    $image = Images::findOrfail($id);
    $headerImageUrl = Images::make($image->headerImageUrl);
    $response= Response::make($headerImageUrl->encode('jpeg'));

    $response->header('Content-Type', 'image/png');

    return $response;
  }

  public function update(ClubInfo $clubinfo)
  {

    request()->validate([
      'title' => 'required',
      'desc'  => 'required',
      'headerImageUrl' => 'required|mimes:jpg,png,jpeg|max:5048',
    ]);


    $imagePath = request()->headerImageUrl->store('images');

    // $newHeaderImageUrl = time().'-'.$request->headerImageUrl.'.'<div class="$request-.">

    $clubinfo->update([
          'title' => request('title'),
          'desc' => request('desc'),
          'headerImageUrl' => $imagePath,

        ]);

        return redirect('/clubinfo');


  }

}
