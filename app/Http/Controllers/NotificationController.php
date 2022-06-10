<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{

    /**
     * Create the notification after a match has been created
     */
    public static function createMatch($match_id)
    {
        return Notification::insertGetId(
            array(
                'tournamentID' => $match_id,
                'type' => 'Create',
                'content' => 'A new match has been created!',
                'created_at' => NOW()
            )
        );
    }

    /**
     * Create the notification after a match has been edited
     */
    public static function editMatch($match_id, $old_match_name)
    {
        return Notification::insertGetId(
            array(
                'tournamentID' => $match_id,
                'type' => 'Edit',
                'content' => 'Some details on ' . $old_match_name . ' have changed!',
                'created_at' => NOW()
            )
        );
    }

    /**
     * Create the notification after a player has been invited
     */
    public static function inviteMatch($match_id, $match_name)
    {
        return Notification::insertGetId(
            array(
                'tournamentID' => $match_id,
                'type' => 'Invite',
                'content' => 'You have been invited to join ' . $match_name . '!',
                'created_at' => NOW()
            )
        );
    }

}
