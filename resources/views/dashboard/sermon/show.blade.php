@extends('layouts.mainApp')


@section('content')

<div class="box box-primary p-5">
    <div class="box-header with-border p-5">

            <a style="display: inline; font-style: italic; margin:20px; " class="btn btn-primary pull-left btn-round btn-out btn-md mr-3  p-5" href="{{ route('user.home') }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>

                User Home</span>
            </a>
        <a style="background-color: #f82249; color: #FFFFFF display: inline; font-style: italic; margin:20px;" class="btn btn-primary pull-right btn-round btn-out btn-lg btn btn-lg bg-primary mx-5" href="{{ route('profile.index') }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>

            User Profile</span>
        </a>

        <h3 class="profile-username text-center"><span style="color:green; backgroud:white">

            <h2 class="box-title"><span style="color:green; backgroud:white">
                {{ Auth::user()->first_name }} Profile Detail</span></h2>        </span></h3>
    </div>
    {{-- <h3 class="profile-username text-center"><span style="color:green; backgroud:white; font-style:italic">{{ auth()->user()->first_name .' '.auth()->user()->sur_name }}</span></h3> --}}
    <strong style="color:red; backgroud:white"><i class="fa fa-user margin-r-5"></i> <span> {{ Auth::user()->first_name }} is : </span ><span style="color:green; backgroud:white">Online</span></strong>

</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


    <div class="card-body">

      <!-- Main content -->
      <section class="content">

    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                    <div class="box-body box-profile">

                    </div>
                <div class="box box-danger"></div>
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box">
                    <!-- Profile Image -->
                        <div class="box-body box-profile">

                        <!-- Tithe Remark -->
                            <div class="list-group-item">
                                <strong style="color:red; backgroud:white"><i class="fa fa-dollar margin-r-5"></i> <span>
                                    <b>Tithe Status</b> <br> Remark: <a class="pull-right">
                                    <span style="color:green; backgroud:white">Faithful</span></a>
                                   </span >
                                </strong>
                            </div>
                        </div>
                       <div class="box box-danger"></div>
                {{-- </div> --}}
                    <!-- /.box -->
            </div>
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                        <p class="text-muted">
                            {{ auth()->user()->profile->qualification }}
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                        <p class="text-muted">{{ auth()->user()->profile->address }}</p>

                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                        <p>
                        <span class="label label-danger">{{ auth()->user()->profile->occupation }}</span>
                        <span class="label label-success">Coding</span>
                        <span class="label label-info">Javascript</span>
                        <span class="label label-warning">PHP</span>
                        <span class="label label-primary">Node.js</span>
                        </p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <!-- TABLE: LATEST ORDERS -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-9 col-sm-9 col-xs-9">
            <div class="box box-danger"  >
                <div class="box-header with-border">
                    <div class="user-block">
                        <img class="justify-content-center rounded-circle" src="{{ asset('img/agclogo.png')}}" alt="" title="" height="20px" width="20px">
                        <span class="username">
                            <a href="#">Leadership Postion:-{{ auth()->user()->profile->position }}</a>

                            </span>
                        <span class="description">
                            <span class="date ">{{ Carbon\Carbon::parse(auth()->user()->profile->created_at)->isoFormat('MMM Do YYYY') }}</span>

                        </span>
                        <a style="display: inline; font-style: italic;" class="btn btn-primary pull-right btn-round btn-out btn-lg mr-3  p-5" href="{{ route('profile.edit',Auth::user()->profile->id) }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>Edit</a>

                    </div>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">


                        <div class="col-sm-12">
                            <div class="box box-primary">
                                <div class="box-body box-profile">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <tbody>


                                                        <tr>
                                                            <th width="20%">Title ID</th>
                                                            <td>{{ Str::ucfirst($sermon->sermon_title) }}  {{ Str::ucfirst(Auth::user()->sur_name) }}</td>
                                                        </tr>
                                                        <tr style="margin: 40px">
                                                            <th width="20%">Full Name</th>
                                                            <td style="width:40px;" width="60%">{{ Str::ucfirst($sermon->speaker_name) }}
                                                                {{-- &nbsp; {{ Str::ucfirst($profile->user->sur_name) }}</td> --}}
                                                        </tr>
                                                        {{-- </tr> --}}
                                                        {{-- <tr> --}}
                                                                <br>
                                                                <br>
                                                                <br>
                                                                <td>
                                                                    <iframe src="/sermons/{{ $sermon->file }}" frameborder="2" height="400" width="600" style="margin: 40px;"></iframe>

                                                                </td>
                                                        {{-- </tr> --}}


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="box box-danger"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




</section>

      </div>
      <!-- /.table-responsive -->
    </div>
    </div>
    </div>
      <!-- /.content -->
{{-- </div> --}}

@endsection


