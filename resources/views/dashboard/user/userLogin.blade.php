@extends('layouts.loginApp')

@section('content')
<style>
.log-in-panel {
    position: relative;
    overflow: hidden;
    /* height: 100%; */
    /* bottom: 0px; */
    background: #fff;
    width: 100%;
    margin: 0 auto;
    margin-top: 5%;
}


.main-content{
    /* background-image: url("{{  asset('img/pastor/pastor21.jpg') }} "); */
    /* background-image: url("{{  asset('img/venue-info-bg.jpg') }}"); */
    /* background-image: url("{{  asset('img/pastor/pastor.jpg') }} "); */
    /* background-image: url("{{  asset('img/intro-bg.jpg') }}"); */
    /* background-image: url("{{  asset('img/church/1.jpg') }}"); */
    /* background-image: url("{{  asset('img/church/2.jpg') }}"); */
    /* background-image: url("{{  asset('img/church/3.jpg') }}"); */
    /* background-image: url("{{  asset('img/church/4.jpg') }}"); */
    /* background-image: url("{{  asset('img/church/5.jpg') }}"); */
    /* background-image: url("{{  asset('img/church/6.jpg') }}"); */
    /* background-image: url("{{  asset('img/church/7.jpg') }}"); */
    background-image: url("{{  asset('img/about-bg.jpg') }}");

    /* background-size: cover; */
    /* background-repeat: no-repeat; */

    background-color: #f82249
}



.card{
border-radius:0 0px 100% 100%;
  background-image: url("{{  asset('public/img/venue-info-bg.jpg') }}");
  background-image: 20px 20px;
  border: 10px solid #dddfeb;
    /* border-radius: 50px; */
    font-weight: 600;
    /* background-color: #19161a; */
    color: #fff;
    /* padding: 10px 100px; */
  /* background-color: #f82249; */
  height: 400px;
  width: 500px;

}
.card-header{
    border-radius:0 0px 100% 100%;
  background-image: url("{{  asset('img/intro-bg.jpg') }}");
  border: none;
    /* border-radius: 50px; */
    font-weight: 600;
    /* background-color: #f82249; */
    color: #fff;
}


img{
    border-radius: 100%;
}
.logo-name{
   color: #002147;
   /* background: #f8ffff; */
   font-size: large;
   font-style: italic;
   font-weight: 900;

}
</style>
<section>
    <div class="ed-mob-menu">
        <div class="ed-mob-menu-con">
            <div class="ed-mm-left">
                    <div class="wed-logo">
                        <a href="#">
                            <img class="justify-content-center rounded-circle" src="{{ asset('img/logo-mega-glory-full.png')}}" alt="" title="" height="100px" width="100px">
						</a>
                    </div>
                </div>
                <div class="ed-mm-right">
                    <div class="ed-mm-menu">
                        <a href="#!" class="ed-micon"><i class="fa fa-bars"></i></a>
                        <div class="ed-mm-inn">
                            <a href="#!" class="ed-mi-close"><i class="fa fa-times"></i></a>


                            <h4>User Account</h4>
                            <ul>
                                <li><a href="#!" data-toggle="modal" data-target="#modal1">Sign In</a></li>
                                <li><a href="#!" data-toggle="modal" data-target="#modal2">Register</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--HEADER SECTION-->
    <section>
        <!-- TOP BAR -->
        <div class="ed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ed-com-t1-left">
                            <ul>
                                <li><a href="#">Contact: Church AAGC Command </a>
                                </li>
                                <li><a href="#">Phone: +234-6568-8038</a>
                                </li>
                            </ul>
                        </div>
                        <div class="ed-com-t1-left">
                            <ul>
                                <li><a href="#">
                                    {{-- <img class="justify-content-center rounded-circle" src="{{ asset('img/agc.jpg')}}" alt="" title="" height="100px" width="100px"> --}}

                                </a>
                                </li>

                            </ul>
                        </div>
                        <div class="ed-com-t1-right">
                            <ul class="mt-5 pt-5"  style="margin: 20px; padding:20px;">
                                <li><a href="#!" data-toggle="modal" data-target="#modal1">Sign In</a>
                                </li>
                                <li><a href="#!" data-toggle="modal" data-target="#modal2">Sign Up</a>
                                </li>
                            </ul>

                        </div>

                        <div class="ed-com-t1-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- POPULAR COURSES -->
        <section class="pop-cour">
        <div class="main-content">
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="con-title">
                    <p>
                        <div class="text-center">
                            <img class="justify-content-center rounded-circle" src="{{ asset('img/logo-mega-glory-full.png')}}" alt="" title="" height="200px" width="400px">
                            <h2>
                                {{-- <span class="logo-name">MEGA</span> <span class="logo-name">GLORY</span> <br>
                                <br>
                               <span class="logo-name">INTERDENOMINATION</span> <span class="logo-name">MINISTRY</span> --}}
                            </h2>
                            {{-- <h2>Login <span>Account</span></h2> --}}
                        </div>
                </p>
                </div>
            </div>
            <div class="row">

        <div id="modal" class="col-sm-12 h-100 w-100" >
            <div class="log-in-panel">

                    <div class="log-in-pop-left  col-sm-6">

                        <div class="row">
                            <div class="pro-user">
                                {{-- <img class="justify-content-center rounded-circle" src="{{ asset('img/aglogo.png')}}" alt="" title="" height="200px" width="200px"> --}}

                                <img src="{{ asset('img/pastor/pastor.jpg') }}" alt="user" class="justify-content-center rounded-circle">
                            </div>
                            {{-- <div class="pro-user-bio"> --}}
                                {{-- <ul>
                                    <li>
                                        <h4>Emily Jessica</h4>
                                    </li> --}}
                                    {{-- <li><a href="#!"><i class="fa fa-facebook"></i> Facebook: my sample</a></li> --}}
                                {{-- </ul> --}}
                            {{-- </div> --}}
                        </div>
                    <h1>Hello...</h1>
                    <p>Don't have an account? Create your account. It's take less then a minutes
                        <div>
                            <div class="input-field s12">
                                <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2" style="color: #fff;
                                    font-style: italic;
                                    font-weight: 800;
                                    ">Create a new account
                                </a>
                                <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal3" style="color: #fff;
                                  font-style: italic;
                                  font-weight: 800;
                                 ">Forgot password</a> |
                            </div>
                        </div>
                    </p>
                    <h4>Login with social media</h4>

                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                        </li>
                        <li><a href="#"><i class="fa fa-google"></i> Google+</a>
                        </li>
                        <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                        </li>
                    </ul>
                </div>
                <div class="log-in-pop-right">
                    <a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="">
                    </a>
                    {{-- <h4>Login</h4> --}}
                    <p style="color:#212; font-weight: 800; ">Already have an account? pls login. It's take less then a minutes</p>
                    <form method="POST" action="{{ route('login') }}" class="s12">
                        <div class="card">
                        @csrf
                                        @if (Session::get('fail'))
                                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                                        @endif

                                        <div>
                                            <div class="input-field s12">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                          <label class="col-form-label text-md-right" style="color:#221; font-weight: 800;  ">{{ __('User Email') }}</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                            {{-- <input id="email" type="email" class="col-sm-8" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  style="color:#212; background: #dddfeb; border:3px solid #f82249; border-radius:15px; font-weight: 800; "> --}}
                                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="current-password" style="color:#212; background: #dddfeb; border:3px solid #f82249; border-radius:15px; font-weight: 800; ">

                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="input-field s12">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                          <label class="col-form-label text-md-right" style="color:#221; font-weight: 800; ">{{ __('Password') }}</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="color:#212; background: #dddfeb; border:3px solid #f82249; border-radius:15px; font-weight: 800; ">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="color:#212; background: #dddfeb; font-weight: 800; ">
                                            <div class="input-field s12">
                                                <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="s12 log-ch-bx">
                                                                {{-- <p> --}}
                                                                    <input type="checkbox" id="test5">
                                                                    <label for="test5" class="col-form-label text-md-right" style="color:#212; font-weight: 700; ">
                                                                        {{ __('Remember Me') }}
                                                                    </label>
                                                                {{-- </p> --}}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="input-field s4 text-center">
                                                                <i class="waves-effect waves-light log-in-btn waves-input-wrapper" style="">
                                                                    <input type="submit" value="Login" class="waves-button-input btn-sm btn-lg" style="color:#dddfeb; margin: 15px; font-weight: 800; ">
                                                                </i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="margin-top: 50px;">
                                            <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal3"
                                                style="
                                                color: #fff;
                                                background: #F24033;

                                            font-weight: 800;
                                            display: inline-block;
                                            color: #fff;
                                            padding: 12px;
                                            border-radius: 5px;
                                            font-size: 14px;"
                                                >Forgot password</a> |
                                                <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2"
                                                style="
                                                display: inline-block;
                                            background: #3F51B5;
                                            color: #fff;
                                            padding: 12px;
                                            border-radius: 5px;
                                            font-size: 14px;
                                                font-weight: 800;"
                                                >Create a new account</a> </div>
                                        </div>
                                    </div>
                    </form>


                </div>
            </div>
        </div>
            </div>
        </div>
    </div>


    <div class="card-body bg-gray mb-5 mb-lg-2 mt-5 ">
empty space
    </div>
    </section>
    <!--SECTION LOGIN, REGISTER AND FORGOT PASSWORD-->
    <section>
        <!-- LOGIN SECTION -->
        <div id="modal1" class="modal fade" role="dialog" style="display: none;">
            <div class="log-in-pop">
                <div class="log-in-pop-left">
                    <h1>Hello...</h1>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <h4>Login with social media</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                        </li>
                        <li><a href="#"><i class="fa fa-google"></i> Google+</a>
                        </li>
                        <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                        </li>
                    </ul>
                </div>

                <div class="log-in-pop-right">
                    <a href="#" class="pop-close" data-dismiss="modal"><img src="{{ asset('images/cancel.png') }}" alt="">
                    </a>
                    {{-- <h4>Login</h4> --}}
                    <p>Already have an account? login to your dashboard. It's take less then a minutes</p>

                    <form method="POST" action="{{ route('login') }}" class="s12">
                        @csrf
                                        @if (Session::get('fail'))
                                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                                        @endif

                                        <div>
                                            <div class="input-field s12">
                                                {{-- <input type="text" data-ng-model="name" class="validate"> --}}
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                <label>User Emaiil</label>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="input-field s12">
                                                {{-- <input type="password" class="validate"> --}}
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label class="">Password</label>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="s12 log-ch-bx">
                                                <p>
                                                    <input type="checkbox" id="test5">
                                                    <label for="test5">
                                                        {{ __('Remember Me') }}

                                                        Remember me</label>
                                                </p>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="input-field s4">
                                                <i class="waves-effect waves-light log-in-btn waves-input-wrapper" style="">
                                                    <input type="submit" value="Login" class="waves-button-input">
                                                </i> </div>
                                            </div>
                                        <div style="margin-top: 50px;">
                                            <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal3"
                                                style="
                                                color: #fff;
                                                background: #F24033;

                                            font-weight: 800;
                                            display: inline-block;
                                            color: #fff;
                                            padding: 12px;
                                            border-radius: 5px;
                                            font-size: 14px;"
                                                >Forgot password</a> |
                                                <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2"
                                                style="
                                                display: inline-block;
                                            background: #3F51B5;
                                            color: #fff;
                                            padding: 12px;
                                            border-radius: 5px;
                                            font-size: 14px;
                                                font-weight: 800;"
                                                >Create a new account</a> </div>
                                        </div>
                                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- REGISTER SECTION -->
        <div id="modal2" class="modal fade" role="dialog" style="display: none;">
            <div class="log-in-pop">
                <div class="log-in-pop-left">

                    <div class="row">
                        <div class="pro-user">
                            {{-- <img class="justify-content-center rounded-circle" src="{{ asset('img/aglogo.png')}}" alt="" title="" height="200px" width="200px"> --}}

                            <img src="{{ asset('img/pastor/pastor.jpg') }}" alt="user" class="justify-content-center rounded-circle">
                        </div>
                        {{-- <div class="pro-user-bio"> --}}
                            {{-- <ul>
                                <li>
                                    <h4>Emily Jessica</h4>
                                </li> --}}
                                {{-- <li><a href="#!"><i class="fa fa-facebook"></i> Facebook: my sample</a></li> --}}
                            {{-- </ul> --}}
                        {{-- </div> --}}
                    </div>
                    <h1>Hello...</h1>
                    <p> Create your account. It's take less then a minutes</p>
                    {{-- <h4>Login with social media</h4> --}}
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i> </a>
                        </li>
                        <li><a href="#"><i class="fa fa-google"></i> </a>
                        </li>
                        <li><a href="#"><i class="fa fa-twitter"></i> </a>
                        </li>
                    </ul>
                </div>
                <div class="log-in-pop-right">
                    <a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="">
                    </a>
                    <h4>Create an Account</h4>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    {{-- <form class="s12">
                        <div>
                            <div class="input-field s12">
                                <input type="text" data-ng-model="name1" class="validate">
                                <label>User name</label>
                            </div>
                        </div>
                        <div>
                            <div class="input-field s12">
                                <input type="email" class="validate">
                                <label>Email id</label>
                            </div>
                        </div>
                        <div>
                            <div class="input-field s12">
                                <input type="password" class="validate">
                                <label>Password</label>
                            </div>
                        </div>
                        <div>
                            <div class="input-field s12">
                                <input type="password" class="validate">
                                <label>Confirm password</label>
                            </div>
                        </div>
                        <div>
                            <div class="input-field s4">
                                <i class="waves-effect waves-light log-in-btn waves-input-wrapper" style=""><input type="submit" value="Register" class="waves-button-input"></i> </div>
                        </div>
                        <div>
                            <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">Are you a already member ? Login</a> </div>
                        </div>
                    </form> --}}

                    <form method="POST" action="{{ route('register') }}" class="">
                        @csrf

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sur_name" class="col-md-4 col-form-label text-md-right">{{ __('Sur Name') }}</label>

                            <div class="col-md-6">
                                <input id="sur_name" type="text" class="form-control @error('sur_name') is-invalid @enderror" name="sur_name" value="{{ old('sur_name') }}" required autocomplete="sur_name" autofocus>

                                @error('sur_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0 text-center">

                            <i class="waves-effect waves-light log-in-btn waves-input-wrapper" style="">
                                <input type="submit" value="Register New User" class="waves-button-input">
                            </i>
                                {{-- <button type="submit" class="waves-button-input" style="background-color: #f24; color:#fff; float:center">
                                    {{ __('Register') }}
                                </button> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- FORGOT SECTION -->
        <div id="modal3" class="modal fade" role="dialog" style="display: none;">
            <div class="log-in-pop">
                <div class="log-in-pop-left">
                    <h1>Hello... </h1>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <h4>Login with social media</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                        </li>
                        <li><a href="#"><i class="fa fa-google"></i> Google+</a>
                        </li>
                        <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                        </li>
                    </ul>
                </div>
                <div class="log-in-pop-right">
                    <a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="">
                    </a>
                    <h4>Forgot password</h4>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <form method="POST" action="{{ route('password.update') }}" class="s12">

                        <div>
                            <div class="input-field s12">
                                <input type="text" data-ng-model="name3" class="validate">
                                <label>User name or email id</label>
                            </div>
                        </div>
                        <div>
                            <div class="input-field s4">
                                <i class="waves-effect waves-light log-in-btn waves-input-wrapper" style=""><input type="submit" value="Submit" class="waves-button-input"></i> </div>
                        </div>
                        <div>
                            <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">Are you a already member ? Login</a> | <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2">Create a new account</a> </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </section>

    <!-- SOCIAL MEDIA SHARE -->
    <section>
        <div class="icon-float">
            <ul>
                <li><a href="#" class="sh">1k <br> Share</a> </li>
                <li><a href="#" class="fb1"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="gp1"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="tw1"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="li1"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="wa1"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="sh1"><i class="fa fa-envelope-o" aria-hidden="true"></i></a> </li>
            </ul>
        </div>
    </section>

<div class="hiddendiv common"></div>

@endsection














