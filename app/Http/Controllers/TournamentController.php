<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\User;
use App\Models\RegisterMatch;
use App\Models\UserNotification;

class TournamentController extends Controller
{
    /**
     * Display a listing of tournaments.
     */
    public function indexEdit()
    {
        $tp_tournaments = Tournament::all()->where('match_type', '3rd Party')->where('finished', '0'); //Fetch all 3rd tournaments from DB
        $f_tournaments = Tournament::all()->where('match_type', 'Friendly')->where('finished', '0'); //Fetch all friendly tournaments from DB
        $int_tournaments = Tournament::all()->where('match_type', 'Internal')->where('finished', '0'); //Fetch all internal tournaments from DB

        $notify_count = UserNotificationController::getNotification();

        return view("tournament.edit.index", ['tp_tournaments' => $tp_tournaments, 'f_tournaments' => $f_tournaments, 'int_tournaments' => $int_tournaments, 'notification' => $notify_count]);
    }

    /**
     * Display the details of the tournament
     */
    public function editView(Request $request)
    {
        $match_id = $request->input('match_id');
        $tournament = Tournament::where('id', $match_id)->first(); // Fetch tournament details
        return view("tournament.edit.edit_form", ['tournament' => $tournament]);
    }

    /**
     * Update the details of the tournament
     */
    public function update(Request $request) {
        
        // Retrieving input from user
        $match_id = $request->match_id;
        $match_name = $request->match_name;
        $match_venue = $request->match_venue;
        $match_start_date = $request->match_start_date;
        $match_end_date = $request->match_end_date;
        $match_start_time = $request->match_time;

        // Fetching tournament details
        $old_match = Tournament::all()->where('id', $match_id)->first();

        // Checking if any details are changed
        $changes = false;
        if ($match_name != $old_match->match_name || $match_venue != $old_match->match_venue || $match_start_date != $old_match->match_start_date || $match_end_date != $old_match->match_end_date || $match_start_time != $old_match->match_start_time) {
            $changes = true;
        }

        if ($request->match_type == 'Friendly') {

            $chat_url = $request->chat_link;

            // Checking if chat url is changed
            if ($chat_url != $old_match->chat_url) {
                $changes = true;
            }

            // Update tournament details if there are any changes
            if ($changes) {
                // Tournament Update
                Tournament::where('id', $match_id)->update([
                    'match_name' => $match_name,
                    'match_venue' => $match_venue,
                    'match_start_date' => $match_start_date,
                    'match_end_date' => $match_end_date,
                    'match_start_time' => $match_start_time,
                    'chat_url' => $chat_url
                ],);
    
                // Notification
                $notification_id = NotificationController::editMatch($match_id, $old_match->match_name); // Create notifcation
                UserNotificationController::blastInvolvedUser($notification_id, $match_id); // Blast notification
            }

            // Fetch only invited users
            $invited_player_list = RegisterMatch::select('register_matches.userID', 'register_matches.acceptStatus', 'users.name')->join('users', 'register_matches.userID', '=', 'users.userID')->where('tournamentID', $match_id)->get();
            // Fetch only uninvited users
            $uninvited_player_list = User::whereNotIn('userID', function($subquery) use ($match_id) {
                $subquery->select('userID')
                ->from(with(new RegisterMatch)->getTable())
                ->whereIn('acceptStatus', ['Pending', 'Accept', 'Reject'])
                ->where('tournamentID', $match_id);
            })->get();

            // Redirect to choose players
            return view("tournament.edit.edit_player_form", ['uinv_player' => $uninvited_player_list, 'inv_player' => $invited_player_list, 'match_id' => $match_id]);
        }
        else {

            $match_fee = $request->match_fee;

            // Checking if match fee is changed
            if ($match_fee != $old_match->match_fee) {
                $changes = true;
            }

            if ($request->hasFile('banner_image')) { // If the user upload a banner image -> changes is true

                $file = $request->file('banner_image');

                // Check file extension
                $extension = $file->getClientOriginalExtension();
                if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg' ) {
                    // Redirect back with error
                    return redirect('/')->with('error', 'File is not image');
                    die();
                }
        
                // Move Uploaded File
                $destinationPath = 'C:\Users\Rober\xampp\htdocs\atom\badminto\resources\views\tournament\media\\'; // CHANGE
                $newFileName = $match_id . '.' . $file->getClientOriginalExtension();

                $image_url = $destinationPath . $newFileName;

                // Update tournament details
                Tournament::where('id', $match_id)->update([
                    'match_name' => $match_name,
                    'match_venue' => $match_venue,
                    'match_start_date' => $match_start_date,
                    'match_end_date' => $match_end_date,
                    'match_start_time' => $match_start_time,
                    'match_fee' => $match_fee,
                    'image_url' => $image_url
                ],);

                // Notification
                $notification_id = NotificationController::editMatch($match_id, $old_match->match_name);
                UserNotificationController::blastInvolvedUser($notification_id, $match_id);

                // Remove old picture (Brute force style)
                if (file_exists($destinationPath . $match_id . '.png')) {
                    unlink($destinationPath . $match_id . '.png');
                }
                else if (file_exists($destinationPath . $match_id . '.jpg')) {
                    unlink($destinationPath . $match_id . '.jpg');
                }
                else if (file_exists($destinationPath . $match_id . '.jpeg')) {
                    unlink($destinationPath . $match_id . '.jpeg');
                }

                // Move new picture
                $file->move($destinationPath,$newFileName);
            }
            else { // If the user does not upload any banner image

                if ($changes) {
                // Update tournament details
                Tournament::where('id', $match_id)->update([
                    'match_name' => $match_name,
                    'match_venue' => $match_venue,
                    'match_start_date' => $match_start_date,
                    'match_end_date' => $match_end_date,
                    'match_start_time' => $match_start_time,
                    'match_fee' => $match_fee
                ],);

                // Notification
                $notification_id = NotificationController::editMatch($match_id, $old_match->match_name);
                UserNotificationController::blastInvolvedUser($notification_id, $match_id);
                }

            }

        }

        // Redirect to view tournament details
        return redirect('/')->with('status', 'Tournament Form Data Has Been inserted');
    }

    /**
     * Invite the selected player
     */
    public function playerUpdate(Request $request) {

        // Retrieving input from user
        $match_id = $request->match_id;
        $player_list = $request->newPlayerList;

        // Fetching tournament details
        $match_name = (Tournament::select('match_name')->where('id', $match_id)->first())->match_name;

        if (!empty($player_list)) {

            // Notification
            $notification_id = NotificationController::inviteMatch($match_id, $match_name);

            if (is_array($player_list)) {
                foreach ($player_list as $player) {
                    RegisterMatch::insert(
                        array(
                            'tournamentID' => $match_id,
                            'userID' => $player,
                            'paymentID' => '0',
                            'paymentStatus' => '0',
                            'isFriendly' => '1',
                            'acceptStatus' => 'Pending'
                        )
                    );
                    UserNotificationController::blastSingleUser($notification_id, $player);
                }
            }
            else {
                RegisterMatch::insert(
                    array(
                        'tournamentID' => $match_id,
                        'userID' => $player_list,
                        'paymentID' => '0',
                        'paymentStatus' => '0',
                        'isFriendly' => '1',
                        'acceptStatus' => 'Pending'
                    )
                );
                UserNotificationController::blastSingleUser($notification_id, $player_list);
            }
        }
        
        // Redirect to view tournament details
        return redirect('/')->with('status', '');
    }

    /**
     * The player redirect to the tournament page
     */
    public function viewTournamentFromNotification(Request $request) {

        // Get all the values
        $match_id = $request->match_id;
        $notification_id = $request->notification_id;
        $user_id = '1'; // CHANGE: to session userID
        $tournament = Tournament::all()->where('id', $match_id)->first();

        // Set the 'seen' value of the notification
        UserNotification::where(['id' => $notification_id, 'userID' => $user_id])->update([
            'seen' => '1'
        ],);
        
        return view("tournament.view_form", ['tournament' => $tournament]);
    }

    /**
     * The player redirect to the invitation page from notification page
     */
    public function inviteResponse(Request $request) {

        // Get all the values
        $match_id = $request->match_id;
        $notification_id = $request->notification_id;
        $user_id = '1'; // CHANGE: to session userID
        $tournament = Tournament::all()->where('id', $match_id)->first();

        // Set the 'seen' value of the notification
        UserNotification::where(['id' => $notification_id, 'userID' => $user_id])->update([
            'seen' => '1'
        ],);

        // Check if the user has already response previously
        $status = (RegisterMatch::select('acceptStatus')->where(['tournamentID' => $match_id, 'userID' => '1'])->first())->acceptStatus;
        
        if ($status == "Accept") {
            return view("tournament.invitation_response_form", ['tournament' => $tournament,'message' => 'You already accepted this invitation.', 'status' => 'Accepted']);
        }
        else if ($status == "Reject") {
            return view("tournament.invitation_response_form", ['tournament' => $tournament,'message' => 'You already rejected this invitation.', 'status' => 'Rejected']);
        }
        
        return view("tournament.invitation_response_form", ['tournament' => $tournament, 'message' => '']);
    }

    /**
     * Player accept the invitation
     */
    public function acceptInvitation(Request $request) {

        $match_id = $request->match_id;
        $user_id = '1'; // CHANGE: to session userID
        
        RegisterMatch::where(['tournamentID' => $match_id, 'userID' => $user_id])->update([
            'acceptStatus' => 'Accept'
        ],);
        
        return redirect('/');
    }

    /**
     * Player reject the invitation
     */
    public function rejectInvitation(Request $request) {

        $match_id = $request->match_id;
        $user_id = '1'; // CHANGE: to session userID
        
        RegisterMatch::where(['tournamentID' => $match_id, 'userID' => $user_id])->update([
            'acceptStatus' => 'Reject'
        ],);
        
        return redirect('/');
    }

    /**
     * Close the match
     */
    public function closeMatch(Request $request)
    {
        $match_id = $request->input('match_id');
        Tournament::where('id', $match_id)->update([
            'finished' => '1'
        ],);
        
        // Redirect to view tournament details
        return redirect('/');
    }

}
