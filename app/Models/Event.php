<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'event_date',
        'event_description',
        'event_speaker_fname',
        'event_speaker_lname',
        'event_category',
        'event_time',
        'event_participant',
        'event_filename',
        'image_counter',
    ];

}
