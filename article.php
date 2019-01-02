<?php
	if($_COOKIE['login'] == ''){
		header('Location: reg.php');
		exit();
	}
?>

<!DOCTYPE html> 
<html>
    <head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<meta name="description" content="">
			<meta name="author" content="">
        <title> Добавление статьи </title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
		<link href="css.css" rel="stylesheet">
		<link rel="icon" href="favicon.ico">
	</head>
<body> 

<?php require 'blocks/header.php' ?>

<div class="container mt-5">
		<h1>  Добавление статьи  </h1> 
		<div class="row">
			<div class="col-md-8 lom">
				
				<form action="" method="post">
				<!-- <form action="ajax/reg.php" method="post"> php-->
					<label for="title">Заголовок статьи</label>
					<input type="text" name="title" id="title" class="form-control">
					
					<label for="intro">Интро статьи</label>
					<textarea type="intro" id="intro" class="form-control"></textarea>
					
					<label for="username">Текст статьи</label>
					<textarea type="text" id="text" class="form-control"></textarea>
					
					<div class="alert alert-danger mt-2" id="errorBlock"></div>

					<button type="button" id="article_send" class="btn btn-success mt-5">
						Добавить новую статью в блог
					</button>
				</form>
				
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
	
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
</script>
<script>
	$('#article_send').click(function(){
		var title = $('#title').val();
			console.log('title: ', title);
		var intro = $('#intro').val();
			console.log('intro: ', intro);
		var text  = $('#text').val();
			console.log('text: ', text);
			
		$.ajax({
			url: 'ajax/add_article.php',
			type: 'POST',
			cache: false,
			// даные из post-маcсива и значения
			data: {'title' : title, 'intro' : intro, 'text' : text},
			dataType: 'html', // ?
			success: function(data){
				if(data == 'Готово'){
					$('#article_send').text('Готово');
					$('#errorBlock').hide();//спрятать блок ошибки
				}else{
					$('#errorBlock').show();//показать ошибку с data
					$('#errorBlock').text(data);
				}
			}
		});
	});
</script>
</body>    
</html>   