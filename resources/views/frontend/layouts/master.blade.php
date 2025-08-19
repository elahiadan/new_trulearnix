<!DOCTYPE html>

<html lang="en">

<head>

    @stack('head')

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <title>{{ get_setting('site_title') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ url('images/logos', get_setting('site_favicon')) }}">

    @include('frontend/partials/header')

    @stack('css')

</head>

<body>

    @include('frontend/includes/common-header')

    @yield('content')

    @include('frontend/includes/common-footer')

    @include('frontend/partials/footer')

    @stack('js')

</body>

</html>
