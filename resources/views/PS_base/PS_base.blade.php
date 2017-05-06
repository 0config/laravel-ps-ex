<!DOCTYPE html>
<html>

<head>
    <title> @yield('title')</title>
    <meta name="description" content=" ">
    <meta name="keywords" content=" ">
    <META NAME="robots" content="  ">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" id="css_id" type="text/css" href="/css/bootstrap.min.css"/>
    @yield('styles')

</head>
<body>

@include('PS_base.PS_header')

<div class="container PS_pushDown main_body ">

    @if(Session::has('message'))
        <p class="alert  alert-{{ Session::get('type') }} text-center">{{ Session::get('message') }}</p>
    @endif

    <div class="col-lg-12 col-md-12  ">
        <div id="content">

            @yield('content')


        </div>
    </div>


</div>


<div id="footer" class="container text-center small"> @include('PS_base.PS_footer')</div>

<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/validator.min.js"></script>

</body>
</html>