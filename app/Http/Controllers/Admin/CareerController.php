<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCareer;
use App\Http\Requests\Admin\UpdateCareer;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $careers = Career::orderBy('created_at', 'DESC')->get();
        return view('admin.career.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.career.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateCareer  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCareer $request)
    {
        $data = $request->all();

        $data['image'] = Career::uploadImage($request);

        if(Career::create($data)) {
            return redirect()->route('career.index')->with('message', "Careers and Internships created successfully");
        }
        return redirect()->route('career.index')->with('message', "unable to created Careers and Internships");
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
        $career = Career::find($id);
        return view('admin.career.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateCareer  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCareer $request, $id)
    {
        if (!Career::find($id)) {
            return redirect()->route('career.index')->with('message', "Careers and Internships not fount");
        }

        $career = Career::find($id);

        $data = $request->all();
        $data['image'] = Career::updateImage($request, $career);

        if ($career->update($data)) {
            return redirect()->route('career.index')->with('message', 'changed successfully!!!');
        }

        return redirect()->route('career.index')->with('message', 'changed no successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Career::find($id)) {
            return redirect()->route('career.index')->with('message', "Careers and Internships not found");
        }

        $career = Career::find($id);

        if (File::exists(public_path() . $career->image)) {
            File::delete(public_path() . $career->image);
        }

        if ($career->delete()) {
            return redirect()->route('career.index')->with('message', "Careers and Internships deleted successfully");
        }
        return redirect()->route('career.index')->with('message', "unable to delete Careers and Internships");
    }
}
