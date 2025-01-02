<!-- jQuery -->
<script src="{{ asset('dashboard_files/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('dashboard_files/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 rtl -->
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('dashboard_files/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('dashboard_files/plugins/chart.js/Chart.min.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('dashboard_files/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('dashboard_files/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('dashboard_files/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('dashboard_files/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('dashboard_files/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('dashboard_files/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dashboard_files/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dashboard_files/dist/js/pages/dashboard.js') }}"></script>
<!-- icheck -->
<script src="{{ asset('dashboard_files/plugins/icheck/icheck.min.js') }}"></script>
<!-- print this -->
<script src="{{ asset('dashboard_files/js/printThis.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('dashboard_files/js/fastclick.js') }}"></script>
<!-- tiny MCE -->
<script src="https://cdn.tiny.cloud/1/27b5q2pg19cejl93lsfs9dkyjzsdo57wr5rf3tps0vtnwzwc/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<!-- custom js -->
<script src="{{ asset('dashboard_files/js/custom/image_preview.js') }}"></script>
<script src="{{ asset('dashboard_files/js/custom/order.js') }}"></script>
<script src="{{ asset('dashboard_files/js/custom/icheck.js') }}"></script>
{{-- <script src="{{ asset('dashboard_files/js/custom/delete_item.js') }}"></script> --}}

<script>
    $('.delete').click(function (e) {
        var that = $(this)

        e.preventDefault();

        var n = new Noty({
            text: `<div style="text-align: center;">@lang('site.confirm_delete')</div>`,
            type: "error",
            layout: 'topCenter',
            killer: true,
            buttons: [
                Noty.button("@lang('site.yes')", 'btn btn-success mr-2', function () {
                    that.closest('form').submit();
                }),

                Noty.button("@lang('site.no')", 'btn btn-warning mr-2', function () {
                    n.close();
                })
            ]
        });

        n.show();

    });//end of delete

    $('.restore').click(function (e) {
        var that = $(this)

        e.preventDefault();

        var n = new Noty({
            text: `<div style="text-align: center;">@lang('site.confirm_restore')</div>`,
            type: "success",
            layout: 'topCenter',
            killer: true,
            buttons: [
                Noty.button("@lang('site.yes')", 'btn btn-success mr-2', function () {
                    that.closest('form').submit();
                }),

                Noty.button("@lang('site.no')", 'btn btn-warning mr-2', function () {
                    n.close();
                })
            ]
        });

        n.show();

    });//end of restore

</script>
@yield('scripts')
