<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Outputnew;
use App\Models\Article;
use App\Models\Video;
use App\Models\Eventproduct;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\Options;
use Illuminate\Http\RedirectResponse;
use App\Models\Youremail;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class IndexController extends Controller
{
    public function hompage()
    {
        Meta::setTitle(Options::where('key', 'meta_title_' . LaravelLocalization::getCurrentLocale())->first()->value);
        Meta::setDescription(Options::where('key', 'meta_description_' . LaravelLocalization::getCurrentLocale())->first()->value);

        $sliders = Slider::orderBy('created_at', 'DESC')->get();
        $outputnews = Outputnew::orderBy('created_at', 'DESC')->take(6)->get();
        $articles = Article::orderBy('created_at', 'DESC')->paginate(3);
        $videos = Video::orderBy('created_at', 'DESC')->get();
        $eventproductMain = Eventproduct::orderBy('created_at', 'DESC')->first();
        $eventproducts = Eventproduct::orderBy('created_at', 'DESC')->where('id','!=',$eventproductMain->id)->paginate(3);

        return view('front.index', compact(
            'sliders',
            'outputnews',
            'articles',
            'videos',
            'eventproducts',
            'eventproductMain'
        ) );
    }


         /**
     * @throws ValidationException
     */
    public function yourSave(Request $request): RedirectResponse
    {
        $data =  $request->validate([
          'email' => 'required',
       ]);
         Youremail::create($data);

        return back()->with('message', 'unable to sending');

    }
}
