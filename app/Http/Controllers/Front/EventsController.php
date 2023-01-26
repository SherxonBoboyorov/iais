<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Eventcategory;
use App\Models\Eventproduct;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index() {

        $upcoming = Eventproduct::where('created_at',">=",now())->orderBy('created_at', 'DESC')->limit(3)->get();
        $past = Eventproduct::where('created_at',"<=",now())->orderBy('created_at', 'DESC')->limit(3)->get();

        return view('front.events', compact(
            'upcoming',
            'past'
        ));
    }
}
