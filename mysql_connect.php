<?php

$user     = 'root';
$password = '';
$db       = 'testing';
$host     = 'localhost';

//mysql /  NB! можно переделать под запись в файл.
//$dsn = 'mysql:host='.$host.';dbname='$db;
$dsn = 'mysql:host=localhost;dbname=testing';
$pdo = new PDO($dsn, $user, $password);


?>