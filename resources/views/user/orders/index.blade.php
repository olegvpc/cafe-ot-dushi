@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'Get Orders')
@php($alert = session()->get('alert'))

@section('main.content')

    <x-title>
        {{ __('Choise table for order / เลือกโต๊ะสั่งได้')}}
    </x-title>


    <div class="row">
        @if ($tables->isEmpty())
            {{ __('Нет ни одного стола / No one table in DataBase') }}
        @else
            @foreach ($tables as $tableItem)
                <!-- используем компонент для отображения блюд с условным переходом по props([from => ..])-->
                <div class="col-12 col-md-6 mb-3">
                    <x-order.card :tableItem="$tableItem" />
                </div>
            @endforeach
        @endif
    </div>

@endsection
