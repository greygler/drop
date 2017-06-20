<?
session_start();
require_once ('../config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ ?>
function call() {
		 			 ;
	
 	  var msg   = $('#form_reg').serialize();
        $.ajax({
          type: 'POST',
          url: 'login.php',
          data: msg,
          success: function(data) {
			if (data=='no') { $('.results').html('Такой E-mail не зарегистрирован!');
								$('#emailgroup').addClass('has-error');} else
			if (data=='error') { $('.results').html('E-mail или пароль не верны!');
								$('#emailgroup').addClass('has-error');
								$('#password_group').addClass('has-error');} else
								
		  if (data=='ok') {document.location.href = '/'; } else $('.results').html(data)
									
								
          },
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	
    }
	

<? } else header("Location: ".SITE_ADDR."/error/666.php");
?>