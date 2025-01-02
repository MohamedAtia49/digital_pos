<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

@include('dashboard.paritals.header')

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    @include('dashboard.paritals.navbar')

    @include('dashboard.paritals.sidebar')

        @yield('content')

    @include('dashboard.paritals._session')

    @include('dashboard.paritals.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('dashboard.paritals.scripts')

</body>
</html>
