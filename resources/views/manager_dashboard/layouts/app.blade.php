<!DOCTYPE html>
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}"
    data-theme="theme-default"
    data-assets-path="{{ asset('manager_dashboard/assets/') }}/"
    data-template="vertical-menu-template-free"
>
    @include('manager_dashboard.partials.header')
    <body>

        <!-- Preloader -->
        <div id="preloader" class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('dashboard_files/dist/img/manager-preloader.gif') }}" alt="AdminLTELogo" width="250" height="250">
            @lang('site.loading')
        </div>
        <!--  End Preloader -->

        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">

            @include('manager_dashboard.partials.sidebar')

            <!-- Layout container -->
            <div class="layout-page">
            @include('manager_dashboard.partials.navbar')

                @yield('content')

                @include('manager_dashboard.partials.footer')

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <!-- / Layout wrapper -->

        @include('manager_dashboard.partials.scripts')

    </body>
</html>
