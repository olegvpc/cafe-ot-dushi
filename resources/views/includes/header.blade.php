{{--<header class="py-3 border-bottom">--}}
{{--    <div class="container-fluid d-flex justify-content-between">--}}
{{--        <ul class="list-unstyled d-flex">--}}
{{--            <li>--}}
{{--                   <a href="{{ route('home.redirect', ['header'=>'params'])}}">--}}
{{--                <a href="{{ route('home.redirect') }}">--}}
{{--                    {{ config('app.name') }} Главная--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="px-3">--}}
{{--                <a href="{{ route('blog.index') }}">--}}
{{--                    Посты--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--        <ul class="list-unstyled d-flex">--}}
{{--            <li class="px-3">--}}
{{--                <a href="{{ route('register') }}">--}}
{{--                    Регистрация--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{ route('login') }}">--}}
{{--                    Вход--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</header>--}}

{{--Тут тема 10 - написание с классами nav из bootstrap--}}

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a href="{{ route('home') }}" class="navbar-brand">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page">
{{--                        {{ __("Домой") }}--}}
                        {{ __("message.main") }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('blog*') ? 'active' : '' }}" href="{{ route('blog.index') }}">
{{--                        {{ __("Блог") }}--}}
                        {{ __("message.posts") }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('user.donates') ? 'active' : '' }}" href="{{ route('user.donates') }}">
                        {{ __("Пожертвования") }}
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
{{--                    <a href="{{ route('register') }}" class="nav-link {{ Route::is('register') ? 'active' : '' }}" aria-current="page">--}}
{{--                        {{ __("Регистрация") }}--}}
{{--                    </a>--}}
                    @auth('web')
                        <div class="nav-link">
                            {{ auth()->user()->name }} : {{ auth()->user()->email }}
                        </div>
                    @endauth

                    @guest('web')
                        <a href="{{ route('register') }}" class="nav-link {{ active_link('register') }}" >
                            {{ __('Регистрация') }}
                        </a>
                    @endguest
                </li>
                <li class="nav-item">
{{--                    <a href="{{ route('login') }}" class="nav-link {{ Route::is('login') ? 'active' : '' }}">--}}
{{--                        {{ __("Вход") }}--}}
{{--                    </a>--}}
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
