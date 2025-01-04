    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-light">

        <!-- Right navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
            </button>
            </div>
        </div>
        </form>
        <!-- End Right navbar links -->


        <!-- Left navbar links (deep left) -->
        <ul class="navbar-nav mr-auto-navbav">

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown messages">
            <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                <img src="" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                    <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown notifications">
            <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        </ul>

        {{--<!-- Tasks: style can be found in dropdown.less -->--}}
        <div class="dropdown locales-menu">
            <button class="dropdown-toggle btn-wide" type="button" data-toggle="dropdown">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    @if (app()->getLocale() == $localeCode)
                        <span class="lang-name">{{ $properties['native'] }}</span>
                        <img src="{{ asset('vendor/blade-flags/language-' . $localeCode . '.svg') }}" class="flag-icon-main" width="15px" height="15px">
                    @endif
                @endforeach
            </button>
            <div class="dropdown-menu">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="dropdown-item locale" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <!-- Adjust width and height directly -->
                        <img src="{{ asset('vendor/blade-flags/language-' . $localeCode . '.svg') }}"  width="30" height="30" alt="{{ $properties['native'] }}" class="flag-icon">
                        {{ $properties['native'] }}
                    </a>
                @endforeach
            </div>
        </div>

        <ul class="navbar-nav user" style="margin-left: 0;margin-top: 7px ; position: absolute; top: 0; left: 0;">
            <li class="nav-item dropdown user user-menu">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <img src="{{ asset(auth()->user()->image) }}" class="user-image mr-2 mt-auto" alt="User Image">
                    <span class="hidden-xs">{{ auth()->user()->name }}</span>
                </a>
                <ul class="dropdown-menu user-dropdown">
                    <!-- User Image -->
                    <li class="user-header">
                        <img src="{{ asset(auth()->user()->image) }}" class="img-circle" alt="User Image">
                        <p>
                            {{ auth()->user()->name }}
                            <small>@lang('site.member-since') {{ auth()->user()->created_at->diffForHumans() }}</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="{{ route('manager.logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            @lang('site.logout')
                        </a>
                        <form id="logout-form" action="{{ route('manager.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
