<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactcenter extends Model
{
    use HasFactory;

    protected $table = 'contactcenters';

    protected $fillable = [
        'title_ru', 'title_uz', 'title_en',
        'phone_number',
        'email',
    ];
}
