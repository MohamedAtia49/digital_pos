<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

@include('dashboard.partials.header')

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
    <!-- Preloader -->
    <div id="preloader" class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('dashboard_files/dist/img/preloader.gif') }}" alt="AdminLTELogo" width="150" height="150">
        @lang('site.loading')
    </div>

    @include('dashboard.partials.navbar')

    @include('dashboard.partials.sidebar')

        @yield('content')

    @include('dashboard.partials._session')

    @include('dashboard.partials.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('dashboard.partials.scripts')

</body>
</html>
