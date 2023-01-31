<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateExpertpeople;
use App\Http\Requests\Admin\UpdateExpertpeople;
use App\Models\Expertpeople;
use App\Models\Centerabout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ExpertpeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expertpersons = Expertpeople::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.expertpeople.index', [
            'expertpersons' => $expertpersons
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centerabouts = Centerabout::orderBy('created_at', 'DESC')->get();


        return view('admin.expertpeople.create', [
            'centerabouts' => $centerabouts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateExpertpeople  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateExpertpeople $request)
    {
        $data = $request->all();

        $data['image'] = Expertpeople::uploadImage($request);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if (Expertpeople::create($data)) {
            return redirect()->route('expertpeople.index')->with('message', "Experts created seccessfully");
        }
        return redirect()->route('expertpeople.index')->with('message', "unable to created Experts");
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
    public function edit(Expertpeople $expertperson)
    {
       $centerabout = Centerabout::orderBy('created_at', 'DESC')->get();

       return view('admin.expertpeople.edit', [
           'centerabout' => $centerabout,
           'expertperson' => $expertperson
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateExpertpeople  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpertpeople $request, $id)
    {
        if (!Expertpeople::find($id)) {
            return redirect()->route('expertpeople.index')->with('message', "Experts not fount");
        }

        $expertperson = Expertpeople::find($id);

        $data = $request->all();

        $data['image'] = Expertpeople::updateImage($request, $expertperson);

        $data['slug_ru'] = Str::slug($request->title_ru, '-', 'ru');
        $data['slug_uz'] = Str::slug($request->title_uz, '-', 'uz');
        $data['slug_en'] = Str::slug($request->title_en, '-', 'en');

        if ($expertperson->update($data)) {
            return redirect()->route('expertpeople.index')->with('message', "Experts changed successfully");
        }
        return redirect()->route('expertpeople.index')->with('message', "Unable to update Experts");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Expertpeople::find($id)) {
            return redirect()->route('expertpeople.index')->with('message', "Experts not found");
        }

        $expertperson = Expertpeople::find($id);

        if (File::exists(public_path() . $expertperson->image)) {
            File::delete(public_path() . $expertperson->image);
        }

        if ($expertperson->delete()) {
            return redirect()->route('expertpeople.index')->with('message', "Experts deleted successfully");
        }
        return redirect()->route('expertpeople.index')->with('message', "unable to delete Experts");
    }
}
