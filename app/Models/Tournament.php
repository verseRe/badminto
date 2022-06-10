<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_type', 'match_name', 'match_venue', 'match_start_date', 'match_end_date', 'match_start_time', 'finished', 'match_fee','image_url','chat_url'
    ];
}