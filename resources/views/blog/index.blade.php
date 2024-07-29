{{--<!DOCTYPE html>--}}
{{--<html lang="ru">--}}
{{--    <head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <title>@yield('page.title', config('app.name'))</title>--}}
{{--    <!-- <link href="style.css" rel="stylesheet"> -->--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css">--}}
{{--    <style>--}}
{{--        .container { max-width: 1024px; }--}}
{{--        .required::after {content: '*'; color: red; margin-left: 3px}--}}
{{--    </style>--}}
{{--    </head>--}}
{{--        <body>--}}
{{--            <div class="d-flex flex-column justify-content-between min-vh-100 text-center">--}}
{{--                <header class="py-3 border-bottom">--}}
{{--                    <h3>--}}
{{--                        Шапка--}}
{{--                    </h3>--}}
{{--                </header>--}}
{{--                <main class="flex-grow-1 py-3">--}}
{{--                    <h1>--}}
{{--                        MAIN SITE--}}
{{--                    </h1>--}}
{{--                    <!-- yield - уступает место для секции - которое будет в разных страницах разное-->--}}
{{--                </main>--}}
{{--                <footer class="py-3 border-top">--}}
{{--                    <h3>--}}
{{--                        Подвал--}}
{{--                    </h3>--}}
{{--                </footer>--}}
{{--            </div>--}}
{{--        <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.min.js></script>--}}
{{--        </body>--}}
{{--</html>--}}


{{--    блок с шапкой и футером--}}
{{--<!DOCTYPE html>--}}
{{--<html lang="ru">--}}
{{--    <head>--}}
{{--        <meta charset="UTF-8">--}}
{{--        <title>@yield('page.title', config('app.name'))</title>--}}
{{--        <!-- <link href="style.css" rel="stylesheet"> -->--}}
{{--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css">--}}
{{--        <style>--}}
{{--            .container-fluid { max-width: 1024px; }--}}
{{--        </style>--}}
{{--    </head>--}}

{{--    <body>--}}
{{--        <div class="d-flex justify-content-between flex-column min-vh-100 text-center">--}}
{{--            <header class="py-3 border-bottom">--}}
{{--                <div class="container-fluid d-flex justify-content-between">--}}
{{--                    <ul class="list-unstyled d-flex">--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('home.redirect') }}">--}}
{{--                                {{ config('app.name') }} Главная--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="px-3">--}}
{{--                            <a href="{{ route('blog.index') }}">--}}
{{--                                Посты--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <ul class="list-unstyled d-flex">--}}
{{--                        <li class="px-3">--}}
{{--                            <a href="{{ route('register') }}">--}}
{{--                                Регистрация--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ route('login') }}">--}}
{{--                                Вход--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </header>--}}
{{--            <div class="flex-grow-1">--}}
{{--                <main class="py-3 container-fluid">--}}

{{--                    <h1>--}}
{{--                        MAIN SITE--}}
{{--                    </h1>--}}
{{--                    <!-- yield - уступает место для секции - которое будет в разных страницах разное-->--}}
{{--                </main>--}}
{{--            </div>--}}
{{--            <footer class="py-3 border-top container-fluid text-center">--}}
{{--                <i class="fa fa-copyright">@</i> {{config('app.name')}}--}}
{{--            </footer>--}}
{{--        </div>--}}

{{--        <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.min.js></script>--}}
{{--    </body>--}}
{{--</html>--}}


{{--шапку и футер нереносим в includes а основной код в layouts--}}
{{--@extends('layouts.base')--}}

{{--@section('content')--}}
{{--    <h1>--}}
{{--        MAIN SITE FROM HOME.BLADE--}}
{{--    </h1>--}}
{{--@endsection--}}

{{--======== Следующая тема Requests + добавляем фильтр =========--}}
@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'Посты')
@php($alert = session()->get('alert'))



@section('main.content')
    <p> Компонент alert из session-- {{ $alert }} ------ </p>

    тут компонент с выводом ошибок валидации - "Деньги" в названии поста
    <x-errors />
{{--    {{ dd($errors->all(), $errors) }}--}}


    <x-title>
        {{ __('Список постов') }}

    </x-title>

    @include('blog.filter')
{{--    {{ dd($categories) }}--}}

    <div class="row">
{{--    {{ dd(session('hello'), $posts, $posts->items(), empty($posts->items()), $posts->isEmpty()) }}--}}

        @if (empty($posts))
            {{ __('Нет ни одного поста') }}
        @else
            @foreach ($posts as $post)
                <div class="col-12 col-md-4 mb-3">
                    <x-post.card :post=$post from="blog"/>
                </div>
            @endforeach
        @endif
    </div>

{{--    выводим встренную в Laravel паджинацию--}}
{{ $posts->links() }}

@endsection
