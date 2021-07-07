<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'testimonial_fname',
        'testimonial_lname',
        'testimonial_title',
        'testimonial_testimony',
        'testimonial_filename',
    ];
}
