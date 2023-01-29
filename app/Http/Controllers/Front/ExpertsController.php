<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Centerabout;
use App\Models\Expertpeople;
use App\Models\Outputnew;
use Illuminate\Http\Request;
use App\Models\CenterFilter;
use Illuminate\Support\Facades\DB;

class ExpertsController extends Controller
{
    public function list() {
        $expertpeoples = Expertpeople::orderBy('created_at', 'DESC')->paginate(12);
        $centerFilter = CenterFilter::orderBy('created_at', 'DESC')->with('centerabouts')->paginate(4);
        return view('front.experts.list', compact('expertpeoples', 'centerFilter'));
    }


    public function ajaxExpertFilterList(Request $request){
        $centersId = $request->center_id;
        $q = $request->q;
        $expertpeoples =  Expertpeople::orderBy('created_at', 'DESC');
        if(isset($centersId)&&!empty($centersId)){
            $expertpeoples = $expertpeoples->whereIn('centerabout_id',$centersId);
        }

        if(isset($q)&&!empty($q)){
            $expertpeoples = $expertpeoples->orWhere('title_uz','LIKE','%'.$q.'%')
            ->orWhere('title_ru','LIKE','%'.$q.'%')
            ->orWhere('title_en','LIKE','%'.$q.'%');
        }

        $expertpeoples = $expertpeoples->paginate(12);

        return response(view('front.experts.expert_result',['expertpeoples'=>$expertpeoples]));
    }

    public function ajaxFilterDetails(Request $request){
        $centersId = $request->id;
        $lim = $request->lim;
        $centerabout =  Centerabout::query();
       
        if(isset($centersId)&&!empty($centersId)){

            $centerabout = $centerabout->where('centerfilter_id',$centersId);
        }
        if(isset($lim)&&!empty($lim)){
            $centerabout = $centerabout->limit(2);
        }

        $centerabout = $centerabout->get();
 
        return response(view('front.experts._filter_details',['centerabouts'=>$centerabout]));
    }
    public function show($slug)
    {
         $expertpeople = Expertpeople::where('slug_uz', $slug)
            ->orWhere('slug_ru', $slug)
            ->orWhere('slug_en', $slug)
            ->first();
         $outputnews = Outputnew::orderBy('created_at', 'DESC')->where('expertpeople_id', $expertpeople->id)->paginate(6);

         return view('front.experts.show', compact(
            'expertpeople',
            'outputnews'
        ));
    }
}
