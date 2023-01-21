<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Projectnew;
use App\Models\Expertpeople;
use App\Models\Projectdocument;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function list() {
        $projectnews = Projectnew::orderBy('created_at', 'DESC')->paginate(12);
         return view('front.projects.list', compact('projectnews'));
    }

    public function show($slug)
    {
        $expertpeoples = Expertpeople::orderBy('created_at', 'DESC')->paginate(1);
        $projectdocuments = Projectdocument::orderBy('created_at', 'DESC')->paginate(3);
        $projectnew = Projectnew::where('slug_uz', $slug)
            ->orWhere('slug_ru', $slug)
            ->orWhere('slug_en', $slug)
            ->first();
       return view('front.projects.show', compact(
            'projectnew',
            'expertpeoples',
            'projectdocuments'
        ));
    }
}
