<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap4 Dashboard Template">
    <meta name="author" content="ParkerThemes">
    <link rel="shortcut icon" href="img/fav.png" />

    <!-- Title -->
    <title>Pequeno - Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/admin_assets/css/bootstrap.min.css')}}" />

    <!-- Master CSS -->
    <link rel="stylesheet" href="{{asset('/admin_assets/css/main.css')}}" />

</head>

<body class="authentication">

    <!-- Container start -->
    <div class="container">

        @yield('content')

    </div>
    <!-- Container end -->
</body>
</html>
