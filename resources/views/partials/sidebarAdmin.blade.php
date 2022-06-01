<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">

            <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/agclogo.png') }}" alt="User profile picture" height="100">

            {{-- <img id="showImage" src="{{ url('profile-images/no_image.jpg') }}" style="width: 50px; width: 50px; border: 1px solid #000000; border-radius:50px;"> --}}
            {{-- @if (auth()->user()->picture ==null) --}}

            {{-- <img id="showImage" src="{{ url('profile-images/no_image.jpg') }}" style="width: 50px; width: 50px; border: 1px solid #000000; border-radius:50px;"> --}}

            {{-- @else --}}

            {{-- <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/agclogo.png') }}" alt="User profile picture" height="100"> --}}
            {{-- <img src="{{ asset('storage/'.Auth::user()->picture) }}" class="img-circle" alt="User Image"> --}}
            {{-- @endif --}}

        </div>
        <br>
        <br>
        <br>
        <div class="pull-left info">

            <p>{{ Auth::user()->name }}
                <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/agclogo.png') }}" alt="User profile picture" height="100">


            </p>
            <a href="#"><i class="fa fa-circle text-success"></i>

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}


                </a>
            </div>
        </div>
        <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">{{ Auth::user()->first_name.'      '. Auth::user()->sur_name }}</li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Registration</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Add member</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i>Add Qualification </a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Add Family Members</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Add Family Photo</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Add About Me Note</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Profile Page</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>


        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>New Members</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

                <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Add member</a></li>
                <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i>Add Qualification </a></li>
                <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Add Family Members</a></li>
                <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Add Family Photo</a></li>
                <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Add About Me Note</a></li>

          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Income</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Add Income</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Edit Income</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Delete Income</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Expenses</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> Add Expenses</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> View All Expenses</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Edit expenses</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Delete expenses</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Dedications Record</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> A new Dedication</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> View All Dications</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Edit dedication </a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Delete dedications</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tithes Record</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> View Tithers</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Edit Tithe Record</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Delete Tithe Record</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <i class="fa fa-angle-left pull-right"></i>

            <ul class="treeview-menu">
                <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Appointment</a></li>

                <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Registrations</a></li>

                <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i>Registrations</a></li>
              </ul>

          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Church records</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> View all Members</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Finance
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Monthly Account Records</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Monthly Remitances
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Sectional Remittance</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> General Counsel Remittance</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-book"></i> <span>Church Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important(Birthdays)</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Wedding Anniversary</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Burial Records</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
