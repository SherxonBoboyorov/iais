<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Youremail extends Model
{
    use HasFactory;

    protected $table = 'youremails';

    protected $fillable = [
        'email'
    ];
}
