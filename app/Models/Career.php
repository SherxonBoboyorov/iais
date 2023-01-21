<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Career extends Model
{
    use HasFactory;

    protected $table = 'careers';

    protected $fillable = [
        'image',
        'document_title_ru', 'document_title_uz', 'document_title_en',
        'content_ru', 'content_uz', 'content_en'
    ];

    public static function uploadImage($request): ?string
    {
        if ($request->hasFile('image')) {

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/career/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/career/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return null;
    }

    public static function updateImage($request, $career): string
    {
        if ($request->hasFile('image')) {
            if (File::exists(public_path() . $career->image)) {
                File::delete(public_path() . $career->image);
            }

            self::checkDirectory();

            $request->file('image')
                ->move(
                    public_path() . '/upload/career/' . date('d-m-Y'),
                    $request->file('image')->getClientOriginalName()
                );
            return '/upload/career/' . date('d-m-Y') . '/' . $request->file('image')->getClientOriginalName();
        }

        return $career->image;
    }

    private static function checkDirectory(): bool
    {
        if (!File::exists(public_path() . '/upload/career/' . date('d-m-Y'))) {
            File::makeDirectory(public_path() . '/upload/career/' . date('d-m-Y'), $mode = 0777, true, true);
        }

        return true;
    }
}
