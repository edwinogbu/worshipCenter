@extends('layouts.mainApp')


@section('content')

<div class="container">
    <div class="row justify-content-center">
      <!-- Main content -->
      <section class="content">
        <div class="row">
                    <div class="col-md-4">
                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                            </div>
                            <div class="box box-danger"></div>
                        </div>
                        <!-- /.box -->

                        <!-- About Me Box -->
                        <div class="box box-primary">
                                <img class="profile-user-img img-responsive img-circle" src="{{ asset('dist/img/credit/visa.png') }}" alt="User profile picture" height="100">
                                <div class="box-header with-border">
                                    <h3 class="box-title">About Me</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                        <strong><i class="fa fa-book margin-r-5"></i> Tithe Status</strong>
                                        <p class="text-muted">
                                            Regular
                                        </p>
                                        <hr>
                                        <strong><i class="fa fa-map-marker margin-r-5"></i> Upcoming programs</strong>
                                        <p class="text-muted">
                                            28 March 2022
                                        </p>
                                        <hr>
                                        <strong><i class="fa fa-pencil margin-r-5"></i> Lead Pastor</strong>
                                        <p >
                                            <img style="float: left" src="{{ asset('img/pastor/pastor.jpg') }}" class="profile-user-img img-responsive img-circle"  alt="User profile picture"  width="50">
                                        </p>

                                        <hr>
                                        <br>
                                        <br>
                                        <br>
                                        <strong><i class="fa fa-file-text-o margin-r-5"></i> March prophecy</strong>

                                        <p>Your Bless</p>
                                </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->

                <!-- TABLE: LATEST ORDERS -->
                <div class="clearfix visible-sm-block"></div>
           <div class="col-md-8 col-sm-8 col-xs-8">
                <div class="box box-danger"  >
                    <div class="box-header with-border">
                        <div class="user-block">
                            <img class="justify-content-center rounded-circle" src="{{ asset('img/agclogo.png')}}" alt="" title="" height="20px" width="20px">
                            <span class="username">
                                <a href="#">MembershipID: </a>
                                </span>
                            <span class="description">july 18 - 7:30 PM today</span>
                        </div>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                        <!-- /.box-header -->
                    <div class="box-body box-profile box-body mx-4">
                        <form action="{{ route('user.incomeCategory.update', $incomeCategory->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-header">
                                            <h5>Create New Post Category</h5>
                                    </div>
                                        <div class="card-block">
                                            <div class="form-group has-success row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="inputSuccess1">Name</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input name="name" type="text" class="form-control form-control" id="inputSuccess1" value="{{ $incomeCategory->name }}">
                                                        @if ($errors->has('name'))
                                                        <div class="alert alert-danger mt-1 mb-1">
                                                            {{ $errors->first('name') }}
                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>

                                                <div class="text-right m-r-20">
                                                    <button type="submit" class=" b-b-primary btn-success btn-round btn btn-out">Create</button>
                                                </div>
                                            </div>
                        </form>
                            <div class="box box-danger"></div>
                    </div>
                </div>
            </div>
        </div>




    <div class="row">
        <div class="col-xs-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Category Modal </h3>
            </div>
            <div class="box-body">
                <a class="btn btn-success btn-round btn-lg btn-out btn-md m-5 mb-4 ml-5 "  data-toggle="modal" data-target="#modal-default"><span class="glyphicon glyphicon-book btn-round btn-out"></span>Create Category</a>

              {{-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Launch Default Modal
              </button> --}}
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Default Modal</h4>
            </div>
            <div class="modal-body">


                <form action="{{ route('user.incomeCategory.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                                <h5>Create New Post Category</h5>
                        </div>
                            <div class="card-block">
                                <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Name</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input name="name" type="text" class="form-control form-control" id="inputSuccess1">
                                            @if ($errors->has('name'))
                                            <div class="alert alert-danger mt-1 mb-1">
                                                {{ $errors->first('name') }}
                                                </div>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="text-right m-r-20">
                                        <button type="submit" class=" b-b-primary btn-success btn-round btn btn-out">Create</button>
                                    </div>
                                </div>
                            </form>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                {{-- <button type="submit" class=" b-b-primary btn-success btn-round btn btn-out">Create</button> --}}
                            </div>
                        </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
      </section>
      <!-- /.content -->
</div>
</div>

@endsection






