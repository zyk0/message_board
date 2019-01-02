<?php
$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
$email    = trim(filter_var($_POST['email'],    FILTER_SANITIZE_EMAIL));
$mess    = trim(filter_var($_POST['mess'],    FILTER_SANITIZE_STRING));

$error = ''; //вывод ошибок
if(strlen($username) < 3){
	$error = 'напишите имя';
}else if(strlen($email) < 3){
	$error = 'напишите почту';
}else if(strlen($mess) < 3){
	$error = 'напишите сообщение';
}

if($error != ''){
	echo $error; //показать ошибку
	exit();
}


$my_email = "test@mail.com";
$subject = "";
//$mess;
$headers = "";

//mail(4 параметра)
mail($my_email, $subject, $mess, $headers);


echo "Готово";
?>