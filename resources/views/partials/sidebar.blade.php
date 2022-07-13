  <aside class="main-sidebar">
    <div class="user-block">
        <a href="{{ url('/') }}">

            <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/logo-mega-glory-full.png') }}" alt="User profile picture" height="100">
        </a>
    </div>
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            @if (auth()->user()->profile !=null)

            <a href="{{ url('/') }}">

                <img src="{{ Storage::url(auth()->user()->profile->picture) }}" class="img-circle" alt="User Image" style="max-width: 10%; max-height: 10%; border-radius:50%;">
            </a>

            @else


            {{-- <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> --}}
            <img id="showImage" src="{{ url('profile-images/no_image.jpg') }}" class="img-circle" >


            @endif
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->first_name }}</p>
          <a href="{{ url('/') }}"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      {{-- <form action="{{ route('profile.index') }}" method="get" class="sidebar-form"> --}}
        <form action="{{ route('profile.user.search') }}" method="get" class="sidebar-form " style="background-color: #ffffff;">
            @csrf
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search membership Record..." style="background-color: #ffffff;" >
            <span class="input-group-btn">
                <button type="submit" name="q" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

    @if (Auth::user()->role_name =='super_admin')

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">{{ Auth::user()->first_name.'      '. Auth::user()->sur_name }}</li>
        <li class="active treeview menu-open">
            <ul class="treeview-menu">
                <li><a href="{{ url('/') }}"><i class="fa fa-home ti-more"></i>HOME PAGE</a></li>
            </ul>
        </li>
        <li class="active treeview menu-open">
            <ul class="treeview-menu">
                <li><a href="{{ url('user/home') }}"><i class="fa fa-user ti-more"></i>DASHBOARD</a></li>
            </ul>
            {{-- <li class="treeview">

                <a href="{{ route('user.home') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.home') }}"><i class="fa fa-home ti-more"></i>Home</a></li>
                </ul>
            </li> --}}

        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-th"></i> <span>USER MANAGEMENT</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>

            <ul class="treeview-menu">
              <li><a href="{{ route('user.userManagement.index') }}"><i class="fa fa-book"></i> User control</a></li>
              {{-- <li><a href="{{ route('user.userManagement.create') }}"><i class="fa fa-book"></i> Add User</a></li> --}}
              <li><a href="#"><i class="fa fa-edit"></i>Activity Dashboard </a></li>
              <li><a href="{{ route('user.password.view') }}"><i class="fa fa-key"></i>Change Password</a></li>

              {{-- <li><a href="{{ route('profile.index') }}"><i class="fa fa-edit"></i>View Profile </a></li> --}}
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-th"></i> <span>USER PROFILE</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>

            <ul class="treeview-menu">
              <li><a href="{{ route('profile.create') }}"><i class="fa fa-book"></i> Add Profile</a></li>
              <li><a href="{{ route('profile.view') }}"><i class="fa fa-edit"></i>Profile Dashboard </a></li>
              <li><a href="{{ route('profile.index') }}"><i class="fa fa-edit"></i>View Profile </a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-th"></i> <span>MAKE POST</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>

            <ul class="treeview-menu">
              <li><a href="{{ route('user.userPost') }}"><i class="fa fa-book"></i> Add Post</a></li>
              {{-- <li><a href="{{ route('user.') }}"><i class="fa fa-edit"></i>Profile Dashboard </a></li> --}}
              {{-- <li><a href="{{ route('profile.index') }}"><i class="fa fa-edit"></i>View Profile </a></li> --}}
            </ul>
          </li>

        <li class="treeview">
            <a href="#">
              <i class="fa fa-share"></i> <span>BLOG SECTION</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <div class="box box-primary"></div>
                <div class="header"></div>
                <li class="treeview">
                    <a href="#">
                      <i class="fa fa-laptop"></i>
                      <span>BLOG CATEGORY</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('user.category.create') }}"><i class="fa fa-book"></i> create category </a></li>
                        <li><a href="{{ route('user.category.index') }}"><i class="fa fa-book"></i> View Blog category </a></li>

                    </ul>
                  </li>
                  <li class="header">BLOG CATEGORY SECTION</li>
                  <div class="box box-primary"></div>

                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-laptop"></i>
                      <span>BLOG</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('user.post.create') }}"><i class="fa fa-book"></i> create</a></li>
                        <li><a href="{{ route('user.post.index') }}"><i class="fa fa-book"></i> View Blog</a></li>

                    </ul>
                  </li>

                  <li class="header">BLOG SECTION</li>
                  <div class="box box-primary"></div>

              </ul>

        </li>

          {{-- <li class="treeview">
            <a href="#">
              <i class="fa fa-folder"></i> <span>Blog Category</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('user.category.create') }}"><i class="fa fa-book"></i> create category </a></li>
              <li><a href="{{ route('user.category.index') }}"><i class="fa fa-book"></i> View Blog category </a></li>

            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-folder"></i> <span>Blog</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('user.post.create') }}"><i class="fa fa-book"></i> create</a></li>
              <li><a href="{{ route('user.post.index') }}"><i class="fa fa-book"></i> View Blog</a></li>

            </ul>
          </li> --}}
          <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>TESTIMONY</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('user.testimony.create') }}"><i class="fa fa-book"></i> create Testimony</a></li>
                <li><a href="{{ route('user.testimony.index') }}"><i class="fa fa-book"></i> View Testimony</a></li>

              </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-share"></i> <span>PROPHETIC SECTION</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <div class="box box-primary"></div>
                <div class="header"></div>
                <li class="treeview">
                    <a href="#">
                      <i class="fa fa-laptop"></i>
                      <span>CATEGORY</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('user.category.create') }}"><i class="fa fa-book"></i> create category </a></li>
                        <li><a href="{{ route('user.declarationCategory.index') }}"><i class="fa fa-book"></i> PROPHETIC CATEGORY </a></li>

                    </ul>
                  </li>
                  <li class="header">DECLARATION CATEGORY SECTION</li>
                  <div class="box box-primary"></div>

                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-laptop"></i>
                      <span>DECLARATION</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        {{-- <li><a href="{{ route('user.post.create') }}"><i class="fa fa-book"></i> create</a></li> --}}
                        <li><a href="{{ route('user.propheticDeclaration.index') }}"><i class="fa fa-book"></i> Prophecy</a></li>

                    </ul>
                  </li>

                  <li class="header">PROPHETIC DECLARATION SECTION</li>
                  <div class="box box-primary"></div>

              </ul>

        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-share"></i> <span>SERMON SECTION</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <div class="box box-primary"></div>
                <div class="header"></div>
                <li class="treeview">
                    <a href="#">
                      <i class="fa fa-laptop"></i>
                      <span>CATEGORY</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('user.category.create') }}"><i class="fa fa-book"></i> create category </a></li>
                        <li><a href="{{ route('user.category.index') }}"><i class="fa fa-book"></i> View Blog category </a></li>

                    </ul>
                  </li>
                <li class="header">SERMON  SECTION</li>
                  <div class="box box-primary"></div>

                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-laptop"></i>
                      <span>SERMONS</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('user.sermon.create') }}"><i class="fa fa-book"></i> create Sermons</a></li>
                        <li><a href="{{ route('user.sermon.index') }}"><i class="fa fa-book"></i> View Sermons</a></li>

                        <li><a href="{{ route('user.sermonAudio.index') }}"><i class="fa fa-book"></i> Audio</a></li>
                        <li><a href="{{ route('user.sermonAudio.download') }}"><i class="fa fa-book"></i> Audio</a></li>
                        {{-- <li><a href="{{ route('user.sermon.index') }}"><i class="fa fa-book"></i> View Sermons</a></li> --}}

                    </ul>
                </li>

                  <li class="header">PROPHETIC DECLARATION SECTION</li>
                  <div class="box box-primary"></div>

              </ul>

        </li>
          <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>APPOINTMENT</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('user.appointment.create') }}"><i class="fa fa-book"></i> create appointment</a></li>
                <li><a href="{{ route('user.appointment.index') }}"><i class="fa fa-book"></i> View appointment</a></li>

              </ul>
          </li>

        <li class="treeview">
            <a href="#">
              <i class="fa fa-share"></i> <span>ACCOUNT SECTION</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <div class="box box-primary"></div>
                <div class="header"></div>
                <li class="treeview">
                    <a href="#">
                      <i class="fa fa-laptop"></i>
                      <span>INCOME CATEGORY</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{ route('user.incomeCategory.index') }}"><i class="fa fa-circle-o"></i> Modify Income</a></li>
                      <li><a href="{{ route('user.incomeCategory.create') }}"><i class="fa fa-circle-o"></i> Create Income</a></li>
                      <li><a href="{{ route('user.dynamic.incomeCategory.create') }}"><i class="fa fa-circle-o"></i> Create dynamic Income</a></li>
                    </ul>
                  </li>
                  <li class="header">INCOME CATEGORY SECTION</li>
                  <div class="box box-primary"></div>

                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-laptop"></i>
                      <span>Income</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('user.income.index') }}"><i class="fa fa-circle-o"></i> Modify Income</a></li>
                      <li><a href="{{ route('user.income.create') }}"><i class="fa fa-circle-o"></i> Create Income</a></li>
                    </ul>
                  </li>

                  <li class="header">INCOME SECTION</li>
                  <div class="box box-primary"></div>

                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-laptop"></i>
                      <span>Expense Category</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('user.expenseCategory.index') }}"><i class="fa fa-circle-o"></i> Modify expense Category</a></li>
                      <li><a href="{{ route('user.expenseCategory.create') }}"><i class="fa fa-circle-o"></i> Create expense Category</a></li>
                    </ul>
                  </li>
                  <li class="header">EXPENSE CATEGORY SECTION</li>
                  <div class="box box-primary"></div>


                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-laptop"></i>
                      <span>Expense</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('user.expense.index') }}"><i class="fa fa-circle-o"></i> Modify expense</a></li>
                      <li><a href="{{ route('user.expense.create') }}"><i class="fa fa-circle-o"></i> Create expense</a></li>
                    </ul>
                  </li>
                  <li class="header">EXPENSE SECTION</li>
                  <div class="box box-primary"></div>

                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-book"></i>
                      <span>CASH BOOK</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        {{-- <li><a href="{{ route('user.incomeExpense.index') }}"><i class="fa fa-circle-o"></i> Modify expense</a></li> --}}
                      {{-- <li><a href="{{ route('user.expense.create') }}"><i class="fa fa-circle-o"></i> Create expense</a></li> --}}
                      <li><a href="{{ route('user.cashBook.index') }}"><i class="fa fa-circle-o"></i> Create cashbook</a></li>
                    </ul>
                  </li>

                  <div class="box box-primary"></div>
                  <li class="header">CASH BOOK SECTION</li>

                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-laptop"></i>
                      <span>SUMMARY REPORT</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('user.incomeExpense.index') }}"><i class="fa fa-circle-o"></i> Modify expense</a></li>
                      {{-- <li><a href="{{ route('user.expense.create') }}"><i class="fa fa-circle-o"></i> Create expense</a></li> --}}
                    </ul>
                  </li>
                  <li class="header">ACCOUNT SUMMARY SECTION</li>
                  <div class="box box-primary"></div>

                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Three
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>

        </li>

        <li class="treeview">
            <a href="#">
              <i class="fa fa-share"></i> <span>NOTICE BOARD SECTION</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
                <ul class="treeview-menu" style="display: none;">
                    <div class="box box-primary"></div>
                    <div class="header"></div>
                    <li class="treeview">
                        <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>NOTICE CATEGORY</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('user.noticeBoardCategory.create') }}"><i class="fa fa-book"></i> create category </a></li>
                            <li><a href="{{ route('user.noticeBoardCategory.index') }}"><i class="fa fa-book"></i> View Blog category </a></li>

                </ul>
        </li>
        <li class="header">NOTICE CATEGORY SECTION</li>
                  <div class="box box-primary"></div>

                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-laptop"></i>
                      <span>NOTICE BOARD</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('user.noticeBoard.create') }}"><i class="fa fa-book"></i> create</a></li>
                        <li><a href="{{ route('user.noticeBoard.index') }}"><i class="fa fa-book"></i> Manage Notice Board</a></li>

                    </ul>
        </li>

                  <li class="header">BLOG SECTION</li>
                  <div class="box box-primary"></div>

              </ul>

        </li>
        {{-- <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Income Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('user.incomeCategory.index') }}"><i class="fa fa-circle-o"></i> Modify Income</a></li>
            <li><a href="{{ route('user.incomeCategory.create') }}"><i class="fa fa-circle-o"></i> Create Income</a></li>
            <li><a href="{{ route('user.dynamic.incomeCategory.create') }}"><i class="fa fa-circle-o"></i> Create dynamic Income</a></li>
          </ul>
        </li> --}}
        {{-- <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Income</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="{{ route('user.income.index') }}"><i class="fa fa-circle-o"></i> Modify Income</a></li>
            <li><a href="{{ route('user.income.create') }}"><i class="fa fa-circle-o"></i> Create Income</a></li>
          </ul>
        </li> --}}
        {{-- <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Expense Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="{{ route('user.expenseCategory.index') }}"><i class="fa fa-circle-o"></i> Modify expense Category</a></li>
            <li><a href="{{ route('user.expenseCategory.create') }}"><i class="fa fa-circle-o"></i> Create expense Category</a></li>
          </ul>
        </li> --}}
        {{-- <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Expense</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="{{ route('user.expense.index') }}"><i class="fa fa-circle-o"></i> Modify expense</a></li>
            <li><a href="{{ route('user.expense.create') }}"><i class="fa fa-circle-o"></i> Create expense</a></li>
          </ul>
        </li> --}}
        {{-- <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>CASH BOOK</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="{{ route('user.incomeExpense.index') }}"><i class="fa fa-circle-o"></i> Modify expense</a></li>
            <li><a href="{{ route('user.expense.create') }}"><i class="fa fa-circle-o"></i> Create expense</a></li>
            <li><a href="{{ route('user.cashBook.index') }}"><i class="fa fa-circle-o"></i> Create cashbook</a></li>
          </ul>
        </li> --}}
        {{-- <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>SUMMARY REPORT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="{{ route('user.incomeExpense.index') }}"><i class="fa fa-circle-o"></i> Modify expense</a></li>
            <li><a href="{{ route('user.expense.create') }}"><i class="fa fa-circle-o"></i> Create expense</a></li>
          </ul>
        </li> --}}
        {{-- <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>BAR CHART</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="{{ route('user.barChart.index') }}"><i class="fa fa-circle-o"></i> Barchart</a></li>
            <li><a href="{{ route('user.expense.create') }}"><i class="fa fa-circle-o"></i> Create expense</a></li>
          </ul>
        </li> --}}
        {{-- <li class="treeview">
            <a href="#">
              <i class="fa fa-book"></i>
              <span>CASH BOOK</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('user.incomeExpense.index') }}"><i class="fa fa-circle-o"></i> Modify expense</a></li>
              <li><a href="{{ route('user.expense.create') }}"><i class="fa fa-circle-o"></i> Create expense</a></li>
              <li><a href="{{ route('user.cashBook.index') }}"><i class="fa fa-circle-o"></i> Create cashbook</a></li>
            </ul>
        </li> --}}
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
    @endif




    @if (Auth::user()->role_name =='admin')

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
        <li class="header">{{ Auth::user()->first_name.'      '. Auth::user()->sur_name }}</li>
        <li class="active treeview menu-open">
            <li class="treeview">

                <a href="{{ route('user.home') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.home') }}"><i class="fa fa-home ti-more"></i>Home</a></li>
                </ul>
            </li>

        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-th"></i> <span>User Management</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>

            <ul class="treeview-menu">
              {{-- <li><a href="{{ route('user.userManagement.index') }}"><i class="fa fa-book"></i> User control</a></li> --}}
              {{-- <li><a href="{{ route('user.userManagement.create') }}"><i class="fa fa-book"></i> Add User</a></li> --}}
              <li><a href="#"><i class="fa fa-edit"></i>Activity Dashboard </a></li>
              <li><a href="{{ route('user.password.view') }}"><i class="ti-more"></i>Change Password</a></li>

              {{-- <li><a href="{{ route('profile.index') }}"><i class="fa fa-edit"></i>View Profile </a></li> --}}
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-th"></i> <span>Profile Page</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                <small class="label pull-right bg-green">new</small>
                </span>
            </a>

            <ul class="treeview-menu">
                <li><a href="{{ route('profile.create') }}"><i class="fa fa-book"></i> Add Profile</a></li>
                <li><a href="{{ route('profile.view') }}"><i class="fa fa-edit"></i>Profile Dashboard </a></li>
                <li><a href="{{ route('profile.index') }}"><i class="fa fa-edit"></i>View Profile </a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
              <i class="fa fa-th"></i> <span>MAKE POST</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>

            <ul class="treeview-menu">
              <li><a href="{{ route('user.userPost') }}"><i class="fa fa-book"></i> Add Post</a></li>
              {{-- <li><a href="{{ route('user.') }}"><i class="fa fa-edit"></i>Profile Dashboard </a></li> --}}
              {{-- <li><a href="{{ route('profile.index') }}"><i class="fa fa-edit"></i>View Profile </a></li> --}}
            </ul>
          </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-folder"></i> <span>Blog Category</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('user.category.create') }}"><i class="fa fa-book"></i> create category </a></li>
                <li><a href="{{ route('user.category.index') }}"><i class="fa fa-book"></i> View Blog category </a></li>

            </ul>
            </li>
            <li class="treeview">
            <a href="#">
                <i class="fa fa-folder"></i> <span>Blog</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('user.post.create') }}"><i class="fa fa-book"></i> create</a></li>
                <li><a href="{{ route('user.post.index') }}"><i class="fa fa-book"></i> View Blog</a></li>

            </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-folder"></i> <span>Testimony</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                <li><a href="{{ route('user.testimony.create') }}"><i class="fa fa-book"></i> create Testimony</a></li>
                <li><a href="{{ route('user.testimony.index') }}"><i class="fa fa-book"></i> View Testimony</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                  <i class="fa fa-laptop"></i>
                  <span>Expense Category</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.expenseCategory.index') }}"><i class="fa fa-circle-o"></i> Modify expense Category</a></li>
                  <li><a href="{{ route('user.expenseCategory.create') }}"><i class="fa fa-circle-o"></i> Create expense Category</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-laptop"></i>
                  <span>Expense</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.expense.index') }}"><i class="fa fa-circle-o"></i> Modify expense</a></li>
                  <li><a href="{{ route('user.expense.create') }}"><i class="fa fa-circle-o"></i> Create expense</a></li>
                </ul>
              </li>


        <li class="header">SERMON  SECTION</li>
        <div class="box box-primary"></div>

    <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>SERMONS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="{{ route('user.sermon.create') }}"><i class="fa fa-book"></i> create Sermons</a></li>
              <li><a href="{{ route('user.sermon.index') }}"><i class="fa fa-book"></i> View Sermons</a></li>

              <li><a href="{{ route('user.sermonAudio.index') }}"><i class="fa fa-book"></i> Audio</a></li>
              <li><a href="{{ route('user.sermonAudio.download') }}"><i class="fa fa-book"></i> Audio</a></li>
              {{-- <li><a href="{{ route('user.sermon.index') }}"><i class="fa fa-book"></i> View Sermons</a></li> --}}

          </ul>
    </li>


    <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span>EVENT SECTION</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
            <ul class="treeview-menu" style="display: none;">
                <div class="box box-primary"></div>
                <div class="header"></div>
                <li class="treeview">
                    <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>NOTICE CATEGORY</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('user.noticeBoardCategory.create') }}"><i class="fa fa-book"></i> create category </a></li>
                        <li><a href="{{ route('user.noticeBoardCategory.index') }}"><i class="fa fa-book"></i> View Blog category </a></li>

            </ul>
    </li>
    <li class="header">NOTICE CATEGORY SECTION</li>
              <div class="box box-primary"></div>

              <li class="treeview">
                <a href="#">
                  <i class="fa fa-laptop"></i>
                  <span>NOTICE BOARD</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.noticeBoard.create') }}"><i class="fa fa-book"></i> create</a></li>
                    <li><a href="{{ route('user.noticeBoard.index') }}"><i class="fa fa-book"></i> Manage Notice Board</a></li>

                </ul>
    </li>

    @endif



    @if (Auth::user()->role_name =='user')

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">{{ Auth::user()->first_name.'      '. Auth::user()->sur_name }}</li>
            <li class="active treeview menu-open">
                <li class="treeview">

                    <a href="{{ route('user.home') }}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('user.home') }}"><i class="fa fa-home ti-more"></i>Home</a></li>
                    </ul>
                </li>

            </li>

            <li class="treeview">
                <a href="#">
                  <i class="fa fa-th"></i> <span>User Management</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    <small class="label pull-right bg-green">new</small>
                  </span>
                </a>

                <ul class="treeview-menu">
                  {{-- <li><a href="{{ route('user.userManagement.index') }}"><i class="fa fa-book"></i> User control</a></li> --}}
                  {{-- <li><a href="{{ route('user.userManagement.create') }}"><i class="fa fa-book"></i> Add User</a></li> --}}
                  <li><a href="#"><i class="fa fa-edit"></i>Activity Dashboard </a></li>
                  <li><a href="{{ route('user.password.view') }}"><i class="fa fa-bicycle ti-more"></i>Change Password</a></li>

                  {{-- <li><a href="{{ route('profile.index') }}"><i class="fa fa-edit"></i>View Profile </a></li> --}}
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-th"></i> <span>User Profile </span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    <small class="label pull-right bg-green"></small>
                </span>
                </a>

                <ul class="treeview-menu">
                    {{-- <li><a href="{{ route('profile.view') }}"><i class="fa fa-edit"></i>Profile home </a></li> --}}
                    <li><a href="{{ route('profile.index') }}"><i class="fa fa-edit"></i>View Profile </a></li>
                    <li><a href="{{ route('profile.create') }}"><i class="fa fa-book"></i> Add Profile</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                  <i class="fa fa-th"></i> <span>Make Post</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    <small class="label pull-right bg-green">new</small>
                  </span>
                </a>

                <ul class="treeview-menu">
                  <li><a href="{{ route('user.userPost') }}"><i class="fa fa-book"></i> Add Post</a></li>
                  {{-- <li><a href="{{ route('user.') }}"><i class="fa fa-edit"></i>Profile Dashboard </a></li> --}}
                  {{-- <li><a href="{{ route('profile.index') }}"><i class="fa fa-edit"></i>View Profile </a></li> --}}
                </ul>
              </li>


            <li class="treeview">
                <a href="#">
                <i class="fa fa-folder"></i> <span>Blog Category</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.category.index') }}"><i class="fa fa-book"></i> View Blog category </a></li>
                    {{-- @if (auth()->user()->role_name == 'supper_admin || admin') --}}
                    <li><a href="{{ route('user.category.create') }}"><i class="fa fa-book"></i> create category </a></li>

                    {{-- @endif --}}

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-folder"></i> <span>Blog</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                <li><a href="{{ route('user.post.create') }}"><i class="fa fa-book"></i> create</a></li>
                <li><a href="{{ route('user.post.index') }}"><i class="fa fa-book"></i> View Blog</a></li>

                </ul>
            </li>
            @if (auth()->user()->role_name == "admin || super_admin")
            <li class="treeview">
                <a href="#">
                  <i class="fa fa-book"></i>
                  <span>CASH BOOK</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    {{-- <li><a href="{{ route('user.incomeExpense.index') }}"><i class="fa fa-circle-o"></i> Modify expense</a></li> --}}
                  {{-- <li><a href="{{ route('user.expense.create') }}"><i class="fa fa-circle-o"></i> Create expense</a></li> --}}
                  <li><a href="{{ route('user.cashBook.index') }}"><i class="fa fa-circle-o"></i> Create cashbook</a></li>
                </ul>
              </li>

              <li class="treeview">
                <a href="#">
                  <i class="fa fa-folder"></i> <span>TESTIMONY</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('user.testimony.create') }}"><i class="fa fa-book"></i> create Testimony</a></li>
                  <li><a href="{{ route('user.testimony.index') }}"><i class="fa fa-book"></i> View Testimony</a></li>

                </ul>
            </li>

        <li class="header">SERMON  SECTION</li>
            <div class="box box-primary"></div>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>SERMONS</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{ route('user.sermon.create') }}"><i class="fa fa-book"></i> create Sermons</a></li>
                  <li><a href="{{ route('user.sermon.index') }}"><i class="fa fa-book"></i> View Sermons</a></li>

                  <li><a href="{{ route('user.sermonAudio.index') }}"><i class="fa fa-book"></i> Audio</a></li>
                  <li><a href="{{ route('user.sermonAudio.download') }}"><i class="fa fa-book"></i> Audio</a></li>
                  {{-- <li><a href="{{ route('user.sermon.index') }}"><i class="fa fa-book"></i> View Sermons</a></li> --}}

              </ul>
        </li>


            @endif


    @endif


        <li><a href="#"><i class="fa fa-book"></i> <span>Church Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important(Birthdays)</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Wedding Anniversary</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Burial Records</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
