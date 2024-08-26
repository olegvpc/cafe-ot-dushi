@extends('home.layouts.main')

@section('right.content')
    <section>

        <!-- Special Items Page -->
        <div id="special" class="tm-page-content">
            <nav class="tm-black-bg tm-drinks-nav">
                <ul>
                    <li>
                        <a href="#" class="tm-tab-link active" data-id="breakfast">Breakfast / ดอาหารเช้า</a>
                    </li>
                    <li>
                        <a href="#" class="tm-tab-link" data-id="lunch">Lunch set/ ชุดอาหารกลางวัน</a>
                    </li>
                </ul>
            </nav>
{{--{{ dd($specialMenus->where('category_id', 'SPECIAL')) }}--}}
            <div id="breakfast" class="tm-tab-content">
                <div class="tm-special-items">
                    @foreach($specialMenus->where('category_id', 'BREAKFAST') as $menuItem)
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

            <div id="lunch" class="tm-tab-content">
                <div class="tm-special-items">
                    @foreach($specialMenus->where('category_id', '=', 'SPECIAL') as $menuItem)
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

{{--            <div class="tm-special-items">--}}

{{--                @foreach($specialMenus as $menuItem)--}}
{{--                    <div class="tm-black-bg tm-special-item">--}}
{{--                        <img width="100%" src="{{ asset('/storage/' . $menuItem->image) }}" alt="{{ $menuItem->title }}">--}}
{{--                        <div class="tm-special-item-description">--}}
{{--                            <h2 class="tm-text-primary tm-special-item-title">{{ $menuItem->title }}</h2>--}}
{{--                                {!! $menuItem->description !!}--}}
{{--                            <span class="tm-list-item-price">{{ $menuItem->price }}&nbsp;&#3647;</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}

{{--            </div>--}}
        </div>
        <!-- end Special Items Page -->

    </section>

@endsection

@once

    @push('body-scripts')

        <script>

            function openTab(evt, id) {
                $('.tm-tab-content').hide();
                $('#' + id).show();
                $('.tm-tab-link').removeClass('active');
                $(evt.currentTarget).addClass('active');
            }

            $(document).ready(function(){

                /***************** Tabs *******************/

                $('.tm-tab-link').on('click', e => {
                    e.preventDefault();

                    openTab(e, $(e.target).data('id'));
                });

                $('.tm-tab-link.active').click(); // Open default tab
            });
        </script>

    @endpush
@endonce
