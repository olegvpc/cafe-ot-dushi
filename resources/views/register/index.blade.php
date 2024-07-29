{{--@extends('layouts.base')--}}

{{--@section('content')--}}
{{--    <h3>--}}
{{--        ТУТ БУДЕТ РЕГИСТРАЦИЯ ПОЛЬЗОВАТЕЛЕЙ --}}{{-- переменную передали в роуте --}}
{{--    </h3>--}}
{{--@endsection--}}

@extends('layouts.auth')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'Register-site')


@section('auth.content')

    <x-errors />
            <x-card>
                <x-card-header>
                    <h4 class="m-0">
                        {{ __("Регистрация")}}
                    </h4>
{{--добавляем встроенный компонент для отображения еще одной кнопки в форме--}}
                    <x-slot name='right'>
                        <a href="{{ route('login')}}">
                            {{ __('Вход')}}
                        </a>
                    </x-slot>

                </x-card-header>

                <x-card-body>

                    {{--            <x-errors />--}}

                    <x-form action="{{ route('register.store')}}" method="POST">
                        <!-- Добавления скрытого поля для SCRF защиты - иначе 419 ошибка и переносим этот код в компонент чтобы работал на всех формах-->
{{--                         <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--                         @csrf --}}

                        <x-form-item>
                            <x-label >{{ __('Имя') }}</x-label>
                            <x-input type="text" class="form-control" name="first_name" autofocus />
                            <x-error name='fist_name'/>
                        </x-form-item>

                        <x-form-item>
                            <x-label required>{{ __('Email') }}</x-label>
                            <x-input type="email" class="form-control" name="email" />
                            <x-error name='email'/>
                        </x-form-item>

                        <x-form-item>
                            <x-label required>{{ __("Password") }}</x-label>
                            <x-input type="password" name="password" />
                            <x-error name='password'/>
                        </x-form-item>

                        <x-form-item>
                            <x-label required>{{ __("Password one more") }}</x-label>
                            <x-input type="password" name="password_confirmation" />
                            <x-error name='password'/>
                        </x-form-item>

                        <x-form-item>
                            <x-checkbox type="checkbox" name="agreement">
                                {{ __('Я согласен на обработку пользовательских данных' )}}
                            </x-checkbox>
                            <x-error name='agreement'/>
                        </x-form-item>

                        <x-button type='submit' class='btn-primary'>
                            {{ __('Регистрация') }}
                        </x-button>

                    </x-form>
                </x-card-body>
            </x-card>
@endsection
