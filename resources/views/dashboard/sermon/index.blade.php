@extends('layouts.mainApp')

@section('content')
<div class="container">
    <!-- About Me Box -->
    <div class="box box-primary p-5">
       <div class="box-header with-border p-5 text-center">
           <h3 class="box-title text-center" style="text-align: center; font-weight: 900;"> Sermons Dashboard</h3>
           <a class="btn btn-success btn-round btn-lg btn-out btn-md m-5 mb-4 ml-5 pull-right p-5" style="margin: 20px;" ><span class="glyphicon glyphicon-book btn-round btn-out"></span>Church Forum</a>
           <a class="btn btn-success btn-round btn-lg btn-out btn-md m-5 mb-4 ml-5 pull-left p-5" style="margin: 20px;" ><span class="glyphicon glyphicon-book btn-round btn-out"></span>Home</a>

       </div>
   </div>
{{-- </div> --}}
   <!-- /.box -->
   <div class="row justify-content-center">

           {{-- <section class="content-header with-border">

           <div class="box box-header with-border box-success">
               <h1>
                   Sermons Dashboard
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

           </section> --}}

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
                                                        <a class="btn btn-success btn-round btn-lg btn-out btn-md m-5 mb-4 ml-5 "  data-toggle="modal" data-target="#modal-sermon" style="margin-right: 50px;"><span class="glyphicon glyphicon-book btn-round btn-out"></span>Create Sermons</a>

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

                                                                    <th width="">Program sermon_theme</th>
                                                                    <th width="">Speaker Name</th>
                                                                    <th width="">Sermon Title</th>
                                                                    <th width="">Sermon Text</th>
                                                                    <th width="">Sermon date</th>
                                                                    <th width=""> File</th>
                                                                    <th width="">Speaker Picture</th>
                                                                    {{-- <th width="">Created Date</th> --}}
                                                                    <th class="text-right">Action</th>
                        {{-- notice_board_category_id,start_time,end_time,start_date,end_date,venue,banner,speaker, theme,topic, bible_text --}}

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
                                                                        {{ Str::words(strtoupper($sermon->sermon_date), $words =100, $end='..') }}
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ route('user.sermon.show',$sermon->id) }}">View</a>
                                                                        {{-- {{ Str::words(strtoupper($sermon->file), $words =100, $end='..') }} --}}
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ route('user.download', $sermon->file) }}">Download</a>
                                                                        {{-- {{ Str::words(strtoupper($sermon->speaker_picture), $words =100, $end='..') }} --}}
                                                                    </td>

                                                                    {{-- <td> --}}
                                                                        {{-- <span class="date">{{ Carbon\Carbon::parse($sermon->created_at)->isoFormat('MMM Do YYYY') }}</span> --}}

                                                                    {{-- </td> --}}

                                                                    <td class="text-right">


                                                                        <div class="btn-group " style="display: inline">
                                                                            <form style="display: inline" action="{{ route('user.sermon.delete', $sermon->id) }}" method="post">
                                                                                <a style="display: inline; font-style: italic;" class="btn btn-primary btn-round btn-out btn-sm mr-3 " href="{{ route('user.sermon.edit',$sermon->id) }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>Edit</a>
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



    <!--SERMON MODAL--->
    <div class="modal fade" id="modal-sermon">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Default Modal</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('user.sermon.store') }}" class="box-body box-profile mx-5"  enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">

                        <div class="col-md-6">
                            <label for="file" class="col-form-label text-md-right">{{ __('file') }}</label>

                            <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" value="{{ old('file') }}" required autocomplete="file" autofocus>

                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="sermon_theme" class="col-form-label text-md-right">{{ __('Program Theme') }}</label>
                            <input type="text" name="sermon_theme" id="sermon_theme" class="form-control @error('sermon_theme') is-invalid @enderror" value="{{ old('sermon_theme') }}">
                            @error('sermon_theme')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                        <div class="form-group row">

                            <div class="col-md-6">
                                <label for="speaker_name" class="col-form-label text-md-right">{{ __('speaker_name') }}</label>
                                <input type="text" name="speaker_name" id="speaker_name" class="form-control @error('speaker_name') is-invalid @enderror" value="{{ old('speaker_name') }}">
                                @error('speaker_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="speaker_picture" class="col-form-label text-md-right">{{ __('speaker_picture') }}</label>
                                <input type="file" name="speaker_picture" id="speaker_picture" class="form-control @error('speaker_picture') is-invalid @enderror" value="{{ old('speaker_picture') }}">
                                @error('speaker_picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">

                            <div class="col-md-6">
                                <label for="sermon_title" class="col-form-label text-md-right">{{ __('sermon_title') }}</label>
                                <input type="text" name="sermon_title" id="sermon_title" class="form-control @error('sermon_title') is-invalid @enderror" value="{{ old('sermon_title') }}">
                                @error('sermon_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="sermon_text" class="col-form-label text-md-right">{{ __('sermon_text') }}</label>
                                <textarea name="sermon_text"  cols="30" rows="3" id="sermon_text" type="text" class="form-control @error('sermon_text') is-invalid @enderror" value="{{ old('sermon_text') }}">
                                {{ old('sermon_text') }}
                                </textarea>

                                @error('sermon_text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                    </div>

                    <div class="form-group row">



                        <div class="col-md-6">
                            <label for="sermon_date" class="col-form-label text-md-right">{{ __('bible_text') }}</label>

                            <input id="sermon_date" type="text" class="form-control @error('sermon_date') is-invalid @enderror" name="sermon_date" value="{{ old('sermon_date') }}" required autocomplete="sermon_date" autofocus>

                            @error('sermon_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row mb-0 text-center">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-lg btn-danger" style="background-color: #f24; color:#fff; float:center">
                                {{ __('Create Event') }}
                            </button>
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

