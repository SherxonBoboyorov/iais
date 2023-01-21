<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateSupportabout;
use App\Http\Requests\Admin\UpdateSupportabout;
use App\Models\Supportabout;
use Illuminate\Http\Request;

class SupportaboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supportabouts = Supportabout::orderBy('created_at', 'DESC')->get();
        return view('admin.supportabout.index', compact('supportabouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supportabout.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateSupportabout  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSupportabout $request)
    {
        $data = $request->all();

        if(Supportabout::create($data)) {
            return redirect()->route('supportabout.index')->with('message', "Supports created successfully");
        }
        return redirect()->route('supportabout.index')->with('message', "unable to create Supports");
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
        $supportabout = Supportabout::find($id);
        return view('admin.supportabout.edit', compact('supportabout'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateSupportabout  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupportabout $request, $id)
    {
        $supportabout = Supportabout::find($id);

        $data = $request->all();

        if ($supportabout->update($data)) {
            return redirect()->route('supportabout.index')->with('message', 'changed successfully!!!');
        }

        return redirect()->route('supportabout.index')->with('message', 'changed no successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supportabout = Supportabout::find($id);

        if ($supportabout->delete()) {
            return redirect()->route('supportabout.index')->with('message', "Supports deleted successfully");
        }
        return redirect()->route('supportabout.index')->with('message', "unable to delete Supports");
    }
}
