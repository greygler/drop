<?
session_start();
require_once ('../config.php');
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
          url: '/action/update_password.php',
          data: msg,
          success: function(data) {
			if (data=='error') { $('.results').html('Пароль не верный!');
								$('#password_group').addClass('has-error');} else
		  if (data=='ok') {$('#update_password').modal('hide');$('#password_ok').modal('show'); } else $('.results').html(data)
									
								
          },
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	}
    }
	
function data_form() {
		 	
 	  var msg   = $('#data_form').serialize();
        $.ajax({
          type: 'POST',
          url: '/action/update_profile.php',
          data: msg,
          success: function(data) {
			
		  if (data=='ok') {$('#form_ok').modal('show'); } else $('results_form').html(data);
									
								
          },
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	}
	

<? } else echo ("Слоны идут нахер!"); ?>