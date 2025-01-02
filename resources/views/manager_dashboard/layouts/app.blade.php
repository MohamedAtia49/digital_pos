<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

@include('manager_dashboard.paritals.header')

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    @include('manager_dashboard.paritals.navbar')

    @include('manager_dashboard.paritals.sidebar')

        @yield('content')

    @include('manager_dashboard.paritals._session')

    @include('manager_dashboard.paritals.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('manager_dashboard.paritals.scripts')

</body>
</html>
