@props(['value' => '', 'type'=>''])

{{--{{ dd($attributes->get('name')) }}--}}
{{--{{ dd($type, $attributes()) }}--}}

<input {{ $attributes->class([
	'form-control'
])-> merge([
	'type'=> $type ? $type : 'text',
	'value'=> (request()->old($attributes->get('name')) ? : $value)
])}}>
