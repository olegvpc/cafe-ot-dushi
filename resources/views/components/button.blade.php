{{--@props(['hide' => false])--}}
{{--{{ dd($hide) }}--}}

<button {{ $attributes->merge([
	'type'=>'button',
	'class'=>'btn'
])->class([
	'one-more-class'

]) }}>
    {{ $slot }}
</button>
