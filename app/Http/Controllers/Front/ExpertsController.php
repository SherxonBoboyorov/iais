<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Expertpeople;
use App\Models\Outputnew;
use Illuminate\Http\Request;
use App\Models\CenterFilter;
use Illuminate\Support\Facades\DB;

class ExpertsController extends Controller
{
    public function list() {
         $expertpeoples = Expertpeople::orderBy('created_at', 'DESC')->paginate(12);
        $centerFilter = CenterFilter::orderBy('created_at', 'DESC')->with('centerabouts')->get();

         return view('front.experts.list', compact('expertpeoples', 'centerFilter'));
    }


    public function ajaxExpertFilterList(Request $request){
        $centersId = $request->center_id;
        $expertpeoples =  Expertpeople::orderBy('created_at', 'DESC');
        if(isset($centersId)&&!empty($centersId)){
            $expertpeoples = $expertpeoples->whereIn('centerabout_id',$centersId);
        }

        $expertpeoples = $expertpeoples->paginate(12);

        return response(view('front.experts.expert_result',['expertpeoples'=>$expertpeoples]));
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
