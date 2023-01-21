<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;


class Centerabout extends Model
{
    use HasFactory;

    protected $table = 'centerabouts';

    protected $fillable = [
        'image',
        'centerfilter_id',
        'title_ru', 'title_uz', 'title_en',
        'slug_ru', 'slug_uz', 'slug_en',
        'description_ru', 'description_uz', 'description_en',
    ];

    public function centerfilter()
    {
        return $this->belongsTo('App\Models\Centerfilter', 'centerfilter_id');
    }

    public function directors() {
        return $this->hasMany(Director::class)->take(1);
    }


    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/centerabout/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/centerabout/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $centerabout): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $centerabout->image)) {
                File::delete(public_path() . $centerabout->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/centerabout/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/centerabout/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $centerabout->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/centerabout/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/centerabout/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
