<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateOurcontact;
use App\Http\Requests\Admin\UpdateOurcontact;
use App\Models\Ourcontact;
use Illuminate\Http\Request;

class OurcontactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ourcontacts = Ourcontact::orderBy('created_at', 'DESC')->get();
        return view('admin.ourcontact.index', compact('ourcontacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ourcontact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateOurcontact  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOurcontact $request)
    {
        $data = $request->all();

        if (Ourcontact::create($data)) {
            return redirect()->route('ourcontact.index')->with('message', "created successfully");
        }
        return redirect()->route('ourcontact.index')->with('message', "unable to created");
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
        $ourcontact = Ourcontact::find($id);
        return view('admin.ourcontact.edit', compact('ourcontact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateOurcontact  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOurcontact $request, $id)
    {
        $ourcontact = Ourcontact::find($id);

        $data = $request->all();

        if ($ourcontact->update($data)) {
            return redirect()->route('ourcontact.index')->with('message', 'changed successfully!!!');
        }

        return redirect()->route('ourcontact.index')->with('message', 'changed no successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ourcontact = Ourcontact::find($id);

        if ($ourcontact->delete()) {
            return redirect()->route('ourcontact.index')->with('message', "Contacts of centers deleted successfully");
        }
        return redirect()->route('ourcontact.index')->with('message', "unable to delete Contacts of centers");
    }
}
