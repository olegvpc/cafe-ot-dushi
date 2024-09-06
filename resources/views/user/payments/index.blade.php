@props(['amount_total'=>null])
@extends('layouts.main')

@section('page.title', 'Payments')

@section('main.content')
{{--{{ dd($amount_total_negative) }}--}}

    <x-title>
        <x-slot name="left">
            <span class="badge rounded-pill fs-4 {{$amount_total_negative ? 'bg-danger' : 'bg-success'}}">{{ $amount_total }}</span>
        </x-slot>

        {{ __('Payments / การชำระเงิน:') }}
        <x-slot name='right'>
            <x-button-link href="{{ route('user.payments.create') }}">
                {{ __('Create Payment')}}
            </x-button-link>
        </x-slot>
    </x-title>

    @include('includes.filter-yearmonth')

    <div class="d-flex column justify-content-between">
        <ul class="list-group list-unstyled">
            <x-payment.creditor-item :users="$creditors" >
                {{ __('Creditors') }}
            </x-payment.creditor-item>
        </ul>


        <ul class="list-group">
            <x-payment.previeus :paymentPrevious="$paymentPrevious" />

            <x-payment.item :payments="$payments" :amount_monthly="$amount_monthly" :amount_monthly_negative="$amount_monthly_negative" />
        </ul>

        <ul class="list-group list-unstyled">
            <x-payment.creditor-item :users="$debtors">
                {{ __('Debtors') }}
            </x-payment.creditor-item>
        </ul>
    </div>

@endsection
