<div {{ $attributes->merge([

	])->class([
		'd-flex',
		'justify-content-start',
		'flex-row',
		'mb-3'
	]) }}>
    {{ $slot}}
</div>
