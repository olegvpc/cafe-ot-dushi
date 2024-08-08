@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'New menu-item')

@section('main.content')



	<x-title>
		{{ __('Создание блюда / Create Dish')}}

		<x-slot name='link'>
			<a href="{{ route('user.menus.index') }}">
				{{ __('Back')}}
			</a>
		</x-slot>

	</x-title>
{{--    {{ dd($categories) }} --}}
	<x-menu.form action="{{ route('user.menus.store') }}" method="POST" :categories="$categories" :cuisines="$cuisines" enctype="multipart/form-data">
		{{ __('Create new menu Item')}}
	</x-menu.form>


@endsection
