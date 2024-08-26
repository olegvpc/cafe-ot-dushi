@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'Munu-list')

@php($alert = session()->get('alert'))

@section('main.content')
{{--{{ dd($menus) }}--}}
    <x-title>
        {{ __('Список Меню / List of dishes')}}
        <x-slot name="link">
            <a href="{{ route('user.menus.index') }}">
                {{ __('Back to Menu')}}
            </a>
        </x-slot>
        <x-slot name='right'>
            <x-button-link href="{{ route('user.menus.export') }}">
                {{ __('Excell')}}
            </x-button-link>
        </x-slot>
    </x-title>
    <div class="row">
        @if ($categories->isEmpty())
            {{ __('Нет ни одной категории / No one categories') }}
        @else
            <x-menu.list :categories="$categories" />
        @endif
    </div>

@endsection
