<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_name',
        'partner_description',
        'partner_category',
        'partner_contact_person_fname',
        'partner_contact_person_lname',
        'partner_email',
        'partner_mobile_number',
        'partner_landline_number',
        'partner_tagline',
        'partner_link',
        'partner_filename',
        
    ];
}
