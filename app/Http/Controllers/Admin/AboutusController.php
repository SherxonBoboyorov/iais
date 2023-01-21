<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateAboutus;
use App\Http\Requests\Admin\UpdateAboutus;
use App\Models\Aboutus;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutuses = Aboutus::orderBy('created_at', 'DESC')->get();
        return view('admin.aboutus.index', compact('aboutuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateAboutus  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAboutus $request)
    {
        $data = $request->all();

        if(Aboutus::create($data)) {
            return redirect()->route('aboutus.index')->with('message', "About us created successfully");
        }
        return redirect()->route('aboutus.index')->with('message', "unable to create about us");
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
        $aboutus = Aboutus::find($id);
        return view('admin.aboutus.edit', compact('aboutus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateAboutus  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutus $request, $id)
    {
        $aboutus = Aboutus::find($id);

        $data = $request->all();

        if ($aboutus->update($data)) {
            return redirect()->route('aboutus.index')->with('message', 'changed successfully!!!');
        }

        return redirect()->route('aboutus.index')->with('message', 'changed no successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aboutus = Aboutus::find($id);

        if ($aboutus->delete()) {
            return redirect()->route('aboutus.index')->with('message', "About us deleted successfully");
        }
        return redirect()->route('aboutus.index')->with('message', "unable to delete about us");
    }
}
