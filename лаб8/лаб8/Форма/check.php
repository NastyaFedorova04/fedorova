<?php
if (isset($_POST["submit"])){
if($_POST["name"] == ""){
	echo "Поле 'ФИО' не заполненно";
}
else if($_POST["date"] == ""){
	echo "Поле 'Дата' не заполненно";
}
else if($_POST["login"] == ""){
	echo "Поле 'Логин' не заполненно";
}
else if($_POST["password"] == ""){
	echo "Поле 'Пароль' не заполненно";
}
else{
	$name = $_POST["name"];
	$date = $_POST["date"];
	$log = $_POST["login"];
	$pass = $_POST["password"];
	
		echo "ФИО: ".$name."<br/>";
		echo "Дата рождения: ".$date."<br/>";
		echo "Логин: ".$log."<br/>";
		echo "Пароль: ".$pass."<br/>";
}
	}
?>