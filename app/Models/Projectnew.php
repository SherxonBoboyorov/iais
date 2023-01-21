<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Projectnew extends Model
{
    use HasFactory;

    protected $table = 'projectnews';

    protected $fillable = [
        'expertpeople_id',
        'image',
        'title_ru', 'title_uz', 'title_en',
        'slug_ru', 'slug_uz', 'slug_en',
        'description_ru', 'description_uz', 'description_en',
        'ongoing_name_ru', 'ongoing_name_uz', 'ongoing_name_en',
        'ongoing_content_ru', 'ongoing_content_uz', 'ongoing_content_en',
        'frame'
    ];

    public function expertpeople()
    {
        return $this->belongsTo('App\Models\Expertpeople', 'expertpeople_id');
    }

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/projectnew/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/projectnew/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $projectnew): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $projectnew->image)) {
                File::delete(public_path() . $projectnew->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/projectnew/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/projectnew/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $projectnew->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/projectnew/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/projectnew/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
