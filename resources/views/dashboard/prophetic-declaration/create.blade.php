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
                <div class="box-body box-profile box-body mx-4">

                    <form action="{{ route('user.propheticDeclaration.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                                <h5>Create New Post</h5>
                            </div>
                            <div class="card-block">
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Select Category</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <select class="form-control form-control" placeholder="---" id="category_id" name="category_id">
                                                @foreach ($categories as $category)
                                                <option @if(old('category_id') == $category->id) selected @endif value="{{ $category->id }}" class="form-control-option" >
                                                    {{ $category->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group has-success row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label" for="inputSuccess1">Author</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input name="author" type="text" class="form-control form-control" id="inputSuccess1">
                                        @if ($errors->has('author'))
                                        <div class="alert alert-danger mt-1 mb-1">
                                            {{ $errors->first('author') }}
                                            </div>
                                        @endif

                                        </div>
                                    </div>
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Title</label>
                                            </div>
                                            <div class="col-sm-10">
                                                <input name="title" type="text" class="form-control form-control" id="inputSuccess1">
                                                @if ($errors->has('title'))
                                        <div class="alert alert-danger mt-1 mb-1">
                                            {{ $errors->first('title') }}
                                            </div>
                                        @endif

                                            </div>
                                        </div>
                                        <div class="form-group has-success row">
                                            <div class="col-sm-2">
                                                <label class="col-form-label" for="inputSuccess1">Body</label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <textarea name="body" class="form-control form-control-success" id="inputSuccess1" name="" id="" cols="30" rows="10"></textarea>
                                                    @if ($errors->has('body'))
                                                    <div class="alert alert-danger mt-1 mb-1">
                                                        {{ $errors->first('body') }}
                                                    </div>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="form-group has-success row">
                                                <div class="col-sm-2">
                                                    <label class="col-form-label" for="inputSuccess1">Upload Picture</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="file" name="picture"  class="form-control col-xl-6" id="">
                                                        @error('image')
                                                        <div class="alert alert-success mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="text-right m-r-20">
                                            <button type="submit" class=" b-b-primary btn-success btn-round btn btn-out">Submit</button>
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






