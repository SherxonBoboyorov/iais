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
        $aboutpeople = Aboutperson::with('persons')->get();

        return view('front.about_us', compact(
            'aboutuses',
            'aboutpeople'
        ));
    }

    public function personlist($id)
    {
        $aboutpeople = Aboutperson::where('id', $id)->get();
        $person = Person::find($id);

        // dd($person->aboutpeople);

        return view('front.about_us_list', compact(
            'person',
            'aboutpeople',
        ));
    }
}
