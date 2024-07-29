<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>@yield('page.title', config('app.name'))</title>
        <!-- <link href="style.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css">
        @stack('head-scripts')
        <style>
            .container-fluid { max-width: 1024px; }
            .required::after {content: '*'; color: red; margin-left: 3px}
        </style>
    </head>

    <body>

        <div class="d-flex justify-content-between flex-column min-vh-100">

{{--            cообщение сохраненное в сессиии при входе пользователя--}}
            @include('includes.alert')

            @include('includes.header')

            <div class="flex-grow-1">
                <main class="py-3 container-fluid">

                    @yield('content')

                    <!-- yield - уступает место для секции - которое будет в разных страницах разное-->
                </main>
            </div>

            @include('includes.footer')

        </div>

        <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.min.js></script>
        @stack('body-scripts')
    </body>
</html>

