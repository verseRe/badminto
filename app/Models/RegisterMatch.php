<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterMatch extends Model
{
    use HasFactory;
    protected $fillable = [
        'tournamentID', 'userID', 'paymentID', 'paymentStatus', 'isFriendly', 'acceptStatus'
    ];
}