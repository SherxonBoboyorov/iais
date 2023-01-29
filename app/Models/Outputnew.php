<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Outputnew extends Model
{
    use HasFactory;

    protected $table = 'outputnews';

    protected $fillable = [
        'outputcategory_id',
        'expertpeople_id',
        'centerabout_id',
        'image',
        'title_ru', 'title_uz', 'title_en',
        'slug_ru', 'slug_uz', 'slug_en',
        'content_ru', 'content_uz', 'content_en',
    ];


    public function centerabout()
    {
        return $this->belongsTo(Centerabout::class, 'centerabout_id');
    }

    public function expertpeople()
    {
        return $this->belongsTo(Expertpeople::class,'expertpeople_id');
    }

    public function outputcategory()
    {
        return $this->hasOne(Outputcategory::class, 'id', 'outputcategory_id');
    }

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/outputnew/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/outputnew/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $outputnew): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $outputnew->image)) {
                File::delete(public_path() . $outputnew->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/outputnew/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/outputnew/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $outputnew->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/outputnew/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/outputnew/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
