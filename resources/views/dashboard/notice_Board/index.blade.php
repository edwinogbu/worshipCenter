@extends('layouts.mainApp')

@section('content')
<div class="container">
    <!-- About Me Box -->
    <div class="box box-primary p-5">
       <div class="box-header with-border p-5">
           <h3 class="box-title"> Notice BoardCategory Dashboard</h3>
       </div>
   </div>
{{-- </div> --}}
   <!-- /.box -->
   <div class="row justify-content-center">

           <section class="content-header with-border">

           <div class="box box-header with-border box-success">
               {{-- <h1>
                   {{ Auth::user()->first_name }}'s Profile
               </h1> --}}

               @if (Session::has('success'))
               <div class="alert alert-dark-success alert-dismissable fade show" style="width: 15%;">
                   <i class="feather icon-check-circle" style="font-size:1em"></i>
                   {{ Session::get('success') }}
               </div>

               @endif

               {!! Toastr::message() !!}

               @if ($msg=Session::get('success'))
               <div class="alert alert-success">{{ $msg }}</div>
               @endif

               @if ($msg=Session::get('fail'))
               <div class="alert alert-danger">{{ $msg }}</div>
               @endif

           </div>

           </section>

                <!-- Main content -->
                <section class="content">

                        <div class="col-md-12">
                            <div class="row">
                                <!-- TABLE: LATEST ORDERS -->
                                <div class="clearfix visible-sm-block"></div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="box box-danger"  >
                                        <div class="box-header with-border">
                                            <div class="user-block">
                                                    <img class="justify-content-center rounded-circle" src="{{ asset('img/logo-mega-glory-crest.png')}}" alt="" title="" height="20px" width="20px">
                                                    <span class="username">
                                                        <a href="#"> </a>

                                                        </span>
                                                    <span class="description"></span>
                                                    <div class="text-right">
                                                        {{-- <a class="btn btn-success btn-round btn-out btn-md m-5 mb-4 ml-5 " ><span class="glyphicon glyphicon-book btn-round btn-out"></span>Create Blog</a> --}}
                                                        {{-- <a class="btn btn-success btn-round btn-lg btn-out btn-md m-5 mb-4 ml-5 "  data-toggle="modal" data-target="#modal-blog"><span class="glyphicon glyphicon-book btn-round btn-out"></span>Create Post</a> --}}
                                                        <a class="btn btn-success btn-round btn-lg btn-out btn-md m-5 mb-4 ml-5 "  data-toggle="modal" data-target="#modal-noticeBoardCategory"><span class="glyphicon glyphicon-book btn-round btn-out"></span>Create Category</a>

                                                    </div>
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
                                                                <thead class="bg bg-black" style="color:#fff">
                                                                <tr>
                                                                    <th>
                                                                        <div class="chk-option">
                                                                            <div class="checkbox-fade fade-in-primary">
                                                                                <span >SN</span>
                                                                            </div>
                                                                        </div>
                                                                    </th>

                                                                    <th width="">Program</th>
                                                                    <th width="">Category</th>
                                                                    <th width="">Start Time</th>
                                                                    <th width="">End Time</th>
                                                                    <th width="">Start Date</th>
                                                                    <th width="">End Date</th>
                                                                    <th width="">Venue</th>
                                                                    <th width="">Banner</th>
                                                                    <th width="">Speaker</th>
                                                                    <th width="">Topic</th>
                                                                    <th width="">Bible Text</th>
                                                                    <th width="">Theme</th>
                                                                    <th width="">Created Date</th>
                                                                    <th class="text-right">Action</th>
                        {{-- notice_board_category_id,start_time,end_time,start_date,end_date,venue,banner,speaker, theme,topic, bible_text --}}

                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @foreach ($noticeBoards as $noticeBoard)

                                                                    <tr>
                                                                        <td>
                                                                        <div class="chk-option">
                                                                            <div class="checkbox-fade fade-in-primary">
                                                                                <label class="check-task">
                                                                                    <input type="checkbox" value="">
                                                                                    {{-- <span class="cr">
                                                                                                <i class="cr-icon fa fa-check txt-default"></i>
                                                                                            </span> --}}
                                                                                </label>
                                                                            </div>
                                                                        </div>

                                                                    </td>
                                                                    <td>
                                                                        {{ Str::words(strtoupper($noticeBoard->theme), $words =100, $end='..') }}
                                                                    </td>
                                                                    <td>
                                                                        {{ Str::words(strtoupper($noticeBoard->noticeBoardCategory->name), $words =100, $end='..') }}
                                                                    </td>
                                                                    <td>
                                                                        {{ Str::words(strtoupper($noticeBoard->start_time), $words =100, $end='..') }}
                                                                    </td>
                                                                    <td>
                                                                        {{ Str::words(strtoupper($noticeBoard->end_time), $words =100, $end='..') }}
                                                                    </td>
                                                                    <td>
                                                                        {{ Str::words(strtoupper($noticeBoard->start_date), $words =100, $end='..') }}
                                                                    </td>
                                                                    <td>
                                                                        {{ Str::words(strtoupper($noticeBoard->end_date), $words =100, $end='..') }}
                                                                    </td>
                                                                    <td>
                                                                        {{ Str::words(strtoupper($noticeBoard->venue), $words =100, $end='..') }}
                                                                    </td>
                                                                    <td>
                                                                        {{ Str::words(strtoupper($noticeBoard->speaker), $words =100, $end='..') }}
                                                                    </td>

                                                                    <td>
                                                                        <span class="date">{{ $noticeBoard->theme }}</span>

                                                                    </td>
                                                                    <td>
                                                                        <span class="date">{{ $noticeBoard->topic }}</span>

                                                                    </td>
                                                                    <td>
                                                                        <span class="date">{{ $noticeBoard->created_at }}</span>

                                                                    </td>

                                                                    <td class="">


                                                                        <form style="display: inline" action="{{ route('user.noticeBoard.delete', $noticeBoard->id) }}" method="post">

                                                                            <div class="btn-group">

                                                                                <a class="btn btn-primary btn-round btn-out btn-sm mr-3 " href="{{ route('user.noticeBoard.edit',$noticeBoard->id) }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>Edit</a>

                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" class=" btn btn-danger btn-round btn-out btn-sm mr-3 btn-danger btn-round btn-out"><span class="glyphicon glyphicon-trash btn-round btn-out"></span>Delete</button>
                                                                            </div>

                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                                @endforeach

                                                                </tbody>
                                                            </table>


                                                            <a href="#" class="btn btn-block " style="background-color: #f82249; color: #fffff1"><b></b></a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="box box-danger"></div>
                                                </div>

                                            </div>
                                            </div>

                                        </div>
                                </div>


                                <!-- /.col -->

                            </div>
                        </div>
                        <!-- /.table-responsive -->
                </section>



{{--

    <div class="row">
        <div class="col-xs-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Category Modal </h3>
            </div>
            <div class="box-body"> --}}
                {{-- <a class="btn btn-success btn-round btn-lg btn-out btn-md m-5 mb-4 ml-5 "  data-toggle="modal" data-target="#modal-default"><span class="glyphicon glyphicon-book btn-round btn-out"></span>Create Category</a> --}}
              {{-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Launch Default Modal
              </button> --}}
            {{-- </div>
          </div>
        </div>
    </div> --}}

    <!--CATEGORY MODAL--->
    <div class="modal fade" id="modal-noticeBoardCategory">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Default Modal</h4>
            </div>
            <div class="modal-body">
                    <form action="{{ route('user.noticeBoardCategory.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="card-header">
                                <h5>Create New  notice Board Category</h5>
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
    <!--END CATEGORY MODAL--->





    <!--BLOG MODAL---->

    <!--END BLOG MODAL---->

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {


            $(document).on('click', '.add_category', function (e) {
                e.preventDefault();
                var data = {
                    'name': $('.name').val(),
                }
                console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('user.category.store') }}",
                    data: data,
                    dataType: "json",
                    success:function (response) {

                        console.log(data);
                        if (response.status == 400) {
                            console.log(response);

                            $('#saveform_errList').html("");
                            $('#saveform_errList').addClass('alert alert-danger');

                            $.each(function (key, err_values) {
                                $('#saveform_errList').append('<li>'+err_values+'</li>');
                            });


                        }
                    }
                });




            });

        });
    </script>

@endsection

