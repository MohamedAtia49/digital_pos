<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

@include('manager_dashboard.partials.header')

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    @include('manager_dashboard.partials.navbar')

    @include('manager_dashboard.partials.sidebar')

        @yield('content')

    @include('manager_dashboard.partials._session')

    @include('manager_dashboard.partials.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('manager_dashboard.partials.scripts')

</body>
</html>
