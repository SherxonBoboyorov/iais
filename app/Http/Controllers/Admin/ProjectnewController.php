<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProjectnew;
use App\Http\Requests\Admin\UpdateProjectnew;
use App\Models\Projectnew;
use App\Models\Expertpeople;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProjectnewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectnews = Projectnew::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.projectnew.index', compact('projectnews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expertpeoples = Expertpeople::orderby('created_at', 'DESC')->get();
        return view('admin.projectnew.create', [
            'expertpeoples' => $expertpeoples
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateProjectnew  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectnew $request)
    {
        $data = $request->all();

        $data['image'] = Projectnew::uploadImage($request);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if (Projectnew::create($data)) {
            return redirect()->route('projectnew.index')->with('message', "Projects created seccessfully");
        }
        return redirect()->route('projectnew.index')->with('message', "unable to created Projects");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Projectnew $projectnew)
    {
        $expertpeoples = Expertpeople::orderBy('created_at', 'DESC')->get();

        return view('admin.projectnew.edit', [
            'expertpeoples' => $expertpeoples,
            'projectnew' => $projectnew
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateProjectnew  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectnew $request, $id)
    {
        if (!Projectnew::find($id)) {
            return redirect()->route('projectnew.index')->with('message', "Projects not fount");
        }

        $projectnew = Projectnew::find($id);

        $data = $request->all();
        $data['image'] = Projectnew::updateImage($request, $projectnew);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if ($projectnew->update($data)) {
            return redirect()->route('projectnew.index')->with('message', "Projects changed successfully");
        }
        return redirect()->route('projectnew.index')->with('message', "Unable to update Projects");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Projectnew::find($id)) {
            return redirect()->route('projectnew.index')->with('message', "Projects not found");
        }

        $projectnew = Projectnew::find($id);

        if (File::exists(public_path() . $projectnew->image)) {
            File::delete(public_path() . $projectnew->image);
        }

        if ($projectnew->delete()) {
            return redirect()->route('projectnew.index')->with('message', "Projects deleted successfully");
        }
        return redirect()->route('projectnew.index')->with('message', "unable to delete Projects");
    }
}
