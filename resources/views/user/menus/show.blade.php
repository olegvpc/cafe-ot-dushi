@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', $menuItem->title, 'laravel')

@section('main.content')

	<x-title>
		{{ __('Просмотр блюда из Меню') }}
		<x-slot name="link">
			<a href="{{ route('user.menus.index') }}">
				{{ __('Back to Menu')}}
			</a>
		</x-slot>

		<x-slot name="right">
			<x-button-link class='btn-soccess' href="{{ route('user.menus.edit', $menuItem->id) }}">
				{{ __('Изменить Блюдо')}}
            </x-button-link>
		</x-slot>
	</x-title>

	<div class="mb-3">
        <div class="small text-muted">
            postId: {{ $menuItem->id }}
        </div>

        <div class="small mb-2 {{ $menuItem->active ? 'text-bold' : 'text-danger' }}">
            {{ $menuItem->active ? 'Актуальное' : 'Больше не актуальное' }}
        </div>

        <h2 class="h4">
            {{ $menuItem->title }}
        </h2>

		<div class="pt-3">
			{!! $menuItem->description !!}
		</div>
        @isset($menuItem->image)
            <img class="img-fluid img-thumbnail" width="200px" src="{{ asset('/storage/' . $menuItem->image) }}" alt="Image Menu-Item">
        @endisset
	</div>


	{{-- </div> --}}
@endsection
