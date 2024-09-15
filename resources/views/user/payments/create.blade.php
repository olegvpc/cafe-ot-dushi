@extends('layouts.simple')

@section('page.title', 'Create Payment')

@section('simple.content')

	<x-title>
		{{ __('Create Payment / สร้างการชำระเงิน:') }}

		<x-slot name='link'>
			<a href="{{ route('user.payments.index') }}">
				{{ __('Back to payments / กลับไปที่การชำระเงิน')}}
			</a>
		</x-slot>
	</x-title>
    <x-payment.form action="{{ route('user.payments.store') }}"
                    method="POST" enctype="multipart/form-data" :creditors="$creditors">
        {{ __('Create new payment')}}
    </x-payment.form>

@endsection
