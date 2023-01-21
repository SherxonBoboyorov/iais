<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Eventproduct;
use App\Models\Eventcategory;
use App\Models\Expertpeople;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function list($id)
    {
        $eventcategories = Eventcategory::orderBy('created_at', 'DESC')->with('eventproducts')->get();

        $eventproducts =  Eventproduct::where('eventcategory_id', $id)->orderBy('created_at', 'DESC')->paginate(6);
         return view('front.events.list', compact('eventcategories', 'eventproducts', 'id'));
    }

    public function show($slug)
    {
       $expertpeoples = Expertpeople::orderBy('created_at', 'DESC')->paginate(1);
       $eventproduct = Eventproduct::where('slug_uz', $slug)
            ->orWhere('slug_ru', $slug)
            ->orWhere('slug_en', $slug)
            ->first();
       return view('front.events.show', compact('eventproduct', 'expertpeoples'));
    }
}
