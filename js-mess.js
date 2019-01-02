//  	при клике на кнопку с id 'mess_send'
//		берем данные из полей
$('#mess_send').click(function(){
		console.log(' клик по кнопке mess_send');
	
	var name = $('#username').val();
	var email = $('#email').val();
	var mess = $('#mess').val();

	
	$.ajax({
		url: 'ajax/mail.php',
		type: 'POST',
		cache: false,
		// даные из post-маcсива и значения
		data: {'username' : name, 'email' : email, 'mess' : mess}, // ?
		dataType: 'html', // ?
		success: function(data){
			if(data == 'Готово'){
				$('#mess_send').text('Все готово!!');
				$('#errorBlock').hide();//спрятать блок ошибки
				$('#username').val(""); //пустое значение
				$('#email').val(""); //когда будет мессага отправлена,
				$('#mess').val(""); //то поля очистятся
			}else{
				$('#errorBlock').show();//показать ошибку с data
				$('#errorBlock').text(data);
			}
		}
	});
});

// data -  та инф-ия,котору получаем