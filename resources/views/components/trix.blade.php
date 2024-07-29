{{-- @props(['name' => '']) --}}

{{-- <input type="hidden" id="{{ $name }}" name="{{ $name }}"> --}}

<input type="hidden" {{ $attributes }} id="{{ $name }}">
<trix-editor input="{{ $name }}" value="hello"></trix-editor>


@once
    @push('head-scripts')

    {{--		<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">--}}
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">

    @endpush

    @push('body-scripts')

    {{--		<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>--}}
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    @endpush
@endonce
