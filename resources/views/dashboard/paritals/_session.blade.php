@if (session('add'))

    <script>
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: "{{ session('add') }}",
            timeout: 2000,
            killer: true
        }).show();
    </script>

@endif


@if (session('delete'))

    <script>
        new Noty({
            type: 'error',
            layout: 'topRight',
            text: "{{ session('delete') }}",
            timeout: 2000,
            killer: true
        }).show();
    </script>

@endif

@if (session('update'))

    <script>
        new Noty({
            type: 'information',
            layout: 'topRight',
            text: "{{ session('update') }}",
            timeout: 2000,
            killer: true
        }).show();
    </script>

@endif

@if (session('super_admin_cant_be_deleted'))

    <script>
        new Noty({
            type: 'error',
            layout: 'topRight',
            text: "{{ session('super_admin_cant_be_deleted') }}",
            timeout: 2000,
            killer: true
        }).show();
    </script>

@endif
