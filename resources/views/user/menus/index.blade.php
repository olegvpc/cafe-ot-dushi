@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'Munu')
@php($alert = session()->get('alert'))

@section('main.content')

    <x-title>
        <x-slot name='left'>
            <x-button-link href="{{ route('user.menus.list') }}">
                {{ __('List / Export')}}
            </x-button-link>
        </x-slot>
        {{ __('Список Меню / List of dishes')}}
        <x-slot name='right'>
            <x-button-link href="{{ route('user.menus.create') }}">
                {{ __('Create')}}
            </x-button-link>
        </x-slot>
    </x-title>

    @include('includes.filter')

    <div class="row">
        @if ($menus->isEmpty())
            {{ __('Нет ни одного блюда / No one dishes') }}
        @else
            @foreach ($menus as $menuItem)
                <!-- используем компонент для отображения блюд с условным переходом по props([from => ..])-->
                <div class="col-12 col-md-4 mb-3">
                    <x-menu.card :menuItem="$menuItem" from="user"/>
                </div>
            @endforeach
        @endif
    </div>
{{--    @include('includes.filter')--}}

    {{--    выводим встренную в Laravel паджинацию--}}
    @if(!(request()->query("category_id") || request()->query("cuisine_id")))
        {{ $menus->links() }}
    @endif
@endsection
