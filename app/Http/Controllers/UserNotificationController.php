<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserNotification;
use App\Models\User;
use App\Models\RegisterMatch;
use Session;

class UserNotificationController extends Controller
{

    /**
     * Return the number of unseen notification
     * Usage: Notification Bell
     */
    public static function getNotification()
    {
        Session::put('user_id','1'); // CHANGE
        $user_id = Session::get('user_id');

        $notifications = UserNotification::all()->where('userID', $user_id)->where('seen', '0'); //Fetch all notifications
        return count($notifications);
    }

    /**
     * Display the notifications for the user
     * Usage: Notification page
     */
    public static function index()
    {
        Session::put('user_id','1'); // CHANGE
        $user_id = Session::get('user_id');

        $notifications = UserNotification::select(
            'user_notifications.userID',
            'user_notifications.seen',
            'notifications.id',
            'notifications.tournamentID',
            'notifications.content',
            'notifications.type'
        )->join('notifications', 'user_notifications.id', '=', 'notifications.id')
        ->where('userID', $user_id)
        ->orderBy('notifications.created_at', 'DESC')->get(); //Fetch all notifications
        return view("notification.index", ['notifications' => $notifications]);
    }

    /**
     * Blast the notification to all user
     * Usage: Create Tournament
     */
    public static function blastAllUser($notification_id)
    {
        // Get all users id
        $user_list = User::select('userID')->get();;

        // Blasting to all users
        if (!empty($user_list)) {
            foreach($user_list as $user) {
                UserNotification::insert(
                    array(
                        'id' => $notification_id,
                        'userId' => $user->userID,
                        'seen' => 0
                    )
                );
            }
        }

        return 1;
    }

    /**
     * Blast the notification to involved user
     * Usage: Edit tournament
     */
    public static function blastInvolvedUser($notification_id, $match_id)
    {
        // Get all users id
        $user_list = RegisterMatch::select('userID')->where('tournamentID', $match_id)->get();

        // Blasting to all users
        if (!empty($user_list)) {
            foreach($user_list as $user) {
                UserNotification::insert(
                    array(
                        'id' => $notification_id,
                        'userId' => $user->userID,
                        'seen' => 0
                    )
                );
            }
        }

        return 1;
    }

    /**
     * Blast the notification to a specific user
     * Usage: Invite player
     */
    public static function blastSingleUser($notification_id, $user_id)
    {
        UserNotification::insert(
            array(
                'id' => $notification_id,
                'userId' => $user_id,
                'seen' => 0
            )
        );

        return 1;
    }
}
