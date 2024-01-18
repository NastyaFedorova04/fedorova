<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Yogalife &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <script src="js/ajax.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/animate.css">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">


    
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>

  <?php
  require('lib.php')
  ?>

  <div class="modal" id="myModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h1>Авторизация</h1>
              </div>
              <div class="modal-body" style="max-width: 600px">
                  <form method="get" action="#" id="orderForm">
                      <div class="avtoriz">
                          <input type="text" placeholder="+7(___)-___--" id="phone_authorize" required>
                          <input type="password" placeholder="Пароль" id="password_authorize" required>
                          <button type="submit" class="btn btn-dark btn-lg" onclick="javascript:authorize()">
                              Авторизация
                          </button>
                      </div>
                      <div id="authorize_response"></div>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <div class="modal" id="myModal1" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h1>Регистрация</h1>
              </div>
              <div class="modal-body" style="max-width: 600px">
                  <form method="get" action="#" id="orderForm">
                      <div class="avtoriz">
                          <input type="text" placeholder="ФИО" id="name_register" required>
                          <input type="text" placeholder="+7(___)-___--" id="phone_register" required>
                          <input type="password" placeholder="Пароль" id="password_register" required>
                          <button type="submit" class="btn btn-dark btn-lg" onclick="javascript:register()">
                              Регистрация
                          </button>
                      </div>
                      <div id="register_response"></div>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
    <div class="site-navbar-wrap js-site-navbar bg-white">
      
      <div class="container">
        <div class="site-navbar bg-light">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-2">
                <h2 class="mb-0 site-logo"><a href="index.php">Yoganow</a></h2>
              </div>
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">
                    
                    <div class="d-inline-block d-lg-none  ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>
                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                      <li class="active">
                        <a href="index.php">Главная</a>
                      </li>
                      
                      <li><a href="events.php">События</a></li>
					  <li><a href="classes.php">Занятия йогой</a></li>
                      <li><a href="about.php">О йоге</a></li>
                      <li><a href="contact.php">Связь с нами</a></li>
                        <?php if (!isset($_SESSION['user_info'])) { ?>
                          
                          <li><button type="submit" data-toggle="modal" data-target="#myModal" class="btn btn-light btn-sm">
                                  Авторизация
                              </button></li>
                          <li><button type="submit" class="btn btn-light btn-sm" data-toggle="modal" data-target="#myModal1" >
                                  Регистрация
                              </button></li>
                        <?php } else { ?>
                            <li><a href="profile.php">Профиль</a></li>
                            <?php if ($_SESSION['user_info']['is_admin']) {?>
                               <li><a href="admin.php">Админ Панель</a></li>
                            <?php } ?>
                            <a href="#" onclick="javascript:unauthorize()">
                                <span>Выйти</span>
                            </a>
                        <?php } ?>
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    
    <div class="slide-one-item home-slider owl-carousel">
      
      <div class="site-blocks-cover overlay" style="background-image: url(images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h2 class="caption mb-2">Йога для всех</h2>
              <h1 class="">ДОБРО ПОЖАЛОВАТЬ!</h1>
              
            </div>
          </div>
        </div>
      </div>  

      <div class="site-blocks-cover overlay" style="background-image: url(images/hero_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h2 class="caption mb-2">Наслаждайтесь вместе с нами</h2>
              <h1 class="">Йога &amp; Медитация</h1>
            </div>
          </div>
        </div>
      </div> 
    </div>

    <div class="site-block-half d-flex">
      <div class="image bg-image" style="background-image: url('images/img_1.jpg');"></div>
      <div class="text">
        <h2 class="font-family-serif">Добро Пожаловать!</h2>
        <span class="caption d-block text-primary pl-0 mb-4">Привет всем!</span>
        <p class="mb-5">Как говорится в древней поговорке, «здоровье — это богатство». И нигде это так не верно, как в мире йоги. Здоровое тело и ясный разум — основа счастливой жизни, а йога способствует как физическому, так и психическому благополучию.</p>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">Наши программы</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="program">
              <a href="#" class="d-block mb-0 thumbnail"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
              <div class="program-body">
                <h3 class="heading mb-2"><a href="#">соберись с духом</a></h3>
                <p><a href="#">Оздоровительная йога</a></p>
                <div class="span"><span class="mr-4"><span class="icon-schedule icon"></span> 15 мин</span> <span> <span class="icon-signal icon"></span> Для начинающих</span></div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="program">
              <a href="#" class="d-block mb-0 thumbnail"><img src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
              <div class="program-body">
                <h3 class="heading mb-2"><a href="#">Йога для повышения устойчивости</a></h3>
                <p><a href="#">Оздоровительная йога</a></p>
                <div class="span"><span class="mr-4"><span class="icon-schedule icon"></span> 20 мин</span> <span> <span class="icon-signal icon"></span>Продвинутый</span></div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="program">
              <a href="#" class="d-block mb-0 thumbnail"><img src="images/img_5.jpg" alt="Image" class="img-fluid"></a>
              <div class="program-body">
                <h3 class="heading mb-2"><a href="#">Сильная и независимая</a></h3>
                <p><a href="#">Силовая йога</a></p>
                <div class="span"><span class="mr-4"><span class="icon-schedule icon"></span> 30 мин</span> <span> <span class="icon-signal icon"></span> Продвинутый</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">YОсобенности йоги</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="text-center item">
              <span class="flaticon-001-stone display-3 mb-3 d-block text-primary"></span>
              <h2 class="h5">Душевное спокойствие</h2>
              
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="text-center item">
              <span class="flaticon-002-lotus display-3 mb-3 d-block text-primary"></span>
              <h2 class="h5">Укрепление здоровья</h2>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="text-center item">
              <span class="flaticon-003-meditation display-3 mb-3 d-block text-primary"></span>
              <h2 class="h5">Медитация</h2>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="text-center item">
              <span class="flaticon-004-carpet display-3 mb-3 d-block text-primary"></span>
              <h2 class="h5">Активный образ жизни</h2>
              
            </div>
          </div>


        </div>
      </div>
    </div>

    
    
    <div class="site-section">
      <div class="">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">Наша галерея</h2>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-md-6 col-lg-3">
            <a href="images/img_1.jpg" class="image-popup img-opacity"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-md-6 col-lg-3">
            <a href="images/img_2.jpg" class="image-popup img-opacity"><img src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-md-6 col-lg-3">
            <a href="images/img_3.jpg" class="image-popup img-opacity"><img src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-md-6 col-lg-3">
            <a href="images/img_8.jpg" class="image-popup img-opacity"><img src="images/img_8.jpg" alt="Image" class="img-fluid"></a>
          </div>

          <div class="col-md-6 col-lg-3">
            <a href="images/img_4.jpg" class="image-popup img-opacity"><img src="images/img_4.jpg" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-md-6 col-lg-3">
            <a href="images/img_5.jpg" class="image-popup img-opacity"><img src="images/img_5.jpg" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-md-6 col-lg-3">
            <a href="images/img_6.jpg" class="image-popup img-opacity"><img src="images/img_6.jpg" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-md-6 col-lg-3">
            <a href="images/img_7.jpg" class="image-popup img-opacity"><img src="images/img_7.jpg" alt="Image" class="img-fluid"></a>
          </div>

          <div class="col-md-6 col-lg-3">
            <a href="images/img_1.jpg" class="image-popup img-opacity"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-md-6 col-lg-3">
            <a href="images/img_9.jpg" class="image-popup img-opacity"><img src="images/img_9.jpg" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-md-6 col-lg-3">
            <a href="images/img_3.jpg" class="image-popup img-opacity"><img src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-md-6 col-lg-3">
            <a href="images/img_4.jpg" class="image-popup img-opacity"><img src="images/img_4.jpg" alt="Image" class="img-fluid"></a>
          </div>

        </div>
      </div>
    </div>

        </div>

      </div>
      
    </div>
    

    <!-- <div class="py-5 quick-contact-info">
      <div class="container">
        <div class="row">
          <div class="col-md-4 text-center">
            <div>
              <span class="icon-room text-white h2 d-block"></span>
              <h2>Location</h2>
              <p class="mb-0">New York - 2398 <br>  10 Hadson Carl Street</p>
            </div>
          </div>
          <div class="col-md-4 text-center">
            <div>
              <span class="icon-clock-o text-white h2 d-block"></span>
              <h2>Service Times</h2>
              <p class="mb-0">Wednesdays at 6:30PM - 7:30PM <br>
              Fridays at Sunset - 7:30PM <br>
              Saturdays at 8:00AM - Sunset</p>
            </div>
          </div>
          <div class="col-md-4 text-center">
            <div>
              <span class="icon-comments text-white h2 d-block"></span>
              <h2>Get In Touch</h2>
              <p class="mb-0">Email: info@yoursite.com <br>
              Phone: (123) 3240-345-9348 </p>
            </div>
          </div>
        </div>
      </div>
    </div> -->


  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  
  <script src="js/mediaelement-and-player.min.js"></script>

  <script src="js/main.js"></script>
    

  
  </body>
</html>