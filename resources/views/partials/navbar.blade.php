

  <header class="main-header"  >
<div id="headers">

    <!-- Logo -->
    <a href="{{ route('user.home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b><b>G</b><b>C</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>
          Worship</b>CENTER
        <div class="user-block">
            <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/logo-mega-glory-full.png') }}" alt="User profile picture" height="100">
        </div>
      </span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="{{ route('user.home') }}" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Home</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu" >
        <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
                <a href="{{ route('user.userPost') }}" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
              {{-- <span class="label label-success">{{ auth()->user()->posts->count() }}</span> --}}
            </a>
            <ul class="dropdown-menu">
                {{-- <li class="header">You have {{ auth()->user()->post->count() }} posts</li> --}}
              <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li><!-- start message -->
                    <a href="{{ route('user.userPost') }}">
                      <div class="pull-left">
                          <img src="{{ asset('img/logo-mega-glory-crest.png') }}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        MGM Post
                        {{-- <small><i class="fa fa-clock-o"></i> {{ auth()->user()->post->created_at->diffForHumans() }}</small> --}}
                      </h4>
                      <p></p>
                    </a>
                  </li>
                  <!-- end message -->

                </ul>
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
              <span class="label label-warning">{{ auth()->user()->count() }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{ auth()->user()->count() }} notifications</li>
              <li>
                  <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                      <a href="#">
                      <i class="fa fa-users text-aqua"></i> {{ auth()->user()->count() }} new members joined already
                    </a>
                  </li>


                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          {{-- <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
              <li>
                  <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    <li><!-- Task item -->
                    <a href="#">
                        <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                    </h3>
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                    </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                        <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                    </h3>
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                    </div>
                </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                          Make beautiful transitions
                        <small class="pull-right">80%</small>
                    </h3>
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
            </ul>
          </li> --}}
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                @if ( Auth::user()->profile !== null)
                {{-- <img class="profile-user-img img-responsive img-circle" src="{{ Storage::url(Auth::user()->profile->picture) }}" style="width: 100px; height: 100px; border: 1px solid #000000; border-radius:100%;" alt="User profile picture" height=""> --}}
                <img src="{{ Storage::url(Auth::user()->profile->picture) }}" class="user-image" alt="User Image">

                @else
                {{-- <img src="{{ asset('dist/img/avatar04.png') }}" class="user-image" alt="User Image"> --}}
                <img id="showImage" src="{{ url('profile-images/no_image.jpg') }}" class="user-image">

                @endif
              <span class="hidden-xs"> {{ auth()->user()->first_name."  ". auth()->user()->sur_name  }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                @if ( Auth::user()->profile !== null)
                {{-- <img class="profile-user-img img-responsive img-circle" src="{{ Storage::url(Auth::user()->profile->picture) }}" style="width: 100px; height: 100px; border: 1px solid #000000; border-radius:100%;" alt="User profile picture" height=""> --}}
                {{-- <img src="{{ Storage::url(Auth::user()->profile->picture) }}" class="user-image" alt="User Image"> --}}
                <img src="{{ Storage::url(Auth::user()->profile->picture) }}" class="img-circle" alt="User Image">

                @else
                {{-- <img src="{{ asset('dist/img/avatar04.png') }}" class="user-image" alt="User Image"> --}}
                <img id="showImage" src="{{ url('profile-images/no_image.jpg') }}" class="user-image">


                @endif

                <p>
                  {{ auth()->user()->first_name }} -{{ !empty(auth()->user()->profile) ? Auth::user()->profile->occupation :'No data pls update profile' }}

                  <small>Member since:
                    {{-- <span class="date">{{ Carbon\Carbon::parse($post->created_at)->isoFormat('MMM Do YYYY') }}</span> --}}

                    <span class="date">
                        {{ !empty(auth()->user()->profile) ? Carbon\Carbon::parse (Auth::user()->profile->created_at)->isoFormat('MMM Do YYY'):'No data pls update profile' }}

                        {{-- {{ Carbon\Carbon::parse(Auth::user()->profile->created_at)->isoFormat('MMM Do YYYY') }} --}}
                    </span>

                </small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">{{ !empty(auth()->user()->profile) ? auth()->user()->email : 'No Data pls Update Profile' }}</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                    @if (Auth::user()->profile !=null)

                    {{-- <a href="{{ route('profile.detail', auth()->user()->profile->id) ?? '' }}" class="btn btn-block " style="background-color: #f82249; color: #fffff1"><b>View all/Update record</b></a> --}}
                    <a href="{{ route('profile.detail', auth()->user()->profile->id) ?? '' }}" class="btn btn-primary btn-flat">Profile</a>
                    @else

                    <a href="{{ route('profile.create') }}" class="btn btn-primary btn-flat">Create Profile</a>

                    @endif
                </div>
                <div class="pull-right">
                  <a href="{{  route('user.logout')  }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-danger btn-flat">Logout out</a>
                <form action="{{ route('user.logout') }}" method="POST" class="d-none" id="logout-form">@csrf</form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
</div>
</header>


