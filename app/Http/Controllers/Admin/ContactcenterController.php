<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateContactcenter;
use App\Http\Requests\Admin\UpdateContactcenter;
use App\Models\Contactcenter;
use Illuminate\Http\Request;

class ContactcenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactcenters = Contactcenter::orderBy('created_at', 'DESC')->get();
        return view('admin.contactcenter.index', compact('contactcenters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contactcenter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateContactcenter  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateContactcenter $request)
    {
        $data = $request->all();

        if (Contactcenter::create($data)) {
            return redirect()->route('contactcenter.index')->with('message', "Contacts of centers created successfully");
        }
        return redirect()->route('contactcenter.index')->with('message', "unable to created Contacts of centers");

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
        $contactcenter = Contactcenter::find($id);
        return view('admin.contactcenter.edit', compact('contactcenter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateContactcenter  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactcenter $request, $id)
    {
        $contactcenter = Contactcenter::find($id);

        $data = $request->all();

        if ($contactcenter->update($data)) {
            return redirect()->route('contactcenter.index')->with('message', 'changed successfully!!!');
        }

        return redirect()->route('contactcenter.index')->with('message', 'changed no successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contactcenter = Contactcenter::find($id);

        if ($contactcenter->delete()) {
            return redirect()->route('contactcenter.index')->with('message', "Contacts of centers deleted successfully");
        }
        return redirect()->route('contactcenter.index')->with('message', "unable to delete Contacts of centers");
    }
}
