<html>
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a href="https://www.bootstrapdash.com/demo/star-laravel-free/template" class="navbar-brand brand-logo">
            <img src="https://www.bootstrapdash.com/demo/star-laravel-free/template/assets/images/logo.svg"
                alt="logo">
        </a>
        <a href="https://www.bootstrapdash.com/demo/star-laravel-free/template" class="navbar-brand brand-logo-mini">
        </a>
    </div>

    <ul class="navbar-nav navbar-nav-right">

        <li class="nav-item dropdown d-none d-xl-inline-block">
            <a id="UserDropdown" href="{{ route('dashboard') }}" data-toggle="dropdown" aria-expanded="false"
                class="nav-link dropdown-toggle">
                <img src="https://www.bootstrapdash.com/demo/star-laravel-free/template/assets/images/faces/face8.jpg"
                    alt="Profile image" class="img-xs rounded-circle">
            </a>
            <div aria-labelledby="UserDropdown" class="dropdown-menu dropdown-menu-right navbar-dropdown">
                <a class="dropdown-item p-0">
                    <div class="d-flex border-bottom w-100 justify-content-center">
                    </div>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </li>
    </ul> <button type="button" data-toggle="offcanvas"
        class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"><span
            class="mdi mdi-menu icon-menu"></span></button>
    </div>
</nav>
