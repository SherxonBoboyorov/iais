<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outputnew;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if(strlen($request->phrase) < 0) {
            return redirect()->route('/');
        }

        $outputnews = Outputnew::whereLike(['title_uz', 'title_ru', 'title_en'], $request->phrase)->get();
        return view('front.search', compact('outputnews'));
    }
}
