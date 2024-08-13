<x-errors />

<x-form {{ $attributes->merge([
	'method'=>'GET'
]) }}>
	<x-form-item>
		<x-label required>{{ __('Comment') }}</x-label>
		<x-trix name="comment" />

		<x-error name='comment' />

	</x-form-item>

	<x-button type="submit" class="btn-primary">
		{{ $slot }}
	</x-button>

</x-form>

