<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Audio::paginate(8);

        return view('dashboard.sermon.audio.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $input = $request->all();

        $file =$request->file('file');
        $thumbnail = $request->file('song_thumbnail');

        foreach ($file as $key => $image) {
            $filename = $image->getClientOriginalName();
            $filesize = $image->getSize();
            $extension = $image->getClientOriginalExtension();

            $file_title = time(). '.' .$extension;
            $image ->move('sermon/img/' .$file_title);

            foreach ($thumbnail as $logo) {
                $thumbnail_extension = $logo->getClientOriginalExtension();
                $song_thumbnail = date('y-m-d').'.'.$thumbnail_extension;
                $logo->move('sermon/thumbnail'. $song_thumbnail);


                $multi_images = Audio::create([
                    'song_unique_name' => $filename,
                    'song_name' => $file_title,
                    'song_size' => $filesize,
                    'song_extension' => $extension,
                    'song_thumbnail'=> $song_thumbnail,
                    'song_title' => $request->song_title[$key],
                    'artist_name' => $request->artist_name[$key],
                    'album_name' => $request->album_name[$key],
                    'album_year' => $request->album_year[$key],
                ]);

                if ($multi_images) {
                    return redirect()->back();
                }
            }
        }
    }

    public function download($id)
    {
        $rand_number = Rand('001, 100');
        $song_download = Audio::find($id);

        return response()->download($pathToFile, $song_download, $rand_number);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function show(Audio $audio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function edit(Audio $audio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Audio $audio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audio $audio)
    {
        //
    }
}
