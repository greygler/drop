<?
session_start();
require_once ('../config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ ?>
function call() {
	
	alert($('#rules').is(':checked')); 
		$('.no_rules').html('');
		$('.results').html('')
		$('#emailgroup').removeClass('has-error');
		$('#password1_group').removeClass('has-error');
		$('#password2_group').removeClass('has-error');
		
	     if (!$('#rules').is(':checked')) {$('.no_rules').html('Для работы в системе Вам следует согласится с Правилами!');} else 
		 if ($('#password1').val()!=$('#password2').val())
          { $('.results').html('Пароли не совпадают!');
								$('#password1_group').addClass('has-error');
								$('#password2_group').addClass('has-error');}


								/* else {

								
		var url='http://api.2ip.ua/email.txt?email='+$('#email').val();
        $.ajax({
          type: 'GET',
          url: url,
		  dataType: "text",
		  success: function(data) {
			  alert(url+' '+data);
			if (data=='false') { 
			$('#emailgroup').addClass('has-error');
			$('.results').html('Такой E-mail не существует!');
			
			} */
			
			else { 
				
				 var msg   = $('#form_reg').serialize();
					$.ajax({
					  type: 'POST',
					  url: 'registration.php',
					  data: msg,
					  success: function(data) {
						if (data=='error') { $('.results').html('Такой E-mail уже зарегистрирован!');
											$('#emailgroup').addClass('has-error');} else
					  if (data=='ok') {document.location.href = '/'; } else $('.results').html(data)
												
											
					  },
					  error:  function(xhr, str){
					alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
				
			}
							
         /*  },
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          } 
        })*/
	
 	 
	 }
   // } 
	

<? } else echo ("Слоны идут нахер!"); ?>