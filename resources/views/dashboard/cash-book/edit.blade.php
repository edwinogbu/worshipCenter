@extends('layouts.mainApp')


@section('content')

<div class="container">
    <div class="row justify-content-center">


      <!-- Main content -->
    <section class="content">

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
                @if ($msg=Session::get('success'))
                <div class="alert alert-success">{{ $msg }}</div>
                @endif

                @if ($msg=Session::get('fail'))
                <div class="alert alert-danger">{{ $msg }}</div>
                @endif
                <div class="box-body box-profile box-body mx-4">


                    <form method="POST" action="{{ route('user.cashbook.update', $cashBook->id) }}" class="box-body box-profile mx-5"  enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="church_attendance" class="col-form-label text-md-right">{{ __('Church Attendance') }}</label>

                                <input id="church_attendance" type="text" class="form-control @error('church_attendance') is-invalid @enderror" name="church_attendance" value="{{ $cashBook->church_attendance }}" required autocomplete="church_attendance" autofocus>

                                @error('church_attendance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="" class="col-form-label text-md-right">{{ __('Sunday School Attendance') }}</label>
                                <input id="sunday_school_attendance" type="text" class="form-control @error('sunday_school_attendance') is-invalid @enderror" name="sunday_school_attendance" value="{{ $cashBook->sunday_school_attendance }}" required autocomplete="sunday_school_attendance" autofocus>

                                @error('sunday_school_attendance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>

                            <div class="form-group row">

                                <div class="col-md-6">
                                    <label for="sunday_school_offering" class="col-form-label text-md-right">{{ __('Sunday School Offering') }}</label>

                                    <input id="sunday_school_offering" type="text" class="form-control @error('sunday_school_offering') is-invalid @enderror" name="sunday_school_offering" value="{{ $cashBook->sunday_school_offering }}" required autocomplete="sunday_school_offering" autofocus>

                                    @error('sunday_school_offering')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                    <label for="church_offering" class="col-form-label text-md-right">{{ __('Church Offering') }}</label>

                                    <input id="church_offering" type="text" class="form-control @error('church_offering') is-invalid @enderror" name="church_offering" value="{{ $cashBook->church_offering }}" required autocomplete="church_offering" autofocus>

                                    @error('church_offering')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>


                        <div class="form-group row">


                                <div class="col-md-6">
                                    <label for="tithe" class="col-form-label text-md-right">{{ __('tithe') }}</label>

                                    <input id="tithe" type="text" class="form-control @error('tithe') is-invalid @enderror" name="tithe" value="{{ $cashBook->tithe }}" required autocomplete="tithe" autofocus>

                                    @error('tithe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="thanks_giving_offering" class="col-form-label text-md-right">{{ __('Thanks Giving Offering') }}</label>

                                    <input id="thanks_giving_offering" type="text" class="form-control @error('thanks_giving_offering') is-invalid @enderror" name="thanks_giving_offering" value="{{ $cashBook->thanks_giving_offering }}" required autocomplete="thanks_giving_offering" autofocus>
                                    @error('thanks_giving_offering')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                        </div>




                        <div class="form-group row">

                                <div class="col-md-6">
                                    <label for="children_offering" class="col-form-label text-md-right">{{ __('Children Offering') }}</label>

                                    <input id="children_offering" type="text" class="form-control @error('children_offering') is-invalid @enderror" name="children_offering" value="{{ $cashBook->children_offering }}" required autocomplete="children_offering" autofocus>

                                    @error('children_offering')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="record_date" class="col-form-label text-md-right">{{ __('record_date') }}</label>

                                    <input id="Children Offering" type="date" class="form-control @error('record_date') is-invalid @enderror" name="record_date" value="{{ $cashBook->record_date }}" required autocomplete="record_date" autofocus>

                                    @error('record_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-lg btn-success" style="background-color: #; color:#fff; float:center">
                            {{ __('Register') }}
                        </button>
                        <button type="button" class="btn btn-danger btn-lg pull-left" data-dismiss="modal">Close</button>
                        {{-- <button type="submit" class=" b-b-primary btn-success btn-round btn btn-out">Create</button> --}}
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






