@extends('layouts.main')

@section('page.title', 'Edit Payment')

@section('main.content')

	<x-title>
		{{ __('Edit Payment / สร้างการชำระเงิน:') }}

		<x-slot name='link'>
			<a href="{{ route('user.payments.index') }}">
				{{ __('Back to payments / กลับไปที่การชำระเงิน')}}
			</a>
		</x-slot>
	</x-title>
    <x-payment.form action="{{ route('user.payments.update', $payment->id) }}" :payment="$payment"
                         method="PUT"
                         enctype="multipart/form-data">
        {{ __('Save payment')}}
    </x-payment.form>

@endsection
