<?
session_start();
require_once ('../config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ ?>
function verify_email() {
		 $('#verify_email').modal('hide');
 	  var msg   = $('#verify_email').serialize();
        $.ajax({
          type: 'POST',
          url: '/verify/email/vemail.php',
          data: msg,
          success: function(data) {
			
		  if (data=='ok') {$('.novemail').html('Письмо отправлено.');
		  $('.vemaillink').html('Отправить повторно');
		   $('#vemail_ok').modal('show');
		  } else $('.results_form').html(data);
									
								
          },
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	}
	

<? } else echo ("Слоны идут нахер!"); ?>