@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', 'Create menu')

@section('main.content')



	<x-title>
		{{ __('Создание поста')}}

		<x-slot name='link'>
			<a href="{{ route('user.posts.index') }}">
				{{ __('Назад')}}
			</a>
		</x-slot>

	</x-title>

	<x-post.form action="{{ route('user.posts.store') }}" method="POST">
		{{ __('Создать пост')}}
	</x-post.form>


@endsection
