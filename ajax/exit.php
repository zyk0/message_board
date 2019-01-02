<?php
	//setcookie('log', $login, time() - 180, "/");
	setcookie('login', "", time() - 180, "/");
	unset($_COOKIE['login']); //удаляем элемент из массива куки
	echo true;
?>