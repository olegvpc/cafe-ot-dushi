@extends('layouts.main')

{{-- если кода мало в секции, то можно написать контент вторым параметром в секции --}}


@section('main.content')
    <h1>
        MAIN SITE FROM HOME.BLADE {{-- переменную передали в роуте --}}
    </h1>
@endsection
