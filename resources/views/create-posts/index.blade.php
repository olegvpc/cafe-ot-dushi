@extends('layouts.auth')

{{-- <!--если кода мало в секции, то можно написать контент вторым параметром в секции-->
@section('page.title', 'Register-site') --}}


@section('auth.content')

    <x-errors />

    <x-card>
        <x-card-header>
            <x-card-title>
                {{ __("Создание 100 постов")}}
            </x-card-title>

        </x-card-header>
        <x-card-body>
            <x-form action="{{ route('create-posts.store') }}" method="POST">

                <x-button type="submit" class="btn btn-primary">
                    {{ __('Создать') }}
                </x-button>
            </x-form>
        </x-card-body>
    </x-card>

    <x-card>
        <x-card-header>
            <x-card-title>
                {{ __("Создание 10 000 донатов")}}
            </x-card-title>

        </x-card-header>
        <x-card-body>
            <x-form action="{{ route('create.donates') }}" method="POST">

                <x-button type="submit" class="btn btn-primary">
                    {{ __('Создать') }}
                </x-button>
            </x-form>
        </x-card-body>
    </x-card>
@endsection


