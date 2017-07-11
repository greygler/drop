<?
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
//if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ ?> 

function order_pay_go(id){	
 var msg   = $('#order_form_go').serialize();
    
	   $.ajax({
          type: 'POST',
          url: '<?= ACTION_PATH ?>/user_pay_go.php',
          data: msg,
          success: function(data) {
			//alert(data);
		  if (data!='error') {
			   var order_summ = $('#order_summ').val();
			  $('.pay_order_result').html('Присвоен статус <strong>'+data+'</strong> успешно.');
			  $('#order-pay_button').html('Присвоен статус <strong>'+data+'</strong>');
			  $('#op_modal_button').addClass('hide');
			  $('#op_modal_cancel').html("Ok");
			  $('#frame_history')[0].contentWindow.location.reload(true);
			  $('#user-pay_modal').modal('hide');
			 // $("#frame_history").load(location.href+" #frame_history>*","");
		  } else $('.pay_order_result').html(data);
									
								
          },
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
}
	
<?// } else header("Location: ".SITE_ADDR."/error/666.php"); ?>
  