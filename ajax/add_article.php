<?php
$title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
$intro = trim(filter_var($_POST['intro'], FILTER_SANITIZE_STRING));
$text  = trim(filter_var($_POST['text'],  FILTER_SANITIZE_STRING));

$error = ''; //вывод ошибок

if(strlen($title) < 3){
	$error = 'напишите title';
}else if(strlen($intro) < 5){
	$error = 'напишите intro';
}else if(strlen($text) < 10){
	$error = 'напишите text';
}

if($error != ''){
	echo $error; //показать ошибку
	exit();
}

require_once '../mysql_connect.php'; //подключение к БД
					//articles - новая созданная табличка в БД testing
$sql = 'INSERT INTO articles(title, intro, text, date, avtor) VALUES (?, ?, ?, ?, ?)';//5параметров
$query = $pdo->prepare($sql);
$query->execute([$title, $intro, $text, time(), $_COOKIE['login']]);

echo 'Готово';
?>