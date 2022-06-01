@extends('layouts.mainApp')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('user.incomeExpense.index') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                        <a  href="{{ route('user.incomeExpense.summary.index') }}" class="small-box-footer" style="color: #21f110; ">
                        Total Summary

                    </a>
            </li>
        </ol>

        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item">
                <a href="{{ route('user.incomeExpense.index') }}">Quarterly Report</a>
            </li>
            <li class="breadcrumb-item active">
                    <a  href="{{ route('user.incomeExpense.summary.index') }}" class="small-box-footer" style="color: #21f110; ">
                     Yearly Report
                    </a>
            </li>
        </ol>


        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="box box-primary">
                        <h3 class="text-center">Quarterly Summary</h3>
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
                                    <th width="">Income</th>
                                    <th width="">Expenses</th>
                                    <th width="">Monthly Balance</th>
                                    <th width="">Approved By</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach($expensesWeekSums as $expense)
                                            <tr>
                                                <td>
                                                <div class="chk-option">
                                                    <div class="checkbox-fade fade-in-primary">
                                                        <label class="check-task">
                                                            <input type="checkbox" value="">
                                                            <span class="cr">
                                                                        <i class="cr-icon fa fa-check txt-default"></i>
                                                                    </span>
                                                        </label>
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                {{ Str::words(strtoupper($expense->created_at), $words =100, $end='..') }}
                                            </td>
                                            <td>
                                                {{ Str::words(strtoupper($expense->user->month), $words =100, $end='..') }}
                                            </td>
                                            <td>
                                                {{ Str::words(strtoupper($expense->expense_amount), $words =100, $end='..') }}
                                            </td>
                                            <td>
                                                <span class="date">{{ Carbon\Carbon::parse($expense->expense_date)->isoFormat('MMM Do YYYY') }}</span>
                                            </td>
                                            <td>
                                                <span class="date"></span>
                                            </td>
                                            <td class="text-right">
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                        <div class="box box-danger"></div>
                </div>
                    <span class="text-center text-success" style="font-size: 20px;" >
                        {{-- {{ $expenses->links() }} --}}
                    </span>
            </div>
        </div>

        <div class="row ">
                <h3 class="text-center" style="color: #e11; ">Financial History</h3>
                @foreach($results as $result)
                    <div class="col-xl-3 col-sm-2 mb-3 col-md-2">
                                <div class="box {{($result['type'] == 'income')? ' box-success box-solid':' box-warning box-solid'}}">
                                    <div class="box-header with-border">
                                            @if ($result['type'] == 'income')
                                                <thead style="font-size: 40px; color:#e11; font-style: italic;">
                                                    <th><h2>Income </h2></th>
                                                </thead>
                                            @else
                                                <thead style="font-size: 40px; color:#e11; font-style: italic;">
                                                    <th><h2>Expense </h2></th>
                                                </thead>
                                            @endif
                                            <h3 class="box-title">
                                                <span class="float-left text-dark">{{($result['type'] == 'income')? Carbon\Carbon::parse($result['created_at'])->isoFormat('MMM Do YYYY') : Carbon\Carbon::parse($result['created_at'])->isoFormat('MMM Do YYYY')  }}</span>
                                            </h3>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                            </div>
                                            <!-- /.box-tools -->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div style="font-size: 20px;">{{($result['type'] == 'income')? $result['income_title']:$result['expense_title']}}</div>
                                        <div class="font-weight-bold text-dark">
                                            <span style="color:green ; font-size:30px;">&#8358;</span>
                                            <span style="color:black ; font-size:30px;">
                                                {{($result['type'] == 'income')? $result['income_amount']: $result['expense_amount']}}
                                            </span>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="small-box">
                                        <div class="inner">
                                            @if ($result['type'] == 'income')
                                            <a href="{{ route('user.income.index') }}" class="small-box-footer" style="position: relative;
                                            text-align: center;
                                            padding: 5px 0;
                                            color: #fff;
                                            color: rgba(255,255,255,0.8);
                                            display: block;
                                            z-index: 10;
                                            font-size:15px;
                                            background: green;
                                            text-decoration: none;">
                                            income info <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                            @else
                                            <a href="{{ route('user.expense.index') }}" class="small-box-footer" style="position: relative;
                                            text-align: center;
                                            padding: 5px 0;
                                            color: #fff;
                                            color: rgba(255,255,255,0.8);
                                            display: block;
                                            z-index: 10;
                                            font-size:15px;
                                            background-color: orange;
                                            text-decoration: none;">
                                            expense info <i class="fa fa-arrow-circle-right"></i>
                                            </a>

                                            @endif
                                </div>
                            </div>
                        </div>

                        <!-- /.box -->
                    </div>
                @endforeach

                <span class="text-center text-success" style="font-size: 20px;" >
                    {{-- {{ $expenses->links() }} --}}
                </span>
        </div>

        </div>
    </div>
@endsection
