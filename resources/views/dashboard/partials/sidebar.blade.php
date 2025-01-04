    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('dashboard.index') }}" class="brand-link">
        <img src="{{ asset('dashboard_files/dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-img img-circle elevation-3 ml-5"
            style="opacity: .8">
        <span class="brand-text font-weight-light ml-1">@lang('site.digital')</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="{{ asset(auth()->user()->image) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link @yield('dashboard-active')">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        @lang('site.dashboard')
                    </p>
                    </a>
                </li>
                @if (auth()->user()->hasPermission('categories_read'))
                    <li class="nav-item">
                        <a href="{{ route('dashboard.categories.index') }}" class="nav-link @yield('categories-active')">
                            <i class="nav-icon fas fa-bars"></i>
                            <p>
                                @lang('site.categories')
                            </p>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->hasPermission('products_read'))
                    <li class="nav-item">
                        <a href="{{ route('dashboard.products.index') }}" class="nav-link @yield('products-active')">
                            <i class="nav-icon fa fa-laptop"></i>
                            <p>
                                @lang('site.products')
                            </p>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->hasPermission('users_read'))
                    <li class="nav-item">
                        <a href="{{ route('dashboard.users.index') }}" class="nav-link @yield('users-active')">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                @lang('site.users')
                            </p>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->hasPermission('clients_read'))
                    <li class="nav-item">
                        <a href="{{ route('dashboard.clients.index') }}" class="nav-link @yield('clients-active')">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                @lang('site.clients')
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

