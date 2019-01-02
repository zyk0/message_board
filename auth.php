<!DOCTYPE html> 
<html>
    <head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<meta name="description" content="">
			<meta name="author" content="">
        <title> Авторизация </title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
		<link href="css.css" rel="stylesheet">
		<link rel="icon" href="favicon.ico">
	</head>
<body> 

<?php require 'blocks/header.php' ?>

<div class="container">
		<h1>  Авторизация  </h1> 
		<div class="row">
			<div class="col-md-8 lom">
			
			<?php
				//вместо if ($_SESSION['username']== ''):
				if(isset($_COOKIE['login']) == ''):
			?>
			
				<h4>Форма авторизации</h4>
				
				<form action="" method="post">
				<!-- <form action="ajax/reg.php" method="post"> php-->
					
					<label for="login">Login</label>
					<input type="text" name="login"    id="login" class="form-control">
					
					<label for="pass">Пароль</label>
					<input type="password" name="pass" id="pass" class="form-control">
					
					<div class="alert alert-danger mt-2" id="errorBlock"></div>
					
					<!--<div class="alert alert-danger mt-1" id="ready"></div>-->

					<button type="button" id="auth_user" class="btn btn-success mt-5">
						Авторизоваться
					</button>
				</form>
			<?php
				else:
			?>
				<p>имя пользователя: <h2> <?=$_COOKIE['login']?> </h2>
					<button class="btn btn-danger" id="exit_btn">выйти</button>
				</p>
				
				<?php 
				
				if($_COOKIE['login'] == 'gosha'){
					//echo htmlspecialchars($_COOKIE["login"]);
					echo "<span class='alert-info'>
								Гоша Дударь
								<br>
								<img src='https://images.pexels.com/photos/1661469/pexels-photo-1661469.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=150&w=140' />
							</span>";
				}
				if($_COOKIE['login'] == 'mumu'){
					echo "<span class='alert-info'>
								Муму
								<br>
								<img src='https://images.pexels.com/photos/1680321/pexels-photo-1680321.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=300' />
							</span>";
				}
				if($_COOKIE['login'] == 'fisher'){
					echo "<span class='alert-info'>
								fisher
								<br>
								<img src='https://images.pexels.com/photos/1054249/pexels-photo-1054249.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=300' />
							</span>";
				}
			    if($_COOKIE['login'] == 'lom'){
					echo "<span class='alert-info'>
								лом
								<br>
								<img src='https://images.pexels.com/photos/1054251/pexels-photo-1054251.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=400' />
							</span>";
				}
				if($_COOKIE['login'] == 'mord'){
					echo "<span class='alert-info'>
								морда
								<br>
								<img src='https://images.pexels.com/photos/722423/pexels-photo-722423.jpeg?auto=compress&cs=tinysrgb&h=350&w=440' />
							</span>";
				}
				?>
				
			<?php
				endif;
			?>
				
			</div>
			<aside class="col-md-4">
				<div>aside</div>

				<div>Landscape</div>
				<img src="https://images.pexels.com/photos/994605/pexels-photo-994605.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=120&w=160">
			
				<div>Lighthouse</div>
				<img src="https://images.pexels.com/photos/946343/pexels-photo-946343.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=120&w=160">
			
				<div>aside</div>
				<div>
					<?php
						if(isset($_COOKIE['login']) == ''):
					?>
					<?php
						else:
					?>
					<p>
						<small>
							пользователь: <b> <?=$_COOKIE['login']?> </b>
						</small>
					</p>
					<?php
						endif;
					?>
				</div>
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
//exit_btn выход из аккаунта
$('#exit_btn').click(function(){
		console.log('выход из аккаунта');
	$.ajax({
		url: 'ajax/exit.php',
		type: 'POST',
		cache: false,
		data: {}, 
		dataType: 'html', // ?
		success: function(data){
			document.location.reload(true);//перезагрузка
		}
	});
});
//  	при клике на кнопку с id 'auth_user'
//		берем данные из полей
$('#auth_user').click(function(){
		console.log(' клик по кнопке');
	
	var login = $('#login').val();
		console.log('auth login: ', login);
	var pass = $('#pass').val();
		console.log('auth pass: ', pass);
	
	$.ajax({
		url: 'ajax/auth.php',
		type: 'POST',
		cache: false,
		// даные из post-маcсива и значения
		data: {'login' : login, 'pass' : pass}, // ?
		dataType: 'html', // ?
		success: function(data){
			if(data == 'Готово'){
				$('#auth_user').text('Готово');
				$('#errorBlock').hide();//спрятать блок ошибки
				document.location.reload(true);//перезагрузка
			}else{
				$('#errorBlock').show();//показать ошибку с data
				$('#errorBlock').text(data);
			}
		}
	});
});

// data -  та инф-ия,котору получаем
</script>
</body>    
</html>   