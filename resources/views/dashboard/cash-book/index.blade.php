@extends('layouts.mainApp')

@section('content')

    <div class="container">
         <!-- About Me Box -->
         <div class="box box-primary p-5">
            <a style="
            /* background-color: #f82249; */
             color: #FFFFFF display: inline; font-style: italic; margin:20px;"
             class="btn btn-primary pull-right btn-round btn-out btn-lg btn btn-lg bg-primary mx-5"
             href="{{ route('user.home') }}"><span class="glyphicon glyphicon-user btn-round btn-out"></span>

                Home Dashboard</span>
            </a>
            <div class="box-header with-border" style="text-align: center; ">
                <marquee behavior="scrol" direction="left">

                    <h3 class="box-title" >MEGA GRACE Cash Book Dashboard</h3>
                </marquee>
            </div>
        </div>
    {{-- </div> --}}
        <!-- /.box -->
        <div class="row justify-content-center">

                <section class="content-header with-border">

                <div class="box box-header with-border box-success " style="color:#fff; background-color:#f82249; ">
                    <h1 class="text-center">
                          CASH BOOK
                    </h1>
                </div>

                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="box-body">
                        <div class="row">

                            <div class="col-sm-12 col-md-12">
                                <div class="box box-primary">
                                <div class="box-body box-profile">
                                    <div class="table-responsive">
                                        <table class="table no-margin  table-bordered table-border-5  table-striped table-responsive" >
                                            <thead class="bg bg-black" style="color:#fff">
                                                <tr>
                                                    <th style="background-color: #11e060">
                                                        <div class="chk-option" >
                                                            <div class="checkbox-fade fade-in-primary">
                                                                <span >SN</span>
                                                            </div>
                                                        </div>
                                                    </th>

                                                    <th width="">SUNDAY</th>
                                                    <th width="">POSTED BY</th>
                                                    <th width="">RECORD DATE</th>
                                                    <th width="" style="color:#fff; background-color:#f82249;">TITHE</th>


                                                    <th class="text-right" style="color:#fff; background-color:#f82249;">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($titheMonthlySums as $month)
                                                    <tr style="border: 3px solid red; border-right: 3px solid red; border:#212;">
                                                            <td style="background-color: #11e060; color:#fffff1">
                                                                <div class="chk-option">
                                                                        <label class="check-task" >
                                                                            <span class="cr">
                                                                                {{ ++$loop->index }}
                                                                            </span>
                                                                        </label>
                                                                        <th class="bg bg-blac" style="color:#fff; background-color:#f82249;">

                                                                        sunday</th>
                                                                </div>
                                                            </td>
                                                        <td>
                                                            {{-- <span class="date">{{ $cashBook->user->first_name }}</span> --}}

                                                        </td>
                                                        <td>
                                                            <span class="date">{{ $month }}</span>

                                                        </td>
                                                            @foreach ( $month as $tithe_total)
                                                            <td>{{ $tithe_total }}</td>

                                                            @endforeach


                                                        <td style="border: 3px solid red; border-right: 3px solid red">
                                                            <div class="btn-group " style="display: inline">
                                                                <div class="btn-group">
                                                            {{-- <form style="display: inline" action="{{ route('user.cashbook.delete', $cashBook->id) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')


                                                                    <a style="display: inline; font-style: italic; border-radius:50px;" class="btn btn-success btn-round btn-out btn-xs mr-3 " href="{{ route('user.cashbook.edit',$cashBook->id) }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>Edit</a>

                                                                    <a style="display: inline; font-style: italic; border-radius:50px;" class="btn btn-info btn-round btn-out btn-xs mr-3 " href="{{ route('user.cashbook.show', $cashBook->id) }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>show</a>
                                                                    <button type="submit" style="display: inline; font-style: italic; border-radius:50px;" class="btn btn-danger btn-round btn-out btn-xs mr-3 "><span class="glyphicon glyphicon-trash btn-round btn-out"></span>Delete</button>

                                                                </form> --}}
                                                            </div>
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
                            <div class="text-center" style="font-size: 40px;">

                                {{  $admin_cashBooks->links()   }}
                            </div>

                        </div>
                    </div>



                        <div class="col-md-12">
                            <div class="row">
                                <!-- TABLE: LATEST ORDERS -->
                                <div class="clearfix visible-sm-block"></div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="box box-danger"  >
                                        <div class="box-header with-border">
                                            <div class="user-block mb-4">
                                                    <img class="justify-content-center rounded-circle" src="{{ asset('img/agclogo.png')}}" alt="" title="" height="20px" width="20px">
                                                    <span class="username">
                                                        <a href="#">Program Alert: Settle me Oh God April Edition </a>

                                                        </span>
                                                    <span class="description">Since july 18 - 7:30 PM today</span>
                                                    <div class="text-right">
                                                        <p class="btn btn-group">
                                                            <a  data-toggle="modal" data-target="#modal-users" class="btn btn-lg bg-primary mx-5" style="color:#fff; background-color:#11e060;"><b>New Cash Book</b></a>
                                                            {{-- <a  data-toggle="modal" data-target="#modal-blog" class="btn btn-lg mx-5 p-5" style="background-color: #f82249; color: #fffff1"><b>Create Post</b></a> --}}

                                                         </p>
                                                        {{-- <a class="btn btn-success btn-round btn-out btn-md m-5 mb-4 ml-5 " href=""><span class="glyphicon glyphicon-book btn-round btn-out"></span>Create Post</a> --}}


                                                    @if (Session::has('message'))
                                                    <div class="alert alert-success alert-dismissible fade show rounded" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button> <i class="fa fa-info mx-2"></i>
                                                        <strong>{!! session('message') !!}</strong>
                                                    </div>
                                                    @endif
                                                    </div>
                                            </div>
                                            <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                            </div>

                                        </div>
                                        <!-- /.box-header -->

                                        @if (Session::has('message'))
                                        <div class="alert alert-success alert-dismissible fade show rounded" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span></button> <i class="fa fa-info mx-2"></i>
                                            <strong>{!! session('message') !!}</strong>
                                        </div>
                                        @endif
                                        @if ( Auth::user()->role_name == 'super_admin')
                                        <div class="box-body">
                                            <div class="row">

                                                <div class="col-sm-12 col-md-12">
                                                    <div class="box box-primary">
                                                    <div class="box-body box-profile">
                                                        <div class="table-responsive">
                                                            <table class="table no-margin  table-bordered table-border-5  table-striped table-responsive" >
                                                                <thead class="bg bg-black" style="color:#fff">
                                                                    <tr>
                                                                        <th style="background-color: #11e060">
                                                                            <div class="chk-option" >
                                                                                <div class="checkbox-fade fade-in-primary">
                                                                                    <span >SN</span>
                                                                                </div>
                                                                            </div>
                                                                        </th>

                                                                        <th width="">SUNDAY</th>
                                                                        <th width="">POSTED BY</th>
                                                                        <th width="">RECORD DATE</th>
                                                                        <th width="" style="background-color: #11e060; color:#fffff1">churc_attend</th>
                                                                        <th width="" style="background-color: #11e060; color:#fffff1">ss_attend</th>
                                                                        <th width="">SS_OFERING</th>
                                                                        <th width="">CHURCH_OFERING</th>
                                                                        <th width="" style="color:#fff; background-color:#f82249;">TITHE</th>
                                                                        <th width="">THANKSGIVING_OFERING</th>
                                                                        <th width="">CHILDREN_OFERING</th>

                                                                        <th class="text-right" style="color:#fff; background-color:#f82249;">Action</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    @foreach ($admin_cashBooks as $cashBook)
                                                                        <tr style="border: 3px solid red; border-right: 3px solid red; border:#212;">
                                                                                <td style="background-color: #11e060; color:#fffff1">
                                                                                    <div class="chk-option">
                                                                                            <label class="check-task" >
                                                                                                <span class="cr">
                                                                                                    {{ ++$loop->index }}
                                                                                                </span>
                                                                                            </label>
                                                                                            <th class="bg bg-blac" style="color:#fff; background-color:#f82249;">

                                                                                            sunday</th>
                                                                                    </div>
                                                                                </td>
                                                                            <td>
                                                                                <span class="date">{{ $cashBook->user->first_name }}</span>

                                                                            </td>
                                                                            <td>
                                                                                <span class="date">{{ Carbon\Carbon::parse($cashBook->record_date)->isoFormat('MMM Do YYYY') }}</span>

                                                                            </td>
                                                                            <td>{{ $cashBook->church_attendance }}</td>
                                                                            <td>{{ $cashBook->sunday_school_attendance }}</td>
                                                                            <td>{{ $cashBook->sunday_school_offering }}</td>
                                                                            <td>{{ $cashBook->church_offering }}</td>
                                                                            <td>{{ $cashBook->tithe }}</td>
                                                                            <td>{{ $cashBook->thanks_giving_offering }}</td>
                                                                            <td>{{ $cashBook->children_offering }}</td>


                                                                            <td style="border: 3px solid red; border-right: 3px solid red">
                                                                                <div class="btn-group " style="display: inline">
                                                                                    <div class="btn-group">
                                                                                <form style="display: inline" action="{{ route('user.cashbook.delete', $cashBook->id) }}" method="post">
                                                                                    @csrf
                                                                                    @method('DELETE')


                                                                                        <a style="display: inline; font-style: italic; border-radius:50px;" class="btn btn-success btn-round btn-out btn-xs mr-3 " href="{{ route('user.cashbook.edit',$cashBook->id) }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>Edit</a>

                                                                                        <a style="display: inline; font-style: italic; border-radius:50px;" class="btn btn-info btn-round btn-out btn-xs mr-3 " href="{{ route('user.cashbook.show', $cashBook->id) }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>show</a>
                                                                                        <button type="submit" style="display: inline; font-style: italic; border-radius:50px;" class="btn btn-danger btn-round btn-out btn-xs mr-3 "><span class="glyphicon glyphicon-trash btn-round btn-out"></span>Delete</button>

                                                                                    </form>
                                                                                </div>
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
                                                <div class="text-center" style="font-size: 40px;">

                                                    {{  $admin_cashBooks->links()   }}
                                                </div>

                                            </div>
                                        </div>
                                        @else

                                            <div class="box-body">
                                                <div class="row">

                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="box box-primary">
                                                        <div class="box-body box-profile">
                                                            <div class="table-responsive">
                                                                <table class="table no-margin  table-bordered table-border-5  table-striped table-responsive" >
                                                                    <thead class="bg bg-black" style="color:#fff">
                                                                        <tr>
                                                                            <th style="background-color: #11e060">
                                                                                <div class="chk-option" >
                                                                                    <div class="checkbox-fade fade-in-primary">
                                                                                        <span >SN</span>
                                                                                    </div>
                                                                                </div>
                                                                            </th>

                                                                            <th width="">sunday</th>
                                                                            <th width="20%">date</th>
                                                                            <th width="10%" style="background-color: #11e060; color:#fffff1">churc_attend</th>
                                                                            <th width="10%" style="background-color: #11e060; color:#fffff1">ss_attend</th>
                                                                            <th width="10%">ss_Ofering</th>
                                                                            <th width="10%">church_Ofering</th>
                                                                            <th width="10%" style="color:#fff; background-color:#f82249;">Tithe</th>
                                                                            <th width="10%">ThnksG_Ofering</th>
                                                                            <th width="10%">chldrn_Ofering</th>

                                                                            <th class="text-right" style="color:#fff; background-color:#f82249;">Action</th>
                                                                        </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                        @foreach ($cashBooks as $cashBook)
                                                                            <tr style="border: 3px solid red; border-right: 3px solid red; border:#212;">
                                                                                    <td style="background-color: #11e060; color:#fffff1">
                                                                                        <div class="chk-option">
                                                                                                <label class="check-task" >
                                                                                                    <span class="cr">
                                                                                                        {{ ++$loop->index }}
                                                                                                    </span>
                                                                                                </label>
                                                                                                <th class="bg bg-blac" style="color:#fff; background-color:#f82249;">

                                                                                                sunday</th>
                                                                                        </div>
                                                                                    </td>
                                                                                <td>
                                                                                    <span class="date">{{ Carbon\Carbon::parse($cashBook->record_date)->isoFormat('MMM Do YYYY') }}</span>

                                                                                </td>
                                                                                <td>{{ $cashBook->church_attendance }}</td>
                                                                                <td>{{ $cashBook->sunday_school_attendance }}</td>
                                                                                <td>{{ $cashBook->sunday_school_offering }}</td>
                                                                                <td>{{ $cashBook->church_offering }}</td>
                                                                                <td>{{ $cashBook->tithe }}</td>
                                                                                <td>{{ $cashBook->thanks_giving_offering }}</td>
                                                                                <td>{{ $cashBook->children_offering }}</td>


                                                                                <td style="border: 3px solid red; border-right: 3px solid red">

                                                                                    <div class="btn-group " style="display: inline">
                                                                                        <a style="display: inline; font-style: italic; border-radius:50px;" class="btn btn-success btn-round btn-out btn-xs mr-3 " href="#"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>show</a>
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
                                                    {{  $cashBooks->links()   }}

                                                </div>
                                            </div>
                                        @endif
                                        </div>
                                </div>


                                <!-- /.col -->

                            </div>
                        </div>
                        <!-- /.table-responsive -->
                    </section>

                    @if (Session::has('success'))
                    <div class="alert alert-dark-success alert-dismissable fade show" style="width: 15%;">
                        <i class="feather icon-check-circle" style="font-size:1em"></i>
                        {{ Session::get('success') }}
                    </div>

                    @endif

                    {!! Toastr::message() !!}

                <!--APPOINTMENT MODAL--->
                <div class="modal fade" id="modal-users">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="font-style: italic; color:#11e060;">Creating New User. Please wait....</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('user.cashbook.store') }}" class="box-body box-profile mx-5"  enctype="multipart/form-data">
                                    @method('POST')
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="church_attendance" class="col-form-label text-md-right">{{ __('Church Attendance') }}</label>

                                            <input id="church_attendance" type="text" class="form-control @error('church_attendance') is-invalid @enderror" name="church_attendance" value="{{ old('church_attendance') }}" required autocomplete="church_attendance" autofocus>

                                            @error('church_attendance')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="" class="col-form-label text-md-right">{{ __('Sunday School Attendance') }}</label>
                                            <input id="sunday_school_attendance" type="text" class="form-control @error('sunday_school_attendance') is-invalid @enderror" name="sunday_school_attendance" value="{{ old('sunday_school_attendance') }}" required autocomplete="sunday_school_attendance" autofocus>

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

                                                <input id="sunday_school_offering" type="text" class="form-control @error('sunday_school_offering') is-invalid @enderror" name="sunday_school_offering" value="{{ old('sunday_school_offering') }}" required autocomplete="sunday_school_offering" autofocus>

                                                @error('sunday_school_offering')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                            <div class="col-md-6">
                                                <label for="church_offering" class="col-form-label text-md-right">{{ __('Church Offering') }}</label>

                                                <input id="church_offering" type="text" class="form-control @error('church_offering') is-invalid @enderror" name="church_offering" value="{{ old('church_offering') }}" required autocomplete="church_offering" autofocus>

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

                                                <input id="tithe" type="text" class="form-control @error('tithe') is-invalid @enderror" name="tithe" value="{{ old('tithe') }}" required autocomplete="tithe" autofocus>

                                                @error('tithe')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="thanks_giving_offering" class="col-form-label text-md-right">{{ __('Thanks Giving Offering') }}</label>

                                                <input id="thanks_giving_offering" type="text" class="form-control @error('thanks_giving_offering') is-invalid @enderror" name="thanks_giving_offering" value="{{ old('thanks_giving_offering') }}" required autocomplete="thanks_giving_offering" autofocus>
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

                                                <input id="children_offering" type="text" class="form-control @error('children_offering') is-invalid @enderror" name="children_offering" value="{{ old('children_offering') }}" required autocomplete="children_offering" autofocus>

                                                @error('children_offering')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="record_date" class="col-form-label text-md-right">{{ __('record_date') }}</label>

                                                <input id="Children Offering" type="date" class="form-control @error('record_date') is-invalid @enderror" name="record_date" value="{{ old('record_date') }}" required autocomplete="record_date" autofocus>

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
                        </div>
                    <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--END APPOINTMENT MODAL--->




            @if (Auth::user()->role_name == 'super_admin')


                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="box box-primary">
                            <div class="box-body box-profile">
                                <h1 class="text-center">
                                    MONTHLY SUMMARY

                                </h1>
                                <div class="table-responsive">
                                    <table class="table no-margin  table-bordered table-border-5  table-striped table-responsive" >
                                        <thead class="bg bg-black" style="color:#fff">
                                            <tr>
                                                <th width="5%" style="background-color: #11e060">
                                                    <div class="chk-option" >
                                                        <div class="checkbox-fade fade-in-primary">
                                                            <span >SN</span>
                                                        </div>
                                                    </div>
                                                </th>

                                                <th width="60%">INCOME TOTAL</th>
                                                {{-- <th width="20%">date</th> --}}
                                                {{-- <th width="10%" style="background-color: #11e060; color:#fffff1">churc_attend</th> --}}
                                                {{-- <th width="10%" style="background-color: #11e060; color:#fffff1">ss_attend</th> --}}
                                                <th width="40%">AMONUT</th>


                                                {{-- <th class="text-right" style="color:#fff; background-color:#f82249;">Action</th> --}}
                                            </tr>
                                        </thead>

                                        <tbody>
                                            {{-- @foreach ($cashBooks as $cashBook) --}}
                                                <tr style="border: 3px solid red; border-right: 3px solid red; border:#212;">
                                                        <td style="background-color: #11e060; color:#fffff1">
                                                            <div class="chk-option">
                                                                    <label class="check-task" >
                                                                        <span class="cr">
                                                                            {{-- {{ ++$loop->index }} --}}
                                                                        </span>
                                                                    </label>
                                                                    <th width="60%" class="bg bg-blac" style="color:#fff; background-color:#f82249;">
                                                                    TOTAL TITHE
                                                                   </th>
                                                            </div>
                                                        </td>
                                                        <td width="40%">{{ $total_tithe_offering }}</td>
                                                        {{-- @foreach ($monthly_group_total as $key => $value)
                                                        @endforeach --}}


                                                </tr>
                                                <tr style="border: 3px solid red; border-right: 3px solid red; border:#212;">
                                                        <td style="background-color: #11e060; color:#fffff1">
                                                            <div class="chk-option">
                                                                <label class="check-task" >
                                                                        <span class="cr">
                                                                            {{-- {{ ++$loop->index }} --}}
                                                                        </span>
                                                                    </label>
                                                                    <th width="60%" class="bg bg-blac" style="color:#fff; background-color:#f82249;">
                                                                    TOTAL SUNDAY SCHOOL OFFERING
                                                                   </th>
                                                            </div>
                                                        </td>
                                                        <td width="40%">{{ number_format($total_sunday_school_offering, 2) }}</td>
                                                        {{-- @foreach ($monthly_group_total as $key => $value)
                                                        <td width="40%">{{ number_format($value->total_sunday_school_offering, 2) }}</td>
                                                        @endforeach --}}


                                                </tr>
                                                <tr style="border: 3px solid red; border-right: 3px solid red; border:#212;">
                                                        <td style="background-color: #11e060; color:#fffff1">
                                                            <div class="chk-option">
                                                                    <label class="check-task" >
                                                                        <span class="cr">
                                                                            {{-- {{ ++$loop->index }} --}}
                                                                        </span>
                                                                    </label>
                                                                    <th width="60%" class="bg bg-blac" style="color:#fff; background-color:#f82249;">
                                                                    TOTAL CHURCH OFFERING
                                                                   </th>
                                                            </div>
                                                        </td>
                                                        <td width="40%">{{ number_format($total_church_offering, 2) }}</td>
                                                        {{-- @foreach ($monthly_group_total as $key => $value)
                                                        <td width="40%">{{ number_format($value->total_church_offering, 2) }}</td>
                                                        @endforeach --}}


                                                </tr>
                                                <tr style="border: 3px solid red; border-right: 3px solid red; border:#212;">
                                                        <td style="background-color: #11e060; color:#fffff1">
                                                            <div class="chk-option">
                                                                    <label class="check-task" >
                                                                        <span class="cr">
                                                                            {{-- {{ ++$loop->index }} --}}
                                                                        </span>
                                                                    </label>
                                                                    <th width="60%" class="bg bg-blac" style="color:#fff; background-color:#f82249;">
                                                                    TOTAL THANKS GIVING OFFERING
                                                                   </th>

                                                            </div>
                                                        </td>

                                                        <td width="40%">{{ number_format($total_thanks_giving_offering, 2) }}</td>
                                                        {{-- @foreach ($monthly_group_total as $key => $value)
                                                        <td width="40%">{{ number_format($value->total_thanks_giving_offering, 2) }}</td>
                                                        @endforeach --}}

                                                    {{-- <td width="30%" style="background-color: #11e060; color:#fffff1"> <span>
                                                        32% To District =&nbsp;
                                                              {{ $thirtyTwoPercent_district }}
                                                            </span>

                                                            </td> --}}
                                                </tr>
                                                <tr style="border: 3px solid red; border-right: 3px solid red; border:#212;">
                                                        <td style="background-color: #11e060; color:#fffff1">
                                                            <div class="chk-option">
                                                                    <label class="check-task" >
                                                                        <span class="cr">
                                                                            {{-- {{ ++$loop->index }} --}}
                                                                        </span>
                                                                    </label>
                                                                    <th width="60%" class="bg bg-blac" style="color:#fff; background-color:#f82249;">
                                                                    TOTAL CHILDREN OFFERING
                                                                   </th>
                                                            </div>
                                                        </td>

                                                        <td width="40%">{{ number_format($total_children_offering, 2) }}</td>
                                                        {{-- @foreach ($monthly_group_total as $key => $value)
                                                            <td width="40%">{{ number_format($value->total_children_offering, 2) }}</td>
                                                        @endforeach --}}

                                                </tr>
                                                <tr style="border: 3px solid red; border-right: 3px solid red; border:#212; height:60px;">
                                                        <td style="background-color: #11e060; color:#fffff1; height:50px;">
                                                            <div class="chk-option">
                                                                    <label class="check-task" >
                                                                        <span class="cr">
                                                                            {{-- {{ ++$loop->index }} --}}
                                                                        </span>
                                                                    </label>
                                                                    <th width="60%" class="bg bg-blacK" style="color:#fff; background-color:#f82249;">
                                                                      INCOME MONTHLY GRAND TOTAL
                                                                   </th>
                                                            </div>
                                                        </td>


                                                    <td width="40%" style="background-color: #c2c5c3; color:#fffff1; height:50px; font-size: 32px;">{{ number_format($GRAND_TOTAL, 2) }}</td>


                                                </tr>

                                                <td style="border: 3px solid red; border-right: 3px solid red">
                                                    <div class="btn-group " style="display: inline">
                                                        <a style="display: inline; font-style: italic; border-radius:50px;" class="btn btn-success btn-round btn-out btn-xs mr-3 " href="#"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>show</a>
                                                    </div>
                                                </td>
                                            {{-- @endforeach --}}

                                        </tbody>
                                    </table>
                                    <a href="#" class="btn btn-block " style="background-color: #f82249; color: #fffff1"><b></b></a>

                                    </div>
                                </div>
                            </div>
                                <div class="box box-danger"></div>
                        </div>



                        <div class="col-sm-6 col-md-6">
                            <div class="box box-primary">
                                <div class="box-body box-profile">
                                    <h1 class="text-center">
                                    MONTHLY DISBURSEMENTS

                                </h1>
                                <div class="table-responsive">
                                    <table class="table no-margin  table-bordered table-border-5  table-striped table-responsive" >
                                        <thead class="bg bg-black" style="color:#fff">
                                            <tr>
                                                <th width="5%" style="background-color: #11e060">
                                                    <div class="chk-option" >
                                                        <div class="checkbox-fade fade-in-primary">
                                                            <span >SN</span>
                                                        </div>
                                                    </div>
                                                </th>

                                                <th width="60%">INCOME EARN  &Colone;
                                                        <span width="40%">{{ number_format($GRAND_TOTAL, 2) }}</span>

                                                </th>
                                                {{-- <th width="20%">date</th> --}}
                                                {{-- <th width="10%" style="background-color: #11e060; color:#fffff1">churc_attend</th> --}}
                                                {{-- <th width="10%" style="background-color: #11e060; color:#fffff1">ss_attend</th> --}}
                                                <th width="40%">AMONUT</th>


                                                {{-- <th class="text-right" style="color:#fff; background-color:#f82249;">Action</th> --}}
                                            </tr>
                                        </thead>

                                        <tbody>
                                            {{-- @foreach ($cashBooks as $cashBook) --}}
                                                <tr style="border: 3px solid red; border-right: 3px solid red; border:#212;">
                                                        <td style="background-color: #11e060; color:#fffff1">
                                                            <div class="chk-option">
                                                                    <label class="check-task" >
                                                                        <span class="cr">
                                                                            {{-- {{ ++$loop->index }} --}}
                                                                        </span>
                                                                    </label>
                                                                    <th width="60%" class="bg bg-blac" style="color:#fff; background-color:#f82249;">
                                                                    32% TO DISTRICT
                                                                   </th>
                                                            </div>
                                                        </td>

                                                    <td width="40%">{{ number_format($total_tithe_offering, 2) }}</td>

                                                </tr>
                                                <tr style="border: 3px solid red; border-right: 3px solid red; border:#212;">
                                                        <td style="background-color: #11e060; color:#fffff1">
                                                            <div class="chk-option">
                                                                    <label class="check-task" >
                                                                        <span class="cr">
                                                                            {{-- {{ ++$loop->index }} --}}
                                                                        </span>
                                                                    </label>
                                                                    <th width="60%" class="bg bg-blac" style="color:#fff; background-color:#f82249;">
                                                                        32% TO SECTION

                                                                   </th>
                                                            </div>
                                                        </td>
                                                        <td width="40%">{{ number_format($thirtyTwoPercent_section, 2) }}</td>

                                                </tr>
                                                <tr style="border: 3px solid red; border-right: 3px solid red; border:#212;">
                                                        <td style="background-color: #11e060; color:#fffff1">
                                                            <div class="chk-option">
                                                                    <label class="check-task" >
                                                                        <span class="cr">
                                                                            {{-- {{ ++$loop->index }} --}}
                                                                        </span>
                                                                    </label>
                                                                    <th width="60%" class="bg bg-blac" style="color:#fff; background-color:#f82249;">
                                                                        MISSIONARY OFFERING

                                                                   </th>
                                                            </div>
                                                        </td>

                                                    <td width="40%">{{ number_format($mission_offering, 2) }}</td>

                                                </tr>
                                                <tr style="border: 3px solid red; border-right: 3px solid red; border:#212;">
                                                        <td style="background-color: #11e060; color:#fffff1">
                                                            <div class="chk-option">
                                                                    <label class="check-task" >
                                                                        <span class="cr">
                                                                            {{-- {{ ++$loop->index }} --}}
                                                                        </span>
                                                                    </label>
                                                                    <th width="60%" class="bg bg-blac" style="color:#fff; background-color:#f82249;">
                                                                     SUNDAY SCHOOL QUARTERLY
                                                                   </th>

                                                            </div>
                                                        </td>

                                                        <td width="40%">{{ number_format($sunday_school_quarterly_offering, 2) }}</td>

                                                    {{-- <td width="30%" style="background-color: #11e060; color:#fffff1"> <span>
                                                        32% To District =&nbsp;
                                                              {{ $thirtyTwoPercent_district }}
                                                            </span>

                                                            </td> --}}
                                                </tr>
                                                <tr style="border: 3px solid red; border-right: 3px solid red; border:#212;">
                                                        <td style="background-color: #11e060; color:#fffff1">
                                                            <div class="chk-option">
                                                                    <label class="check-task" >
                                                                        <span class="cr">
                                                                            {{-- {{ ++$loop->index }} --}}
                                                                        </span>
                                                                    </label>
                                                                    <th width="60%" class="bg bg-blac" style="color:#fff; background-color:#f82249;">
                                                                        10% DISTRICT MINISTER'S WAREFAR

                                                                   </th>
                                                            </div>
                                                        </td>

                                                    <td width="40%">{{ number_format($TenPercent_district_minister_warfare, 2) }}</td>

                                                </tr>
                                                <tr style="border: 3px solid red; border-right: 3px solid red; border:#212;">
                                                        <td style="background-color: #11e060; color:#fffff1">
                                                            <div class="chk-option">
                                                                    <label class="check-task" >
                                                                        <span class="cr">
                                                                            {{-- {{ ++$loop->index }} --}}
                                                                        </span>
                                                                    </label>
                                                                    <th width="30%" class="bg bg-blac" style="color:#fff; background-color:#f82249;">
                                                                        2% DISTRICT L & B

                                                                   </th>
                                                            </div>
                                                        </td>

                                                    <td width="40%">{{ number_format($TwoPercent_district_L_B, 2) }}</td>

                                                </tr>
                                                <tr style="border: 3px solid red; border-right: 3px solid red; border:#212;">
                                                        <td style="background-color: #11e060; color:#fffff1">
                                                            <div class="chk-option">
                                                                    <label class="check-task" >
                                                                        <span class="cr">
                                                                            {{-- {{ ++$loop->index }} --}}
                                                                        </span>
                                                                    </label>
                                                                    <th width="30%" class="bg bg-blac" style="color:#fff; background-color:#f82249;">
                                                                        2% SECTIONAL L & B

                                                                   </th>
                                                            </div>
                                                        </td>

                                                    <td width="40%">{{ number_format($TwoPercent_section_L_B, 2) }}</td>

                                                </tr>
                                                <tr style="border: 3px solid red; border-right: 3px solid red; border:#212; height:60px;">
                                                        <td style="background-color: #11e060; color:#fffff1; height:50px;">
                                                            <div class="chk-option">
                                                                    <label class="check-task" >
                                                                        <span class="cr">
                                                                            {{-- {{ ++$loop->index }} --}}
                                                                        </span>
                                                                    </label>
                                                                    <th width="60%" class="bg bg-blac" style="color:#fff; background-color:#11e060; ">
                                                                      TOTAL DISBURSEMENTS
                                                                   </th>
                                                            </div>
                                                        </td>

                                                    <td width="40%" style="background-color: #c2c5c3; color:#fffff1; height:50px; font-size: 32px;">{{ number_format($DISBURSEMENTS, 2) }}</td>


                                                </tr>
                                                <tr style="border: 3px solid red; border-right: 3px solid red; border:#212; height:60px;">
                                                        <td style="background-color: #11e060; color:#fffff1; height:50px;">
                                                            <div class="chk-option">
                                                                    <label class="check-task" >
                                                                        <span class="cr">
                                                                            {{-- {{ ++$loop->index }} --}}
                                                                        </span>
                                                                    </label>
                                                                    <th width="60%" class="bg bg-blacK" style="color:#fff; background-color:#f82249; ">
                                                                      TOTAL BALANCE
                                                                   </th>
                                                            </div>
                                                        </td>

                                                    <td width="40%"  style="color:#211; background-color:#fff; font-size: 32px">{{ number_format($TOTAL_BALANCE, 2) }}</td>


                                                </tr>

                                                <td style="border: 3px solid red; border-right: 3px solid red">
                                                    <div class="btn-group " style="display: inline">
                                                        <a style="display: inline; font-style: italic; border-radius:50px;" class="btn btn-success btn-round btn-out btn-xs mr-3 " href="#"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>show</a>
                                                    </div>
                                                </td>
                                                {{-- @endforeach --}}

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

            @endif

        </div>
    </div>

@endsection


