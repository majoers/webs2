<html>
    <head>
        <title>@yield('title')</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="{{ asset('css/product.css')}}" rel="stylesheet" >

        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    </head>
    <body>
    @include('layouts.header')
        <div class="container">

            @yield('content')
        </div>

        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    </body>
</html>