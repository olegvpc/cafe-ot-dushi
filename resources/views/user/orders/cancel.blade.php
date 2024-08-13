@props(['tableId'=>null, 'order'=>null])
@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'Cancel Order')

@section('main.content')

{{--    {{ dd($tableId, $order) }}--}}
    <x-title>
        {{ __('Cancel Order on a Table / ยกเลิกคำสั่งซื้อบนโต๊ะ:') }} {{ $order->table_id }}

        <x-slot name='link'>
            <a href="{{ route('user.orders.index') }}">
                {{ __('Back to tables / กลับไปที่ตาราง')}}
            </a>
        </x-slot>
    </x-title>

	<x-order.cancel-form action="{{ route('user.orders.delete', $order->id) }}" method="PUT">
		{{ __('Подтвердить отмену заказа')}}
	</x-order.cancel-form>

@endsection
