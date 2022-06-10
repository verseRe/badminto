<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubInfoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

//payment module web routes
Route::get('/payment', function(){
    return view('payment/payment_summary');
});

Route::get('/payment/updatebalance', function () {
    return view('payment/update_balance');
});

Route::get('/payment/status', function () {
    return view('payment/update_payment_status');
});

//end of payment module routes

//edit club info web routes

Route::get('/clubinfo/{clubinfo}/edit', [ClubInfoController::class, 'edit']);

Route::put('/clubinfo/{clubinfo}', [ClubInfoController::class, 'update']);
//end club info web routes

//For charts data
Route::get('/homepageMember','App\Http\Controllers\ClubInfoController@displayMember');
Route::get('/homepageVisitor','App\Http\Controllers\ClubInfoController@displayVisitor');
Route::get('/homepageCommittee','App\Http\Controllers\ClubInfoController@displayCommittee');
Route::get('/homepageAdmin','App\Http\Controllers\ClubInfoController@displayAdmin');
//end of charts data routes

//training Booking
Route::get('/training','App\Http\Controllers\TrainingController@index');

Route::get('training/summary/{id}','App\Http\Controllers\TrainingController@summary');
Route::get('training/attendance/{id}','App\Http\Controllers\AttendanceController@attendance');
//end of traning booking routes

/**
 * Tournament Module Route
 */

// Edit Tournament
Route::get('/tournament/edit', 'App\Http\Controllers\TournamentController@indexEdit');
Route::get('edit_form', 'App\Http\Controllers\TournamentController@editView');
Route::post('edit_form', 'App\Http\Controllers\TournamentController@update');
Route::post('close_form', 'App\Http\Controllers\TournamentController@closeMatch');

// Choose Players
Route::get('edit_player_form', 'App\Http\Controllers\TournamentController@playerView');
Route::post('edit_player_form', 'App\Http\Controllers\TournamentController@playerUpdate');

// Edit Result
Route::get('/tournament/result', 'App\Http\Controllers\ResultController@index');
Route::get('edit_result_form', 'App\Http\Controllers\ResultController@resultView');
Route::post('edit_result_form', 'App\Http\Controllers\ResultController@update');

// Notifications
Route::get('notification', 'App\Http\Controllers\UserNotificationController@index');
Route::get('view_match_notification', 'App\Http\Controllers\TournamentController@viewTournamentFromNotification')->name('view');
// Invitation response
Route::get('invitation_response', 'App\Http\Controllers\TournamentController@inviteResponse')->name('response');
Route::post('accept_invitation', 'App\Http\Controllers\TournamentController@acceptInvitation');
Route::post('reject_invitation', 'App\Http\Controllers\TournamentController@rejectInvitation');