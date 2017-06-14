<?
require_once ('../config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ ?> 



	function ref(key, price_form,count_form,price,vsego){
		var sum=price_form*count_form;
				var itogo_price=count_form*price;
				var prof=sum-itogo_price;
				$('.sum_'+key).html(sum+'.00');
				$('.prof_'+key).html(prof+'.00');
				var itogo_sum=0;
				var itogo_prof=0;
				for (i = 1; i <= vsego; i++) {
					itogo_sum=itogo_sum+Number($('.sum_'+i).html());
					itogo_prof=itogo_prof+Number($('.prof_'+i).html());
					}
				$('.total').html(itogo_sum+'.00');
				$('.profit').html(itogo_prof+'.00');
				$('#inp_total').val(itogo_sum);
				$('#inp_profit').val(itogo_prof);
				
				if (Number(itogo_prof)==0) 
				{
					
				$('#profit_symbol').removeClass('profit_green');
				$('#profit_symbol').removeClass('profit_red');
				$('#profit_symbol').removeClass('profit_empty');
				$('#profit_symbol').addClass('profit_empty');
				$('#profit_itogo').removeClass('profit_green');
				$('#profit_itogo').removeClass('profit_red');
				$('#profit_itogo').removeClass('profit_empty');
				$('#profit_itogo').addClass('profit_empty');
				$('#profit_symbol').html('<i  class="fa fa-battery-empty fa-lg" aria-hidden="true"></i>');
				}
				
				else if (Number(itogo_prof)>0) {
				$('#profit_itogo').removeClass('profit_green');
				$('#profit_itogo').removeClass('profit_red');
				$('#profit_itogo').removeClass('profit_empty');
				$('#profit_itogo').addClass('profit_green');	
				$('#profit_symbol').removeClass('profit_green');
				$('#profit_symbol').removeClass('profit_red');
				$('#profit_symbol').removeClass('profit_empty');
				$('#profit_symbol').addClass('profit_green');
				$('#profit_symbol').html('<i  class="fa fa-line-chart fa-lg" aria-hidden="true"></i>');
				}
				else 
					{
				$('#profit_itogo').removeClass('profit_green');
				$('#profit_itogo').removeClass('profit_red');
				$('#profit_itogo').removeClass('profit_empty');
				$('#profit_itogo').addClass('profit_red');
				$('#profit_symbol').removeClass('profit_green');
				$('#profit_symbol').removeClass('profit_empty');
				$('#profit_symbol').removeClass('profit_red');
				$('#profit_symbol').addClass('profit_red');
				$('#profit_symbol').html('<i  class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i>');
				}
				
	}
	
	function profit(key, price, vsego)
	{
		var price_form=$('#price_'+key).val();
		var count_form=$('#count_'+key).val();
		if (price_form==price)  var prib=confirm('Вы собираетесь продавать без профита?'); else var prib=true;
			if (prib){
		
				if (price_form<price) {alert('Ваша цена не может быть ниже цены продажи!'); $('#price_'+key).val(price);
				price_form=price;
				ref(key, price_form,count_form,price, vsego) }
				else
					
					if (count_form<=0) {alert('Колличество товара не может быть меньше или равна нулю!'); $('#count_'+key).val('1');
					count_form='1';
					ref(key, price_form,count_form,price, vsego)}
				else{
				ref(key, price_form,count_form,price, vsego);
				}
		
			}
		else return false;
		
		
	}
	
	function del(key, product_name,vsego_f){
		var res_del=confirm('Вы действительно хотите удалить из заказа\nтовар "'+product_name+'"?');
		if (res_del){
		$('#count_'+key).val('0');
		ref(key, 0,0,0,vsego_f);
		$('#del_button_'+key).attr("disabled","disabled");
		vsego=Number($('.vsego').html())-1;
		$('.vsego').html(vsego);
		$('#del_pos_'+key).addClass('hide');
		//alert(key);
		}
	}
	
	
	
	function save()
	{ 				
		 var msg = $('#product-form').serialize();
		 alert(msg);
				$.ajax({
				  type: 'POST',
				  url: '<?= ACTION_PATH ?>/save_order.php',
				  data: msg,
				  success: function(data) {
					
					alert(data);							
										
				  },
				  error:  function(xhr, str){
				alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
				
	}
	
	function add_pos(id)
	{
		alert('sdf');
	}



  <? } else echo ("Слоны идут нахер!"); ?>