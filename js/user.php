<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ ?>
function update_password() {
		 if ($('#password1').val()!=$('#password2').val())
          { $('.results').html('Пароли не совпадают!');
								$('#password1_group').addClass('has-error');
								$('#password2_group').addClass('has-error');} else {
								$('#password1_group').removeClass('has-error');
								$('#password2_group').removeClass('has-error');

								
	
 	  var msg   = $('#form_pass').serialize();
        $.ajax({
          type: 'POST',
          url: '<?= ACTION_PATH ?>/update_password.php',
          data: msg,
          success: function(data) {
			if (data=='error') { $('.results').html('Пароль не верный!');
								$('#password_group').addClass('has-error');} else
		  if (data=='ok') {$('#update_password').modal('hide');$('#password_ok').modal('show'); } else $('.results').html(data)
									
								
          },
          error:  function(xhr, str){
	    valert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	}
    }
	
function data_form() {
		 	
 	  var msg   = $('#data_form').serialize();
        $.ajax({
          type: 'POST',
          url: '<?= ACTION_PATH ?>/update_profile.php',
          data: msg,
          success: function(data) {
			valert(data)
		  if (data=='ok') {
			  var user_name = $('#user_name_input').val()
			  $('.user_name').html(user_name);
			  
			  $('#form_ok').modal('show');

		  } else $('.results_form').html(data);
									
								
          },
          error:  function(xhr, str){
	    valert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	}
	
	function tbot() {
		$.ajax({
		  type: 'POST',
          url: '<?= ACTION_PATH ?>/tbot.php',
          data: {
			  bot_id : $('#tbot_id').val(),
		  },
          success: function(data) {
			// valert(data)
			$('#tbot_button').html('Верификация бота...');
			$('#tbot').modal('hide');$('#tbot_ver').modal('show');
									
								
          },
          error:  function(xhr, str){
	    valert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	}
	
	function tbot_ver() {
		$.ajax({
		  type: 'POST',
          url: '<?= ACTION_PATH ?>/tbot_ver.php',
          data: {
			  bot_ver_code : $('#tbot_ver_code').val(),
		  },
          success: function(data) {
			  valert($('#tbot_ver_code').val());
			valert(data);
			$('#tbot_button').html(data);
			$('#tbot_button').attr("disabled","disabled");	
			$('#tbot_ver').modal('hide');
									
								
          },
          error:  function(xhr, str){
	    valert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	}
	

<? } else header("Location: ".SITE_ADDR."/error/666.php"); ?>