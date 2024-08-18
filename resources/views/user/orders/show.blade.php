@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'Show Order')

@section('main.content')



    <x-title>
        {{ __('Order Number / หมายเลขคำสั่งซื้อ:') }} {{ $order->id }}

        <x-slot name='link'>
            <a href="{{ route('user.report') }}">
                {{ __('Back to Order Report / กลับไปที่รายงานการสั่งซื้อ')}}
            </a>
        </x-slot>

    </x-title>

    <x-order.show :menus="$menus" :order="$order" :order_amount="$order_amount" />

@endsection
