@props(['tableId'=>null, 'order'=>null])
@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'Cancel Order')

@section('main.content')

{{--    {{ dd($tableId, $order) }}--}}
    <x-title>
        {{ __('Orders Report / รายงานคำสั่งซื้อ:') }}
    </x-title>

{{--	<x-order.cancel-form action="{{ route('user.orders.delete', $order->id) }}" method="PUT" :order="$order">--}}
{{--		{{ __('Подтвердить отмену заказа')}}--}}
{{--	</x-order.cancel-form>--}}
@include('includes.filter-date')

<ol class="list-group list-group-numbered">

    <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
            <div class="fw-bold">Total Orders {{ $orders->count() }}</div>
        </div>
        <span class="badge bg-primary rounded-pill">{{$orders->sum('total_amount' )}}</span>
    </li>
    @foreach($orders as $order)
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold {{ $order->canceled_at ? 'text-danger' : 'text-success' }}">Status: {{ $order->canceled_at ? "Canceled" : 'Done'}}</div>
                Table: {{ $order->table_id }}
                <p>Date: {{ $order->created_at }}</p>
                <p>Comment: {{ $order->canceled_at ? $order->comment : 'In Process' }}</p>
            </div>
            <span class="badge bg-primary rounded-pill">{{ $order->total_amount }}</span>
        </li>
    @endforeach
</ol>


{{--    {{ dd($orders) }}--}}
@endsection
