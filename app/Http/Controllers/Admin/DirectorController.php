<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateDirector;
use App\Http\Requests\Admin\UpdateDirector;
use App\Models\Director;
use App\Models\Centerabout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directors = Director::orderBy('created_at', 'DESC')->get();
        return view('admin.director.index', [
            'directors' => $directors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centerabouts = Centerabout::orderBy('created_at', 'DESC')->get();
        return view('admin.director.create', [
            'centerabouts' => $centerabouts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateDirector  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDirector $request)
    {
        $data = $request->all();
        $data['image'] = Director::uploadImage($request);

        if (Director::create($data))
        {
            return redirect()->route('director.index')->with('message', "Director of center created successfully");
        }
        return redirect()->route('director.index')->with('message', "Unable to created Director of center ");

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
    public function edit(Director $director)
    {
        $centerabout = Centerabout::orderBy('created_at', 'DESC')->get();
        return view('admin.director.edit', [
            'centerabout' => $centerabout,
            'director' => $director
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateDirector  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDirector $request, $id)
    {
        if (!Director::find($id)) {
            return redirect()->route('director.index')->with('message', "Director of Center not fount");
        }

        $director = Director::find($id);

        $data = $request->all();
        $data['image'] = Director::updateImage($request, $director);

        if ($director->update($data)) {
            return redirect()->route('director.index')->with('message', "Director of Center changed successfully");
        }
        return redirect()->route('director.index')->with('message', "Unable to update Director of Center");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
