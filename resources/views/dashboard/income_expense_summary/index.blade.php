@extends('layouts.mainApp')

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <a  href="{{ route('user.incomeExpense.summary.index') }}" class="small-box-footer" style="color: #f21;">
            Overview
        </a>
        </li>
        <li class="breadcrumb-item active pull-right">
            <a  href="{{ route('user.expense.index') }}" class="small-box-footer" style="color: #e11; ">
            Expenses
            </a>
        </li>
        <li class="breadcrumb-item active pull-right">
                <a  href="{{ route('user.income.index') }}" class="small-box-footer" style="color: #e1f110; ">
                    Income
                </a>
        </li>
    </ol>

    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item">
            <a href="{{ route('user.incomeExpense.quarterlySummary.index') }}">Quarterly Report</a>
        </li>
        <li class="breadcrumb-item active">
                <a  href="{{ route('user.incomeExpense.yearlySummary.index') }}" class="small-box-footer" style="color: #21f110; ">
                 Yearly Report
                </a>
        </li>
    </ol>



    <!-- Icon Cards-->
    <div class="row">
{{--
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="box-body">
                    <div class="box-body-icon">
                        <i class="fas fa-fw fa-table"></i>
                    </div>
                    <div class="mr-5">Total Summary</div>
                </div>
                <a class="nav-link text-white text-center card-footer clearfix small z-1" href="{{ route('user.incomeExpense.summary.index') }}"  class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View All Summary</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div> --}}

        {{-- <div class="col-xl-3 col-sm-6 mb-3">
            <div class="box card text-white bg-success o-hidden h-100">
                <div class="box-body">
                    <div class="box-body-icon">
                        <i class="fas fa-fw fa-dollar-sign"></i>
                    </div>
                    <div class="mr-5">{{ App\Models\Income::where('user_id', Auth::user()->id)->count() }} Income</div>
                </div>
                <a class="nav-link text-white text-center card-footer clearfix small z-1" href="{{ route('user.income.index') }}"  class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View All</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div> --}}


        {{-- <div class="col-xl-12 col-sm-12 mb-12">
            <div class="col-lg-12 col-xs-12">
                <div class="small-box bg-aqua" >
                  <div class="inner" style="padding: 30px; margin:30px;">
                    <h6>
                        Income and Expenses
                        <sub style="font-size: 20px">Breakddown analysis</sub>
                    </h6>
                    <p>
                        <h3>
                            <div class="mr-5 text-center">
                                <a  href="{{ route('user.incomeExpense.summary.index') }}" class="small-box-footer" style="color: #fff;">
                                    Total Summary
                                </a>
                            </div>
                        </h3>
                    </p>
                </div>
                <div class="icon" style="margin: 25px; color:#fff;">
                    <i class="ion ion-pie-graph"></i>
                  </div>

                  <a  href="{{ route('user.incomeExpense.summary.index') }}" class="small-box-footer">
                        <span class="float-left">View All Summary</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div> --}}
        <div class="col-xl-6 col-sm-6 mb-3">

            <div class="col-lg-12 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3>{{ App\Models\Income::where('user_id', Auth::user()->id)->count() }}
                        <sup style="font-size: 20px">income made</sup></h3>

                    <p>
                        <h3>
                            <div class="mr-5 text-center">
                                Income Dasboard
                            </div>
                        </h3>

                    </p>
                  </div>
                  <div class="icon" style="margin: 25px; color:#fff;">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a  href="{{ route('user.income.index') }}" class="small-box-footer">
                        <span class="float-left">View All</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    {{-- </a> --}}
                    <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
        <div class="col-xl-6 col-sm-6 mb-3">

            <div class="col-lg-12 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3>{{ App\Models\Expense::where('user_id', Auth::user()->id)->count() }}
                        <sup style="font-size: 20px">Expenses made</sup></h3>

                    <p>
                        <h3>
                            <div class="mr-5 text-center">
                                 Expenses
                            </div>
                        </h3>

                    </p>
                  </div>
                  <div class="icon" style="margin: 25px; color:#fff;">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a  href="{{ route('user.expense.index') }}" class="small-box-footer">
                        <span class="float-left">View All</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
    </div>

    <div class="col-lg-12 col-xs-12">
        <div class="small-box bg-aqua">
            <div class="box box-white small-box-footer"></div>
          <div class="inner">

            <h6>  Income and Expenses

                <sub style="font-size: 20px">Breakddown analysis</sub>
            </h6>
            <p>
                <h3>
                    <div class="mr-5 text-center">
                        <a  href="{{ route('user.incomeExpense.summary.index') }}" class="small-box-footer" style="color: #fff;">
                            Total Summary
                        </a>
                    </div>
                </h3>
            </p>
          </div>
          <div class="icon " style="margin: 25px; color:#fff;">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a  href="{{ route('user.incomeExpense.summary.index') }}" class="small-box-footer">
            <span class="float-left">View All Summary</span>
            <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>




    <!-- Chart -->
    <div class="row">
        <div class="col-lg-12">
            <div class=" box card mb-3">
            <div class="box-head card-header" style="margin: 20px; color:green;">
                <i class="fas fa-chart-pie"></i>
                Income Vs Expense <small class="badge badge-info">(This Month Data)</small></div>
            <div class="box-body card-body">
                <canvas id="incomeExpenseChart" width="100%" height="30"></canvas>
            </div>
            <div class="box-footer card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('dashboard/vendor/chart/chart.min.js') }}"></script>
    <script>
        //Income expense Pie Chart
        var ctx = document.getElementById("incomeExpenseChart");
        var income = $(".incomeValue").html();
        var expense = $(".expenseValue").html();
        var incomeExpenseChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Income", "Expense"],
                datasets: [{
                data: [income, expense],
                backgroundColor: ['#007bff', '#dc3545'],
                }],
            },
        });
    </script>
@endpush

