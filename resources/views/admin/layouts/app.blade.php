<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Spotlyf Admin">
    <title>@yield('title') - TruLearnix | Admin</title>

    <link rel="icon" type="image/x-icon" href="{{ url('images/logos', get_setting('site_favicon')) }}">

    @include('admin/partials/header')

    @stack('css')


</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    @include('admin/includes/common-header')
    
    <!-- BEGIN: Content-->
    <div class="app-content content kanban-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="alert_message">
                @include('admin/includes/message-alert')
            </div>
            <div class="content-header row">
                @yield('row')
            </div>
            <div class="content-body">
                <!-- Kanban starts -->
                <section class="app-kanban-wrapper">
                    @yield('content')
                </section>
                <!-- Kanban ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
    @include('admin/includes/common-footer')

    @include('admin/partials/footer')

    @stack('js')
</body>
<!-- END: Body-->

</html>
