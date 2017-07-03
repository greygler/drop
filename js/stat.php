<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ ?>

function active_drop(id) {
	
	if ($('#checkbox_active').is(':checked')) 
		var active='1'; else var active='0';
		 	
 	    $.ajax({
          type: 'POST',
          url: '<?= ACTION_PATH ?>/active_drop.php',
          data: {
			  drop_active: active,
			  id : id
		  },
        success: function(data) {
			$('.active_drop').html(data);
		},
          error:  function(xhr, str){
	    valert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	}
	
	
function take_drop(id) {
	
	if ($('#checkbox_take').is(':checked')) 
		var active='1'; else var active='0';
		 	
 	    $.ajax({
          type: 'POST',
          url: '<?= ACTION_PATH ?>/take_drop.php',
          data: {
			  drop_take: active,
			  id : id
		  },
        success: function(data) {
			$('.take_drop').html(data);
		},
          error:  function(xhr, str){
	    valert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	}
	
function new_code(id)
{
	$('#refresh_code').addClass('fa-spin');
	var result = confirm('Вы действительно хотите пересоздать секретный токен?');
	
	if (result){
	$.ajax({
          type: 'POST',
          url: '<?= ACTION_PATH ?>/new_key.php',
          data: {id: id},
          success: function(data) { $("#drop_key").val(data); $('#refresh_code').removeClass('fa-spin');},
          error:  function(xhr, str){
			valert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
		
	}
	else {$('#refresh_code').removeClass('fa-spin');}
		
}

function active_tbot(id) {
	
	if ($('#checkbox_tbot').is(':checked')) 
		var active='1'; else var active='0';
		 	
 	    $.ajax({
          type: 'POST',
          url: '<?= ACTION_PATH ?>/active_tbot.php',
          data: {
			  tbox: active,
			  id : id
		  },
        success: function(data) {
			$('.active_tbot').html(data);
		},
          error:  function(xhr, str){
	    valert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	}
	

<? } else header("Location: ".SITE_ADDR."/error/666.php"); ?>