<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateEventproduct;
use App\Http\Requests\Admin\UpdateEventproduct;
use App\Models\Eventproduct;
use App\Models\Eventcategory;
use App\Models\Centerabout;
use App\Models\Expertpeople;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class EventproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventproducts = Eventproduct::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.eventproduct.index', [
            'eventproducts' => $eventproducts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventcategories = Eventcategory::orderby('created_at', 'DESC')->get();
        $centerabouts = Centerabout::orderby('created_at', 'DESC')->get();
        $expertpeoples = Expertpeople::orderby('created_at', 'DESC')->get();
        return view('admin.eventproduct.create', [
            'eventcategories' => $eventcategories,
            'centerabouts' => $centerabouts,
            'expertpeoples' => $expertpeoples
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateEventproduct  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEventproduct $request)
    {
        $data = $request->all();

        $data['image'] = Eventproduct::uploadImage($request);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if (Eventproduct::create($data)) {
            return redirect()->route('eventproduct.index')->with('message', "Events created seccessfully");
        }
        return redirect()->route('eventproduct.index')->with('message', "unable to created Events");
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
    public function edit(Eventproduct $eventproduct)
    {
        $eventcategories = Eventcategory::orderBy('created_at', 'DESC')->get();
        $centerabout = Centerabout::orderBy('created_at', 'DESC')->get();
        $expertperson = Expertpeople::orderBy('created_at', 'DESC')->get();

        return view('admin.eventproduct.edit', [
            'eventcategories' => $eventcategories,
            'eventproduct' => $eventproduct,
            'centerabout' => $centerabout,
            'expertperson' => $expertperson

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateEventproduct  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventproduct $request, $id)
    {
        if (!Eventproduct::find($id)) {
            return redirect()->route('eventproduct.index')->with('message', "Events not fount");
        }

        $eventproduct = Eventproduct::find($id);

        $data = $request->all();
        $data['image'] = Eventproduct::updateImage($request, $eventproduct);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if ($eventproduct->update($data)) {
            return redirect()->route('eventproduct.index')->with('message', "Events changed successfully");
        }
        return redirect()->route('eventproduct.index')->with('message', "Unable to update Events");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Eventproduct::find($id)) {
            return redirect()->route('eventproduct.index')->with('message', "Events not found");
        }

        $eventproduct = Eventproduct::find($id);

        if (File::exists(public_path() . $eventproduct->image)) {
            File::delete(public_path() . $eventproduct->image);
        }

        if ($eventproduct->delete()) {
            return redirect()->route('eventproduct.index')->with('message', "Events deleted successfully");
        }
        return redirect()->route('eventproduct.index')->with('message', "unable to delete Events");
    }
}
