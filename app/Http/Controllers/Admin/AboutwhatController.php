<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateAboutwhat;
use App\Http\Requests\Admin\UpdateAboutwhat;
use App\Models\Aboutwhat;
use Illuminate\Http\Request;

class AboutwhatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutwhats = Aboutwhat::orderBy('created_at', 'DESC')->get();
        return view('admin.aboutwhat.index', compact('aboutwhats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutwhat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateAboutwhat  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAboutwhat $request)
    {
        $data = $request->all();

        if(Aboutwhat::create($data)) {
            return redirect()->route('aboutwhat.index')->with('message', "created successfully");
        }
        return redirect()->route('aboutwhat.index')->with('message', "unable to create");
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
        $aboutwhat = Aboutwhat::find($id);
        return view('admin.aboutwhat.edit', compact('aboutwhat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateAboutwhat  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutwhat $request, $id)
    {
        $aboutwhat = Aboutwhat::find($id);

        $data = $request->all();

        if ($aboutwhat->update($data)) {
            return redirect()->route('aboutwhat.index')->with('message', 'changed successfully!!!');
        }

        return redirect()->route('aboutwhat.index')->with('message', 'changed no successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aboutwhat = Aboutwhat::find($id);

        if ($aboutwhat->delete()) {
            return redirect()->route('aboutwhat.index')->with('message', "deleted successfully");
        }
        return redirect()->route('aboutwhat.index')->with('message', "unable to delete");
    }
}
