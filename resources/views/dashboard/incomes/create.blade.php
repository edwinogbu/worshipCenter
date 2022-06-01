@extends('layouts.mainApp')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('user.home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('user.income.index') }}">Income</a>
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
                    <div class="card-header">Insert New Income</div>
                    <div class="card-body">
                        <form action="{{ route('user.income.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label for="income_title">Income Description</label>
                                    <input type="text" id="income_title" class="form-control" @error('income_title') is-invalid @enderror
                                     placeholder="Income Title" autofocus="autofocus" name="income_title" value="{{ old('income_title') }}">
                                    @error('income_title')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label for="income_amount">Income Amount</label>
                                    <input type="number" step="any" min="0.01" id="income_amount" class="form-control" @error('income_amount') is-invalid @enderror
                                    placeholder="income_amount" name="income_amount" value="{{ old('income_amount') }}">
                                    @error('income_amount')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label for="income_date">Income Date</label>
                                    <input type="date" id="income_date" class="form-control" @error('income_date') is-invalid @enderror
                                    placeholder="Income Date" name="income_date" value="{{ date('Y-m-d') }}">
                                    @error('income_date')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('user.income.index') }}" class="btn btn-success">Back</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
