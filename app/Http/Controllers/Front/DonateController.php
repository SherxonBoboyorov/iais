<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Donateabout;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function index()
    {
        $donateabouts = Donateabout::all();

        return view('front.donate', compact('donateabouts'));
    }
}
