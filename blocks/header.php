<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
	<h5 class="my-0 mr-md-auto font-weight-normal">Доска сообщений</h5>
		<nav class="my-2 my-md-0 mr-md-3">
			<a class="p-2 text-dark" href="index.php">Главная</a>
			<a class="p-2 text-dark" href="contact.php">Контакты</a>
			<a class="p-2 text-dark" href="#">Галерея</a>
			
			<?php 
				if(isset($_COOKIE['login']) != ''){
					echo "<a class='p-2 text-dark' href='/proger/article.php'>Добавить статью</a>";
				}
			?>
			
			<?php 
				if(isset($_COOKIE['login']) == ''): 
				//if ($_SESSION['username'])
				//if ( isset($_SESSION['username']) )
			?>
			
				<a class="p-2 text-dark" href="auth.php">Зайти</a>
				<a class="p-2 text-dark" href="reg.php">Регистрация</a>
			
			<?php 
				else: 
			?>
			
				<a class="p-2 text-dark" href="auth.php">Кабинет пользователя</a>
				
			<?php 
				endif; 
			?>
		</nav>
	<!--<a class="btn btn-outline-primary" href="reg.php">Регистрация</a>-->
</div>