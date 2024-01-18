<?php
require('lib.php');

// Подключение к базе данных
$conn = Database::$db;

// Функция для получения всех пользователей из базы данных
function getAllUsers($conn) {
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $users;
    } else {
        return [];
    }
}

// Функция для обновления информации о пользователе
function updateUser($conn, $userId, $newInfo) {
    $query = "UPDATE users SET name=?, phone=?, password=?, is_admin=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $query);
    
    // Подготавливаем данные
    $name = $newInfo['name'];
    $phone = $newInfo['phone'];
    $password = $newInfo['password'];
    $isAdmin = isset($newInfo['is_admin']) ? 1 : 0;

    mysqli_stmt_bind_param($stmt, "ssiii", $name, $phone, $password, $isAdmin, $userId);
    $success = mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);

    return $success;
}

// Функция для удаления пользователя
function deleteUser($conn, $userId) {
    $query = "DELETE FROM users WHERE id=?";
    $stmt = mysqli_prepare($conn, $query);
    
    mysqli_stmt_bind_param($stmt, "i", $userId);
    $success = mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);

    return $success;
}

// Функция для добавления нового пользователя
function addUser($conn, $userData) {
    $query = "INSERT INTO users (name, phone, password, is_admin) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    // Подготавливаем данные
    $name = $userData['name'];
    $phone = $userData['phone'];
    $password = $userData['password'];
    $isAdmin = isset($userData['is_admin']) ? 1 : 0;

    mysqli_stmt_bind_param($stmt, "sssi", $name, $phone, $password, $isAdmin);
    $success = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    return $success;
}

// Обработка POST-запроса на обновление, удаление и добавление пользователя
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $userId = $_POST['user_id'];

    if ($_POST['action'] === 'update') {
        // Обработка запроса на обновление информации пользователя
        $newInfo = [
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'is_admin' => isset($_POST['is_admin']) ? 1 : 0,
        ];

        $updateSuccess = updateUser($conn, $userId, $newInfo);

        if ($updateSuccess) {
            // Обновление прошло успешно
            header("Location: admin.php");
            exit();
        } else {
            // Обработка ошибки при обновлении
            $updateError = "Ошибка при обновлении информации пользователя.";
        }
    } elseif ($_POST['action'] === 'delete') {
        // Обработка запроса на удаление пользователя
        $deleteSuccess = deleteUser($conn, $userId);

        if ($deleteSuccess) {
            // Удаление прошло успешно
            header("Location: admin.php");
            exit();
        } else {
            // Обработка ошибки при удалении
            $deleteError = "Ошибка при удалении пользователя.";
        }
    } elseif ($_POST['action'] === 'add') {
        // Обработка запроса на добавление нового пользователя
        $newUser = [
            'name' => $_POST['new_name'],
            'phone' => $_POST['new_phone'],
            'password' => password_hash($_POST['new_password'], PASSWORD_DEFAULT),
            'is_admin' => isset($_POST['new_is_admin']) ? 1 : 0,
        ];

        $addSuccess = addUser($conn, $newUser);

        if ($addSuccess) {
            // Добавление прошло успешно
            header("Location: admin.php");
            exit();
        } else {
            // Обработка ошибки при добавлении
            $addError = "Ошибка при добавлении нового пользователя.";
        }
    }
}

// Получаем всех пользователей
$users = getAllUsers($conn);

// Закрываем подключение к базе данных
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Yogalife &mdash; Админ Панель</title>
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
    <style>
        .table,
        .add_user {
            width: 100%;
            max-width: 900px !important;
            margin: 0 auto;
        }
        .add_user{
            margin-bottom: 40px;
        }
        .add_user button{
            max-width: 400px;
            margin-top: 30px;
            
        }
    </style>
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
                            <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>
                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li><a href="index.php">Главная</a></li>
                                <li><a href="index.php">Мои записи</a></li>
                                <li><a href="contact.php">Связь с нами</a></li>
                                <?php if (!isset($_SESSION['user_info'])) { ?>
                    
                                <?php } else { ?>
                                    <li><a href="profile.php">Профиль</a></li>
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
    <h3 style="margin-bottom: 30px;">Пользователи:</h3>

    <?php if (isset($updateError)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $updateError; ?>
        </div>
    <?php } ?>

    <?php if (isset($deleteError)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $deleteError; ?>
        </div>
    <?php } ?>

    <?php if (isset($addError)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $addError; ?>
        </div>
    <?php } ?>

    

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['phone']; ?></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?php echo $user['id']; ?>">
                            Редактировать
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $user['id']; ?>">
                            Удалить
                        </button>
                    </td>
                </tr>

                <!-- Модальное окно для редактирования -->
                <div class="modal fade" id="editModal<?php echo $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Редактировать пользователя #<?php echo $user['id']; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="admin.php">
                                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                    <input type="hidden" name="action" value="update">
                                    <div class="form-group">
                                        <label for="name">Имя:</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Телефон:</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user['phone']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Пароль:</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin" <?php echo $user['is_admin'] ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="is_admin">Администратор</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Модальное окно для подтверждения удаления -->
                <div class="modal fade" id="deleteModal<?php echo $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Удалить пользователя #<?php echo $user['id']; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Вы уверены, что хотите удалить пользователя "<?php echo $user['name']; ?>"?</p>
                                <form method="post" action="admin.php">
                                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                    <input type="hidden" name="action" value="delete">
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </tbody>
    </table>

    <!-- Форма для добавления нового пользователя -->
    <h3 style="margin-bottom: 30px;">Добавление пользователя:</h3>
    <form class="add_user" method="post" action="admin.php">
        <input type="hidden" name="action" value="add">
        <div class="form-group">
            <label for="new_name">Имя:</label>
            <input type="text" class="form-control" id="new_name" name="new_name" required>
        </div>
        <div class="form-group">
            <label for="new_phone">Телефон:</label>
            <input type="text" class="form-control" id="new_phone" name="new_phone" required>
        </div>
        <div class="form-group">
            <label for="new_password">Пароль:</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="new_is_admin" name="new_is_admin">
            <label class="form-check-label" for="new_is_admin">Администратор</label>
        </div>
        <button type="submit" class="btn btn-success">Добавить пользователя</button>
    </form>
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

