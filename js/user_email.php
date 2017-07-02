<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ ?>
function verify_email(user_id) {
		 $('#verify_email').modal('hide');
 	    $.ajax({
          type: 'POST',
          url: '<?= ACTION_PATH ?>/email.php',
          data: {
			  email : $('#user_email').val(),
			  name : $('#user_name_input').val(),
			  id : '1',
			  user_id : user_id,
		  },
          success: function(data) {
			
		  if (data=='') {$('.novemail').html('Письмо отправлено.');
		  $('.vemaillink').html('Отправить повторно');
		   $('#vemail_ok').modal('show');
		  } else $('.results_form').html(data);
									
								
          },
          error:  function(xhr, str){
	    valert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	}
	

<? } else header("Location: ".SITE_ADDR."/error/666.php"); ?>