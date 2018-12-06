
<!DOCTYPE html>
<html lang="en">

<head>
    <title>The Mighty Myanmar </title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- FAV ICON -->
    <link rel="shortcut icon" href="{{asset('web/images/fav.ico.png')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:400,500,700" rel="stylesheet">
    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="{{asset('web/css/font-awesome.min.css')}}">
    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="{{asset('web/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/materialize.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/mob.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/custom.css')}}">

    <style type=text/css>
    
    #status {
     width: 200px;
     height: 200px;
     position: absolute;
     left: 50%;
    /* centers the loading animation horizontally one the screen */
     top: 50%;
    /* centers the loading animation vertically one the screen */
     background-image: url(../../theme/preloader.gif);
    /* path to your loading animation */
     background-repeat: no-repeat;
     background-position: center;
     margin: -100px 0 0 -100px;
    /* is width and height divided by two */
}
    
    
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

    @include('web.nav')

    @yield('content')


    <!--HEADER SECTION-->
   
    <!--========= Scripts ===========-->
    <script src="{{asset('web/js/jquery-latest.min.js')}}"></script>
    <script src="{{asset('web/js/jquery-ui.js')}}"></script>
    <script src="{{asset('web/js/bootstrap.js')}}"></script>
    <script src="{{asset('web/js/wow.min.js')}}"></script>
    <script src="{{asset('web/js/materialize.min.js')}}"></script>
    <script src="{{asset('web/js/custom.js')}}"></script>
    <script>
$(document).ready(function () {
    
        bdate = $("#bdate")
        .datepicker({
            dateFormat:'dd-mm-yy',
        });
});
</script>
    @yield('js')

   
</body>

</html>