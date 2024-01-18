<?php
require('lib.php');

// Проверка, авторизован ли пользователь
if (!isset($_SESSION['user_info'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_info']['id'];



// Получение текущей информации о пользователе
$sql = "SELECT * FROM users WHERE id=$user_id";
$result = Database::$db->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_info = [
        'name' => $row['name'],
        'phone' => $row['phone'],
        'password' => $row['password']
    ];
} else {
    echo "Информация о пользователе не найдена";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Yogalife &mdash; Профиль</title>
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
                      <li>
                        <a href="index.php">Главная</a>
                      </li>
                      <li>
                        <a href="index.php">Мои записи</a>
                      </li>
                      <li><a href="contact.php">Связь с нами</a></li>
                        <?php if (!isset($_SESSION['user_info'])) { ?>
                    
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

<div class="container mt-5">
    <h2>Профиль пользователя</h2>
    <form method="post" action="profile.php">
        <div class="form-group">
            <label for="name">Имя:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $user_info['name']; ?>">
        </div>
        <div class="form-group">
            <label for="phone">Номер телефона:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user_info['phone']; ?>">
        </div>
        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo $user_info['password']; ?>">
        </div>
        <!-- Добавьте другие поля профиля, если необходимо -->

        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
    <?php 
        // Обработка формы редактирования профиля
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];

            // Обновление данных пользователя в базе данных
            $sql = "UPDATE users SET name='$name', phone='$phone', password='$password' WHERE id=$user_id";

            if (Database::$db->query($sql) === TRUE) {
                echo "Профиль успешно обновлен";
            } else {
                echo "Ошибка при обновлении профиля: " . Database::$db->error;
            }
        }
    ?>
</div>

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
