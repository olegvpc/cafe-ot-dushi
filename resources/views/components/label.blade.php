@props(['required' => false])

{{--если слово required приходит не в классе а как атрибут, ты мы его вытаскиваем в пропс и при наличии добавляем в класс--}}
{{-- {{ dd($required ? 1 : 0, $attributes) }}--}}


<label {{ $attributes->class([
	'mb-1', $required ? 'required' : ''
]) }}>
    {{ $slot }}
</label>
