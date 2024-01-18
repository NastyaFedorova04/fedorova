<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Yogalife &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

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
                      <li class="">
                        <a href="index.php">Home</a>
                      </li>
                      <li class="active"><a href="events.php">События</a></li>
					  <li><a href="classes.php">Занятия йогой</a></li>
                      <li><a href="about.php">О йоге</a></li>
                      <li><a href="contact.php">Связь с нами</a></li>
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
      
      <div class="site-blocks-cover overlay" style="background-image: url(images/hero_6.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h2 class="caption mb-2">Йога для всех</h2>
              <h1 class="">ДОБРО ПОЖАЛОВАТЬ</h1>
              
            </div>
          </div>
        </div>
      </div>

      <?php $events = new Events(); ?>

    <div class="site-section">
      <div class="container">
        <div class="row">
            <?php foreach ($events->eventItems as $event) { ?>
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="#" class="popup-vimeo image-play">
                  <img src="<?= $event['photo'] ?>" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0"><a href="#"><?=$event['name']?></a></h2>
              <span class="mb-3 d-block post-date"><?=$event['time']?></a></span>
              <p><?=$event['description']?></p>
            </div>
          </div>
            <?php } ?>

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