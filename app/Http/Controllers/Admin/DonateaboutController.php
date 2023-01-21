<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateDonateabout;
use App\Http\Requests\Admin\UpdateDonateabout;
use App\Models\Donateabout;
use Illuminate\Http\Request;

class DonateaboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donateabouts = Donateabout::orderBy('created_at', 'DESC')->get();
        return view('admin.donateabout.index', compact('donateabouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.donateabout.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Models\Requests\Admin\CreateDonateabout  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDonateabout $request)
    {
        $data = $request->all();

        if(Donateabout::create($data)) {
            return redirect()->route('donateabout.index')->with('message', "created successfully");
        }
        return redirect()->route('donateabout.index')->with('message', "create Supports");
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
        $donateabout = Donateabout::find($id);
        return view('admin.donateabout.edit', compact('donateabout'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateDonateabout  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDonateabout $request, $id)
    {
        $donateabout = Donateabout::find($id);

        $data = $request->all();

        if ($donateabout->update($data)) {
            return redirect()->route('donateabout.index')->with('message', 'changed successfully!!!');
        }

        return redirect()->route('donateabout.index')->with('message', 'changed no successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donateabout = Donateabout::find($id);

        if ($supportabout->delete()) {
            return redirect()->route('donateabout.index')->with('message', "deleted successfully");
        }
        return redirect()->route('donateabout.index')->with('message', "unable to delete");
    }
}
