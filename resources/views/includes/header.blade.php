<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a href="{{ route('home') }}" class="navbar-brand">
{{--            {{ config('app.name') }}--}}
            <img src="../img/sheff-logo.png" width="100px" alt="sheff-logo" class="tm-site-logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth('web')
                    <div class="nav-link">
                        <a class="nav-link {{ Route::is('user.menus*') ? 'active' : '' }}" href="{{ route('user.menus.index') }}">
                            {{ __("Menu") }}
                        </a>
                    </div>
                    <div class="nav-link">
                        <a class="nav-link {{ Route::is('user.orders*') ? 'active' : '' }}" href="{{ route('user.orders.index') }}">
                            {{ __("Order Menu") }}
                        </a>
                    </div>
{{--                    <div class="nav-link">--}}
{{--                        <a class="nav-link" href="{{ route('user.report') }}">--}}
{{--                            {{ __("Orders Report") }}--}}
{{--                        </a>--}}
{{--                    </div>--}}
                    <div class="nav-link">
                        <a class="nav-link" href="{{ route('user.payments.index') }}">
                            {{ __("Payments") }}
                        </a>
                    </div>
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    @auth('web')
                        <div class="nav-link">
                            {{ auth()->user()->name }}
                        </div>
                    @endauth
                    @auth('web')
                        <a href="{{ route('register') }}" class="nav-link {{ is_admin() ? '' : 'd-none' }} {{ active_link('register') }}" >
                            {{ __('Регистрация') }}
                        </a>
                    @endauth
                </li>
                <li class="nav-item">
                    @auth('web')
                        <a href="{{ route('logout') }}" class="nav-link" >
                            {{ __('Выход')}}
                        </a>
                    @endauth

                    @guest('web')
                        <a href="{{ route('login') }}" class="nav-link {{ active_link('login') }}" >
                            {{ __('Вход')}}
                        </a>
                    @endguest
                </li>
            </ul>
        </div>
    </div>
</nav>
