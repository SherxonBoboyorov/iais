<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Director extends Model
{
    use HasFactory;

    protected $table = 'directors';

    protected $fillable = [
        'image',
        'centerabout_id',
        'expertpeople_id',
        'director_name_ru', 'director_name_uz', 'director_name_en',
        'job_title_ru', 'job_title_uz', 'job_title_en',
        'phone_number',
        'reception_days_ru', 'reception_days_uz', 'reception_days_en',
        'email',
        'center_for_sustianable_ru', 'center_for_sustianable_uz', 'center_for_sustianable_en',
        'development_ru', 'development_uz', 'development_en'
    ];

    public function centerabout()
    {
        return $this->belongsTo('App\Models\Centerabout', 'centerabout_id');
    }

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/director/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/director/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $director): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $director->image)) {
                File::delete(public_path() . $director->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/director/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/director/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $director->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/director/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/director/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
