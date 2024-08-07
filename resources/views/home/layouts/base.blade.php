<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.min.css') }}"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" /> <!-- https://fonts.google.com/ -->
    <link rel="stylesheet" href="{{ asset('css/tooplate-wave-cafe.css') }}">

</head>
<body>
  <div class="tm-container">
    <div class="tm-row">
      <!-- Site Header -->

        @include('home.includes.header')

        <div class="tm-right">
        <main class="tm-main">

            @yield('content')

        </main>
      </div>
    </div>
    <footer class="tm-site-footer">
      <p class="tm-black-bg tm-footer-text">&copy {{ __('Weber&Weber') }}  | 2024</p>
    </footer>
  </div>

  <!-- Background video -->
  <div class="tm-video-wrapper">
      <i id="tm-video-control-button" class="fas fa-pause"></i>
      <video autoplay muted loop id="tm-video">
          <source src="{{ asset('video/wave-cafe-video-bg.mp4') }}" type="video/mp4">
      </video>
  </div>

  <script src="../js/jquery-3.4.1.min.js"></script>
  <script>
      function setVideoSize() {
          const vidWidth = 1920;
          const vidHeight = 1080;
          const windowWidth = window.innerWidth;
          const windowHeight = window.innerHeight;
          const tempVidWidth = windowHeight * vidWidth / vidHeight;
          const tempVidHeight = windowWidth * vidHeight / vidWidth;
          const newVidWidth = tempVidWidth > windowWidth ? tempVidWidth : windowWidth;
          const newVidHeight = tempVidHeight > windowHeight ? tempVidHeight : windowHeight;
          const tmVideo = $('#tm-video');

          tmVideo.css('width', newVidWidth);
          tmVideo.css('height', newVidHeight);
      }

      $(document).ready(function(){


          /************** Video background *********/

          setVideoSize();

          // Set video background size based on window size
          let timeout;
          window.onresize = function(){
              clearTimeout(timeout);
              timeout = setTimeout(setVideoSize, 100);
          };

          // Play/Pause button for video background
          const btn = $("#tm-video-control-button");

          btn.on("click", function(e) {
              const video = document.getElementById("tm-video");
              $(this).removeClass();

              if (video.paused) {
                  video.play();
                  $(this).addClass("fas fa-pause");
              } else {
                  video.pause();
                  $(this).addClass("fas fa-play");
              }
          });
      });
  </script>

  @stack('body-scripts')

</body>
</html>
