<!-- Navbar -->

<nav
class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
id="layout-navbar"
>
<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
    </a>
</div>

<div class="navbar-nav-right d-flex align-items-center pb-4 pt-3" id="navbar-collapse">

    <!-- Localization Language Dropdown -->
    <div class="container mt-5">
        <div class="dropdown locales-menu">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    @if (app()->getLocale() == $localeCode)
                        <span class="lang-name">{{ $properties['native'] }}</span>
                        <img src="{{ asset('vendor/blade-flags/language-' . $localeCode . '.svg') }}" class="flag-icon-main" width="20" height="20" alt="{{ $properties['native'] }}">
                    @endif
                @endforeach
            </button>
            <ul class="dropdown-menu">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a class="dropdown-item locale" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            <img src="{{ asset('vendor/blade-flags/language-' . $localeCode . '.svg') }}" class="flag-icon" alt="{{ $properties['native'] }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>


    <ul class="navbar-nav flex-row align-items-center">
        <!-- Notification -->
        {{-- @livewire('admin.notifications.category-notification') --}}
        <!-- End Notification -->
    </ul>


    <ul class="navbar-nav user-icon">
        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown mt-2">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
            <img src="{{ asset(auth()->user()->image) }}" alt class="w-px-40 h-auto rounded-circle" />
            </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li>
            <a class="dropdown-item" href="#">
                <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                    <img src="{{ asset(auth()->user()->image) }}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                </div>
                <div class="flex-grow-1">
                    <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                    <small class="text-muted">@lang('site.manager')</small>
                </div>
                </div>
            </a>
            </li>
            <li>
            <div class="dropdown-divider"></div>
            </li>
            {{-- @livewire('admin.auth.admin-logout-component') --}}
        </ul>
        </li>
        <!--/ User -->
    </ul>
</div>

</nav>
<!-- / Navbar -->
