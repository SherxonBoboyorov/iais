<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutwhat extends Model
{
    use HasFactory;

    protected $table = 'aboutwhats';

    protected $fillable = [
        'title_ru', 'title_uz', 'title_en',
        'content_ru', 'content_uz', 'content_en'
    ];
}
