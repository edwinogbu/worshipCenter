@extends('layouts.mainApp')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


    <div class="card-body">

      <!-- Main content -->
      <section class="content">

    <div class="row">

        <div class="col-md-9 col-sm-9 col-xs-9">
            <div class="box box-danger"  >
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">


                        <div class="col-sm-12">
                            <div class="box box-primary">
                                <div class="box-body box-profile">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <form action="" class="form-inline">
                <h2>Search content in database using Laravel</h2>
                <div class="form-group">
                    <input type="text" name="q" placeholder="Find or Search Members...!" class="form-control"/>
                    <input type="submit" class="btn btn-primary" value="Search"/>
                </div>
            </form>
        </div>
        <div class="col-md-10">
            <table class="table">
                @foreach($data as $Member)
                <tr>
                    {{-- <td>{{$Member->ID}}</td> --}}
                    <td>{{$Member->name}}</td>
                    <td>{{$Member->email}}</td>
                    <td>{{$Member->phone}}</td>
                    <td>{{$Member->profile->first_name}}</td>

                </tr>
                @endforeach
            </table>
            {{ $data->links() }}
        </div>
    </div>
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




</section>

      </div>
      <!-- /.table-responsive -->
    </div>
    </div>
    </div>
      <!-- /.content -->
{{-- </div> --}}


@endsection


