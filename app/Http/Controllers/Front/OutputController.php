<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Outputnew;
use App\Models\Outputcategory;
use App\Models\Expertpeople;
use Illuminate\Http\Request;
use App\Models\Centerfilter;
use Illuminate\Support\Facades\DB;
class OutputController extends Controller
{
    public function list($id)
    {
        $outputcategories = Outputcategory::orderBy('created_at', 'DESC')->with('outputnews')->get();

        $outputnews =  Outputnew::where('outputcategory_id', $id)->orderBy('created_at', 'DESC')->paginate(6);

        $outputs = Outputnew::select(DB::raw('YEAR(created_at) as year'))->distinct()->pluck('year')->toArray();

        $centerFilter = Centerfilter::orderBy('created_at', 'DESC')->with('centerabouts')->get();

        return view('front.outputs.list', compact(
             'outputnews',
             'outputcategories',
             'id',
             'outputs',
             'centerFilter'
        ));
    }

    public function ajaxFilterList(Request $request){
        $centersId = $request->center_id;
        $dates = $request->dates;
        $outputnews =  Outputnew::orderBy('created_at', 'DESC');
        if(isset($centersId)&&!empty($centersId)){
            $outputnews = $outputnews->whereIn('centerabout_id',$centersId);
        }

        if(isset($dates)&&!empty($dates)){
            $outputnews = $outputnews->whereYear('created_at',$dates);
        }
        $outputnews = $outputnews->paginate(6);

        return response(view('front.outputs.filter_result',['outputnews'=>$outputnews]));
    }

    public function show($slug)
    {
        $expertpeoples = Expertpeople::orderBy('created_at', 'DESC')->paginate(1);
        $outputnew = Outputnew::where('slug_uz', $slug)
            ->orWhere('slug_ru', $slug)
            ->orWhere('slug_en', $slug)
            ->first();

        return view('front.outputs.show', [
            'expertpeoples' => $expertpeoples,
            'outputnew' => $outputnew,
            'outputnews' => Outputnew::where([
                ['outputcategory_id', $outputnew->outputcategory_id],
                ['id', '!=', $outputnew->id]
            ])->inRandomOrder()->take(4)->get()
        ]);
    }

}
