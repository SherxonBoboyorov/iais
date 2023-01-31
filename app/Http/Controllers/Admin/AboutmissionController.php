<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateAboutmission;
use App\Http\Requests\Admin\UpdateAboutmission;
use App\Models\Aboutmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AboutmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutmissions = Aboutmission::orderBy('created_at', 'DESC')->get();
        return view('admin.aboutmission.index', compact('aboutmissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutmission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateAboutmission  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAboutmission $request)
    {
        $data = $request->all();

        $data['image'] = Aboutmission::uploadImage($request);

        if(Aboutmission::create($data)) {
            return redirect()->route('aboutmission.index')->with('message', "created successfully");
        }
        return redirect()->route('aboutmission.index')->with('message', "unable to create");
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
    public function edit($id)
    {
        $aboutmission = Aboutmission::find($id);
        return view('admin.aboutmission.edit', compact('aboutmission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateAboutmission  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutmission $request, $id)
    {
        $aboutmission = Aboutmission::find($id);

        $data = $request->all();

        $data['image'] = Aboutmission::updateImage($request, $aboutmission);


        if ($aboutmission->update($data)) {
            return redirect()->route('aboutmission.index')->with('message', 'changed successfully!!!');
        }

        return redirect()->route('aboutmission.index')->with('message', 'changed no successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!Aboutmission::find($id)) {
            return redirect()->route('aboutmission.index')->with('message', "not found");
        }

        $aboutmission = Aboutmission::find($id);

        if (File::exists(public_path() . $aboutmission->image)) {
            File::delete(public_path() . $aboutmission->image);
        }


        if ($aboutmission->delete()) {
            return redirect()->route('aboutmission.index')->with('message', "deleted successfully");
        }
        return redirect()->route('aboutmission.index')->with('message', "unable to delete");
    }
}
