<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ourcontact extends Model
{
    use HasFactory;

    protected $table = 'ourcontacts';

    protected $fillable = [
        'phone_number',
        'fax',
        'email',
        'adsress_ru', 'adsress_uz', 'adsress_en',
        'landmarks_ru', 'landmarks_uz', 'landmarks_en'
    ];
}
