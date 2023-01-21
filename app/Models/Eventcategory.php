<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventcategory extends Model
{
    use HasFactory;

    protected $table = 'eventcategories';

    protected $fillable = [
        'title_ru', 'title_uz', 'title_en'
    ];

    public function eventproducts(){
        return $this->hasMany(Eventproduct::class)->latest()->take(6);
    }
}
