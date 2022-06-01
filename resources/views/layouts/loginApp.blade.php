<!DOCTYPE html>
<html lang="en">


<head>
    <title>Church Management System</title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Eddy master is one of the best church html template, it's suitable for all church websites like university,college,school,online education,tution center,distance education,computer education">
    <meta name="keyword" content="church html template">
    <!-- FAV ICON(BROWSER TAB ICON) -->
    <link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700" rel="stylesheet">
    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="{{ asset('logincss/css/font-awesome.min.css')}}">
    <!-- ALL CSS FILES -->


    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ALL CSS FILES -->
    <link href="{{ asset('logincss/css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('logincss/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('logincss/css/style.css') }}" rel="stylesheet" />
    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="{{ asset('logincss/css/style-mob.css') }}" rel="stylesheet" />
</head>

<body>
{{-- <div class="main-content"> --}}

    @yield('content')

    <section>
        <div class="icon-float">
            <ul>
                <li><a href="#" class="sh">1k <br> Share</a> </li>
                <li><a href="#" class="fb1"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="gp1"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="tw1"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="li1"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="wa1"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="sh1"><i class="fa fa-envelope-o" aria-hidden="true"></i></a> </li>
            </ul>
        </div>
    </section>

{{-- </div> --}}











</body>
<!--Import jQuery before materialize.js-->
{{-- <script src="{{ asset('js/main.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/materialize.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
 --}}



<script src="{{ asset('logincss/js/main.min.js') }}"></script>
<script src="{{ asset('logincss/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('logincss/js/materialize.min.js') }}"></script>
<script src="{{ asset('logincss/js/custom.js') }}"></script>


</html>
