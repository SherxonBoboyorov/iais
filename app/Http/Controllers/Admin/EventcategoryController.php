<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateEventcategory;
use App\Http\Requests\Admin\UpdateEventcategory;
use App\Models\Eventcategory;
use Illuminate\Http\Request;

class EventcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventcategories = Eventcategory::orderBy('created_at', 'DESC')->get();
        return view('admin.eventcategory.index', compact('eventcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eventcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateEventcategory  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEventcategory $request)
    {
        $data = $request->all();

        if (Eventcategory::create($data)) {
            return redirect()->route('eventcategory.index')->with('message', "Events created successfully");
        }
        return redirect()->route('eventcategory.index')->with('message', "unable to created Event");
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
        $eventcategory = Eventcategory::find($id);
        return view('admin.eventcategory.edit', compact('eventcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateEventcategory  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventcategory $request, $id)
    {
        $eventcategory = Eventcategory::find($id);

        $data = $request->all();

        if ($eventcategory->update($data)) {
            return redirect()->route('eventcategory.index')->with('message', 'changed successfully!!!');
        }

        return redirect()->route('eventcategory.index')->with('message', 'changed no successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eventcategory = Eventcategory::find($id);

        if ($eventcategory->delete()) {
            return redirect()->route('eventcategory.index')->with('message', "Events deleted successfully");
        }
        return redirect()->route('eventcategory.index')->with('message', "unable to delete Events");
    }
}
