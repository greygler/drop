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
			$('#del_button_'+row_id).attr("disabled","disabled");
			$('#edit_button_'+row_id).attr("disabled","disabled");
			}
			else {
				
			$('.upload_'+row_id).html('<i class="fa fa-exclamation-triangle fa-lg" aria-hidden="true"></i>');
			$('#upload_button_'+row_id).attr("disabled","disabled");
			alert('⚠️ Ошибка при передаче:\n'+data);
			}
		},
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	
}

function del(row_id, order_id)
{
	$('.del_'+row_id).html('<i class="fa fa-refresh fa-spin fa-lg fa-fw"></i>');
	var result = confirm('Вы действительно\nхотите удалить заказ #'+order_id+'?');
	if (result) {
	 $.ajax({
          type: 'POST',
          url: '<?= ACTION_PATH ?>/del_lpcrm.php',
          data: {
			  row_id : row_id,
			  order_id : order_id
		  },
        success: function(data) {
			//alert(data);
			if (data=='ok'){
			$('#del_button_'+row_id).removeClass('btn-danger');
			$('#del_button_'+row_id).addClass('btn-primary');
			$('.del_'+row_id).html('<i class="fa fa-check fa-lg" aria-hidden="true"></i>');
			$('#upload_button_'+row_id).attr("disabled","disabled");
			$('#del_button_'+row_id).attr("disabled","disabled");
			$('#edit_button_'+row_id).attr("disabled","disabled");
			$('.deldiv_'+row_id).html('<font color="red">Заказ удален!</font>');
			}
			else {
				
			$('.del_'+row_id).html('<i class="fa fa-exclamation-triangle fa-lg" aria-hidden="true"></i>');
			$('#del_button_'+row_id).attr("disabled","disabled");
			alert(data);
			}
		},
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	} else $('.del_'+row_id).html('<i class="fa fa-trash-o" aria-hidden="true"></i>');
	
}
	

<? } else echo ("Слоны идут нахер!"); ?>