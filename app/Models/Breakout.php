<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breakout extends Model
{
    use HasFactory;

    protected $fillable = [

        'breakout_title',
        'breakout_fname',
        'breakout_lname',
        'breakout_designation',
        'breakout_filename',
    ];
}
