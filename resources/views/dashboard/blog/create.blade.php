@extends('layouts.mainApp')


@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Text Editors
        <small>Advanced form element</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">CK Editor
                <small>Advanced and full of features</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              {{-- <form>
                    <textarea id="editor1" name="editor1" rows="10" cols="80">
                                            This is my textarea to be replaced with CKEditor.
                    </textarea>
              </form> --}}
              <form action="{{ route('user.posts.store') }}" method="post" enctype="multipart/form-data">
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
                                            <textarea id="editor1" name=" body" rows="10" cols="80" placeholder="write.....">
                                            </textarea>
                                            {{-- <textarea name="body" class="form-control form-control-success" id="inputSuccess1" id="body" cols="30" rows="10"></textarea> --}}
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
            </div>
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->

@endsection






