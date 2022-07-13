<?php

namespace App\Http\Controllers;

use App\Models\Sermon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
// use Illuminate\Support\Facades\header;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Response;



class SermonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sermons =Sermon::all();
        return view('dashboard.sermon.index', compact('sermons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sermon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path =$request->file('speaker_picture')->store('public/sermons');

        $sermon = new Sermon();
        $file = $request->file;
        $filename = time().'.'.$file->getClientOriginalExtension();
        $request->file->move('sermons', $filename);
        $sermon->file=$filename;

        $sermon->sermon_theme  = $request->sermon_theme;
        $sermon->speaker_name  = $request->speaker_name ;
        $sermon->speaker_picture  = $path;
        // $sermon->speaker_socials  = $request->speaker_socials ;
        $sermon->sermon_title  = $request->sermon_title ;
        $sermon->sermon_text  = $request->sermon_text ;
        // $sermon->sermon_note  = $request->sermon_note ;
        // $sermon->number_of_soul_convert  = $request->number_of_soul_convert ;
        $sermon->sermon_date  = $request->sermon_date ;
        // $sermon->sermon_audio  = $request->sermon_audio ;
        // $sermon->sermon_video  = $request->sermon_video ;
        // $sermon->sermon_status  = $request->sermon_status ;
        // dd($request->all);
        $sermon->save();

        return redirect()->route('user.sermon.index')->with('success', 'successfully saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request, $file)
    {

        $filePath = public_path('sermons/'.$file);
        $headers = ['Content-Type: application/'.$file];
        $fileName = time().$file;
        return response()->download($filePath, $fileName, $headers);
        // $path = public_path('sermons/'.$file);
    	// $fileName = 'sermons.file';

    	// return Response::download($path, $fileName, ['Content-Type: application/file']);

        // return response()->download(public_path('sermons/'.$file),$http_response_header);
        // return response()->download(public_path('sermons/'.$file));
    }



    public function show(Sermon $sermon)
    {
        $data =Sermon::find($sermon->id);
        return view('dashboard.sermon.show', compact('data','sermon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function edit(Sermon $sermon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sermon $sermon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sermon $sermon)
    {
        //
    }
}
