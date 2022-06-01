@extends('layouts.mainApp')

@section('content')
<div class="container">
    <!-- About Me Box -->
    <section class="content-header with-border">

                <div class="pad margin no-print p-5 with-border box-header ">
                    <div class="callout callout-info" style="margin-bottom: 0!important;">
                        <h4><i class="fa fa-info"></i>
                                Expense Dashboard
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
                                                                        <h3 class="text-center">Monthly Group Total</h3>

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
                                                                                                @foreach($group_monthly_expenses as $expense)
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                            <div class="chk-option">
                                                                                                                <div class="checkbox-fade fade-in-primary">
                                                                                                                    <label class="check-task">
                                                                                                                        <input type="checkbox" value="">
                                                                                                                        <span class="cr">
                                                                                                                                    {{-- <i class="cr-icon fa fa-check txt-default"></i> --}}
                                                                                                                                {{ ++$loop->index }}
                                                                                                                                </span>
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                        </td>
                                                                                                        <td>
                                                                                                            {{ Str::words(strtoupper($expense->year), $words =100, $end='..') }}
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            {{ Str::words(strtoupper($expense->month), $words =100, $end='..') }}
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            {{ Str::words(strtoupper($expense->expenseTotal), $words =100, $end='..') }}

                                                                                                        </td>




                                                                                                        {{-- <td class="text-right">

                                                                                                        </td> --}}
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

                                                                            {{ $expenses->links() }}
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
                                                                                    Total Expense
                                                                                    <span class="badge badge-primary badge-pill" style="color:fff; padding:20px; font:40px; font-size:40px; ">{{ $totalExpenses }}</span>
                                                                                </span></strong>
                                                                            </h3>
                                                                        </li>
                                                                        <h3 class="profile-username text-center"></h3>
                                                                        <strong style="color:red; backgroud:white"><i class="fa fa-user margin-r-5"></i> <span> {{ Auth::user()->email }}
                                                                        </span ><span style="color:green; backgroud:white">Online</span></strong>
                                                                    <!-- /.box-body -->
                                                                    </div>
                                                                    <div class="box box-danger"></div>
                                                                </div>
                                                                <!-- About Me Box -->
                                                                <div class="box box-primary">
                                                                    <div class="box-header with-border">
                                                                        <h3 class="box-title">
                                                                            <a style="display: inline; font-style: italic; margin:20px; " class="btn btn-primary pull-right btn-round btn-out btn-md mr-3  p-5" href="{{ route('user.incomeExpense.summary.index') }}">
                                                                                <span class="glyphicon glyphicon-pencil btn-round btn-out"></span>

                                                                                View summary
                                                                            </span>
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
                                                <a class="btn btn-success btn-round btn-lg btn-out btn-md m-5 mb-4 ml-5 "  data-toggle="modal" data-target="#modal-expense">
                                                    <i class="fa fa-dollar"></i>
                                                    <span class="fa fa-money btn-round btn-out"></span>
                                                    Add  Expense</a>
                                                {{-- <a class="btn btn-success btn-round btn-lg btn-out btn-md m-5 mb-4 ml-5 "  data-toggle="modal" data-target="#modal-expense-cat"><span class="glyphicon glyphicon-book btn-round btn-out"></span>Create Income Category</a> --}}
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
                                                                    <th width="">Posted By</th>
                                                                    <th width="">Amount</th>
                                                                    <th width="">Expense Date</th>
                                                                    <th width="">Status</th>
                                                                    <th class="column-title">Pastor's Approved </th>
                                                                    <th class="text-right">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($expenses as $expense)
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
                                                                                {{ Str::words(strtoupper($expense->expense_title), $words =100, $end='..') }}
                                                                            </td>
                                                                            <td>
                                                                                {{ Str::words(strtoupper($expense->user->first_name), $words =100, $end='..') }}
                                                                            </td>
                                                                            <td>
                                                                                {{ Str::words(strtoupper($expense->expense_amount), $words =100, $end='..') }}
                                                                            </td>

                                                                            <td>
                                                                                <span class="date">{{ Carbon\Carbon::parse($expense->expense_date)->isoFormat('MMM Do YYYY') }}</span>
                                                                            </td>

                                                                            <td>

                                                                                    @if ($expense->approved ==1)
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
                                                                                <form style="display: inline" action="{{ route('user.pastor.approved', $expense->id) }}" method="post">
                                                                                    @csrf

                                                                                        <div class="chk-option">

                                                                                            @if ($expense->approved !==true)
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
                                                                                    <button type="submit" class=" btn btn-danger btn-round btn-out btn-sm mr-3 btn-danger btn-round btn-out"><i class="icofont icofont-warning-alt"></i>@if ($expense->approved == 1) Pending @else unapproved @endif</button>
                                                                                </form>

                                                                                @else
                                                                                @if ($expense->approved ==1)
                                                                                <span class=" waves-effect waves-light btn-info" style="color: white; padding:5px; margin: 5px; font-style: italic; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"  class="  waves-effect waves-light btn-success btn-round btn-out"><i class="icofont icofont-success-alt"></i>

                                                                                    Pastor has approved
                                                                                </span>


                                                                                @else
                                                                                <span class=" waves-effect waves-light btn-danger" style="color: white; padding:5px; margin: 5px; font-style: italic; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"  class="  waves-effect waves-light btn-info btn-round btn-out"><i class="icofont icofont-success-alt"></i>

                                                                                    pls wait for pastors Aproval. Thanks!
                                                                                @endif

                                                                                @endif

                                                                            </td>
                                                                            <td class=" last">
                                                                                <form style="display: inline" action="{{ route('user.expense.delete', $expense->id) }}" method="post">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    @if (auth()->user()->role_name =="admin" || "user")
                                                                                        @if ($expense->approved ==1)
                                                                                            @if (auth()->user()->role_name =="super_admin")
                                                                                                    <div class="btn btn-group">
                                                                                                        <a class="btn btn-success btn-round btn-out btn-sm mr-3 " href="{{ route('user.expense.edit', $expense->id) }}">
                                                                                                            <i class="fa fa-edit"></i>Edit <span class="text-muted"></span></a>
                                                                                                        </a>
                                                                                                        <button type="submit" class=" btn btn-danger btn-round btn-out btn-sm mr-3 btn-danger btn-round btn-out">
                                                                                                            <i class="fa fa-trash"></i> Delete <span class="text-muted"></span></a>
                                                                                                        </button>
                                                                                                    </div>
                                                                                            @else

                                                                                                    <span class=" waves-effect waves-light btn-danger" style="color: white; padding:5px; margin: 5px; font-style: italic; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"  class="  waves-effect waves-light btn-success btn-round btn-out"><i class="icofont icofont-success-alt"></i>
                                                                                                        No More permission To Edit.
                                                                                                    </span>
                                                                                            @endif

                                                                                        @else
                                                                                                <div class="btn btn-group">
                                                                                                    <a class="btn btn-success btn-round btn-out btn-sm mr-3 " href="{{ route('user.expense.edit', $expense->id) }}">
                                                                                                        <i class="fa fa-edit"></i>Edit <span class="text-muted"></span></a>
                                                                                                    </a>
                                                                                                    <button type="submit" class=" btn btn-danger btn-round btn-out btn-sm mr-3 btn-danger btn-round btn-out">
                                                                                                        <i class="fa fa-trash"></i> Delete <span class="text-muted"></span></a>

                                                                                                    </button>
                                                                                                </div>
                                                                                        @endif
                                                                                    @else
                                                                                            <div class="btn btn-group">
                                                                                                <a class="btn btn-success btn-round btn-out btn-sm mr-3 " href="">
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
                                                                                <form style="display: inline" action="{{ route('user.expense.delete', $expense->id) }}" method="post">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    @if (auth()->user()->role_name == 'super_admin')
                                                                                    <div class="btn-group">
                                                                                        <a class="btn btn-success btn-round btn-out btn-sm mr-3 " href="{{ route('user.expense.edit',$expense->id) }}"><span class="glyphicon glyphicon-edit btn-round btn-out"></span>Edit</a>
                                                                                        <button type="submit" class=" btn btn-danger btn-round btn-out btn-sm mr-3 btn-danger btn-round btn-out"><span class="glyphicon glyphicon-trash btn-round btn-out"></span>Delete</button>
                                                                                    </div>
                                                                                    @endif
                                                                                    @if (auth()->user()->role_name == 'admin')

                                                                                    <div class="btn-group">
                                                                                        <a class="btn btn-success btn-round btn-out btn-sm mr-3 " href="{{ route('user.expense.edit',$expense->id) }}"><span class="glyphicon glyphicon-edit btn-round btn-out"></span>Edit</a>

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

                                                   {{ $expenses->links() }}
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
    <div class="modal fade" id="modal-expense-cat">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Default Modal</h4>
            </div>
            <div class="modal-body">
                    <form action="{{ route('user.expense.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header">
                                        <h5>Create New Expense Category</h5>
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
    <div class="modal fade" id="modal-expense">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Expense Record</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.expense.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="expense_title" class="form-control" placeholder="Expense Description" required="required" autofocus="autofocus" name="expense_title">
                            <label for="expense_title">Expense Description</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="number" step="any" id="expense_amount" min="0.01"  class="form-control" placeholder="Expense Amount" required="required" name="expense_amount">
                            <label for="expense_amount">Expense Amount</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="date" id="expense_amount" class="form-control" placeholder="Expense Date" required="required" name="expense_date" value="{{ date('Y-m-d') }}">
                            <label for="expense_amount">Expense Date</label>
                        </div>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('user.expense.index') }}" class="btn btn-success">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
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
    <!--END EXPENSE MODAL--->





  </div>
</div>
@endsection


<script type="text/javascript">
    $(document).ready(function(){
    $('.btnprn').printPage();
    });
    </script>
