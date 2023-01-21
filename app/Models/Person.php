<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Person extends Model
{
    use HasFactory;

    protected $table = 'people';

    protected $fillable = [
        'aboutperson_id',
        'image',
        'name_ru', 'name_uz', 'name_en',
        'content_ru', 'content_uz', 'content_en',
    ];

    public function aboutperson()
    {
        return $this->belongsTo('App\Models\Aboutperson', 'aboutperson_id');
    }


    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/person/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/person/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $person): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $person->image)) {
                File::delete(public_path() . $person->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/person/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/person/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $person->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/person/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/person/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
