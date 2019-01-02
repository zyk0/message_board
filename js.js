//  	при клике на кнопку с id 'reg_user'
//		берем данные из полей
$('#reg_user').click(function(){
		console.log(' клик по кнопке');
	
	var name = $('#username').val();
		console.log('name: ', name);
	var email = $('#email').val();
		console.log('email: ', email);
	var login = $('#login').val();
		console.log('login: ', login);
	var pass = $('#pass').val();
		console.log('pass: ', pass);
	
	$.ajax({
		url: 'ajax/reg.php',
		type: 'POST',
		cache: false,
		// даные из post-маcсива и значения
		data: {'username' : name, 'email' : email, 'login' : login, 'pass' : pass}, // ?
		dataType: 'html', // ?
		success: function(data){
			if(data == 'Готово'){
				$('#errorBlock').text('Регистрация завершена!');
				$('#errorBlock').hide();//спрятать блок ошибки
			}else{
				$('#errorBlock').show();//показать ошибку с data
				$('#errorBlock').text(data);
			}
		}
	});
});

// data -  та инф-ия,котору получаем