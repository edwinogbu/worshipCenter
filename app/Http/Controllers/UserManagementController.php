<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\UserManagement;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search =  $request->input('q');
        if($search!=""){
            $Members = User::where(function ($query) use ($search){
                $query->where('membership_id', 'like', '%'.$search.'%')
                    // ->orWhere('first_name', 'like', '%'.$search.'%')
                    ->orWhere('phone', 'like', '%'.$search.'%');
            })
            ->paginate(1);
            $Members->appends(['q' => $search]);

        }
        else{
            $Members = User::paginate(1);
        }

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

        $userManagements = User::all();
        return view('dashboard.user-management.index', compact('Members','profile','admin_profiles','search','userManagements'))->with('success', 'done');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user-management.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $first_name  = $request->first_name;
        $sur_name  = $request->sur_name;
        $phone     = $request->phone;
        $email     = $request->email;
        $role_name = $request->role_name;
        $password = $request->password;

      $reg =[

          'first_name'=> $first_name,
          'sur_name'  => $sur_name ,
          'phone'     => $phone ,
          'email'     => $email,
          'role_name' => $role_name,
          'password' => Hash::make($password),

      ];

      User::create($reg);
      Toastr::success('New User added successfully :)','Success');


      return redirect()->route('user.userManagement.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserManagement  $userManagement
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $profile=Profile::first();
              $user = User::get();

        return view('dashboard.profile.show', compact('user', 'profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserManagement  $userManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(User $userManagement)
    {
        $userManagement =User::findOrFail($userManagement->id);

        return view('dashboard.user-management.edit', compact('userManagement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserManagement  $userManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id  = User::find($id);
        $first_name  = $request->first_name;
        $sur_name    = $request->sur_name;
        $phone       = $request->phone;
        $email       = $request->email;
        $role_name   = $request->role_name;
        $password    = $request->password;

      $update =[

          'id'=> $id,
          'first_name'=> $first_name,
          'sur_name'  => $sur_name ,
          'phone'     => $phone ,
          'email'     => $email,
          'role_name' => $role_name,
          'password' => Hash::make($password),

      ];

    //   DB::table('users')->where('id', $request->id)->update($update);
      User::where('id', $request->id)->update($update);
    Toastr::info('user record updated successfully :','info');

      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserManagement  $userManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userManagement = User::findOrFail($id);
        $userManagement->delete();
        Toastr::error('User Record deleted successfully :)','error');

        return back()->with('message', 'User deleted successfully');

    }





 	public function PasswordView()
    {

        return view('dashboard.user-management.edit_password');

    }



    public function PasswordUpdate(Request $request){
        $validatedData = $request->validate([
           'oldpassword' => 'required',
           'password' => 'required|confirmed',
       ]);

       $hashedPassword = Auth::user()->password;
       if (Hash::check( $request->oldpassword, $hashedPassword )) {
           $user = User::find(Auth::id());
           $user->password = Hash::make($request->password);
           $user->save();
           Auth::logout();
           return redirect()->route('user.login');
       }else{
           return redirect()->back();
       }

    } // End Method


}
