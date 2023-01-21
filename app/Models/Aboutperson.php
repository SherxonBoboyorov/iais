<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutperson extends Model
{
    use HasFactory;

    protected $table = 'aboutpeople';

    protected $fillable = [
        'name_ru', 'name_uz', 'name_en'
    ];

    public function persons(){
        return $this->hasMany(Person::class);
    }

}
