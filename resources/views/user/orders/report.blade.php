{{--@props(['tableId'=>null, 'order'=>null])--}}
@extends('layouts.main')

@section('page.title', 'Orders report ')

@section('main.content')

    <x-title>
        {{ __('Orders Report / รายงานคำสั่งซื้อ:') }}
    </x-title>

{{--	<x-order.cancel-form action="{{ route('user.orders.delete', $order->id) }}" method="PUT" :order="$order">--}}
{{--		{{ __('Подтвердить отмену заказа')}}--}}
{{--	</x-order.cancel-form>--}}
@include('includes.filter-date')

<ul class="list-group">

    <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
            <div class="fw-bold text-uppercase fs-4">Total Orders: {{ $orders->count() }}</div>
        </div>
        <span class="badge bg-primary rounded-pill fs-4">{{$orders->sum('total_amount')}}</span>
    </li>
    @foreach($orders as $order)
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold {{ $order->canceled_at ? 'text-danger' : 'text-success' }}">Status: {{ $order->canceled_at ?  "Canceled" : ''}} {{ $order->done ? "Done" : ''}}</div>
                Order: {{ $order->id }} / Table: {{ $order->table_id }}
                <p class="m1">Date open: {{ $order->created_at }} / Date closed: {{ $order->done_at?? 'No done date' }} </p>
                <p class="m1"> Menus: {{ $order->menus }} / Comment: {!!$order->comment?? 'In process'!!}</p>
            </div>
                <a href="{{ route('user.orders.show', $order->id) }}">
                    <span class="badge bg-primary rounded-pill fs-6">{{ $order->total_amount }}</span>
                </a>
        </li>
    @endforeach
</ul>


{{--    {{ dd($orders) }}--}}
@endsection
