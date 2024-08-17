@extends('home.layouts.main')

@section('right.content')
    <section>

        <!-- Special Items Page -->
        <div id="special" class="tm-page-content">
            <div class="tm-special-items">

                @foreach($menus as $menuItem)
                    <div class="tm-black-bg tm-special-item">
                        <img width="100%" src="{{ asset('/storage/' . $menuItem->image) }}" alt="{{ $menuItem->title }}">
                        <div class="tm-special-item-description">
                            <h2 class="tm-text-primary tm-special-item-title">{{ $menuItem->title }}</h2>
                                {!! $menuItem->description !!}
                            <span class="tm-list-item-price">{{ $menuItem->price }}&nbsp;&#3647;</span>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <!-- end Special Items Page -->

    </section>

@endsection
