<!DOCTYPE html>
<html>

<head>
    <title> @yield('title')</title>
    <meta name="description" content=" ">
    <meta name="keywords" content=" ">
    <META NAME="robots" content="  ">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" id="css_id" type="text/css" href="/css/bootstrap.min.css"/>

</head>
<body>

@include('PS_base.PS_header')

<div class="container PS_pushDown main_body ">

    <div class="col-lg-9 col-md-9  ">
        <div id="content">

            @yield('content')


        </div>
    </div>

    <div class="col-lg-3 col-md-3">

        @include('PS_base.PS_sidebar')
    </div>
</div>


<div id="footer" class="container text-center small"> @include('PS_base.PS_footer')</div>

<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/validator.min.js"></script>

</body>
</html>