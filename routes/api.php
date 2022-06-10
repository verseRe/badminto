<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//import payment Controller
use App\Http\Controllers\PaymentController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//payment api routes
Route::post('/payment/create', [PaymentController::class,'createPaymentSummary']);
Route::post('/payment/updateBalance', [PaymentController::class,'updateBalance']);
Route::get('/payment/transaction', [PaymentController::class,'getAllTransaction']);