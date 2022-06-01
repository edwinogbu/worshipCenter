<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, Profile $profile)
    {
        // $profile =Profile::all();
        // $profile =Profile::where('id', Auth::user()->id)->get();
        // $user =User::all();
        $profilee = Profile::where('user_id', Auth::user()->id)->latest()->paginate(12);
        $user = User::where('user_id', Auth::user()->id)->latest()->paginate(12);
dd($user);
        Toastr::success('login successfully :)','success');

        return view('dashboard.user.home', compact('profile', 'user'));
    }
}
