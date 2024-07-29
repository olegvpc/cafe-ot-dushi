{{--{{ dd($attributes) }}--}}

@props(['method'=>'GET'])

@php($method = strtoupper($method))

@php($_method = in_array($method, ['GET', 'POST']))

{{--{{ dd($method, $_method) }}--}}

{{--<form {{ $attributes }}>--}}

{{--    @csrf--}}
{{--    {{ $slot}}--}}
{{--</form>--}}

<form {{ $attributes }} method="{{ $_method ? $method : 'POST'}}">
    @if(! $_method)
         <input type="hidden" name="_method" value="{{ $method }}">
        @method($method)
    @endif

    @if($method !== 'GET')
        @csrf
    @endif

    {{ $slot}}
</form>
