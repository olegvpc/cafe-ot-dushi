@extends('layouts.main')

{{-- <!--если кода мало в секции, то можно написать контент вторым параметром в секции-->
@section('page.title', 'Register-site') --}}


@section('main.content')
    <div class="div404 body404 flex-grow-1">
        <p id="error">E<span>r</span>ror</p>
        <p id="code">4<span>0</span><span>4</span></p>
    </div>
@endsection


@once
    @push('head-scripts')

        <link rel="stylesheet" type="text/css" href="/css/404.css">

    @endpush
@endonce
