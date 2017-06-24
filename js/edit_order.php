<?
require_once ('../config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ ?> 

	function calc_prod()
		{				
				var itogo_sum=0;
				var itogo_prof=0;
				var count=Number($('#all-count').val());
				for (i = 1; i <= count; i++) {
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



	function ref(key, price_form,count_form,price,vsego){
		var sum=price_form*count_form;
				var itogo_price=count_form*price;
				var prof=sum-itogo_price;
				$('.sum_'+key).html(sum+'.00');
				$('.prof_'+key).html(prof+'.00');
				
				calc_prod();
				
				
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
	
	function del(key, product_name){
		var res_del=confirm('Вы действительно хотите удалить из заказа\nтовар "'+product_name+'"?');
		if (res_del){
		var stat_block=$('#stat_block').height();
		$('#count_'+key).val('0');
		var vsego_f=$('.vsego').html();
		ref(key, 0,0,0,vsego_f);
		$('#del_button_'+key).attr("disabled","disabled");
		vsego=Number($('.vsego').html())-1;
		$('.vsego').html(vsego);
		var new_prod_block=$('#del_pos_'+key).height();
		$('#del_pos_'+key).addClass('hide');
		calc_prod();
		$("#prod_select [value='"+key+"']").attr("disabled","");
		$('#prod_select option:selected').each(function(){this.selected=false;});
		
		var new_block=stat_block-new_prod_block;
		
		$('#stat_block').height(new_block);
		$('#user_block').height(new_block);
		//alert(key);
		}
	}
	
	
	
	function save()
	{ 				
	//alert()
	if ($("#bayer_name").val()=="") {
		$("#bayer_name").focus();
		alert("Нет данных о имени заказчика");
		
	}
	else if ($("#bayer_phone").val()=="") {
		$("#bayer_phone").focus();
		alert("Нет данных о телефоне заказчика");
	}
	else if (Number($(".vsego").html())<1) {
		alert("Нет товаров в заказе");
	}
	else{
		 var msg = $('#product-form').serialize();
		// alert(msg);
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
	}
	
	function add_pos(form)
	{
		$('#add_pos').modal('hide');
		var sel = document.getElementById("prod_select");
		var val = sel.options[sel.selectedIndex].value; 		
		var txt = sel.options[sel.selectedIndex].text;
		var price = form.elements['price_'+val].value;
		//alert(price);
		var count=Number($('#all-count').val())+1;
		var pos = Number($('.vsego').html())+1;
		$('.vsego').html(pos);
		$('#all-count').val(count);
		//alert(txt);
		var stat_block=$('#stat_block').height();
		
	$('#prod_tab > tbody:first').append('<tr id="del_pos_'+count+'"><td><a id="del_button_'+count+'" onclick="del('+count+",'"+txt+"'"+')" title="Удалить позицию" class="btn btn-warning"><div class="del_<?= $pos ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></div></a><div class="deldiv_<?= $pos ?>"></div></td><input type="hidden" name="product_id['+count+']" value="'+val+'"><td>'+txt+'</td><td><input id="price_'+count+'" onchange="profit('+count+','+price+','+count+')" style="max-width: 70px" type="number" class="form-conrol text-right" name="price['+count+']" value="'+price+'" ></td><td><input id="count_'+count+'" onchange="profit('+count+','+price+','+count+')" style="max-width: 50px" type="number" class="form-conrol text-right" name="count['+count+']" value="1" min="1"></td><td><div class="sum_'+count+'"></div></td><td><div class="prof_'+count+'"></div></td></tr>');
	$("#prod_select option[value='"+val+"']").attr("disabled","disabled");
	$('#prod_select option:selected').each(function(){this.selected=false;});
	$("#prod_select option[value='0']").attr("selected", "selected");
		var new_prod_block=$('#del_pos_'+count).height();
		var new_block=stat_block+new_prod_block;
		
		$('#stat_block').height(new_block);
		$('#user_block').height(new_block);
		profit(pos, price, pos);
		
	}



  <? } else header("Location: ".SITE_ADDR."/error/666.php"); ?>