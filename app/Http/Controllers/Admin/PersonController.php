<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePerson;
use App\Http\Requests\Admin\UpdatePerson;
use App\Models\Person;
use App\Models\Aboutperson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Person::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.person.index', [
            'people' => $people
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aboutpeople = Aboutperson::orderBy('created_at', 'DESC')->get();
        return view('admin.person.create', [
            'aboutpeople' => $aboutpeople
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreatePerson  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePerson $request)
    {
        $data = $request->all();

        $data['image'] = Person::uploadImage($request);

        if (Person::create($data)) {
            return redirect()->route('person.index')->with('message', "created successfully");
        }
        return redirect()->route('person.index')->with('message', "unable to created");

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
    public function edit(Person $person)
    {
        $aboutpeople = Aboutperson::orderBy('created_at', 'DESC')->get();

        return view('admin.person.edit', [
            'aboutpeople' => $aboutpeople,
            'person' => $person
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Request\Admin\UpdatePerson  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePerson $request, $id)
    {
        if (!Person::find($id)) {
            return redirect()->route('person.index')->with('message', "not fount");
        }

        $person = Person::find($id);

        $data = $request->all();

        $data['image'] = Person::updateImage($request, $person);

        if ($person->update($data)) {
            return redirect()->route('person.index')->with('message', "changed successfully");
        }
        return redirect()->route('person.index')->with('message', "Unable to update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Person::find($id)) {
            return redirect()->route('person.index')->with('message', "not found");
        }

        $person = Person::find($id);

        if (File::exists(public_path() . $person->image)) {
            File::delete(public_path() . $person->image);
        }

        if ($person->delete()) {
            return redirect()->route('person.index')->with('message', "deleted successfully");
        }

        return redirect()->route('person.index')->with('message', "Unable to delete");
    }
}
