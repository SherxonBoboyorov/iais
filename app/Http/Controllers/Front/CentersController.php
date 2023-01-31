<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Centerabout;
use App\Models\Expertpeople;
use App\Models\Outputnew;
use Illuminate\Http\Request;

class CentersController extends Controller
{
    public function list() {
         $centerabouts = Centerabout::orderBy('created_at', 'DESC')->paginate(12);
         return view('front.centers.list', compact('centerabouts'));
    }

    public function show($slug)
    {
        $centerabout = Centerabout::where('slug_uz', $slug)
        ->orWhere('slug_ru', $slug)
        ->orWhere('slug_en', $slug)
        ->first();
        $director = Expertpeople::orderBy('created_at', 'DESC')->where('centerabout_id',$centerabout->id)->where('is_director',true)->first();

        $expertpeoples = Expertpeople::orderBy('created_at', 'DESC')->where('centerabout_id',$centerabout->id)->where('is_director',false)->paginate(4);
        $outputnews = Outputnew::orderBy('created_at', 'DESC')->where('centerabout_id', $centerabout->id)->paginate(3);

        return view('front.centers.show', compact(
            'centerabout',
            'expertpeoples',
            'outputnews',
            'director'
        ));
    }
}
