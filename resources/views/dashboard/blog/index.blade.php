@extends('layouts.mainApp')

@section('content')

    <div class="container">
         <!-- About Me Box -->

    {{-- </div> --}}
        <!-- /.box -->
        <div class="row justify-content-center">

                <section class="content-header with-border">

                <div class="box box-header with-border box-success">
                    {{-- <h1>
                        {{ Auth::user()->first_name }}'s Profile
                    </h1> --}}
                    {!! Toastr::message() !!}
                </div>

                </section>

                <!-- Main content -->
                <section class="content">

                        <div class="col-md-12">
                            <div class="row">
                                <!-- TABLE: LATEST ORDERS -->
                                <div class="clearfix visible-sm-block"></div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="box box-danger"  >
                                        <div class="box-header with-border">
                                            <div class="user-block mb-4">
                                                    <img class="justify-content-center rounded-circle" src="{{ asset('img/logo-mega-glory-crest.png')}}" alt="" title="" height="20px" width="20px">
                                                    <span class="username">
                                                        <a href="#">Program Alert:  </a>

                                                        </span>
                                                    <span class="description">Since: {{ auth()->user()->profile->date_joined }}</span>
                                                    <div class="text-right">
                                                        <p class="btn btn-group">

                                                            @if (auth()->user()->role_name == "admin || super_admin")
                                                            <a  data-toggle="modal" data-target="#modal-cat" class="btn btn-lg bg-primary mx-5" style="background-color:; color: #fffff1"><b>Create Category</b></a>

                                                            @else
                                                            <a  data-toggle="modal" data-target="#modal-blog" class="btn btn-lg mx-5 p-5 btn-success" style=" color: #fffff1"><b>Create Post</b></a>

                                                            @endif

                                                         </p>
                                                        {{-- <a class="btn btn-success btn-round btn-out btn-md m-5 mb-4 ml-5 " href=""><span class="glyphicon glyphicon-book btn-round btn-out"></span>Create Post</a> --}}

                                                    </div>
                                            </div>
                                            <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                            </div>

                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="row">

                                                <div class="col-sm-12 col-md-12 col-xs-12 table-responsive">
                                                    <div class="box box-primary">
                                                        <th>
                                                            <b>

                                                                <marquee behavior="scrole" direction="left" style="color: #fff; background-color:#0c7e77">Jesus Is Coming Soon...!!! <marquee behavior="scrole" direction="left" style="color: #fff; background-color:#f82249">Are You Ready Soldier...!!!
                                                                </marquee>
                                                                <marquee behavior="scrole" direction="left" style="color: #fff; background-color:#f82249">Are You Washed With The Blood...!!!</marquee></marquee>

                                                            </b>
                                                        </th>

                                                        {{-- <div class="box box-danger"></div> --}}


                                                        <div class="box-body">
                                                            <div class="row">
                                                                <div class="col-sm-12, col-md-12 col-xs-12 ">
                                                                    <div class="box box-primary">
                                                                        <div class="box-body box-profile">
                                                                            <div class="table-responsive">
                                                                                <table class="table no-margin">
                                                                                        <thead>
                                                                                            <th>SN</th>
                                                                                            <th width="">Image</th>
                                                                                            <th width="">Title</th>
                                                                                            <th width="">Description</th>
                                                                                            <th width="">Category</th>
                                                                                            <th width="">Status</th>
                                                                                            <th class="">Publish</th>
                                                                                            <th class="text-right">Action</th>

                                                                                        </thead>
                                                                                        <tbody>


                                                                @foreach ($posts as $post)

                                                                <tr style="border: 3px solid red; border-right: 3px solid rgb(233, 224, 224)">
                                                                    <td>
                                                                    <div class="chk-option">
                                                                        <div class="checkbox-fade fade-in-primary">
                                                                            <label class="check-task" >
                                                                                {{-- <input type="checkbox" value="" style="padding:20px; border: 3px solid red; border-right: 3px solid red"> --}}
                                                                                <span class="cr">
                                                                                            {{-- <i class="cr-icon fa fa-check txt-default"></i> --}}
                                                                                            {{ ++$loop->index }}
                                                                                        </span>
                                                                            </label>
                                                                        </div>
                                                                    </div>

                                                                    </td>
                                                                    <td>
                                                                            <div class="d-inline-block align-middle">
                                                                                    <img src="{{ Storage::url($post->picture) }}" alt="user image" class="align-top m-r-15" style="width: 100px; height: 100px; border: 1px solid #000000; border-radius:100%;">
                                                                                    <div class="d-inline-block">
                                                                                        <h6>{{ $post->author }}</h6>
                                                                                        <p class="text-muted m-b-0">{{ auth()->user()->name }}</p>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                {{ Str::words(strtoupper($post->title), $words =3, $end='..') }}
                                                                            </td>
                                                                            <td>
                                                                                {{-- {{ Str::words(strtolower($post->body), $words =5, $end='..') }}<br> --}}
                                                                                {!! Str::limit( Str::ucfirst($post->body), $limit = 20, $end = '.......<br> <a href='.route('post.single', $post->id).' class="btn btn-primary-sm btn-sm btn-xs"><br>Read More</a>') !!}

                                                                            </td>
                                                                            <td>{{ $post->category->name }}</td>
                                                                            {{-- <td>{{ $post->created_at }}</td> --}}
                                                                            <td>

                                                                            {{-- <button type="submit" class=" btn waves-effect waves-light btn-success btn-round btn-out"><i class="icofont icofont-success-alt"></i> --}}
                                                                                @if ($post->status ==1)
                                                                                <span class=" waves-effect waves-light btn-success" style="color: white; padding:5px; margin: 5px; font-style: italic; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"  class="  waves-effect waves-light btn-success btn-round btn-out"><i class="icofont icofont-success-alt"></i>

                                                                                    Published
                                                                                </span>
                                                                                @endif

                                                                                @if ($post->status == 0)

                                                                                {{-- @endif --}}
                                                                                <span class=" waves-effect waves-light btn-info" style="color: white; padding:5px; margin: 5px; font-style: italic; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"  class="  waves-effect waves-light btn-info btn-round btn-out"><i class="icofont icofont-success-alt"></i>
                                                                                    pending
                                                                                @endif

                                                                            </td>
                                                                            <td style="border: 3px solid rgb(175, 154, 154)(175, 154, 154); border-right: 3px solid red">
                                                                                {{-- <form style="display: inline" action="{{ route('user.status.change', $post->id) }}" method="post">
                                                                                        @csrf
                                                                                <div class="form-group">
                                                                                    <select class="form-control" name="status" id="status">
                                                                                    @foreach (App\Models\Blog::IS_ACTIVE_SELECT as $key=>$label)
                                                                                        <option value="{{ $key }}" {{ old('status', 'published') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                                                                    @endforeach
                                                                                    </select>
                                                                                </div> --}}
                                                                                {{-- @if ($post->status ==1)
                                                                                <button type="submit" class=" btn btn-round btn-out btn-xs mr-3 btn-success btn-round btn-out"><i class="icofont icofont-success-alt"></i>
                                                                                Published</button>
                                                                                @else
                                                                                    <button type="submit" class=" btn btn-primary btn-round btn-out btn-xs mr-3 btn-round btn-out"><i class="icofont icofont-warning-alt"></i>Pending</button>
                                                                                @endif --}}
                                                                                {{-- </button>
                                                                                </form> --}}
                                                                                @if (auth()->user()->role_name == "super_admin" || auth()->user()->role_name == "admin" )
                                                                                <form style="display: inline" action="{{ route('user.status', $post->id) }}" method="post">
                                                                                    @csrf

                                                                                    {{-- <a class="btn btn-primary btn-round btn-out btn-xs mr-3 " href="{{ route() }}">@if ($post->status == 1) @else Published @endif </a> --}}
                                                                                        <div class="chk-option">
                                                                                            {{-- <input type="checkbox" name="status" value="1" {{old('status'==1 ? 'checked': '') }} class="input-form-check"> --}}

                                                                                            @if ($post->status !==true)
                                                                                            {{-- <div class="btn-group-vertical"> --}}
                                                                                                <div class="checkbox-fade fade-in-primary">
                                                                                                    <label class="check-task">
                                                                                                        <button class="btn btn-round btn-out btn-xs btn-sm btn-lg mr-3 btn-success btn-round btn-out" ><i class="icofont icofont-check-circled"></i>@if ($post->status == 1) <span class="btn-danger" title="Click to Unpublished" style="font-weight: 900; margin: 5px; padding: 2px;">UnPublised</span> @else <span class="btn-success" title="Click to Published" style="font-weight: 900; margin: 5px; padding: 2px;">Published</span> @endif</button>
                                                                                                       @if ($post->status == 0)
                                                                                                       <input type="checkbox" name="status" value="1" {{old('status'==1 ? 'checked': '') }} class="flat-red icheckbox_flat-green checked input-form-check">
                                                                                                       @else
                                                                                                       @endif
                                                                                                    </label>
                                                                                                </div>
                                                                                        {{-- @else --}}
                                                                                        {{-- <input class="btn btn-round btn-out btn-xs mr-3 btn-danger btn-icon"><i class="icofont icofont-check-circled"></i></input> --}}

                                                                                        @endif
                                                                                        {{-- @if ($post->status == false)

                                                                                        <button type="submit" class=" btn btn-round btn-out btn-xs mr-3 btn-danger btn-round btn-out"><i class="icofont icofont-warning-alt"></i>@if ($post->status == 1) aProved @else unPublished @endif</button>
                                                                                        @endif --}}
                                                                                        </div>
                                                                                </form>

                                                                                @else
                                                                                waiting for Aproval..<br> Thanks!
                                                                                @endif


                                                                            </td>
                                                                            {{-- <td>@if ($post->status == 0) <span class=" btn waves-effect waves-light btn-warning btn-round btn-out bg-warning">Pending</span> @else <span class=" btn waves-effect waves-light btn-success btn-round btn-out bg-success">Published</span> @endif</td> --}}

                                                                            <td class="text-right">


                                                                                <form style="display: inline" action="{{ route('user.post.delete', $post->id) }}" method="post">
                                                                                    <div class="btn-group " style="display: inline">
                                                                                    <a style="display: inline" class="btn btn-primary btn-round btn-out btn-sm btn-xs mr-3 " href="{{ route('user.post.edit',$post->id) }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>Edit</a>

                                                                                    @csrf
                                                                                @method('DELETE')
                                                                                <button style="display: inline" type="submit" class=" btn btn-round btn-out btn-sm btn-xs mr-3 btn-danger btn-round btn-out"><span class="glyphicon glyphicon-trash btn-round btn-out"></span>Delete</button>

                                                                            </div>
                                                                            </form>
                                                                            </td>

                                                                                    {{-- <td> --}}

                                                                                        {{-- <input data-id="{{$post->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $post->status ? 'checked' : '' }}> --}}
                                                                                    {{-- </td> --}}
                                                                </tr>
                                                            @endforeach



                                                                                        </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     <div class="box box-danger"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>

                                            </div>
                                            </div>

                                        </div>
                                </div>


                                <!-- /.col -->

                            </div>
                        </div>
                        <!-- /.table-responsive -->
                </section>




                 <!--CATEGORY MODAL--->
    <div class="modal fade" id="modal-cat">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Default Modal</h4>
            </div>
            <div class="modal-body">
                    <form action="{{ route('user.category.store') }}" method="post" enctype="multipart/form-data">
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
                                            @if ($errors->has('name'))
                                            <div class="alert alert-danger mt-1 mb-1">
                                                {{ $errors->first('name') }}
                                                </div>
                                            @endif

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





    <!--BLOG MODAL---->

    <div class="modal fade" id="modal-blog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Default Modal</h4>
            </div>
            <div class="modal-body">
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
    <!--END BLOG MODAL---->







        </div>
    </div>

@endsection


