<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateAboutperson;
use App\Http\Requests\Admin\UpdateAboutperson;
use App\Models\Aboutperson;
use Illuminate\Http\Request;

class AboutpersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutpeople = Aboutperson::orderBy('created_at', 'DESC')->get();
        return view('admin.aboutperson.index', compact('aboutpeople'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutperson.create');
    }

    /**
     *
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateAboutperson  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAboutperson $request)
    {
        $data = $request->all();

        if (Aboutperson::create($data)){
            return redirect()->route('aboutperson.index')->with('message', "created successfully!!!");
        }
        return redirect()->route('aboutperson.index')->with('message', "unable to created");
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
        $aboutperson = Aboutperson::find($id);
        return view('admin.aboutperson.edit', compact('aboutperson'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateAboutperson  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutperson $request, $id)
    {
        $aboutperson = Aboutperson::find($id);

        $data = $request->all();

        if ($aboutperson->update($data)) {
            return redirect()->route('aboutperson.index')->with('message', 'changed successfully!!!');
        }

        return redirect()->route('aboutperson.index')->with('message', 'changed no successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aboutperson = Aboutperson::find($id);

        if ($aboutperson->delete()) {
            return redirect()->route('aboutperson.index')->with('message', "deleted successfully");
        }
        return redirect()->route('aboutperson.index')->with('message', "unable to delete");
    }
}
