<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateOutputnew;
use App\Http\Requests\Admin\UpdateOutputnew;
use App\Models\Outputnew;
use App\Models\Outputcategory;
use App\Models\Expertpeople;
use App\Models\Centerabout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class OutputnewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outputnews = Outputnew::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.outputnew.index', [
            'outputnews' => $outputnews
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $outputcategories = Outputcategory::orderby('created_at', 'DESC')->get();
        $expertpeoples = Expertpeople::orderBy('created_at', 'DESC')->get();
        $centerabouts = Centerabout::orderBy('created_at', 'DESC')->get();

        return view('admin.outputnew.create', [
            'outputcategories' => $outputcategories,
            'expertpeoples' => $expertpeoples,
            'centerabouts' => $centerabouts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateOutputnew  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOutputnew $request)
    {
        $data = $request->all();

        $data['image'] = Outputnew::uploadImage($request);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if (Outputnew::create($data)) {
            return redirect()->route('outputnew.index')->with('message', "Outputs created successfully");
        }
        return redirect()->route('outputnew.index')->with('message', "unable to created Outputs");

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
    public function edit(Outputnew $outputnew)
    {
        $outputcategory = Outputcategory::orderBy('created_at', 'DESC')->get();
        $expertperson = Expertpeople::orderBy('created_at', 'DESC')->get();
        $centerabout = Centerabout::orderBy('created_at', 'DESC')->get();

        return view('admin.outputnew.edit', [
            'outputcategory' => $outputcategory,
            'expertperson' => $expertperson,
            'centerabout' => $centerabout,
            'outputnew' => $outputnew
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateOutputnew $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOutputnew $request, $id)
    {
        if (!Outputnew::find($id)) {
            return redirect()->route('outputnew.index')->with('message', "Outputs not fount");
        }

        $outputnew = Outputnew::find($id);

        $data = $request->all();
        $data['image'] = Outputnew::updateImage($request, $outputnew);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if ($outputnew->update($data)) {
            return redirect()->route('outputnew.index')->with('message', "Outputs changed successfully");
        }
        return redirect()->route('outputnew.index')->with('message', "Unable to update outputs");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Outputnew::find($id)) {
            return redirect()->route('outputnew.index')->with('message', "Outputs not found");
        }

        $outputnew = Outputnew::find($id);

        if (File::exists(public_path() . $outputnew->image)) {
            File::delete(public_path() . $outputnew->image);
        }

        if ($outputnew->delete()) {
            return redirect()->route('outputnew.index')->with('message', "Outputs deleted successfully");
        }
        return redirect()->route('outputnew.index')->with('message', "unable to delete Outputs");
    }
}
