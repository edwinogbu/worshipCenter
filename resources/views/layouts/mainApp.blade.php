<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>AGC Dashboard</title>

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <link href="{{  asset('shopy/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all">
    <!-- Custom Theme files -->
    {{-- <link href="{{  asset('shopy/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/> --}}
    <!--js-->
    <script src="{{  asset('shopy/js/jquery-2.1.1.min.js')}}"></script>
    <!--icons-css-->
    <link href="{{  asset('shopy/css/font-awesome.css')}}" rel="stylesheet">
    <!--Google Fonts-->
    <link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
    <!--//skycons-icons-->
    <!--pop up strat here-->
    <script src="{{  asset('shopy/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
     <script>
                            $(document).ready(function() {
                            $('.popup-with-zoom-anim').magnificPopup({
                                type: 'inline',
                                fixedContentPos: false,
                                fixedBgPos: true,
                                overflowY: 'auto',
                                closeBtnInside: true,
                                preloader: false,
                                midClick: true,
                                removalDelay: 300,
                                mainClass: 'my-mfp-zoom-in'
                            });

                            });
                    </script>
    <!--pop up end here-->









    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{  asset('../../bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{  asset('../../bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{  asset('../../bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{  asset('../../dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{  asset('../../dist/css/skins/_all-skins.min.css')}}">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{  asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{  asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{  asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{  asset('dist/css/AdminLTE.min.css')}} ">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{  asset('bower_components/morris.js/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{  asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{  asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{  asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{  asset('dist/css/skins/_all-skins.min.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{  asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!--ACCOUNT SUMMARY CSS-->
    <link href="{{ asset('dashboard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">


    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
.skin-blue .main-header .navbar {
    /* background-color: #dd4b39; */
    background-color: #72091d;


}

#headers{
    background-color: #f82249;
    color: green;

}

.main-header .navbar-custom-menu, .main-header .navbar-right {
    float: right;
    background-color: #f82249;
}

/*
.skin-blue .main-header .logo {
    background-color: #1f1002;
    color: #fff;
    border-bottom: 0 solid transparent;
} */
</style>


<!--toastr notification-->
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

</head>
  <body class="hold-transition skin-blue sidebar-mini">
    @include('partials.navbar')
    <div class="content-wrapper">

{{--
     @yield('content') --}}
    <!-- Main content -->
    <section class="content">
    {{-- @include('partials.parts.dasboardCount') --}}



                   @yield('content')



      </section>
      <!-- /.content -->


  <!-- TABLE: LATEST ORDERS -->
  <div class="clearfix visible-sm-block"></div>

      </div>
    <!-- /.content-wrapper -->




  @include('partials.footer')

    <!-- Control Sidebar -->
  @include('partials.control-sidebar')
    <!-- /.control-sidebar --> --}}
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

    @include('partials.sidebar')

</div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="{{  asset('../../bower_components/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{  asset('../../bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <!-- SlimScroll -->
  {{-- <script src="{{  asset('../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script> --}}
  <!-- FastClick -->
  <script src="{{  asset('../../bower_components/fastclick/lib/fastclick.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{  asset('../../dist/js/adminlte.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{  asset('../../dist/js/demo.js')}}"></script>
  <script>
    $(document).ready(function () {
      $('.sidebar-menu').tree()
    })
  </script>


<!--scrolling js-->
{{-- <script src="{{  asset('shopy/js/jquery.nicescroll.js')}}"></script> --}}
<script src="{{  asset('shopy/js/scripts.js')}}"></script>
<!--//scrolling js-->
{{-- <script src="{{  asset('shopy/js/bootstrap.js')}}"> </script> --}}
<!-- mother grid end here-->





<!-- jQuery 3 -->
<script src="{{  asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{  asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
{{-- <script src="{{  asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script> --}}
<!-- Morris.js charts -->
{{-- <script src="{{  asset('bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{  asset('bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{  asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{  asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{  asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{  asset('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{  asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{  asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{  asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{  asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{  asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{  asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{  asset('dist/js/adminlte.min.js')}}"></script> --}}
<script src="{{  asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{  asset('dist/js/demo.js')}}"></script>
<script src="{{  asset('js\jquery-3.6.0.min.js')}}"></script>
<script src="{{ asset('dashboard/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!--CHART JS--->
<script src="{{ asset('dashboard/js/script.js') }}"></script>
@stack('js')

    @yield('scripts')
<!-- CK Editor -->
<script src="{{  asset('bower_components/ckeditor/ckeditor.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{  asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
  </body>
  </html>
