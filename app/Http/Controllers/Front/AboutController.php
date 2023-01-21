<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use App\Models\Aboutperson;
use App\Models\Person;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {

        $aboutuses = Aboutus::orderBy('created_at', 'DESC')->get();
        $aboutpeople = Aboutperson::with('persons')->orderBy('created_at', 'DESC')->get();

        return view('front.about_us', compact(
            'aboutuses',
            'aboutpeople'
        ));
    }
}
