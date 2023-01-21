<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareersController extends Controller
{
    public function index()
    {
        $careers = Career::orderBy('created_at', 'DESC')->get();

        return view('front.careers_and_internships', compact(
            'careers'
        ));
    }
}
