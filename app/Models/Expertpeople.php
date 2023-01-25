<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use DB;
use App\Models\Director;

class Expertpeople extends Model
{
    use HasFactory;

    protected $table = 'expertpeoples';

    protected $fillable = [
        'image',
        'centerabout_id',
        'title_ru', 'title_uz', 'title_en',
        'slug_ru', 'slug_uz', 'slug_en',
        'contact_ru', 'contact_uz', 'contact_en',
        'content_ru', 'content_uz', 'content_en',
        'biography_ru', 'biography_uz', 'biography_en',
        'publication_ru', 'publication_uz', 'publication_en'
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
                    public_path() . '/upload/expertpeople/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/expertpeople/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $expertpeople): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $expertpeople->image)) {
                File::delete(public_path() . $expertpeople->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/expertpeople/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/expertpeople/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $expertpeople->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/expertpeople/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/expertpeople/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }

    public function director(){
        return $this->hasOne(Director::class,'expertpeoples_id','id');
    }
}
