<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos';

    protected $fillable = [
        'image',
        'title_ru', 'title_uz', 'title_en',
        'frame'
    ];

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/video/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/video/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $video): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $video->image)) {
                File::delete(public_path() . $video->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/video/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/video/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $video->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/video/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/video/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
