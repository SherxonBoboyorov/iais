<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProjectdocument;
use App\Http\Requests\Admin\UpdateProjectdocument;
use App\Models\Projectdocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectdocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectdocuments = Projectdocument::orderBy('created_at', 'DESC')->get();
        return view('admin.projectdocument.index', compact('projectdocuments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projectdocument.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateProjectdocument $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectdocument $request)
    {
        $data  = $request->all();

        $data['image'] = Projectdocument::uploadImage($request);

        if (Projectdocument::create($data)) {
            return redirect()->route('peojectdocument.index')->with('message', "Project document created successfully");
        }
        return redirect()->route('projectdocument.index')->with('message', "unable to created Project document");

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
        $projectdocument = Projectdocument::find($id);
        return view('admin.projectdocument.edit', compact('projectdocument'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateProjectdocument  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectdocument $request, $id)
    {
        $projectdocument = Projectdocument::find($id);

        $data = $request->all();
        $data['image'] = Projectdocument::updateImage($request, $projectdocument);

        if ($projectdocument->update($data)) {
            return redirect()->route('projectdocument.index')->with('message', 'changed successfully!!!');
        }

        return redirect()->route('projectdocument.index')->with('message', 'changed no successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Projectdocument::find($id)) {
            return redirect()->route('projectdocument.index')->with('message', "Project document not found");
        }

        $projectdocument = Projectdocument::find($id);

        if (File::exists(public_path() . $projectdocument->image)) {
            File::delete(public_path() . $projectdocument->image);
        }

        if ($projectdocument->delete()) {
            return redirect()->route('projectdocument.index')->with('message', "Project document deleted successfully");
        }

        return redirect()->route('projectdocument.index')->with('message', "Unable to delete project document");
    }
}
