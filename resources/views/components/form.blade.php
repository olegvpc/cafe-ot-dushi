{{--{{ dd($attributes) }}--}}

@props(['method'=>'GET'])

@php($method = strtoupper($method))

@php($_method = in_array($method, ['GET', 'POST']))

{{--{{ dd($method, $_method) }}--}}


<form {{ $attributes }} method="{{ $_method ? $method : 'POST'}}" enctype="multipart/form-data">
    @if(! $_method)
{{--         <input type="hidden" name="_method" value="{{ $method }}">--}}
        @method($method)
    @endif

    @if($method !== 'GET')
        @csrf
    @endif

    {{ $slot }}
</form>
