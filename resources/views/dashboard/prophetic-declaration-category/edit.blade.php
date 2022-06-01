@extends('layouts.mainApp')


@section('content')

<div class="container">
    <div class="row justify-content-center">


      <!-- Main content -->
    <section class="content">

            <!-- TABLE: LATEST ORDERS -->
            <div class="clearfix visible-sm-block"></div>
        {!! Toastr::message()  !!}
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
                @if ($msg=Session::get('success'))
                <div class="alert alert-success">{{ $msg }}</div>
                @endif

                @if ($msg=Session::get('fail'))
                <div class="alert alert-danger">{{ $msg }}</div>
                @endif
                <div class="box-body box-profile box-body mx-4">


                        <form action="{{ route('user.declarationCategory.update', $declarationCategory->id) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        {{-- <input type="hidden" name="id" value="{{ $declarationCategory->id }}"> --}}

                        <div class="form-group row">
                            <div class="col-md-12 col-sm-12, col-xs-12">
                                <label for="declaration_title" class="col-form-label text-md-right">{{ __('Declaration title') }}</label>
                                {{-- <input id="declaration_title" type="text" class="form-control @error('declaration_title') is-invalid @enderror" name="declaration_title" value="{{ old('declaration_title') }}" required autocomplete="declaration_title" autofocus> --}}
                                <textarea name="declaration_title" id="" cols="30" rows="3" class="form-control @error('declaration_title') is-invalid @enderror" name="declaration_title" value="{{ $declarationCategory->declaration_title}}">
                                    {{$declarationCategory->declaration_title }}
                                </textarea>
                                @error('declaration_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>




                        <div class="form-group row mb-0 text-center">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-lg btn-success" style="background-color: #; color:#fff; float:center">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="box box-danger"></div>

                </div>
            </div>
        </div>


    </section>


    </div>
</div>
      <!-- /.content -->
{{-- </div> --}}

@endsection






