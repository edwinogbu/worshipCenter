@extends('layouts.mainApp')

@section('content')
<div class="container">
    <!-- About Me Box -->
    <section class="content-header with-border">

                <div class="pad margin no-print p-5 with-border box-header ">
                    <div class="callout callout-info" style="margin-bottom: 0!important;">
                        <h4><i class="fa fa-info"></i>
                                Income Dashboard
                                <span  style="text-align: center; color:#f82249;">
                                <a style="text-align: center; background-color:#00a65a; text-decoration: none; border:3px solid #fff;" class="glyphicon glyphicon-pencil btn-round btn-out btn btn-primary pull-right btn-round btn-out btn-md mr-3  p-5" href="{{ route('user.incomeExpense.index') }}">
                                    View All Report
                                </a>
                            </span>
                            </h4>
                    </div>
                </div>

       </section>
   <!-- /.box -->
   <div class="row justify-content-center">

           <section class="content-header with-border">

                @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissible fade show rounded" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span></button> <i class="fa fa-info mx-2"></i>
                            <strong>{!! session('message') !!}</strong>
                        </div>
                @endif
           </section>

                <!-- Main content -->
                <section class="content">

                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="box box-primary">
                                        <h6><marquee behavior="blink" direction="" style="color: green;">

                                            {{ Auth::user()->first_name }} is viewing Income Record
                                            </marquee>
                                        </h6>
                                        {!! Toastr::message() !!}
                                    <div class="row">
                                        <div class="box-body box-profile col-12">
                                            <div class="table-responsive col-sm-12">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <!-- TABLE: LATEST ORDERS -->
                                                        <div class="clearfix visible-sm-block"></div>

                                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                                            <div class="box box-success"  >
                                                                <div class="box-header with-border">
                                                                    <div class="user-block">
                                                                        <img class="justify-content-center rounded-circle" src="{{ asset('img/agclogo.png')}}" alt="" title="" height="20px" width="20px">

                                                                    </div>
                                                                    <h3 class="text-center">Monthly Group Income</h3>

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
                                                                                            <th width="">Year</th>
                                                                                            <th width="">Month </th>
                                                                                            <th width="">Amount</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @foreach($group_monthly_incomes as $income)
                                                                                                    <tr>
                                                                                                        <td>
                                                                                                        <div class="chk-option">
                                                                                                            <div class="checkbox-fade fade-in-primary">
                                                                                                                <label class="check-task">
                                                                                                                    <input type="checkbox" value="">
                                                                                                                    <span class="cr">
                                                                                                                        {{ ++$loop->index }}

                                                                                                                                <i class="cr-icon fa fa-check txt-default"></i>
                                                                                                                            </span>
                                                                                                                </label>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {{ Str::words(strtoupper($income->year), $words =100, $end='..') }}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {{ Str::words(strtoupper($income->month), $words =100, $end='..') }}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {{ Str::words(strtoupper($income->incomeTotal), $words =100, $end='..') }}
                                                                                                    </td>

                                                                                                    {{-- <td>
                                                                                                        <span class="date"></span>
                                                                                                    </td> --}}
                                                                                                    <td class="text-right">

                                                                                                    </td>
                                                                                                </tr>
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>



                                                                                    {{-- <a href="#" class="btn btn-block " style="background-color: #f82249; color: #fffff1"><b></b></a> --}}

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                                <div class="box box-info"></div>
                                                                        </div>
                                                                    <span class="text-center text-success" style="font-size: 20px;" >

                                                                        {{ $incomes->links() }}
                                                                    </span>

                                                                    </div>
                                                                    </div>

                                                                </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <!-- Profile Image -->
                                                            <div class="box box-primary">
                                                                <div class="box-body box-profile">
                                                                    @if (auth()->user()->picture ==null)
                                                                    <img class="justify-content-center rounded-circle" src="{{ asset('img/agclogo.png')}}" alt="" title="" height="70px" width="70px">
                                                                    {{-- <img id="showImage" src="{{ url('profile-images/no_image.jpg') }}" style="width: 50px; width: 50px; border: 1px solid #000000; border-radius:50px;"> --}}
                                                                    @else
                                                                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/agclogo.png') }}" alt="User profile picture" height="100">
                                                                    @endif

                                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                        <h3 class="profile-username text-center">
                                                                            <span style="color:green; backgroud:white; font-size:40px;">
                                                                                Total Income
                                                                                <span class="badge badge-primary badge-pill" style="color:fff; padding:20px; font:40px; font-size:40px; ">{{ $totalIncomes }}</span>
                                                                            </span></strong>
                                                                        </h3>
                                                                    </li>
                                                                    <h3 class="profile-username text-center"></h3>
                                                                    <strong style="color:#e1f01f; backgroud:white"><i class="fa fa-user margin-r-5"></i> <span> {{ Auth::user()->email }}
                                                                    </span ><span style="color:green; backgroud:white">Online</span></strong>
                                                                <!-- /.box-body -->
                                                                </div>
                                                                <div class="box box-success"></div>
                                                            </div>
                                                            <!-- About Me Box -->
                                                            <div class="box box-primary">
                                                                <div class="box-header with-border">
                                                                    <h3 class="box-title">
                                                                        <span class="">

                                                                            <a style="display: inline; font-style: italic; margin:20px; " class="glyphicon glyphicon-pencil btn-round btn-out btn btn-primary pull-right btn-round btn-out btn-md mr-3  p-5" href="{{ route('user.incomeExpense.summary.index') }}">
                                                                                History
                                                                            </a>
                                                                        </span>
                                                                        <a style="display: inline; font-style: italic; margin:20px; " class="glyphicon glyphicon-pencil btn-round btn-out btn btn-primary pull-right btn-round btn-out btn-md mr-3  p-5" href="{{ route('user.incomeExpense.index') }}">
                                                                        All Report
                                                                        </a>


                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <!-- /.box -->
                                                        </div>

                                                        <!-- /.col -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="box box-success"></div>
                            </div>
                              <span class="text-center text-success" style="font-size: 20px;" >
                             </span>
                        </div>
                    </div>


                        <div class="col-md-12">
                            <div class="row">
                                <!-- TABLE: LATEST ORDERS -->
                                <div class="clearfix visible-sm-block"></div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="box box-info"  >
                                        <div class="box-header with-border">
                                            <div class="user-block">
                                                    <img class="justify-content-center rounded-circle" src="{{ asset('img/agclogo.png')}}" alt="" title="" height="20px" width="20px">
                                                    <span class="username">
                                                        <a href="#">Income Lists: </a>
                                                        </span>
                                                    <span class="description"></span>

                                            </div>
                                            <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                            </div>

                                            <div class="text-right pt-10 mt-10" style="margin-right:80px; ">
                                                {{-- <a class="btn btn-success btn-round btn-out btn-md m-5 mb-4 ml-5 " ><span class="glyphicon glyphicon-book btn-round btn-out"></span>Create Blog</a> --}}
                                                <a class="btn btn-success btn-round btn-lg btn-out btn-md m-5 mb-4 ml-5 "  data-toggle="modal" data-target="#modal-income">
                                                    <i class="fa fa-dollar"></i>
                                                    <span class="fa fa-money btn-round btn-out"></span>
                                                    Create  Income</a>
                                                {{-- <a class="btn btn-success btn-round btn-lg btn-out btn-md m-5 mb-4 ml-5 "  data-toggle="modal" data-target="#modal-income-cat"><span class="glyphicon glyphicon-book btn-round btn-out"></span>Create Income Category</a> --}}
                                                {{-- <a class="btn btn-success btn-round btn-lg btn-out btn-md m-5 mb-4 ml-5 "  data-toggle="modal" data-target="#modal-updateIncome"><span class="glyphicon glyphicon-book btn-round btn-out"></span>updateIncome</a> --}}
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
                                                                    <th width="">Description</th>
                                                                    <th width="">Income Posted By</th>
                                                                    <th width="">Amount</th>
                                                                    <th width="">Income Date</th>
                                                                    <th width="">Status</th>
                                                                    <th class="column-title">Pastor's Approved </th>
                                                                    <th class="text-right">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($incomes as $income)
                                                                            <tr>
                                                                                <td>
                                                                                <div class="chk-option">
                                                                                    <div class="checkbox-fade fade-in-primary">
                                                                                        <label class="check-task">
                                                                                            <input type="checkbox" value="">
                                                                                            <span class="cr">
                                                                                                {{ ++$loop->index }}
                                                                                                        {{-- <i class="cr-icon fa fa-check txt-default"></i> --}}
                                                                                                    </span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>

                                                                            </td>
                                                                            <td>
                                                                                {{ Str::words(strtoupper($income->income_title), $words =100, $end='..') }}
                                                                            </td>
                                                                            <td>
                                                                                {{ Str::words(strtoupper($income->user->first_name), $words =100, $end='..') }}
                                                                            </td>
                                                                            <td>
                                                                                {{ Str::words(strtoupper($income->income_amount), $words =100, $end='..') }}
                                                                            </td>

                                                                            <td>
                                                                                <span class="date">{{ Carbon\Carbon::parse($income->income_date)->isoFormat('MMM Do YYYY') }}</span>
                                                                            </td>

                                                                            <td>
                                                                                    @if ($income->approved ==1)
                                                                                    <span class=" waves-effect waves-light btn-success" style="color: white; padding:5px; margin: 5px; font-style: italic; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"  class="  waves-effect waves-light btn-success btn-round btn-out"><i class="icofont icofont-success-alt"></i>
                                                                                        approved
                                                                                    </span>

                                                                                    @else
                                                                                    <span class=" waves-effect waves-light btn-info" style="color: white; padding:5px; margin: 5px; font-style: italic; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"  class="  waves-effect waves-light btn-info btn-round btn-out"><i class="icofont icofont-success-alt"></i>
                                                                                        pending
                                                                                    @endif
                                                                            </td>

                                                                            <td style="border: 3px solid red;)">

                                                                                @if (Auth::user()->role_name == "super_admin")
                                                                                <form style="display: inline" action="{{ route('user.pastor.income.approved', $income->id) }}" method="post">
                                                                                    @csrf

                                                                                        <div class="chk-option">
                                                                                            @if ($income->approved !==true)
                                                                                                <div class="checkbox-fade fade-in-primary">
                                                                                                    <label class="check-task">
                                                                                                        <button class="btn btn-success btn-round btn-out btn-sm mr-3 btn-success btn-round btn-out"><i class="icofont icofont-check-circled"></i>approval</button>
                                                                                                        <input type="checkbox" name="approved" value="1" {{old('approved'==1 ? 'checked': '') }} class="flat-red icheckbox_flat-green checked input-form-check">
                                                                                                    </label>
                                                                                                </div>
                                                                                            @else
                                                                                            <button class="btn btn-danger btn-round btn-out btn-sm mr-3 btn-danger btn-round btn-out"><i class="icofont icofont-check-circled"></i></button>

                                                                                            @endif
                                                                                        </div>
                                                                                    <button type="submit" class=" btn btn-danger btn-round btn-out btn-sm mr-3 btn-danger btn-round btn-out"><i class="icofont icofont-warning-alt"></i>@if ($income->approved == 1) Pending @else unapproved @endif</button>
                                                                                </form>

                                                                                @else
                                                                                            @if ($income->approved ==1)
                                                                                            <span class=" waves-effect waves-light btn-info" style="color: white; padding:5px; margin: 5px; font-style: italic; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"  class="  waves-effect waves-light btn-success btn-round btn-out"><i class="icofont icofont-success-alt"></i>

                                                                                                Pastor has approved
                                                                                            </span>

                                                                                            @else
                                                                                            <span class=" waves-effect waves-light btn-danger" style="color: white; padding:5px; margin: 5px; font-style: italic; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"  class="  waves-effect waves-light btn-info btn-round btn-out"><i class="icofont icofont-success-alt"></i>

                                                                                                pls wait for pastors Aproval. Thanks!
                                                                                            @endif

                                                                                @endif

                                                                            </td>
                                                                            <td class=" last text-right">
                                                                                <form style="display: inline" action="{{ route('user.income.delete', $income->id) }}" method="post">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    @if (auth()->user()->role_name =="admin" || "admin")
                                                                                            @if ($income->approved ==1)
                                                                                            <span class=" waves-effect waves-light btn-danger" style="color: white; padding:5px; margin: 5px; font-style: italic; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"  class="  waves-effect waves-light btn-success btn-round btn-out"><i class="icofont icofont-success-alt"></i>
                                                                                                No More permission To Edit.
                                                                                            </span>

                                                                                            @else
                                                                                                <div class="btn btn-group">
                                                                                                    <a class="btn btn-success btn-round btn-out btn-sm mr-3 " href="{{ route('user.income.edit', $income->id) }}">
                                                                                                        <i class="fa fa-edit"></i>Edit <span class="text-muted"></span></a>
                                                                                                    </a>
                                                                                                    <button type="submit" class=" btn btn-danger btn-round btn-out btn-sm mr-3 btn-danger btn-round btn-out">
                                                                                                        <i class="fa fa-trash"></i> Delete <span class="text-muted"></span></a>

                                                                                                    </button>
                                                                                                </div>
                                                                                            @endif

                                                                                    @else
                                                                                        <div class="btn btn-group">
                                                                                            <a class="btn btn-success btn-round btn-out btn-sm mr-3 " href="{{ route('user.income.edit', $income->id) }}">
                                                                                                <i class="fa fa-edit"></i>Edit <span class="text-muted"></span></a>
                                                                                            </a>
                                                                                            <button type="submit" class=" btn btn-danger btn-round btn-out btn-sm mr-3 btn-danger btn-round btn-out">
                                                                                                <i class="fa fa-trash"></i> Delete <span class="text-muted"></span></a>

                                                                                            </button>
                                                                                        </div>
                                                                                    @endif
                                                                                </form>
                                                                            </td>
                                                                            {{-- <td class="text-right">
                                                                                <form style="display: inline" action="{{ route('user.income.delete', $income->id) }}" method="post">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    @if (auth()->user()->role_name == 'super_admin')
                                                                                    <div class="btn-group">
                                                                                        <a class="btn btn-success btn-round btn-out btn-sm mr-3 " href="{{ route('user.income.edit',$income->id) }}" ><span class="glyphicon glyphicon-edit btn-round btn-out"></span>Edit</a>
                                                                                        <button type="submit" class=" btn btn-danger btn-round btn-out btn-sm mr-3 btn-danger btn-round btn-out"><span class="glyphicon glyphicon-trash btn-round btn-out"></span>Delete</button>
                                                                                    </div>
                                                                                    @endif
                                                                                    @if (auth()->user()->role_name == 'admin')

                                                                                    <div class="btn-group">
                                                                                        <a class="btn btn-success btn-round btn-out btn-sm mr-3 " href="{{ route('user.income.edit',$income->id) }}"><span class="glyphicon glyphicon-edit btn-round btn-out"></span>Edit</a>

                                                                                    </div>
                                                                                    @endif

                                                                                </form>
                                                                            </td> --}}
                                                                        </tr>
                                                                    @endforeach

                                                                </tbody>
                                                            </table>


                                                            {{-- <a href="#" class="btn btn-block " style="background-color: #f82249; color: #fffff1"><b></b></a> --}}

                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="box box-danger"></div>
                                                </div>
                                               <span class="text-center text-success" style="font-size: 20px;" >

                                                   {{ $incomes->links() }}
                                               </span>

                                            </div>
                                            </div>

                                        </div>
                                </div>



                                <!-- /.col -->

                            </div>
                        </div>
                        <!-- /.table-responsive -->
                </section>



    <!--EXPENSE CATEGORY MODAL--->
    <div class="modal fade" id="modal-income-cat">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Default Modal</h4>
            </div>
            <div class="modal-body">
                    <form action="{{ route('user.income.store') }}" method="post" enctype="multipart/form-data">
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


                                        </div>
                                    </div>
                                    <div class="text-right m-r-20">
                                        <button type="submit" class=" b-b-primary btn-success btn-round btn btn-out">Create</button>
                                    </div>
                            </div>
                    </form>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-lg pull-left" data-dismiss="modal">Close</button>
                    {{-- <button type="submit" class=" b-b-primary btn-success btn-round btn btn-out">Create</button> --}}
                </div>
            </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--END CATEGORY MODAL--->





    <!--EXPENSE MODAL--->
    <div class="modal fade" id="modal-income">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Default Modal</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.income.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="form-label-group">
                            <label for="income_title">Income Description</label>
                            <input type="text" id="income_title" class="form-control" @error('income_title') is-invalid @enderror
                             placeholder="Income Title" required="required" autofocus="autofocus" name="income_title" value="{{ old('income_title') }}">
                            @error('income_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <label for="income_amount">Income Amount</label>
                            <input type="number" step="any" min="0.01" id="income_amount" class="form-control" @error('income_amount') is-invalid @enderror
                            placeholder="income_amount" required="required" name="income_amount" value="{{ old('income_amount') }}">
                            @error('income_amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <label for="income_date">Income Date</label>
                            <input type="date" id="income_date" class="form-control" @error('income_date') is-invalid @enderror placeholder="Income Date" required="required" name="income_date" value="{{ date('Y-m-d') }}">
                            @error('income_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                {{-- <div class="pull-left">
                    <a href="{{ route('user.income.index') }}" class="btn btn-success p-5 btn-lg">Back</a>
                </div> --}}
                <button type="submit" class="btn btn-lg btn-primary">Save</button>
                <button type="button" class="btn btn-danger btn-lg pull-left p-5" data-dismiss="modal">Close</button>
            </div>
        </form>
            </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--END EXPENSE MODAL--->




    <!--EXPENSE UPDATE MODAL--->
    {{-- <div class="modal fade" id="modal-updateIncome">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Default Modal</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.income.update', $income->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $income->id }}">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="income_title" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" name="income_title" value="{{ $income->income_title }}">
                            <label for="income_title">Income Description</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="number" step="any" min="0.01" id="income_amount" class="form-control" placeholder="Password" required="required" name="income_amount" value="{{ $income->income_amount }}">
                            <label for="income_amount">Income Amount</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="date" id="income_date" class="form-control" placeholder="Income Date" required="required" name="income_date" value="{{ $income->income_date }}">
                            <label for="income_date">Income Date</label>
                        </div>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('user.income.index') }}" class="btn btn-success">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-lg pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div> --}}
    <!--END EXPENSE MODAL--->






  </div>
</div>
@endsection
