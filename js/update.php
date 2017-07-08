<?
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
//if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ ?> 
 function update_user(id)
 {
	//alert("Обновляюсь");
	
	 $.ajax({
	  url: '<?= UPDATE_PATH ?>/update_user.php',
	  data: '',
	  success: function(data) {
		  var user=JSON.parse(data);
		  $('#balance').html(user.balance);
		  $('#money_mob').html(user.balance);
		  $("#aside1").load(location.href+" #aside1>*","");
		  $("#table_order").load(location.href+" #table_order>*","");
		  
		  if (user.balance<=0){
			  	$('#money').removeClass('color_green');
				$('#strong_balance').removeClass('color_green');
				$('#balance').removeClass('color_green');
				$('#money_mob').removeClass('bage_money_plus');
				if (user.balance<0){
					$('#money').addClass('color_red');
					$('#money_mob').addClass('bage_money_minus');
					$('#strong_balance').addClass('color_red');
					$('#balance').addClass('color_red');
					if (user_info_balance!='1') {$('#info_balance').modal('show');}
				}
				
		  } else {
			$('#money_mob').removeClass('bage_money_minus');
			$('#money_mob').addClass('bage_money_plus');
			$('#money').removeClass('color_red');
			$('#strong_balance').removeClass('color_red');
			$('#balance').removeClass('color_red');
			$('#money').addClass('color_green');
			$('#strong_balance').addClass('color_green');
			$('#balance').addClass('color_green');
		  }
		  $('#new_order').html('+'+user.sale);
		  $('#new_order_big').html('+'+user.sale);
		  if (user.sale>0){
			  	$('#new_order').removeClass('hide');
				$('#new_order_big').removeClass('hide');
		  }
		  else {
			  $('#new_order').addClass('hide');
			  $('#new_order_big').addClass('hide');
		  }
		//valert(user.report);  
		
		
	
	
	if (user.report!=undefined) {
		noti('Уведомление <?= TITLE ?>',user.report,'<?= NOTI ?>000');
		var audio = $("#noti")[0];
		audio.play();
	}
		  
	  }
});
	
 }
 
  <?// } else header("Location: ".SITE_ADDR."/error/666.php"); ?>
  