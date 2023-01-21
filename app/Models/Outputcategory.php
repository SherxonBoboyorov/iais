<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outputcategory extends Model
{
    use HasFactory;

    protected $table = 'outputcategories';

    protected $fillable = [
        'title_ru', 'title_uz', 'title_en'
    ];

    public function outputnews() {
        return $this->hasMany(Outputnew::class);
    }
}
