<?
session_start();
require_once ('../config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ ?>
function save_group(id) {
	 var group_user = $('#group_user-'+id).val();
	 var balance = $('#balance_'+id).val();
	 
  $.ajax({
        type: "POST",
        url: "../action/save_group.php",
        data: {
                'id': id, 
                'group_user':group_user
            },
            
            //dataType: "json",
          
            success: function(data){
				
				$('#fa-user-'+id).html(data);
				if (group_user==0) {
					$('#table-'+id).addClass('danger');
					$('#btn_user-'+id).addClass('btn-danger');
					$('#btn_user-'+id).removeClass('btn-default');
					$('#fa-user-'+id).addClass('text_white');
					$('#fa-user-'+id).removeClass('drop_color');
					$('#btn_balance-'+id).addClass('btn-danger');
					$('#btn_balance-'+id).removeClass('btn-default');
					$('#btn_balance-'+id).addClass('text_white');
					$('#btn_balance-'+id).removeClass('drop_color');
				}
				else {
					$('#table-'+id).removeClass('danger');
					$('#btn_user-'+id).removeClass('btn-danger');
					$('#btn_user-'+id).addClass('btn-default');
					$('#fa-user-'+id).removeClass('text_white');
					$('#fa-user-'+id).addClass('drop_color');
					if (balance<0) {
						$('#btn_balance-'+id).addClass('btn-danger');
						$('#btn_balance-'+id).addClass('text_white');
						$('#btn_balance-'+id).removeClass('drop_color');
						$('#btn_user-'+id).addClass('btn-warning');
						$('#btn_user-'+id).removeClass('btn-default');
					} else
						if (balance>0) {
						$('#btn_balance-'+id).addClass('btn-success');
						$('#btn_balance-'+id).addClass('text_white');
						$('#btn_balance-'+id).removeClass('drop_color');
						$('#btn_balance-'+id).removeClass('btn-default');
						$('#btn_balance-'+id).removeClass('btn-danger');
					} else
						
					{
					$('#btn_balance-'+id).addClass('btn-default');
					$('#btn_balance-'+id).removeClass('btn-danger');
					$('#btn_balance-'+id).removeClass('text_white');
					$('#btn_balance-'+id).addClass('drop_color');
					}
				}
			}
  })
 
}

	

<? } else echo ("Слоны идут нахер!");
?>