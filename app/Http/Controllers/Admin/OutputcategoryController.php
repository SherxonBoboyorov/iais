<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateOutputcategory;
use App\Http\Requests\Admin\UpdateOutputcategory;
use App\Models\Outputcategory;
use Illuminate\Http\Request;

class OutputcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outputcategories = Outputcategory::orderBy('created_at', 'DESC')->get();
        return view('admin.outputcategory.index', compact('outputcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.outputcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateOutputcategory  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOutputcategory $request)
    {
        $data = $request->all();

        if (Outputcategory::create($data)) {
            return redirect()->route('outputcategory.index')->with('message', "Output category created successfully");
        }
        return redirect()->route('outputcategory.index')->with('message', "unable to created Output category");

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
        $outputcategory = Outputcategory::find($id);
        return view('admin.outputcategory.edit', compact('outputcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateOutputcategory  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOutputcategory $request, $id)
    {
        $outputcategory = Outputcategory::find($id);

        $data = $request->all();

        if ($outputcategory->update($data)) {
            return redirect()->route('outputcategory.index')->with('message', 'changed successfully!!!');
        }

        return redirect()->route('outputcategory.index')->with('message', 'changed no successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outputcategory = Outputcategory::find($id);

        if ($outputcategory->delete()) {
            return redirect()->route('outputcategory.index')->with('message', "Outputs category deleted successfully");
        }
        return redirect()->route('outputcategory.index')->with('message', "unable to delete Outputs category");
    }
}
