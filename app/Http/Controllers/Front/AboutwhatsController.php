<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Aboutwhat;
use Illuminate\Http\Request;

class AboutwhatsController extends Controller
{
    public function index()
    {
        $aboutwhats = Aboutwhat::orderBy('created_at', 'DESC')->get();

        return view('front.what_we_do', compact(
            'aboutwhats'
        ));
    }
}
