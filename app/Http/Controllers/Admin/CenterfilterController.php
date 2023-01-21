<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCenterfilter;
use App\Http\Requests\Admin\UpdateCenterfilter;
use App\Models\Centerfilter;
use Illuminate\Http\Request;

class CenterfilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centerfilters = Centerfilter::orderBy('created_at', 'DESC')->get();
        return view('admin.centerfilter.index', compact('centerfilters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.centerfilter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateCenterfilter  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCenterfilter $request)
    {
        $data = $request->all();

        if(Centerfilter::create($data)) {
            return redirect()->route('centerfilter.index')->with('message', "Topic created successfullt");
        }
        return redirect()->route('centerfilter.index')->with('message', "unable to created Topic");

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
        $centerfilter = Centerfilter::find($id);
        return view('admin.centerfilter.edit', compact('centerfilter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateCenterfilter  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCenterfilter $request, $id)
    {
        $centerfilter = Centerfilter::find($id);

        $data = $request->all();

        if($centerfilter->update($data)) {
            return redirect()->route('centerfilter.index')->with('message', 'changed successfully');
        }
        return redirect()->route('centerfilter.index')->with('message', 'changed no successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $centerfilter = Centerfilter::find($id);

        if ($centerfilter->delete()) {
            return redirect()->route('centerfilter.index')->with('message', "deleted successfully");
        }
        return redirect()->route('centerfilter.index')->with('message', "unable to delete");
    }
}
