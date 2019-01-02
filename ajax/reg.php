<?php
// обработка post

	$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
	$email    = trim(filter_var($_POST['email'],    FILTER_SANITIZE_EMAIL));
	$login    = trim(filter_var($_POST['login'],    FILTER_SANITIZE_STRING));
	$pass     = trim(filter_var($_POST['pass'],     FILTER_SANITIZE_STRING));
	
//FILTER_SANITIZE_STRING
//фильтрация вводимых значений	

$error = ''; //вывод ошибок

if(strlen($username) < 3){
	$error = 'напишите имя';
	//exit();
}else if(strlen($email) < 3){
	$error = 'напишите почту';
	//exit();
}else if(strlen($login) < 3){
	$error = 'напишите логин';
	//exit();
}else if(strlen($pass) < 3){
	$error = 'напишите пароль';
	//exit();
	//echo 'неправильно';
}

// блок обработки ошибок
// если массив $error не пустой, то показать ошибку и выйти
if($error != ''){
	echo $error; //показать ошибку
	exit();
}

/*
//echo md5('apple'); - шифровка пароля
md5() — Возвращает MD5-хеш строки
*/

/*
//хэширование пароля
$hash = "46*#$@#2"; 
$pass = md5($pass . $hash);
*/

$pass = md5($pass);

require_once '../mysql_connect.php'; //подключение к БД

	/*
	// NB! можно const CONST = ;
	$user     = 'root';
	$password = '';
	$db       = 'testing';
	$host     = 'localhost';

	//mysql /  NB! можно переделать под запись в файл.
	//$dsn = 'mysql:host='.$host.';dbname='$db;
	$dsn = 'mysql:host=localhost;dbname=testing';
	$pdo = new PDO($dsn, $user, $password);
	*/
$sql = 'INSERT INTO users(name, email, login, pass) VALUES (?, ?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$username, $email, $login, $pass]);


//header ("location: md5.php");
//header("refresh: 3; url=http://google.com");
//header("refresh: 3; url=http://localhost/proger/index.php");
echo 'Готово';
header("refresh: 3; url=md5.php");
?>