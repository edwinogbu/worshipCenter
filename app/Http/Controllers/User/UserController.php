<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;
use Illuminate\Database\Eloquent\Builder;


class UserController extends Controller
{
    function create(Request $request){
          //validate
          $request->validate([
           'name'=>'required',
           'email'=>'required|email|unique:users,email',
           'password'=>'required|min:5|max:30',
           'cpassword'=>'required|min:5|max:30|same:password'

          ]);

          $user = new User();
          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = Hash::make($request->password);
         $save = $user->save();

         if( $save ){
            return redirect()->back()->with('success', 'You are registered successfully');
         }else{
            return redirect()->back()->with('fail', 'registration failed');
        }




    }

    function check(Request $request){
        $request->validate([
            'email'=>'required|email|unique:users,email',
           'password'=>'required|min:5|max:30',
        ],
        [
            'email.exist'=>'this email already exist in the database',
        ]);

            $creds = $request->only('email', 'password');
            if (Auth::guard('web')->attempt($creds) ) {
              return redirect()->route('user.home');
            }else {
                return redirect()->route('user.login')->with('fail', 'Incorrect credential');
            }
    }
    public function logout(){
            Auth::guard('web')->logout();
            return redirect('/');
        }
    public function search(Request $request){
        // dd($request->all());
        $q = $request->q;
        if ($q != "") {
            $membership_id = $request->input('q');
            $result = DB::table('profiles')->where(function ($query) use ($membership_id){
                $query->where('membership_id', 'LIKE', "%membership_id%");
            })->latest()->get();
            $profile=Profile::orderby('user_id', 'desc')->first();
            $user = User::where('membership_id', 'LIKE', '%' . $q . '%')->orWhere('email', 'LIKE', '%' . $q . '%')->get();
            if (count($user) > 0) {
                return view('dashboard.user.search_home', compact('profile', 'user','result'))->with('success', 'done');
            }

        }




        return redirect()->back()->with('success', 'No Record Found');
    }



    public function searchAllUser(Request $request)
    {
        dd($request->all());
        $search =  $request->input('q');
        if($search!=""){
            $Members = Profile::where(function ($query) use ($search){
                $query->where('membership_id', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%');
            })
            ->paginate(2);
            $Members->appends(['q' => $search]);
        }
        else{
            $Members = User::paginate(2);
        }
        return View('dashboard.user.')->with('data',$Members);
        //
    }
 }
