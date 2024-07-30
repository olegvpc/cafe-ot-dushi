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
      <div class="tm-left">
        <div class="tm-left-inner">
          <div class="tm-site-header">
            <img src="img/sheff-logo.png" alt="sheff-logo" class="tm-site-logo">
            <h1 class="tm-site-name">Кафе "От души"</h1>
          </div>
          <nav class="tm-site-nav">
            <ul class="tm-site-nav-ul">
              <li class="tm-page-nav-item">
                <a href="#russian-menu" class="tm-page-link active">
                  <span>Русское меню</span>
                    <span>อาหารรัสเซีย</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="#thai-menu" class="tm-page-link">
                  <span>Тайское меню</span>
                    <span>อาหารไทย</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="#special" class="tm-page-link">
                  <span>Комплексные обеды</span>
                    <span>ชุดอาหารกลางวัน</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="#contact" class="tm-page-link">
                  <span> Login</span>
                  <span>เข้าสู่ระบบ</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="tm-right">
        <main class="tm-main">
          <!-- Russian Menu Page -->
          <div id="russian-menu" class="tm-page-content">
            <nav class="tm-black-bg tm-drinks-nav">
              <ul>
                <li>
                  <a href="#" class="tm-tab-link active" data-id="drinks">Напитки / เครื่องดื่ม</a>
                </li>
                <li>
                  <a href="#" class="tm-tab-link" data-id="salad">Салаты / สลัด</a>
                </li>
                <li>
                  <a href="#" class="tm-tab-link" data-id="main">Основные блюда / จานหลัก</a>
                </li>
              </ul>
            </nav>

            <div id="drinks" class="tm-tab-content">
              <div class="tm-list">
                <div class="tm-list-item">
                  <img src="img/drinks-kompot.jpeg" alt="drinks-kompot" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Компот из клубники / <span class="tm-list-item-price">30&nbsp;&#3647;</span></h3>
                    <p class="tm-list-item-description">Вкусный домашний компот из клубники.</p>
                  </div>
                </div>
                <div class="tm-list-item">
                  <img src="img/drinks-airan.jpeg" alt="drinks-airan" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Айран<span class="tm-list-item-price">30&nbsp;&#3647;</span></h3>
                    <p class="tm-list-item-description">Освежающий напиток, который пьют в жаркий день, в качестве легкого завтрака или полдника, а также чтобы смягчить сытную или острую еду..</p>
                  </div>
                </div>

              </div>
            </div>

            <div id="salad" class="tm-tab-content">
              <div class="tm-list">

                <div class="tm-list-item">
                  <img src="img/salad-olivie.jpeg" alt="salad-olivie" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Оливье / Salad Olivie / สลัด <span class="tm-list-item-price">95&nbsp;&#3647;</span></h3>
                    <p class="tm-list-item-description">Традиционный русский салат по рецепту знаменитого француза Оливье.</p>
                  </div>
                </div>
                <div class="tm-list-item">
                  <img src="img/salad-crab.jpeg" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Салат из крабовых палочек / Crab stiks salad / สลัดปูอัด<span class="tm-list-item-price">95&nbsp;&#3647;</span></h3>
                    <p class="tm-list-item-description">Крабовый салат очень сытный и вкусный - особенно в стране где много крабов.</p>
                  </div>
                </div>

              </div>
            </div>

            <div id="main" class="tm-tab-content">
              <div class="tm-list">
                <div class="tm-list-item">
                  <img src="img/smoothie-1.png" alt="Image" class="tm-list-item-img">
                  <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">Strawberry Smoothie<span class="tm-list-item-price">$12.50</span></h3>
                    <p class="tm-list-item-description">Here is a short description for the item along with a squared thumbnail.</p>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <!-- end Russian Menu Page -->
          <!-- Thai Menu Page -->
{{--          <div id="thai-menu" class="tm-page-content">--}}
{{--                <nav class="tm-black-bg tm-drinks-nav">--}}
{{--                    <ul>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="tm-tab-link-thai active" data-id="thai-drinks">(Thai) Напитки / เครื่องดื่ม</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="tm-tab-link-thai" data-id="thai-salad">(Thai) Салаты / สลัด</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="tm-tab-link-thai" data-id="thai-main">(Thai) Основные блюда / จานหลัก</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </nav>--}}

{{--                <div id="thai-drinks" class="tm-tab-content">--}}
{{--                    <div class="tm-list">--}}
{{--                        <div class="tm-list-item">--}}
{{--                            <img src="img/drinks-kompot.jpeg" alt="drinks-kompot" class="tm-list-item-img">--}}
{{--                            <div class="tm-black-bg tm-list-item-text">--}}
{{--                                <h3 class="tm-list-item-name">Компот из клубники / <span class="tm-list-item-price">30&nbsp;&#3647;</span></h3>--}}
{{--                                <p class="tm-list-item-description">Вкусный домашний компот из клубники.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="tm-list-item">--}}
{{--                            <img src="img/drinks-airan.jpeg" alt="drinks-airan" class="tm-list-item-img">--}}
{{--                            <div class="tm-black-bg tm-list-item-text">--}}
{{--                                <h3 class="tm-list-item-name">Айран<span class="tm-list-item-price">30&nbsp;&#3647;</span></h3>--}}
{{--                                <p class="tm-list-item-description">Освежающий напиток, который пьют в жаркий день, в качестве легкого завтрака или полдника, а также чтобы смягчить сытную или острую еду..</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--                <div id="thai-salad" class="tm-tab-content">--}}
{{--                    <div class="tm-list">--}}

{{--                        <div class="tm-list-item">--}}
{{--                            <img src="img/salad-olivie.jpeg" alt="salad-olivie" class="tm-list-item-img">--}}
{{--                            <div class="tm-black-bg tm-list-item-text">--}}
{{--                                <h3 class="tm-list-item-name">Оливье / Salad Olivie / สลัด <span class="tm-list-item-price">95&nbsp;&#3647;</span></h3>--}}
{{--                                <p class="tm-list-item-description">Традиционный русский салат по рецепту знаменитого француза Оливье.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="tm-list-item">--}}
{{--                            <img src="img/salad-crab.jpeg" alt="Image" class="tm-list-item-img">--}}
{{--                            <div class="tm-black-bg tm-list-item-text">--}}
{{--                                <h3 class="tm-list-item-name">Салат из крабовых палочек / Crab stiks salad / สลัดปูอัด<span class="tm-list-item-price">95&nbsp;&#3647;</span></h3>--}}
{{--                                <p class="tm-list-item-description">Крабовый салат очень сытный и вкусный - особенно в стране где много крабов.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--                <div id="thai-main" class="tm-tab-content">--}}
{{--                    <div class="tm-list">--}}
{{--                        <div class="tm-list-item">--}}
{{--                            <img src="img/smoothie-1.png" alt="Image" class="tm-list-item-img">--}}
{{--                            <div class="tm-black-bg tm-list-item-text">--}}
{{--                                <h3 class="tm-list-item-name">Strawberry Smoothie<span class="tm-list-item-price">$12.50</span></h3>--}}
{{--                                <p class="tm-list-item-description">Here is a short description for the item along with a squared thumbnail.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
          <!-- end Thai Menu Page -->

          <!-- Special Items Page -->
          <div id="special" class="tm-page-content">
            <div class="tm-special-items">
              <div class="tm-black-bg tm-special-item">
                <img src="img/special-02.jpg" alt="Image">
                <div class="tm-special-item-description">
                  <h2 class="tm-text-primary tm-special-item-title">Бизнес-ланч № 1</h2>
                    <ul class="tm-special-item-text">
                        <li>Салат Оливье</li>
                        <li>Борщ Московский</li>
                        <li>Куриные котлеты в панировке с гарниром из риса</li>
                        <li>Компот клубничный</li>
                    </ul>
                  <span class="tm-list-item-price">225&nbsp;&#3647;</span>
                </div>
              </div>
                <div class="tm-black-bg tm-special-item">
                    <img src="img/special-03.jpg" alt="Image">
                    <div class="tm-special-item-description">
                        <h2 class="tm-text-primary tm-special-item-title">Бизнес-ланч № 2</h2>
                        <ul class="tm-special-item-text">
                            <li>Салат Витаминный</li>
                            <li>Суп куриный</li>
                            <li>Стейк из курицы с гарниром из риса</li>
                            <li>Компот клубничный</li>
                        </ul>
                        <span class="tm-list-item-price">225&nbsp;&#3647;</span>
                    </div>
                </div>

            </div>
          </div>
          <!-- end Special Items Page -->

          <!-- Contact Page -->
            <div id="contact" class="tm-page-content">
                <div class="tm-black-bg tm-contact-text-container">
                    <h2 class="tm-text-primary">Вход для сотрудников/ เข้าสู่ระบบพนักงาน</h2>
                    <p>Введите свой логин и пароль для входа на платформу. / กรอกชื่อผู้ใช้และรหัสผ่านของคุณเพื่อเข้าสู่ระบบแพลตฟอร์ม</p>
                </div>
                <div class="tm-black-bg tm-contact-form-container tm-align-right">
                    <form action="{{ route('login.store') }}" method="POST" id="login">
                        @csrf
                        <div class="tm-form-group">
                            <input type="email" name="email" class="tm-form-control" placeholder="Email / อีเมล" required />
                        </div>
                        <div class="tm-form-group">
                            <input type="password" name="password" class="tm-form-control" placeholder="Пароль / รหัสผ่าน" required />
                        </div>
                        <div>
                            <button type="submit" class="tm-btn-primary tm-align-right">
                                Войти / ที่จะเข้ามา
                            </button>
                        </div>
                    </form>
                </div>
            </div>
          <!-- end Contact Page -->
        </main>
      </div>
    </div>
    <footer class="tm-site-footer">
      <p class="tm-black-bg tm-footer-text">Copyright 2024 | Кафе "От Души"</p>
    </footer>
  </div>

  <!-- Background video -->
  <div class="tm-video-wrapper">
      <i id="tm-video-control-button" class="fas fa-pause"></i>
      <video autoplay muted loop id="tm-video">
          <source src="{{ asset('video/wave-cafe-video-bg.mp4') }}" type="video/mp4">
      </video>
  </div>

  <script src="js/jquery-3.4.1.min.js"></script>
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

    function openTab(evt, id) {
      $('.tm-tab-content').hide();
      $('#' + id).show();
      $('.tm-tab-link').removeClass('active');
      $(evt.currentTarget).addClass('active');
    }

    function initPage() {
      let pageId = location.hash;

      if(pageId) {
        highlightMenu($(`.tm-page-link[href^="${pageId}"]`));
        showPage($(pageId));
      }
      else {
        pageId = $('.tm-page-link.active').attr('href');
        showPage($(pageId));
      }
    }

    function highlightMenu(menuItem) {
      $('.tm-page-link').removeClass('active');
      menuItem.addClass('active');
    }

    function showPage(page) {
      $('.tm-page-content').hide();
      page.show();
    }

    $(document).ready(function(){

      /***************** Pages *****************/

      initPage();

      $('.tm-page-link').click(function(event) {

        if(window.innerWidth > 991) {
          event.preventDefault();
        }

        highlightMenu($(event.currentTarget));
        showPage($(event.currentTarget.hash));
      });


      /***************** Tabs rus *******************/

      $('.tm-tab-link').on('click', e => {
        e.preventDefault();
          console.log($(e.target).data('id'))
        openTab(e, $(e.target).data('id'));
      });
        /***************** Tabs Thai *******************/

        $('.tm-tab-link-thai').on('click', e => {
            e.preventDefault();
            console.log($(e.target).data('id'))
            openTab(e, $(e.target).data('id'));
        });

      $('.tm-tab-link.active').click(); // Open default tab


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
</body>
</html>
