@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'Edit menu')

@section('main.content')

	<x-title>
		{{ __('Изменить Блюдо из меню')}}

		<x-slot name='link'>
			<a href="{{ route('user.menus.index', $menuItem->id) }}">
				{{ __('Menu')}}
			</a>
		</x-slot>

	</x-title>

	<!-- для пеедачи php переменной в компонент ставим двоеточие - иначе это будет props-->
	<x-menu.form  action="{{ route('user.menus.update', $menuItem->id) }}" :menuItem="$menuItem" :categories="$categories" :cuisines="$cuisines" method="PUT">
		{{ __('Сохранить изменения')}}
	</x-menu.form>


@endsection
