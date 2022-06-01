<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin_profiles=Profile::orderBy('created_at', 'desc')->latest()->paginate(5);

        $profile= Profile::where('user_id', Auth::user()->id)->latest()->paginate(12);
        $user = User::first();
        return view('dashboard.profile.index', compact('profile','user', 'admin_profiles'));
    }

    public function dashboard(Request $request)
    {
        // dd($request->all());
        $search =  $request->input('q');
        if($search!=""){
            $Members = User::where(function ($query) use ($search){
                $query->where('membership_id', 'like', '%'.$search.'%')
                    ->orWhere('first_name', 'like', '%'.$search.'%');
            })
            ->paginate(1);
            $Members->appends(['q' => $search]);
        }
        else{
            $Members = User::paginate(1);
        }

        if ($Members->count() == 1 && $request->input('q')) {
            Toastr::success('<b><span style="font-size:30px;">User Found successfully :</span></b>)','success');

        }
        elseif($Members->count() <= 0 && $request->input('')){
            Toastr::info('User Record Not Found :)','info');

        }
        elseif($Members->count() == 0 && $request->input(' ')){
            Toastr::error('User Record Not Found :)','error');

        }
        elseif($Members->count() == 0 ){
            Toastr::error('<b><span style="font-size:30px;">User Record Not Found :</span></b>)','error');

        }
        // else{
        //     Toastr::info('<b><span style="font-size:30px;">Pls Entered Membership ID... :</span></b>)','info');

        // }

        $admin_profiles=Profile::orderBy('created_at', 'desc')->latest()->paginate(5);

        $profile= Profile::where('user_id', Auth::user()->id)->latest()->paginate(12);
        $user = User::first();
        return view('dashboard.user.home', compact('profile','user', 'Members','search', 'admin_profiles'))->with('success', 'done');
    }
    public function detail(Profile $profile)
    {
        $admin_profiles=Profile::orderBy('created_at', 'desc')->first();

        $profile= Profile::paginate(1);
        $user = User::paginate(1);

        // dd($profile);
        return view('dashboard.profile.detail', compact('profile','user', 'admin_profiles'));

    }


    public function viewAll()
    {
        $admin_profiles=Profile::orderBy('created_at', 'desc')->latest()->paginate(5);

        $profile= Profile::where('user_id', Auth::user()->id)->latest()->paginate(12);
        // dd($profile);
        $user = User::first();
        return view('dashboard.profile.view_all', compact('profile','user', 'admin_profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin_profiles=Profile::orderBy('created_at', 'desc')->latest()->paginate(5);

        $profile= Profile::where('user_id', Auth::user()->id)->latest()->paginate(12);
        $user = User::first();
        return view('dashboard.profile.create', compact('profile','user', 'admin_profiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {

        // dd(auth()->user()->id);

        $user=User::where('id', 'id')->pluck('membership_id');
        // $profile = User::where('id', 'id')->first();



        $path =$request->file('picture')->store('public/images');


        $profiles = new Profile();
        $profiles->user_id =auth()->user()->id;
        $profiles->gender =$request->gender;
        $profiles->address =$request->address;
        $profiles->qualification =$request->qualification;
        $profiles->occupation =$request->occupation;
        $profiles->dob =$request->dob;
        $profiles->date_joined =$request->date_joined;
        $profiles->nationality =$request->nationality;
        $profiles->membership_status =$request->membership_status;
        $profiles->state_origin =$request->state_origin;
        $profiles->lga =$request->lga;
        $profiles->skill =$request->skill;
        $profiles->marital_status =$request->marital_status;
        $profiles->picture =$path;
        $profiles->membership_id = auth()->user()->membership_id;
        $profiles->position =$request->position	;
        $profiles->save();

        Toastr::success('profile added successfully :)','success');

        return redirect()->route('profile.index')->with('success', 'user profile created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        $profile=Profile::where('user_id', Auth::user()->id)->first();
        $user = User::first();
        return view('dashboard.profile.show', compact('profile', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {   $user = User::all();
        return view('dashboard.profile.edit', compact('profile','user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        // dd($request->all());

        $profile = Profile::findOrFail($profile->id);
         if ($request->hasFile('picture')) {
            $request->validate([

                'picture'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path =$request->file('picture')->store('public/images');
            $profile->picture=$path;
        }

        // $profiles->user_id =auth()->user()->id;
        $profile->gender =$request->gender;
        $profile->address =$request->address;
        $profile->qualification =$request->qualification;
        $profile->occupation =$request->occupation;
        $profile->dob =$request->dob;
        $profile->date_joined =$request->date_joined;
        $profile->nationality =$request->nationality;
        $profile->membership_status =$request->membership_status;
        $profile->state_origin =$request->state_origin;
        $profile->lga =$request->lga;
        $profile->skill =$request->skill;
        $profile->marital_status =$request->marital_status;
        // $profile->picture =$path;
        $profile->membership_id = auth()->user()->membership_id;
        $profile->position =$request->position	;
        $profile->save();

        Toastr::success('profile added successfully :)','success');

        return redirect()->route('profile.index')->with('success', 'profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile = Profile::findOrFail($profile->id);
        $profile->delete();
        Toastr::error('User Record deleted successfully :)','error');

        return back()->with('success', 'profile deleted successfully');

        // return redirect()->route('profile.index')->with('success', 'profile deleted successfully');
    }




    public function search(Request $request){

        // $q = $request->input('q');
        // if ($q != "") {
        //     // $data['profiles'] = Profile::where('name', 'LIKE', '%' . $request->search . '%')
        //     $profile = Profile::where('membership_id', 'LIKE', '%' . $request->q . '%')
        //                             //  ->orWhere('email', 'LIKE', '%' . $request->q . '%')
        //                             //  ->orWhere('phone', 'LIKE', '%' . $request->q . '%')

        //                              ->orWhereHas('users', function (Builder $query) use ($request) {
        //                               $query->where('membership_id', 'like', '%' . $request->q . '%');
        //                             })->get();

        //     if ($profile->count() == 0) {
                // return view('dashboard.user.search_home', compact('profile'))->with('success', 'done');
            // }

        // }

        $search =  $request->input('q');
        if($search!=""){
            $Members = User::where(function ($query) use ($search){
                $query->where('membership_id', 'like', '%'.$search.'%')
                    ->orWhere('first_name', 'like', '%'.$search.'%');
            })
            ->paginate(1);
            $Members->appends(['q' => $search]);

        }
        else{
            $Members = User::paginate(1);
        }

        if ($Members->count() == 1 && $request->input('q')) {
            Toastr::success('<b><span style="font-size:30px;">User Found successfully :</span></b>)','success');
            // return view('dashboard.user.search_home', compact('Members','search'))->with('success', 'done');

        }
        elseif($Members->count() <= 0 && $request->input('')){
            Toastr::info('User Record Not Found :)','info');
            // return view('dashboard.user.search_home', compact('Members','search'))->with('success', 'done');


        }
        elseif($Members->count() == 0 && $request->input(' ')){
            Toastr::error('User Record Not Found :)','error');
            // return view('dashboard.user.search_home', compact('Members','search'))->with('fail', 'done');


        }
        elseif($Members->count() == 0 ){
            Toastr::error('<b><span style="font-size:30px;">User Record Not Found :</span></b>)','error');
            return redirect()->back()->with('fail', 'No Record Found');

        }
        // else{
        //     Toastr::info('<b><span style="font-size:30px;">Pls Entered Membership ID... :</span></b>)','info');

        // }

        $admin_profiles=Profile::orderBy('created_at', 'desc')->latest()->paginate(5);

        $profile= Profile::where('user_id', Auth::user()->id)->latest()->paginate(12);
        $user = User::first();
        return view('dashboard.user.search_home', compact('profile','user', 'Members','search', 'admin_profiles'))->with('success', 'done');


    }

    public function searchUser(Request $request){

        // dd($request->all());

        $search    = strtolower($request->input('q'));
        if ($search != '') {
            $data = User::where('membership_id', 'like', "%$search%")
                          ->orWhere('email', 'like', "%$search%")
                          ->paginate(10);
                          if (count($data) > 0) {
                            return view('dashboard.user.search_user', compact('data'))->with('success', 'done');
                        }
        } else {
            $users = User::paginate(10);
            // return redirect()->back()->with('success', 'No Record Found');
        }


        return redirect()->back()->with('success', 'No Record Found');
    }


      // dd($request->all());
        // $q = $request->input('q');
        // if ($q != "") {
        //     // $profile=Profile::where('user_id', Auth::user()->id)->first();
        //     $profile=Profile::orderBy('user_id', 'desc')->latest()->first();
        //     // $profile = Profile::where('membership_id', 'LIKE', '%' . $q . '%')->first();
        //     $user = User::where('membership_id', 'LIKE', '%' . $q . '%')->orWhere('email', 'LIKE', '%' . $q . '%')->get();
        //     // $user = User::first();
        //     if (count($user) > 0) {
        //         return view('dashboard.user.search_home', compact('profile', 'user'))->with('success', 'done');
        //     }

        // }
}
