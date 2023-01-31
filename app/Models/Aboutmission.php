<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;


class Aboutmission extends Model
{
    use HasFactory;

    protected $table = 'aboutmissions';

    protected $fillable = [
        'image',
        'title_ru', 'title_uz', 'title_en',
        'content_ru', 'content_uz', 'content_en'
    ];

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/aboutmission/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/aboutmission/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $aboutmission): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $aboutmission->image)) {
                File::delete(public_path() . $aboutmission->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/aboutmission/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/aboutmission/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $aboutmission->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/aboutmission/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/aboutmission/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
