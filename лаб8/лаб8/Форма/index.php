<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewort" content="width=device-width, initial-scale=1.0">
    <title>Форма</title> 
</head>
<body>
    <form action="check.php" method="post">
        <div>
<label for="name">ФИО:</label><br>
<input type="text" id="name" name="name" placeholder="ФИО">
</div>
<div>
<label for="date">Дата рождения:</label><br>
<input type="date" name="date" id="date" placeholder="Дата рождения">
</div>
<div>
<label for="form_name">Логин:</label><br>
<input type="text" name="login" id="login" placeholder="Логин">
</div>
<div>
<label for="form_name">Пароль:</label><br>
<input type="password" name="password" id="password" placeholder="Пароль">
</div>
<div>
<input type="submit" name="submit" id="submit" value="Войти">
<div>
</div>
</form>
</body>
</html>