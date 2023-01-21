<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Aboutmission;
use Illuminate\Http\Request;

class AboutmissionsController extends Controller
{
    public function index()
    {
        $aboutmissions = Aboutmission::orderBy('created_at', 'DESC')->get();

        return view('front.what_we_stand_for', compact(
            'aboutmissions'
        ));
    }
}
