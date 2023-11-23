<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | BOMWASA </title>
    <link href="{{asset('css/font.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="icon" href="{{asset('images/logo.jpg')}}" style="border-radius: 50%;"/>

</head>
<body>

            @yield('content')
     
</body>
</html>