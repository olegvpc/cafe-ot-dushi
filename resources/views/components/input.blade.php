@props(['value' => '', 'type'=>'', 'required'=>null])

{{--{{ dd($attributes->get('name')) }}--}}
{{--@if($type === 'number')--}}
{{--    {{ dd($required) }}--}}
{{--@endif--}}


<input {{ $attributes->class([
	'form-control'
])-> merge([
	'type'=> $type ? $type : 'text',
	'value'=> (request()->old($attributes->get('name')) ? : $value),
]) }} >
