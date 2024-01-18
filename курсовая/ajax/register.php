<?php
require '../lib.php';
$result = [
    'success' => 0,
    'message' => ''
];
if (isset($_GET['phone'])
    && $_GET['phone']
    && isset($_GET['password'])
    && $_GET['password']
    && isset($_GET['name'])
    && $_GET['name']) {

    $phone = $_GET['phone'];
    $password = $_GET['password'];
    $name = $_GET['name'];
    $password = md5($password);

    $queryResult = Database::$db->query("SELECT * FROM users WHERE phone = '$phone'");
    if ($queryResult->num_rows)
    {
        $result['message'] = 'Профиль с указанной почтой или телефоном уже существует';
    }
    else
    {
        $queryResult = Database::$db->query("INSERT INTO users (name, phone, password) VALUES ( '$name','$phone', '$password')");
        if ($queryResult)
        {
            $result['success'] = 1;
        }
    }
}
else
{
    $result['message'] = 'Заполнены не все обязательные поля. Заполните и попробуйте еще раз.';
}

echo json_encode($result);
?>