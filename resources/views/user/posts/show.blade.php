@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}
@section('page.title', $post->title, 'laravel')

@section('main.content')

	<x-title>
		{{ __('Просмотр моего поста') }}
		<x-slot name="link">
			<a href="{{ route('user.posts.index') }}">
				{{ __('Назад')}}
			</a>
		</x-slot>

		<x-slot name="right">
			<x-button-link class='btn-soccess' href="{{ route('user.posts.edit', $post->id) }}">
				{{ __('Изменить пост')}}
            </x-button-link>
		</x-slot>
	</x-title>

{{--{{ dd($post) }}--}}
	<div class="mb-3">
		<h2 class="h4">
			{{ $post->title }}
		</h2>

		<div class="small text-muted">
{{--			{{ $post->published_at->format('d.m.Y H:i:s')}}--}}
            {{ $post->published_at}}
		</div>
		<div class="small text-muted">
            postId: {{ $post->id }}
		</div>

		<div class="pt-3">
			{!! $post->content !!}
		</div>
	</div>


	{{-- </div> --}}
@endsection
