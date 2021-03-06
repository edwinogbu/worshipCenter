@extends('layouts.mainApp')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('user.home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('user.expense.index') }}">Expense</a>
            </li>
            <li class="breadcrumb-item active">Insert</li>
        </ol>
        @if ($errors->any())

        <div class="alert alert-danger alert-dismissible fade show rounded" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

            {!! Toastr::message() !!}
        </div>
        @endif
        <div class="row">
            <div class="col-xl-8 offset-2">
                <div class="card mx-auto mt-5">
                    <div class="card-header">Insert New Expense</div>
                    <div class="card-body">
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
                </div>
            </div>
        </div>
    </div>
@endsection
