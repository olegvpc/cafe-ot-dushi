@extends('home.layouts.main')

@section('right.content')

    <!-- Russian or Thai Menu Page -->
    <div id="russian-menu" class="tm-page-content">

        <nav class="tm-black-bg tm-drinks-nav">
            <ul>
                <li>
                    <a href="#" class="tm-tab-link active" data-id="drink">Drink / ดื่ม</a>
                </li>
                <li>
                    <a href="#" class="tm-tab-link" data-id="soup">Soup / เครื่องดื่ม</a>
                </li>
                <li>
                    <a href="#" class="tm-tab-link" data-id="salad">Salad / สลัด</a>
                </li>
                <li>
                    <a href="#" class="tm-tab-link" data-id="main">Main / จานหลัก</a>
                </li>
            </ul>
        </nav>
        <div id="drink" class="tm-tab-content">
            @foreach ($drink as $menuItem)
                <div class="tm-list">
                    <x-home.card :menuItem="$menuItem" />
                </div>
            @endforeach
        </div>
        <div id="soup" class="tm-tab-content">
            @foreach ($soups as $menuItem)
                <div class="tm-list">
                    <x-home.card :menuItem="$menuItem" />
                </div>
            @endforeach
        </div>
        <div id="salad" class="tm-tab-content">
            @foreach ($salads as $menuItem)
                <!-- используем компонент для отображения блюд-->
                <div class="tm-list">
                    <x-home.card :menuItem="$menuItem" />
                </div>
            @endforeach
        </div>
        <div id="main" class="tm-tab-content">
            @foreach ($mains as $menuItem)
                <!-- используем компонент для отображения блюд-->
                <div class="tm-list">
                    <x-home.card :menuItem="$menuItem" />
                </div>
            @endforeach
        </div>
    <!-- end Russian Menu Page -->

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
