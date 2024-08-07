@extends('home.layouts.main')

@section('right.content')

    <!-- Russian or Thai Menu Page -->
    <div id="russian-menu" class="tm-page-content">

        <nav class="tm-black-bg tm-drinks-nav">
            <ul>
                <li>
                    <a href="#" class="tm-tab-link active" data-id="soup">Soup / เครื่องดื่ม</a>
                </li>
                <li>
                    <a href="#" class="tm-tab-link" data-id="salad">Salad / สลัด</a>
                </li>
                <li>
                    <a href="#" class="tm-tab-link" data-id="main">Main course / จานหลัก</a>
                </li>
            </ul>
        </nav>
        <div id="soup" class="tm-tab-content">
            @foreach ($soups as $menuItem)
                <div class="tm-list">
                    <x-home.card :menuItem=$menuItem />
                </div>
            @endforeach
        </div>
        <div id="salad" class="tm-tab-content">
            @foreach ($salads as $menuItem)
                <!-- используем компонент для отображения блюд-->
                <div class="tm-list">
                    <x-home.card :menuItem=$menuItem />
                </div>
            @endforeach
        </div>
        <div id="main" class="tm-tab-content">
            @foreach ($mains as $menuItem)
                <!-- используем компонент для отображения блюд-->
                <div class="tm-list">
                    <x-home.card :menuItem=$menuItem />
                </div>
            @endforeach
        </div>
    <!-- end Russian Menu Page -->

@endsection

@once

    @push('body-scripts')

        <script>
            // function setVideoSize() {
            //     const vidWidth = 1920;
            //     const vidHeight = 1080;
            //     const windowWidth = window.innerWidth;
            //     const windowHeight = window.innerHeight;
            //     const tempVidWidth = windowHeight * vidWidth / vidHeight;
            //     const tempVidHeight = windowWidth * vidHeight / vidWidth;
            //     const newVidWidth = tempVidWidth > windowWidth ? tempVidWidth : windowWidth;
            //     const newVidHeight = tempVidHeight > windowHeight ? tempVidHeight : windowHeight;
            //     const tmVideo = $('#tm-video');
            //
            //     tmVideo.css('width', newVidWidth);
            //     tmVideo.css('height', newVidHeight);
            // }

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


                /************** Video background *********/

                // setVideoSize();
                //
                // // Set video background size based on window size
                // let timeout;
                // window.onresize = function(){
                //     clearTimeout(timeout);
                //     timeout = setTimeout(setVideoSize, 100);
                // };
                //
                // // Play/Pause button for video background
                // const btn = $("#tm-video-control-button");
                //
                // btn.on("click", function(e) {
                //     const video = document.getElementById("tm-video");
                //     $(this).removeClass();
                //
                //     if (video.paused) {
                //         video.play();
                //         $(this).addClass("fas fa-pause");
                //     } else {
                //         video.pause();
                //         $(this).addClass("fas fa-play");
                //     }
                // });
            });
        </script>

    @endpush
@endonce
