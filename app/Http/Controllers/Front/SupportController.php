<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Supportabout;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
    {
        $supportabouts = Supportabout::all();

        return view('front.support', compact('supportabouts'));
    }
}
