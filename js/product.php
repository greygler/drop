<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ ?>
function product_form(id) {
	//valert($('#checkbox_'+id).is(':checked'));
	if (!$('#checkbox_'+id).is(':checked')) 
		var active='0'; else var active='1';
 	 
        $.ajax({
          type: 'POST',
          url: '<?= ACTION_PATH ?>/update_active.php',
          data:
		  {
			  id : id,
			  active : active,
		  },
          success: function(data) { 
		  //valert(data);
		  if (data=='ok'){
			  if (active!='0') {
			  $('.active_'+id).html('<font color="blue"><samll>Доступен к продаже</small></font>');
			  $('#button_'+id).removeClass('btn-default');
			  $('#button_'+id).addClass('btn-info');
			  }
			  else {
				  $('.active_'+id).html('<small>Не доступен к продаже</small>');
				  $('#button_'+id).addClass('btn-default');
			      $('#button_'+id).removeClass('btn-info');
			  }
			  
		  }
		  else $('.active_'+id).html('<font color="red">Ошибка!</font>'); 
		  },
          error:  function(xhr, str){
			valert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	}
	
	
	function new_image(id)
{
	$('#refresh_code_'+id).addClass('fa-spin');
	var $input = $("#new-img_"+id);
    var fd = new FormData;

    fd.append('img', $input.prop('files')[0]);
	fd.append('id', id);
	$.ajax({
          type: 'POST',
          url: '<?= ACTION_PATH ?>/new_image.php',
		  data: fd,
          processData: false,
          contentType: false,
          success: function(data) { 
		  //valert(data);
		  if (data!="error") {
		  $("#img_"+id).attr("src","<?= IMG_PRODUCT_PATH ?>"+data);
			$('#ref-button_'+id).attr("disabled","disabled");		  }
		   
		  $('#refresh_code_'+id).removeClass('fa-spin');
		  },
          error:  function(xhr, str){
			valert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
		
}

	function hide_form(id)
	{
		$('#new_img_but_'+id).addClass('hide');
		$('#del_img_but_'+id).addClass('hide');
		$('#img_'+id).removeClass('fleft');
		$('#new-img-form_'+id).removeClass('hide');
	}
	
	function del_img(id)
	{
		 $.ajax({
          type: 'POST',
          url: '<?= ACTION_PATH ?>/del_image.php',
          data:
		  {
			  id : id,
			  pic_name : $("#img_"+id).attr("src"),
			  
		  },
          success: function(data) { 
		 // valert(data);
		 $('#del_img_but_'+id).addClass('hide');
		  $("#img_"+id).attr("src",data);
		    },
          error:  function(xhr, str){
			valert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	}

<? } else header("Location: ".SITE_ADDR."/error/666.php"); ?>