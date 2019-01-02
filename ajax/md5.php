
<?php 

//echo md5('');
$pass = 'gosha';

$hash = "46#$@#2"; //хэширование
$password = md5($pass . $hash);

$passwordnohash = md5($pass);

echo '||   ';
echo 'пароль:   ';
echo $pass;


echo '||   ';
echo 'с хэшем: ';
echo $password;


echo '||   ';
echo 'без: ';
echo $passwordnohash;
//f7e89f4b748bfd391fbbb1ae42eeb3b8


?>
