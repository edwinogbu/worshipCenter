<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Testimony;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
// use Brian2694\Toastr\Facades\Toastr;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonies = Testimony::all();
        return view('dashboard.testimony.index', compact('testimonies'));
    }

    public function homepage()
    {
        $testimonies = Testimony::all();
        return view('partials.frontend.testimony', compact('testimonies'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.testimony.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, Profile $profile)
    {
        // dd($request->all());
    	// $profile = Profile::findOrFail($profile->id);
        $path= $request->file('picture')->store('public/images');

        $testimony = new Testimony();
        $testimony->user_id = auth()->user()->id;
        $testimony->profile_id = auth()->user()->profile->id;
        $testimony->testifier_name =$request->testifier_name;
        $testimony->title = $request->title;
        $testimony->body = $request->body;
        $testimony->picture = $path;
        $testimony->occupation = $request->occupation;
        $testimony->save();
        Toastr::success('testimony added successfully :)','Success');

        return redirect()->route('user.testimony.index')->with('success', 'testimony saved successfully');
    }


    public function publish(Request $request, $id)
    {
        $testimony=Testimony::find($id);
        // $blog->status =$request->status;
        $testimony->status =$request->boolean('status');
        $testimony->save();

        return redirect()->back()->with('success', 'post has been updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function show(Testimony $testimony)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimony $testimony)
    {
        $profile = Profile::all();
        $user = User ::all();
        $testimony=Testimony::findOrFail($testimony->id);
        return view('dashboard.testimony.edit', compact('profile', 'user', 'testimony'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimony $testimony)
    {
        if ($request->hasFile('picture')) {
            $request->validate([

                'picture'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path= $request->file('picture')->store('public/images');
            $testimony->picture=$path;
        }
        $testimony->user_id = auth()->user()->id;
        $testimony->profile_id = auth()->user()->profile->id;
        $testimony->testifier_name =$request->testifier_name;
        $testimony->title = $request->title;
        $testimony->body = $request->body;
        // $testimony->picture = $path;
        $testimony->occupation = $request->occupation;
        $testimony->save();
        Toastr::success('testimony added successfully :)','Success');

        return redirect()->route('user.testimony.index')->with('success', 'testimony updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimony $testimony)
    {
        //
    }
}
