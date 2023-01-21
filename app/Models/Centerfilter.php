<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centerfilter extends Model
{
    use HasFactory;

    protected $table = 'centerfilters';

    protected $fillable = [
        'tropic_ru', 'tropic_uz', 'tropic_en'
    ];

    public function centerabouts() {
        return $this->hasMany(Centerabout::class);
    }
}
