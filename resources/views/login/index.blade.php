@extends('layouts.auth')

{{-- <!--если кода мало в секции, то можно написать контент вторым параметром в секции-->
@section('page.title', 'Register-site') --}}


@section('auth.content')

    <x-errors />

    <x-card>
        <x-card-header>
            <x-card-title>
                {{ __("Вход")}}
            </x-card-title>
            <x-slot name='right'>
                <a href="{{ route('register')}}">
                    {{ __('Регистрация')}}
                </a>
            </x-slot>
        </x-card-header>
        <x-card-body>
            <x-form action="{{ route('login.store') }}" method="POST">

                <x-form-item>
                    <x-label class="required">{{ __('Email')}}</x-label>
                    <x-input type="email" class="form-control" name="email" required autofocus />
                </x-form-item>

                <x-form-item>
                    <x-label class="required">{{ __("Password")}}</x-label>
                    <x-input type="password" class="form-control" name="password" required />
                </x-form-item>

                <x-form-item>
                    <x-checkbox type="checkbox" value="" name="remember" class="form-check-input" id="remember">
{{--                                    <x-label class="form-check-label" for="remember">--}}
                        {{__('Запомнить меня')}}
                    </x-checkbox>
                </x-form-item>

                <x-button type="submit" class="btn btn-primary">
                    {{ __('Войти') }}
                </x-button>
            </x-form>
        </x-card-body>
    </x-card>
@endsection


