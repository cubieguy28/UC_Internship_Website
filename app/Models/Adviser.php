<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adviser extends Model
{
    use HasFactory;

    protected $fillable = [
        'adviser_fname',
        'adviser_lname',
        'adviser_designation',
        'adviser_filename',

    ];
}
