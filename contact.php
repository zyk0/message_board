<!DOCTYPE html> 
<html>
    <head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<meta name="description" content="">
			<meta name="author" content="">
        <title> Контакты </title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
		<link href="css.css" rel="stylesheet">
		<link rel="icon" href="favicon.ico">
	</head>
<body> 

<?php require 'blocks/header.php' ?>

<div class="container">
		<h1>  Контакты  </h1> 
		<div class="row">
			<div class="col-md-8 lom">
				<h4>Форма отправки сообщения</h4>
				
				<form action="" method="post">
				<!-- <form action="ajax/reg.php" method="post"> php-->
					<label for="username">Имя</label>
					<input type="text" name="username" id="username" class="form-control">
					
					<label for="username">email</label>
					<input type="email" name="email" id="email" class="form-control">
					
					<label for="mess">сообщение</label>
					<input name="mess" id="mess" class="form-control">

					<!--
					<div class="alert alert-danger mt-2" id="errorBlock"></div>
					-->
					<button type="button" id="mess_send" class="btn btn-success mt-5">
						Отправить
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
<script src="js-mess.js"></script>
</body>    
</html>   