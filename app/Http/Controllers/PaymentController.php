<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Payment;
use App\Models\Training;
use App\Models\Tournament;



use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //insert payment summary
    public function createPaymentSummary(){

        request()->validate([
            'userID' => 'required',
        ]);

        $date = date('Y-m-d H:i:s');
        $userID = request('userID');
        $tournamentID = request('tournamentID');
        $trainingID = request('trainingID');
        $isEnoughBalance = false;

        //step1: check if the user have enough balance in their ewallet
        $userBalanceAmount = User::where('userID', $userID)->value('balanceAmount');

        //payment for training
        if($trainingID != null){
            $training = Training::where('id', $trainingID)->get()->first();

            //shuttles used and its price
            $shuttleCost = $training->shuttlePrice * $training->shuttleUsed;
            $trainingAmount = $training->trainingPrice;

            $totalTrainingCost = $shuttleCost + $trainingAmount;

            if($userBalanceAmount >= $totalTrainingCost){
                $isEnoughBalance = true;
            }else{
                return ['message' => 'Not enough amount'];
            }

            if($isEnoughBalance){
                //step2: deduct the amount from their existing balance if step 1 true
                User::where('userID', $userID)->decrement('balanceAmount', $totalTrainingCost);

                //step3: create the payment if and only if step2 is true
                $rowsEffected = Payment::create([
                    'userID' => $userID,
                    'trainingID' => $trainingID,
                    'paymentDate' => $date,
                    'paymentStatus' => 'Paid',
                    'type' => $training->trainingName,
                    'paidAmount' => $totalTrainingCost
                ]);
                return ['message' => 'Payment Successful!', 'data' => $rowsEffected];
            }
        }

        //payment for tournoment
        if($tournamentID != null){
            $tournament = Tournament::where('id', $tournamentID)->get()->first();

            $tournamentAmount = $tournament->match_fee;

            if ($userBalanceAmount >= $tournamentAmount) {
                $isEnoughBalance = true;
            } else {
                return ['message' => 'Not enough amount'];
            }

            if($isEnoughBalance){
                //step2: deduct the amount from their existing balance if step 1 true
                User::where('userID', $userID)->decrement('balanceAmount', $tournamentAmount);

                 //step3: create the payment if and only if step2 is true
                $rowsEffected = Payment::create([
                    'userID' => $userID,
                    'tournamentID' => $tournamentID,
                    'paymentDate' => $date,
                    'paymentStatus' => 'Paid',
                    'type' => $tournament->match_type,
                    'paidAmount' => $tournamentAmount
                ]);

                return ['message' => 'Payment Successful!', 'data' => $rowsEffected];

            }

        }

    }

    //update user's balance
    public function updateBalance(){

        request()->validate([
            'userID' => 'required',
            'depositAmt' => 'required',
            'adminID' => 'required'
        ]);

        $userID =  request('userID');
        $adminID = request('adminID');
        $depositAmount = request('depositAmt');

        $isUser = User::where("userID", $userID )->exists();

        $role = User::where('userID', $adminID)->value('status');

        if ($role == 'ADMIN') {
            if ($isUser) {
                //balanceAmount
                return User::where('userID', $userID)->increment('balanceAmount', $depositAmount) == 1 ?
                ['message' => 'Successfully deposited '.$depositAmount.' to user '.$userID] :
                ['message' => 'Something went wrong and could not process deposit.'];
            } else {
                return  response(['message' => 'user with id '. $userID .' does not exist'], 404);
            }

        } else {
            abort(response()->json(
                [
                            'message' => 'Unauthorized',
                        ],
                401
            ));
        }
    }


    //get All Transaction (Only for admins)
    public function getAllTransaction(){

        request()->validate([
            'userID' => 'required'
        ]);

        $userID = request('userID');

        $role = User::where('userID', $userID)->value('status');

        if($role == 'ADMIN'){
            $transactions = Payment::all();


            return $transactions;

        }else{
            abort(response()->json(
                [
                            'message' => 'Unauthorized',
                        ],
                401
            ));
        }




    }

}