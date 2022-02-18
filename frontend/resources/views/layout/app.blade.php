<!DOCTYPE html>
<html>
<head>
	 <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="google-site-verification" content="J2K-awrLm--LtTSkUGmFsRpFFTU0W1V5PqZTQp0b6pg" />
    <meta name="description" content="mizanurrashed is an Expert Web Developer in Bangladesh.  ">
    <meta name="keywords" content="Expert Web Developer in Bangladesh">
    <meta name="author" content="mizanurrashed">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" >
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" >
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" >
    <link href="{{asset('css/owl.carousel.min.css')}}" rel="stylesheet" >
    <link href="{{asset('css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
</head>
<body>
@include('layout.menu');
@yield('content');

<script type="text/javascript" src=" {{asset('js/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript" src=" {{asset('js/popper.min.js')}}"></script>
<script type="text/javascript" src=" {{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src=" {{asset('js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src=" {{asset('js/axios.min.js')}}"></script>
<script type="text/javascript" src=" {{asset('js/custom.js')}}"></script>

</body>
</html>