<?
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ ?> 


function order_pay(id){	
 var msg   = $('#order_form').serialize();
    
	   $.ajax({
          type: 'POST',
          url: '<?= ACTION_PATH ?>/order_pay.php',
          data: msg,
          success: function(data) {
			//valert(data);
		  if (data=='ok') {
			   var order_summ = $('#order_summ').val();
			  $('.pay_order_result').html('Заказ на выплату принят успешно');
			  $('#order-pay_button').html('Заказана выплата '+order_summ+'&#160;'+"<?= CURRENCY ?>");
			  $('#order-pay_button').attr("disabled","disabled");
			  $('#op_modal_button').addClass('hide');
			  $('#op_modal_cancel').html("Ok");
			  

		  } else $('.pay_order_result').html(data);
									
								
          },
          error:  function(xhr, str){
	    valert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
}
	
<? } else header("Location: ".SITE_ADDR."/error/666.php"); ?>
  