<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateVideo;
use App\Http\Requests\Admin\UpdateVideo;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::orderBy('created_at', 'DESC')->get();
        return view('admin.video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateVideo  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['image'] = Video::uploadImage($request);

        if(Video::create($data)) {
            return redirect()->route('video.index')->with('message', "Video created successfully");
        }
        return redirect()->route('video.index')->with('message', "unable to create Video");
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
        $video = Video::find($id);
        return view('admin.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateVideo  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideo $request, $id)
    {
        $video = Video::find($id);

        $data = $request->all();
        $data['image'] = Video::updateImage($request, $video);

        if($video->update($data)) {
            return redirect()->route('video.index')->with('message', "changed successfully!!!");
        }
         return redirect()->route('video.index')->with('message', "changed no successfully!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Video::find($id)) {
            return redirect()->route('video.index')->with('message', "Video not found");
        }

        $video = Video::find($id);

        if (File::exists(public_path() . $video->image)) {
            File::delete(public_path() . $video->image);
        }

        if ($video->delete()) {
            return redirect()->route('video.index')->with('message', "Video deleted successfully");
        }
        return redirect()->route('video.index')->with('message', "Unable to delete video");
    }
}
