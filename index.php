<!DOCTYPE html> 
<html>
    <head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<meta name="description" content="">
			<meta name="author" content="">
        <title> ITproger </title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
		<link href="css.css" rel="stylesheet">
		<link rel="icon" href="favicon.ico">
	</head>
<body> 

<?php require 'blocks/header.php' ?>

<div class="container">
<h1> Главная страница  </h1> 
	<div class="row">
		<div class="col-md-8 lom">
			<span>основная часть</span>
			<br><br>
			<img src="https://images.pexels.com/photos/1635152/pexels-photo-1635152.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=220&w=240">
		<?php
			// печать статей из БД:
			require_once 'mysql_connect.php'; //подключение к БД

			$sql = 'SELECT * FROM `articles` ORDER BY `date` ASC  ';
			$query = $pdo->query($sql);
			while($row = $query->fetch(PDO::FETCH_OBJ)){
				echo " ";
				echo "<div><h3>$row->title</h3></div>";
				echo " ";
				if(2 + 2 == 4){
				//if(setcookie('login') == $_COOKIE['login']){
					echo "автор статьи: <span><mark>$row->avtor</mark></span>";
				}else{
					echo "автор статьи: <span><i>$row->avtor</i></span>";
				}
				echo "<br>";
				//echo "(<small>$row->date</small>)";
				//echo "<br>";
				//echo " ";
				echo "<br>";
				echo "<a href='news.php?id=$row->id' title='$row->title'>";
				echo "<button>прочитать полностью</button>";
				echo "</a>";
				echo " ";
				echo "<br>";
			}
		?>
		</div>
		<aside class="col-md-4">
			<div>aside</div>

			<div>Landscape</div>
			<img src="https://images.pexels.com/photos/994605/pexels-photo-994605.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=160&w=160">
		
			<div>Lighthouse</div>
			<img src="https://images.pexels.com/photos/946343/pexels-photo-946343.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=160&w=160">
		
			<div>aside</div>
		</aside>
	</div>
</div>

	<?php require 'blocks/footer.php'; ?>
</body>    
</html>   