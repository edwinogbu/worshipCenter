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
               <h1>
                   {{ Auth::user()->first_name }}'s Profile
               </h1>

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

                                                                    <th width="">Program song_title</th>
                                                                    <th width="">song Name</th>
                                                                    <th width=""> song_unique_name</th>
                                                                    <th width=""> song_size</th>
                                                                    <th width="">song_size </th>
                                                                    <th width=""> song_extension</th>
                                                                    <th width="">album_name Picture</th>
                                                                    <th width="">album_year </th>
                                                                    <th width="">artist_name </th>
                                                                    <th width="">song_thumbnail </th>
                                                                    <th class="text-right">Action</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @foreach ($sermons as $sermon)

                                                                    <tr>
                                                                        <td>
                                                                        <div class="chk-option">
                                                                            <div class="checkbox-fade fade-in-primary">
                                                                                <label class="check-task">
                                                                                    <input type="checkbox" value="">
                                                                                    <span class="cr">
                                                                                        <i class="cr-icon fa fa-check txt-default">
                                                                                            {{-- {{ ++$loop->index }} --}}

                                                                                        </i>
                                                                                    </span>

                                                                                </label>
                                                                            </div>
                                                                        </div>

                                                                    </td>
                                                                    <td>
                                                                        {{ Str::words(strtoupper($sermon->sermon_theme), $words =100, $end='..') }}
                                                                    </td>
                                                                    <td>
                                                                        {{ Str::words(strtoupper($sermon->speaker_name), $words =100, $end='..') }}
                                                                    </td>
                                                                    <td>
                                                                        {{ Str::words(strtoupper($sermon->sermon_title), $words =100, $end='..') }}
                                                                    </td>
                                                                    <td>
                                                                        {{ Str::words(strtoupper($sermon->sermon_text), $words =100, $end='..') }}
                                                                    </td>
                                                                    <td>
                                                                        {{-- {{ Str::words(strtoupper($sermon->sermon_date), $words =100, $end='..') }} --}}
                                                                    </td>
                                                                    <td>
                                                                        {{-- <a href="{{ route('user.sermon.show',$sermon->id) }}">View</a> --}}
                                                                        {{-- {{ Str::words(strtoupper($sermon->file), $words =100, $end='..') }} --}}
                                                                    </td>
                                                                    <td>
                                                                        {{-- <a href="{{ route('user.download', $sermon->file) }}">Download</a> --}}
                                                                        {{-- {{ Str::words(strtoupper($sermon->speaker_picture), $words =100, $end='..') }} --}}
                                                                    </td>

                                                                    {{-- <td> --}}
                                                                        {{-- <span class="date">{{ Carbon\Carbon::parse($sermon->created_at)->isoFormat('MMM Do YYYY') }}</span> --}}

                                                                    {{-- </td> --}}

                                                                    <td class="text-right">


                                                                        <div class="btn-group " style="display: inline">
                                                                            <form style="display: inline" action="#" method="post">
                                                                                <a style="display: inline; font-style: italic;" class="btn btn-primary btn-round btn-out btn-sm mr-3 " href="#"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>Edit</a>
                                                                                {{-- <a style="display: inline; font-style: italic;" class="btn btn-info btn-round btn-out btn-sm mr-3 " href="{{ route('user.sermon.show',$sermon->id) }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>Show</a> --}}

                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" style="display: inline; font-style: italic;" class="btn btn-danger btn-round btn-out btn-sm mr-3 " class=" btn waves-effect waves-light btn-danger btn-round btn-out" style="display: inline"><i class="icofont icofont-warning-alt"></i>Delete</button>

                                                                            </form>
                                                                        </div>
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
                    <form action="{{ route('user.sermonAudio.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="card-header">
                                <h5>Create New  notice Board Category</h5>
                            </div>
                            <div class="card-block">
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">File upload</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input name="file[]" style="height:38px" type="file" class="form-control form-control" id="inputSuccess1">
                                            {{-- @if ($errors->has('file'))
                                            <div class="alert alert-danger mt-1 mb-1">
                                                {{ $errors->first('file') }}
                                                </div>
                                            @endif --}}

                                        </div>
                                    </div>
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Artist Name</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input name="artist_name[]" style="height:38px" type="text" class="form-control form-control" id="inputSuccess1">
                                        </div>
                                    </div>
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Album Name</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input name="album_name[]" style="height:38px" type="text" class="form-control form-control" id="inputSuccess1">
                                        </div>
                                    </div>
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Album Year</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input name="album_year[]" style="height:38px" type="text" class="form-control form-control" id="inputSuccess1">
                                        </div>
                                    </div>
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Album Year</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input name="song_title[]" type="text" class="form-control form-control" id="inputSuccess1">
                                        </div>
                                    </div>
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Song Thumbnail</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input name="song_thumbnail[]" style="height:38px" type="file" class="form-control form-control" id="inputSuccess1">

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

