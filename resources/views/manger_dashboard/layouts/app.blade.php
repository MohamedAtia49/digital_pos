<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

@include('manger_dashboard.paritals.header')

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    @include('manger_dashboard.paritals.navbar')

    @include('manger_dashboard.paritals.sidebar')

        @yield('content')

    @include('manger_dashboard.paritals._session')

    @include('manger_dashboard.paritals.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('manger_dashboard.paritals.scripts')

</body>
</html>
