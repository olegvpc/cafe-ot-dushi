{{--@props(['order'=>null, 'menus'=>null, 'selectedMenus'=>null, 'categories'=>[]])--}}
@extends('layouts.simple')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'Create Order')

@section('simple.content')



	<x-title>
		{{ __('Create Order on a Table / สร้างคำสั่งซื้อบนโต๊ะ:') }} {{ $order->table_id }}

		<x-slot name='link'>
			<a href="{{ route('user.orders.index') }}">
				{{ __('Back to tables / กลับไปที่ตาราง')}}
			</a>
		</x-slot>

	</x-title>

    <x-order.selected :selectedMenus="$selectedMenus" :order="$order" />
{{--    Filters for choice category (DRINK, MAIN, SALAD)--}}
    <x-order.filter-menu-categories :order="$order" :categories="$categories"/>
{{--    Section jf choise--}}
    <x-order.select :menus="$menus" :order="$order" />

@endsection
