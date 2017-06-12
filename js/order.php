<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ ?>
function upload(id, row_id)
{
	$('.upload_'+row_id).html('<i class="fa fa-refresh fa-spin fa-lg fa-fw"></i>');
	
	 $.ajax({
          type: 'POST',
          url: '<?= ACTION_PATH ?>/update_lpcrm.php',
          data: {
			  id : id,
			  row_id : row_id
		  },
        success: function(data) {
			//alert(data);
			if (data=='ok'){
			$('#upload_button_'+row_id).removeClass('btn-danger');
			$('#upload_button_'+row_id).addClass('btn-primary');
			$('.upload_'+row_id).html('<i class="fa fa-check fa-lg" aria-hidden="true"></i>');
			$('#upload_button_'+row_id).attr("disabled","disabled");
			}
			else {
			$('.upload_'+row_id).html('<i class="fa fa-exclamation-triangle fa-lg" aria-hidden="true"></i>');
			$('#upload_button_'+row_id).attr("disabled","disabled");
			}
		},
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	
}
	

<? } else echo ("Слоны идут нахер!"); ?>