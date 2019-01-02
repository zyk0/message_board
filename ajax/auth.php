<?php
// обработка post
	$login    = trim(filter_var($_POST['login'],    FILTER_SANITIZE_STRING));
	$pass     = trim(filter_var($_POST['pass'],     FILTER_SANITIZE_STRING));
	
$error = ''; //вывод ошибок
if(strlen($login) < 3){
	$error = 'напишите логин';
}else if(strlen($pass) < 3){
	$error = 'напишите пароль';
}

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
	$user     = 'root';
	$password = '';
	$db       = 'testing';
	$host     = 'localhost';

	//mysql /  NB! можно переделать под запись в файл.
	//$dsn = 'mysql:host='.$host.';dbname='$db;
	$dsn = 'mysql:host=localhost;dbname=testing';
	$pdo = new PDO($dsn, $user, $password);
	*/
//$sql = 'INSERT INTO users(name, email, login, pass) VALUES (?, ?, ?, ?)';
$sql = 'SELECT `id` FROM `users` WHERE `login` = :login && `pass` = :pass';
$query = $pdo->prepare($sql);
$query->execute(['login' => $login, 'pass' => $pass]);

$user = $query->fetch(PDO::FETCH_OBJ);
if($user->id == 0){
	echo 'юзер не найден';
}else{
	$little_cooki = 'little_sly_cookie';
	setcookie('login', $login, time() + 180 * 30, "/");
	setcookie('little_cookie', $little_cooki, time() + 3600, "/");
	// имя куки, $login , время жизни, для всего сайта
	echo 'Готово';
	header("refresh: 3; url=md5.php");
}

//header ("location: md5.php");
//header("refresh: 3; url=http://google.com");
//header("refresh: 3; url=http://localhost/proger/index.php");
//echo 'Готово';
//header("refresh: 3; url=md5.php");
?>