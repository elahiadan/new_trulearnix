<!DOCTYPE html>

<html lang="en">

<head>

    @stack('head')

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ get_setting('site_title') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ url('images/logos', get_setting('site_favicon')) }}">

    @include('partials/header')

    @stack('css')

</head>

<body>

    @include('includes/common-header')

    @yield('content')

    @include('includes/common-footer')

    @include('partials/footer')

    @stack('js')

</body>

</html>
