<!DOCTYPE html> 
<html>
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
        <title> ITproger </title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
		<link href="css.css" rel="stylesheet">
		<link rel="icon" href="favicon.ico">
	</head>
<body> 
<?php require 'blocks/header.php' ?>

<?php
/*формирование запроса к sql*/
	require_once 'mysql_connect.php'; //подключение к БД

	$sql = 'SELECT * FROM `articles` WHERE `id` = :id';
	$id = $_GET['id'];
	$query = $pdo->prepare($sql);
	$query->execute(['id' => $id]);//$query->execute(['id' => $_GET['id']]);
	
	$article = $query->fetch(PDO::FETCH_OBJ);
?>

<div class="container">
<h1> Новостная лента </h1> 
	<div class="row">
		<div class="col-md-8 lom">
			<?php
			//просто печатьномера статьи
				$number_article = $_GET['id'];
				echo "<span>новость № " . $number_article . "</span>" ;
			?>
			
			<div class="jimbotron">
			<h2>
				<?php echo $article->title; ?>
			</h2>	
			<p>
			<small>
				<samp>
					<?php echo $article->intro; ?>
				</samp>
				<u>
				опубликовано: 
					<?php echo date("d M", $article->date); ?>
					<!--  день месяц  -->
					<!--  echo date("H:i:s", $article->date);  -->
					<!--  часы минуты -->
				</u>
			</small>	
			<br>			
				<?php echo $article->text; ?>
			</p>	
			</div>
			<p>комментарии:</p>
				<form action="news.php?id=<?=$_GET['id']?>" method="post">
					<label for="username">Имя</label>
					<input type="text" name="username" value="<?php isset($_COOKIE['login']) ?>" id="username" class="form-control">
					<!-- если юзер авторизован,то пропечатывается его имя -->
					<label for="mess">Сообщение</label>
					<textarea name="mess" id="mess" class="form-control"></textarea>

					<button type="submit" id="mess_send" class="btn btn-success mt-3">
						Добавить комментарий
					</button>
				</form>
				
				<?php
				//если пост не пустой и поле в мессаге не пустое, 
				//то отправляем коммент в БД
				
					if(!empty($_POST['username']) && !empty($_POST['mess'])){
						$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
						$mess     = trim(filter_var($_POST['mess'],     FILTER_SANITIZE_STRING));
						
						$sql = 'INSERT INTO comments(name, mess, article_id) VALUES(?, ?, ?)';
						$query = $pdo->prepare($sql);
						$query->execute([$username, $mess, $_GET['id']]);
					}else{
					}
					
					//$sql = "SELECT * FROM `comments`"; // печать комментов ко всем статьям
					$sql = "SELECT * FROM `comments` WHERE `article_id` = :id ORDER BY `id` ASC";
					$id = $_GET['id'];
					$query = $pdo->prepare($sql);
					$query->execute(['id' => $id]);
					$comments = $query->fetchAll(PDO::FETCH_OBJ);	 
					
					foreach($comments as $comment){
						echo "<div class='alert alert-info mb-2'>
								<mark>$comment->name</mark>
								(<span>№ #$comment->id</span>)
								<p>$comment->mess</p>
							</div>";
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



<?php
/*
$number_article = $_GET['id'];
echo "<p>article id №" . $number_article . "</p>" ;
echo "<br>";

	require_once 'mysql_connect.php'; 
	
	$sql = 'SELECT id,title,text FROM `articles` ORDER BY `date` ASC';
	$query = $pdo->query($sql);
	$row = $query->fetch(PDO::FETCH_OBJ);
	
		echo "<div><h3>$row->id=$number_article</h3></div>";
		echo "<div><h5>$row->title</h5></div>";
		echo "<div><h5>$row->text</h5></div>";
		
*/		
?>


