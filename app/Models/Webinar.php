<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;

    protected $fillable = [
        'webinar_date',
        'webinar_title',
        'webinar_time',
        'webinar_link',
        'webinar_id',
        'webinar_code',
        'speaker_fname',
        'speaker_lname',
        'speaker_designation',
        'speaker_filename',
    ];

}
