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
           <div class="col-md-8 col-sm-8 col-xs-8">


               <div class="box box-body box-primary">

                   <strong><i class="fa fa-list margin-r-5"></i>
                            <label class="col-form-label has-success" for="inputSuccess1">
                                Create 10 Category Dynamically
                            </label>
                    </strong>
               <div class="box box-danger"></div>

                    {!! Toastr::message() !!}
                    <p class="text-muted">
                        <form action="{{ route('user.incomeCategory.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-block">
                                    <div class="form-group has-success row">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">
                                                <strong><i class="fa fa-book margin-r-5"></i> Name</strong>

                                            </label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="controls">
                                            <div class="form-group fieldGroup">
                                                <div class="input-group">
                                                    <input name="name[]" type="text" class="form-control form-control-input " id="inputSuccess1">
                                                    <div class="input-group-addon">
                                                        <a href="javascript:void(0)" class="btn btn-success addMore"> <span class="glyphicon glypicon glyphicon-plus" aria-hidden="true"></span> Add</a>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center m-r-20">
                                    <button type="submit" class=" b-b-primary btn-info btn-lg btn-round btn btn-out">Create</button>
                                </div>
                        </form>
                    </p>
                                <div class="card-block">
                                    <div class="form-group has-success row " style="display: none">
                                        <div class="col-sm-2">
                                            <label class="col-form-label" for="inputSuccess1">Name</label>
                                        </div>
                                        <div class="col-sm-10">
                                                <div class="form-group fieldGroupCopy" style="display: none">
                                                    <div class="input-group">
                                                        <input name="name[]" type="text" class="form-control " id="inputSuccess1">
                                                        <div class="input-group-addon">
                                                            <a href="javascript:void(0)" class="btn btn-danger remove"> <span class="glyphicon glypicon glyphicon-remove" aria-hidden="true"></span> Add</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                    </div>
                </div>

        </div>

      </section>
      <!-- /.content -->
</div>
</div>

@endsection

@section('scripts')

<script>
    $(document).ready(function () {
    var maxGroup = 10;

        $(".addMore").click(function () {
            if ($('body').find('.fieldGroup').length < maxGroup) {
                var fieldHTML ='<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
                $('body').find('.fieldGroup:last').after(fieldHTML);
            }else{
                alert('maximum'+maxGroup+'groups are allowed')

            }
        });


        $('body').on("click",".remove", function () {
            $(this).parents(".fieldGroup").remove();

        });
    });


</script>
@endsection




