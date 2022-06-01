@extends('layouts.mainApp')


@section('content')

<div class="container">
    <div class="row justify-content-center">


      <!-- Main content -->
    <section class="content">

            <!-- TABLE: LATEST ORDERS -->
            <div class="clearfix visible-sm-block"></div>
        {!! Toastr::message()  !!}
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
                @if ($msg=Session::get('success'))
                <div class="alert alert-success">{{ $msg }}</div>
                @endif

                @if ($msg=Session::get('fail'))
                <div class="alert alert-danger">{{ $msg }}</div>
                @endif
                <div class="box-body box-profile box-body mx-4">


                        <form action="{{ route('user.propheticDeclaration.update', $propheticDeclaration->id) }}" method="post" enctype="multipart/form-data">

                        @csrf


                                    <div class="form-group row mb-5">
                                        <div class="col-md-12">
                                            <label for="prophetic_declaration_title" class="col-form-label text-md-right">{{ __('DECLARATION CATEGORY') }}</label>

                                            <select class="form-control" id="declaration_category_id" name="declaration_category_id" style="color: #221">
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

                                            <input name="prophetic_declaration_title" type="text" class="form-control form-control m-1 p-1" id="inputSuccess1" value="{{ $propheticDeclaration->prophetic_declaration_title }}">

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
                                            <textarea name="prophetic_declaration_note" class="form-control form-control-success " id="inputSuccess1" cols="30" rows="10">
                                                {{ $propheticDeclaration->prophetic_declaration_note }}
                                            </textarea>


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
                                                        <input type="date" name="prophetic_declaration_date"  class="form-control col-xl-6" id="" value="{{ $propheticDeclaration->prophetic_declaration_date }}">
                                                        @error('prophetic_declaration_date')
                                                        <div class="alert alert-success mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                    </div>
                                            </div>
                                        </div>
                                    </div>




                        <div class="form-group row mb-0 text-center">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-lg btn-success" style="background-color: #; color:#fff; float:center">
                                    {{ __('Update') }}
                                </button>
                            </div>
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






