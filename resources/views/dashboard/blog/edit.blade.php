@extends('layouts.mainApp')


@section('content')

   <div class="container">
        <div class="row justify-content-center">

                <!-- Main content -->
            <section class="content">
                <div class="row">
                        <div class="col-md-4">
                            <!-- Profile Image -->
                            <div class="box box-primary">
                                <div class="box-body box-profile">
                                    {{-- @if (auth()->user()->picture ==null)

                                    <img id="showImage" src="{{ url('profile-images/no_image.jpg') }}" style="width: 50px; width: 50px; border: 1px solid #000000; border-radius:50px;">

                                    @else

                                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('img/agclogo.png') }}" alt="User profile picture" height="100">
                                    @endif --}}

                                    {{-- <h3 class="profile-username text-center">{{ Auth::user()->email }}</h3>
                                    <h3 class="profile-username text-center">{{ auth()->user()->id  }}</h3>
                                    <strong style="color:red; backgroud:white"><i class="fa fa-user margin-r-5"></i> <span> {{ Auth::user()->email }}'s Profile:</span ><span style="color:green; backgroud:white">Online</span></strong> --}}
                                <!-- /.box-body -->
                                </div>
                                <div class="box box-danger"></div>
                            </div>
                            <!-- /.box -->
                            <!-- About Me Box -->
                            <div class="box box-primary">
                                <img class="profile-user-img img-responsive img-circle" src="{{ asset('dist/img/credit/visa.png') }}" alt="User profile picture" height="100">
                                <div class="box-header with-border">
                                    <h3 class="box-title">About Me</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <strong><i class="fa fa-book margin-r-5"></i> Tithe Status</strong>

                                    <p class="text-muted">
                                        Regular
                                    </p>

                                    <hr>

                                    <strong><i class="fa fa-map-marker margin-r-5"></i> Upcoming programs</strong>

                                    <p class="text-muted">
                                        28 March 2022
                                    </p>

                                    <hr>

                                    <strong><i class="fa fa-pencil margin-r-5"></i> Lead Pastor</strong>

                                    <p >

                                        <img style="float: left" src="{{ asset('img/pastor/pastor.jpg') }}" class="profile-user-img img-responsive img-circle"  alt="User profile picture"  width="50">
                                    </p>

                                    <hr>
                                    <br>
                                    <br>
                                    <br>
                                    <strong><i class="fa fa-file-text-o margin-r-5"></i> March prophecy</strong>

                                    <p>Your Bless</p>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    <!-- TABLE: LATEST ORDERS -->
                    <div class="clearfix visible-sm-block"></div>
                    {!! Toastr::message() !!}
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
                                <form action="{{ route('user.post.update', $post->id) }}" method="post" enctype="multipart/form-data">
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
                                                        <input name="author" type="text" class="form-control form-control" id="inputSuccess1" value="{{ $post->author }}">
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
                                                            <input name="title" type="text" class="form-control form-control" id="inputSuccess1" value="{{ $post->title }}">
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
                                                                <textarea name="body" class="form-control form-control-success" id="inputSuccess1" name="" id="" cols="30" rows="10">
                                                                    {{ $post->body }}
                                                                </textarea>
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
                                                                    <input type="file" name="picture"  class="form-control col-xl-6" id="" value="{{ $post->picture }}">
                                                                    @error('image')
                                                                    <div class="alert alert-success mt-1 mb-1">{{ $message }}</div>
                                                                @enderror
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-right m-r-20">
                                                        <button type="submit" class=" b-b-primary btn-success btn-round btn btn-lg btn-out">Update</button>
                                                    </div>
                                </form>
                                <div class="box box-danger"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box box-info">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-envelope"></i>
                        <h3 class="box-title">Quick Email</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <div class="box-body">
                        <form action="#" method="post">
                            <div class="form-group">
                            <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                            </div>
                            <div class="form-group">
                            <input type="text" class="form-control" name="subject" placeholder="Subject">
                            </div>
                            <div>
                            <ul class="wysihtml5-toolbar" style=""><li class="dropdown">
                                        <a class="btn btn-default dropdown-toggle " data-toggle="dropdown">

                                            <span class="glyphicon glyphicon-font"></span>

                                            <span class="current-font">Normal text</span>
                                            <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="p" tabindex="-1" href="javascript:;" unselectable="on">Normal text</a></li>
                                            <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1" tabindex="-1" href="javascript:;" unselectable="on">Heading 1</a></li>
                                            <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2" tabindex="-1" href="javascript:;" unselectable="on">Heading 2</a></li>
                                            <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h3" tabindex="-1" href="javascript:;" unselectable="on">Heading 3</a></li>
                                            <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h4" tabindex="-1" href="javascript:;" unselectable="on">Heading 4</a></li>
                                            <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h5" tabindex="-1" href="javascript:;" unselectable="on">Heading 5</a></li>
                                            <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h6" tabindex="-1" href="javascript:;" unselectable="on">Heading 6</a></li>
                                        </ul>
                                        </li>
                                        <li>
                                        <div class="btn-group">
                                            <a class="btn  btn-default" data-wysihtml5-command="bold" title="CTRL+B" tabindex="-1" href="javascript:;" unselectable="on">Bold</a>
                                            <a class="btn  btn-default" data-wysihtml5-command="italic" title="CTRL+I" tabindex="-1" href="javascript:;" unselectable="on">Italic</a>
                                            <a class="btn  btn-default" data-wysihtml5-command="underline" title="CTRL+U" tabindex="-1" href="javascript:;" unselectable="on">Underline</a>

                                            <a class="btn  btn-default" data-wysihtml5-command="small" title="CTRL+S" tabindex="-1" href="javascript:;" unselectable="on">Small</a>

                                        </div>
                                        </li>
                                        <li>
                                        <a class="btn  btn-default" data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="blockquote" data-wysihtml5-display-format-name="false" tabindex="-1" href="javascript:;" unselectable="on">

                                            <span class="glyphicon glyphicon-quote"></span>

                                        </a>
                                        </li>
                                        <li>
                                        <div class="btn-group">
                                            <a class="btn  btn-default" data-wysihtml5-command="insertUnorderedList" title="Unordered list" tabindex="-1" href="javascript:;" unselectable="on">

                                            <span class="glyphicon glyphicon-list"></span>

                                            </a>
                                            <a class="btn  btn-default" data-wysihtml5-command="insertOrderedList" title="Ordered list" tabindex="-1" href="javascript:;" unselectable="on">

                                            <span class="glyphicon glyphicon-th-list"></span>

                                            </a>
                                            <a class="btn  btn-default" data-wysihtml5-command="Outdent" title="Outdent" tabindex="-1" href="javascript:;" unselectable="on">

                                            <span class="glyphicon glyphicon-indent-right"></span>

                                            </a>
                                            <a class="btn  btn-default" data-wysihtml5-command="Indent" title="Indent" tabindex="-1" href="javascript:;" unselectable="on">

                                            <span class="glyphicon glyphicon-indent-left"></span>

                                            </a>
                                        </div>
                                        </li>
                                        <li>
                                        <div class="bootstrap-wysihtml5-insert-link-modal modal fade" data-wysihtml5-dialog="createLink">
                                            <div class="modal-dialog ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <a class="close" data-dismiss="modal">×</a>
                                                <h3>Insert link</h3>
                                                </div>
                                                <div class="modal-body">
                                                <div class="form-group">
                                                    <input value="http://" class="bootstrap-wysihtml5-insert-link-url form-control" data-wysihtml5-dialog-field="href">
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                    <input type="checkbox" class="bootstrap-wysihtml5-insert-link-target" checked="">Open link in new window
                                                    </label>
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                <a class="btn btn-default" data-dismiss="modal" data-wysihtml5-dialog-action="cancel" href="#">Cancel</a>
                                                <a href="#" class="btn btn-primary" data-dismiss="modal" data-wysihtml5-dialog-action="save">Insert link</a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <a class="btn  btn-default" data-wysihtml5-command="createLink" title="Insert link" tabindex="-1" href="javascript:;" unselectable="on">

                                            <span class="glyphicon glyphicon-share"></span>

                                        </a>
                                        </li>
                                        <li>
                                        <div class="bootstrap-wysihtml5-insert-image-modal modal fade" data-wysihtml5-dialog="insertImage">
                                            <div class="modal-dialog ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <a class="close" data-dismiss="modal">×</a>
                                                <h3>Insert image</h3>
                                                </div>
                                                <div class="modal-body">
                                                <div class="form-group">
                                                    <input value="http://" class="bootstrap-wysihtml5-insert-image-url form-control" data-wysihtml5-dialog-field="src">
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                <a class="btn btn-default" data-dismiss="modal" data-wysihtml5-dialog-action="cancel" href="#">Cancel</a>
                                                <a class="btn btn-primary" data-dismiss="modal" data-wysihtml5-dialog-action="save" href="#">Insert image</a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <a class="btn  btn-default" data-wysihtml5-command="insertImage" title="Insert image" tabindex="-1" href="javascript:;" unselectable="on">

                                            <span class="glyphicon glyphicon-picture"></span>

                                        </a>
                                        </li>
                                        </ul><textarea class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;" placeholder="Message"></textarea><input type="hidden" name="_wysihtml5_mode" value="1"><iframe class="wysihtml5-sandbox" security="restricted" allowtransparency="true" frameborder="0" width="0" height="0" marginwidth="0" marginheight="0" style="display: inline-block; background-color: rgb(255, 255, 255); border-collapse: separate; border-color: rgb(221, 221, 221); border-style: solid; border-width: 1px; clear: none; float: none; margin: 0px; outline: rgb(51, 51, 51) none 0px; outline-offset: 0px; padding: 10px; position: static; inset: auto; z-index: auto; vertical-align: baseline; text-align: start; box-sizing: border-box; box-shadow: none; border-radius: 0px; width: 100%; height: 125px;"></iframe>
                            </div>
                        </form>

                    </div>
                    <div class="box-footer clearfix">
                        <button type="button" class="pull-right btn btn-success btn-lg" id="sendEmail">Send
                        <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </div>
            </section>




        </div>
    </div>


@endsection






