<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Manager | @yield('title')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('manager_dashboard/assets') }}/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('manager_dashboard/assets/') }}/vendor/fonts/boxicons.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    @if ((app()->getLocale() == 'ar'))
        <!-- RTL -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
        <!-- Core CSS -->
        <link rel="stylesheet" href="{{ asset('manager_dashboard/rtl_assets/') }}/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{ asset('manager_dashboard/rtl_assets/') }}/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{ asset('manager_dashboard/rtl_assets/') }}/demo.css" />
        <link rel="stylesheet" href="{{ asset('manager_dashboard/rtl_assets/') }}/rtl-fixed.css" />

        <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
        <style>
            body, h1, h2, h3, h4, h5, h6 {
                font-family: 'Cairo', sans-serif !important;
            }
        </style>
    @elseif ((app()->getLocale() == 'en'))
        <!-- Core CSS -->
        <link rel="stylesheet" href="{{ asset('manager_dashboard/assets/') }}/vendor/css/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{ asset('manager_dashboard/assets/') }}/vendor/css/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{ asset('manager_dashboard/assets/') }}/css/demo.css" />
        <link rel="stylesheet" href="{{ asset('manager_dashboard/assets/') }}/css/ltr-fixed.css" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @endif

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('manager_dashboard/assets/') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="{{ asset('manager_dashboard/assets/') }}/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('manager_dashboard/assets/') }}/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('manager_dashboard/assets/') }}/js/config.js"></script>
</head>
