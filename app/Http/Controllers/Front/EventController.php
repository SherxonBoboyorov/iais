<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Eventproduct;
use App\Models\Expertpeople;
use App\Models\Centerfilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EventController extends Controller
{
    public function list($id)
    {
        $upcoming = Eventproduct::where('event_date',">=",now())->orderBy('created_at', 'DESC')->paginate(6);
        $past = Eventproduct::where('event_date',"<=",now())->orderBy('created_at', 'DESC')->paginate(6);

        $events = Eventproduct::select(DB::raw('YEAR(created_at) as year'))->distinct()->pluck('year')->toArray();

        $centerFilter = Centerfilter::orderBy('created_at', 'DESC')->with('centerabouts')->get();

         return view('front.events.list', compact(
            'upcoming',
            'past',
            'events',
            'centerFilter'
        ));
    }


    public function ajaxEventFilterList(Request $request){
        $centersId = $request->center_id;
        $dates = $request->dates;
        $l= $request->l;
        $past =  Eventproduct::orderBy('created_at', 'DESC');
        if(isset($l)&&!empty($l)){
            if($l=='2'){
                $past = $past->where('event_date',"<=",now());
            }
            else{
                $past = $past->where('event_date',">=",now());
            }
        }

        if(isset($centersId)&&!empty($centersId)){
            $past = $past->whereIn('centerabout_id',$centersId);
        }

        if(isset($dates)&&!empty($dates)){
            $past = $past->whereYear('created_at',$dates);
        }
        $past = $past->paginate(6);

        return response(view('front.events.event_filter_result',['past'=>$past]));
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
