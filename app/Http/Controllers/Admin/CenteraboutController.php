<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCenterabout;
use App\Http\Requests\Admin\UpdateCenterabout;
use App\Models\Centerabout;
use App\Models\Centerfilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CenteraboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centerabouts = Centerabout::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.centerabout.index', [
            'centerabouts' => $centerabouts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centerfilters = Centerfilter::orderBy('created_at', 'DESC')->get();
        return view('admin.centerabout.create', [
            'centerfilters' => $centerfilters
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateCenterabout  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCenterabout $request)
    {
        $data = $request->all();

        $data['image'] = Centerabout::uploadImage($request);
        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if (Centerabout::create($data)) {
            return redirect()->route('centerabout.index')->with('message', "Centers created seccessfully");
        }
        return redirect()->route('centerabout.index')->with('message', "unable to created Centers");
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
    public function edit(Centerabout $centerabout)
    {
        $centerfilter = Centerfilter::orderBy('created_at', 'DESC')->get();

        return view('admin.centerabout.edit', [
            'centerfilter' => $centerfilter,
            'centerabout' => $centerabout
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateCenterabout  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCenterabout $request, $id)
    {
        if (!Centerabout::find($id)) {
            return redirect()->route('centerabout.index')->with('message', "Centers not fount");
        }

        $centerabout = Centerabout::find($id);

        $data = $request->all();
        $data['image'] = Centerabout::updateImage($request, $centerabout);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if ($centerabout->update($data)) {
            return redirect()->route('centerabout.index')->with('message', "Centers changed successfully");
        }
        return redirect()->route('centerabout.index')->with('message', "Unable to update Centers");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Centerabout::find($id)) {
            return redirect()->route('centerabout.index')->with('message', "Centers not found");
        }

        $centerabout = Centerabout::find($id);

        if (File::exists(public_path() . $centerabout->image)) {
            File::delete(public_path() . $centerabout->image);
        }

        if ($centerabout->delete()) {
            return redirect()->route('centerabout.index')->with('message', "Centers deleted successfully");
        }
        return redirect()->route('centerabout.index')->with('message', "unable to delete centers");
    }
}
