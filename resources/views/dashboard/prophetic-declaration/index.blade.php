@extends('layouts.mainApp')

@section('content')

    <div class="container">
         <!-- About Me Box -->
         <div class="box box-primary p-5">
            <div class="box-header with-border">
                <h3 class="box-title">Prophetic Declaration Dashboard</h3>
            </div>
        </div>
    {{-- </div> --}}
        <!-- /.box -->
        <div class="row justify-content-center">

                <section class="content-header with-border">

                <div class="box box-header with-border box-success">
                    <h1>
                        {{ Auth::user()->first_name }}'s Profile
                    </h1>
                    {!! Toastr::message() !!}
                </div>

                @if ($msg=Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show rounded" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span></button> <i class="fa fa-info mx-2"></i>
                    <strong>{{ $msg }}</strong>
                </div>
                @endif


                @if ($msg=Session::get('success'))
                <div class="alert alert-success col-sm-7" style="font-size: 40px; padding:15px;">{{ $msg }}</div>
                @endif

                @if ($msg=Session::get('pending'))
                <div class="alert alert-danger col-sm-7" style="font-size: 40px; padding:15px;">{{ $msg }}</div>
                @endif


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
                                                    <img class="justify-content-center rounded-circle" src="{{ asset('img/agclogo.png')}}" alt="" title="" height="20px" width="20px">
                                                    <span class="username">
                                                        <a href="#">Program Alert: Settle me Oh God April Edition </a>

                                                        </span>
                                                    <span class="description">Since july 18 - 7:30 PM today</span>
                                                    <div class="text-right">
                                                        <p class="btn btn-group">
                                                            <a  data-toggle="modal" data-target="#modal-prophet" class="btn btn-lg bg-primary mx-5" style="background-color:; color: #fffff1"><b>Prophetic Category</b></a>

                                                         </p>

                                                    @if (Session::has('message'))
                                                    <div class="alert alert-success alert-dismissible fade show rounded" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button> <i class="fa fa-info mx-2"></i>
                                                        <strong>{!! session('message') !!}</strong>
                                                    </div>
                                                    @endif
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

                                                <div class="col-sm-12">
                                                    <div class="box box-primary">
                                                    <div class="box-body box-profile">
                                                        <div class="table-responsive">
                                                            <table class="table no-margin  table-bordered " >
                                                                <thead class="bg bg-black" style="color:#fff">
                                                                <tr>
                                                                    <th width="5%">
                                                                        <div class="chk-option">
                                                                            <div class="checkbox-fade fade-in-primary">
                                                                                <span >SN</span>
                                                                            </div>
                                                                        </div>
                                                                    </th>

                                                                    <th width=" %">DECLARATION TITLE</th>
                                                                    <th width=" %">DECLARATION NOTE</th>
                                                                    <th width=" %">DECLARATION CATEGORY</th>
                                                                    <th width=" %">DECLARATION DATE</th>
                                                                    <th width=" %">STATUS</th>
                                                                    <th width=" %">PUBLISHED</th>


                                                                    <th width="15%" class="text-right">Action</th>
                                                                </tr>
                                                                </thead>

                                                                <tbody>

                                                                    @foreach ($propheticDeclarations as $propheticDeclaration)

                                                                    <tr style="border: 3px solid red; border-right: 3px solid red">
                                                                        <td>
                                                                        <div class="chk-option">
                                                                            <div class="checkbox-fade fade-in-primary">
                                                                                <label class="check-task" >
                                                                                    <input type="checkbox" value="" style="padding:20px; border: 3px solid red; border-right: 3px solid red">
                                                                                    <span class="cr">
                                                                                                {{  ++$loop->index }}
                                                                                            </span>
                                                                                </label>
                                                                            </div>
                                                                        </div>

                                                                        </td>
                                                                        <td>
                                                                    <div class="d-inline-block align-middle">
                                                                            <div class="d-inline-block">
                                                                                <h6>{{ $propheticDeclaration->prophetic_declaration_title }}</h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        {{ Str::words(strtoupper($propheticDeclaration->prophetic_declaration_note), $words =3, $end='..') }}
                                                                    </td>
                                                                    <td>
                                                                        {{ Str::words(strtoupper($propheticDeclaration->declarationCategory->declaration_title), $words =3, $end='..') }}
                                                                    </td>
                                                                    <td>
                                                                        {{ Str::words(strtoupper($propheticDeclaration->prophetic_declaration_date), $words =3, $end='..') }}
                                                                    </td>



                                                                    <td style="border: 3px solid red; border-right: 3px solid red">
                                                                        @if ($propheticDeclaration->status ==1)
                                                                        <span class=" waves-effect waves-light btn-success" style="color: white; padding:5px; margin: 5px; font-style: italic; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"  class="  waves-effect waves-light btn-success btn-round btn-out"><i class="icofont icofont-success-alt"></i>

                                                                            Published
                                                                        </span>


                                                                        @else
                                                                        <span class=" waves-effect waves-light btn-info" style="color: white; padding:5px; margin: 5px; font-style: italic; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"  class="  waves-effect waves-light btn-info btn-round btn-out"><i class="icofont icofont-success-alt"></i>
                                                                            pending
                                                                        @endif
                                                                    </td>
                                                                    <td style="border: 3px solid red; border-right: 3px solid red">



                                                                            <form style="display: inline" action="{{ route('user.published', $propheticDeclaration->id) }}" method="post">
                                                                                @csrf


                                                                                <div class="chk-option">
                                                                                    {{-- <input type="checkbox" name="status" value="1" {{old('status'==1 ? 'checked': '') }} class="input-form-check"> --}}

                                                                                    @if ($propheticDeclaration->publish_prophecy_Status !==true)
                                                                                        <div class="checkbox-fade fade-in-primary">
                                                                                            <label class="check-task">
                                                                                                <button class="btn btn-round btn-out btn-xs mr-3 btn-success btn-round btn-out"><i class="icofont icofont-check-circled"></i>published</button>
                                                                                                <input type="checkbox" name="publish_prophecy_Status" value="1" {{old('publish_prophecy_Status'==1 ? 'checked': '') }} class="flat-red icheckbox_flat-green checked input-form-check">
                                                                                            </label>
                                                                                        </div>
                                                                                    @else
                                                                                <button class="btn btn-round btn-out btn-xs mr-3 btn-danger btn-icon"><i class="icofont icofont-check-circled"></i></button>

                                                                                    @endif
                                                                                </div>
                                                                            <button type="submit" class=" btn btn-round btn-out btn-xs mr-3 btn-danger btn-round btn-out"><i class="icofont icofont-warning-alt"></i>@if ($propheticDeclaration->publish_prophecy_Status == 1) Pending @else Published @endif</button>
                                                                        </form>


                                                                    </td>

                                                                      <td style="border: 3px solid red; border-right: 3px solid red">


                                                                        <form style="display: inline" action="{{ route('user.propheticDeclaration.delete', $propheticDeclaration->id) }}" method="post">
                                                                            <div class="btn-group " style="display: inline">
                                                                                <a style="display: inline; font-style: italic;" class="btn btn-primary btn-round btn-out btn-xs mr-3 " href="{{ route('user.propheticDeclaration.edit',$propheticDeclaration->id) }}"><span class="glyphicon glyphicon-pencil btn-round btn-out"></span>_Edit</a>

                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button style="display: inline; font-style: italic;" type="submit" class=" btn btn-round btn-out btn-xs mr-3 btn-danger btn-round btn-out"><span class="glyphicon glyphicon-trash btn-round btn-out"></span>_Delete</button>
                                                                                {{-- <a style="display: inline; font-style: italic; margin-left: 5px" class="btn btn-info btn-round btn-out btn-sm mr-3 p-5" href="{{ route('user.propheticDeclaration.show',$propheticDeclaration->id) }}"><span class="glyphicon glyphicon-user btn-round btn-out"></span>_Show</a> --}}

                                                                    </div>
                                                                    </form>

                                                                    </td>

                                                                </tr>
                                                                @endforeach

                                                                </tbody>
                                                            </table>
                                                            <a href="#" class="btn btn-block " style="background-color: #f82249; color: #fffff1"><b></b></a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="box box-danger"></div>
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



                <!--PROPHET DECLARATION REGISTER MODAL--->
                <div class="modal fade" id="modal-prophet">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="font-style: italic; color:#11e060;">Creating New Category. Please wait....</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('user.propheticDeclaration.store') }}" class="box-body box-profile mx-5"  enctype="multipart/form-data">

                                @csrf
                                <div class="card-header">
                                        <h5>Create New Prophecy</h5>
                                    </div>
                                    {{-- <div class="card-block"> --}}



                                        <div class="form-group row mb-5">
                                            <div class="col-md-12">
                                                <label for="prophetic_declaration_title" class="col-form-label text-md-right">{{ __('DECLARATION CATEGORY') }}</label>

                                                <select class="form-control" placeholder="---" id="declaration_category_id" name="declaration_category_id" style="color: #221">
                                                    @foreach ($declarationCategory as $category)
                                                    <option @if(old('declaration_category_id') == $category->id) selected @endif value="{{ $category->id }}" class="form-control-option" >
                                                        {{ $category->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-5">
                                            <div class="col-md-12">
                                                <label for="prophetic_declaration_title" class="col-form-label text-md-right">{{ __('prophetic_declaration_title') }}</label>

                                                <input name="prophetic_declaration_title" type="text" class="form-control form-control m-1 p-1" id="inputSuccess1">

                                                @error('prophetic_declaration_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mb-5">
                                            <div class="col-md-12 mb-5 px-5">
                                                <label for="prophetic_declaration_note" class="col-form-label text-md-right">{{ __('Prophetic Declaration Note') }}</label>
                                                <textarea name="prophetic_declaration_note" class="form-control form-control-success " id="inputSuccess1" cols="30" rows="10"></textarea>


                                                @error('prophetic_declaration_note')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="form-group has-success row">
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label" for="inputSuccess1">Prophecy Declaration date</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="date" name="prophetic_declaration_date"  class="form-control col-xl-6" id="">
                                                            @error('prophetic_declaration_date')
                                                            <div class="alert alert-success mt-1 mb-1">{{ $message }}</div>
                                                        @enderror
                                                        </div>
                                                </div>
                                            </div>
                                        </div>







                                            {{-- </div> --}}


                                        {{-- </div> --}}
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger btn-lg pull-left" data-dismiss="modal">Close</button>
                                            {{-- <button type="submit" class=" b-b-primary btn-success btn-round btn btn-out">Create</button> --}}

                                            <button type="submit" class="btn btn-lg btn-success pull-right" style="background-color: #; color:#fff; float:center">
                                                {{ __('Save') }}
                                            </button>
                                        </div>

                                    </div>
                       </form>
                    <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--END APPOINTMENT MODAL--->








        </div>
    </div>

@endsection


