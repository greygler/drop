<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ ?>

function active_drop(id) {
	
	if ($('#checkbox').is(':checked')) 
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
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	}
	
function new_code(id)
{
	$('#refresh_code').addClass('fa-spin');
	$.ajax({
          type: 'POST',
          url: '<?= ACTION_PATH ?>/new_key.php',
          data: {id: id},
          success: function(data) { $("#drop_key").val(data); $('#refresh_code').removeClass('fa-spin');},
          error:  function(xhr, str){
			alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
		
}
	

<? } else echo ("Слоны идут нахер!"); ?>