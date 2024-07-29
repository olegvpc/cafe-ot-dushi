@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'Пожертвования')
@php($alert = session()->get('alert'))

@section('main.content')

{{--    <p> ----- {{ $alert }} ------ </p>--}}
    <x-title>
        {{ __('Мои Пожертвования')}}
    </x-title>

{{--    @include('user.donates.filter')--}}
    @include('user.donates.stats')
{{--    @include('user.donates.table')--}}

@endsection
