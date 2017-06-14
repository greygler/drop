<? session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
//if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/db.class.php'); 
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/favicon.class.php');
require_once (CLASS_PATH.'/autoring.class.php'); 
require_once (CLASS_PATH.'/drop.class.php');
if (!autoring::is_autoring()) header("Location: ../login/");
require_once (CLASS_PATH.'/systems.class.php');
 if ($_GET['edit']!="on") {
	 $order=drop::one_order($_GET['id']);
	 $products = unserialize(urldecode($order['products']));
	 $order_time=$order['order_time'];
	 $order_id=$order['order_id'];
	 $order_ip=$order['ip'];
	 $flag="flag-".$order['country']; 
 }
 else {
	 $order_time=time();
	 $order_id=number_format(round(microtime(true)*10),0,'.','');
	 $order_ip=$_SERVER['REMOTE_ADDR'];
	 $flag="fa fa-flag ";
 }
//print_r($user);
?>
<?= systems::head();

if (($order!="") AND ($order['lp-crm']!=1))  echo("Редактировать можно!") ?>

<div class="container container_user_data">
<div class="page-header">
		<h1 style="margin: 0px 0 10px 0;"><small>Заказ #<?= $order_id ?></small></h1>
</div>


<script src="<?= JS_PATH ?>/edit_order.php"></script>
	


<form id="product-form"  action="javascript:void(null);" onsubmit="save()">
<div>
<div class="form-group col-sm-3 col-md-3 col-lg-3 text-left"><button class="btn btn-default"><h4 ><span class="fa fa-calendar-plus-o fa-lg"></span> <?= date("d.m.Y H:i.s", $order_time); ?></h4></div>

<div class="form-group col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2 col-lg-2 col-lg-offset-2 text-right">
<button class="btn btn-default btn-block"><h4 ><i class="<?= $flag ?>"></i> <?= $order_ip ?></h4 ></button>
</div>

<div class="form-group col-sm-3 col-sm-offset-2 col-md-3 col-md-offset-2 col-lg-offset-2 col-lg-3 text-right">
<? if ($_GET['edit']!="on") { ?>
 <a class=" btn btn-default " target="_blank" href="http://<?= $order['site'] ?>"><h4 >Источник заказа:  <?= $order['site'] ?> <span class="fa fa-external-link fa-lg"></span></h4></a><? } 
 else { ?>
 <button class="btn btn-default"><h4 >Добавлен вручную</h4></button>
 <? } ?></div> 
 </div>
<div id="user_block" class="col-sm-6 col-md-6 col-lg-6 panel panel-default"><h3 class="text-center"><span class="fa fa-address-card-o fa-lg"></span> Покупатель:</h3>
<dl class="dl-horizontal">
  <dt>Имя покупателя:</dt>
  <dd><div class="form-group"><input class="form-control" type="text" name="bayer_name" value="<?= $order['bayer_name']?>" required placeholder="Имя заказчика">
  </div></dd>
  <dt>Phone:</dt>
  <dd>
  <div class="form-group">
  <input type="text" class="form-control phone" name="phone" value="<?= $order['phone'] ?>" required placeholder="Телефон заказчика">
  </div></dd>
   <dt>E-mail:</dt>
  <dd>
  <div class="form-group">
  <input type="email" class="form-control" name="email" value="<?= $order['email'] ?>"  placeholder="Email заказчика">
  </div></dd>
  <dt>Комментарий:</dt>
  <dd>
  <div class="form-group">
  <textarea name="comment" class="form-control" rows="3" value="comment"><?= $order['comment'] ?></textarea>

  
  </div></dd>
  </dl>
 <? if ($_GET['edit']!="on") { ?>
  <h4>UTM-метки:</h4><dl class="dl-horizontal">
	<? if ($order['utm_source']!="") echo("<dt ><strong>utm_source:</strong></dt> <dd class=\"text-left\">{$order['utm_source']}</dd>"); ?>
	<? if ($order['utm_medium']!="") echo("<dt><strong>utm_medium:</strong></dt> <dd class=\"text-left\">{$order['utm_medium']}</dd>"); ?>
	<? if ($order['utm_term']!="") echo("<dt><strong>utm_term:</strong></dt> <dd class=\"text-left\">{$order['utm_term']}</dd>"); ?>
	<? if ($order['utm_content']!="") echo("<dt><strong>utm_content:</strong></dt> <dd class=\"text-left\">{$order['utm_content']}</dd>"); ?>
	<? if ($order['utm_campaign']!="") echo("<dt><strong>utm_campaign:</strong></dt> <dd class=\"text-left\">{$order['utm_campaign']}</dd>"); ?>
     
 </dl><? } ?>
</div>
<div id="stat_block" class="col-sm-6 col-md-6 col-lg-6 panel panel-default">
<div>
<h3 class="text-center"><span class="fa fa-shopping-cart  fa-lg"></span> <strong>Покупка:</strong></h3>

		
		
		<table id="prod_tab" class="table-responsive table-striped">
		<thead>

	<tr>
		<th rowspan="2"><a id="add_button" onclick="add_pos('prod_tab')" title="Добавить позицию" class="btn btn-info"><i class="fa fa-plus-square" aria-hidden="true"></i></div></a></th>
		<th rowspan="2">Название, цена</th>
		<th>Продажа</th>
		<th>К-во</th>
		<th>Стоим.</th>
		<th>Profit</th>
	</tr>
	<tr>
		<th><small><?= CURRENCY ?></small></th>
		<th><small>шт.</small></th>
		<th><small><?= CURRENCY ?></small></th>
		<th><small><?= CURRENCY ?></small></th>
	</tr>
	</thead>
	
		<tbody> 
		<? if ($_GET['edit']!='on') { 
		$vsego=count($products);
		foreach($products as $key => $value){
			if ($value['count']!="") $count=$value['count']; else $count=$value['quantity'];
			$product=drop::one_product($value['product_id']);
			$sum=$count*$value['price'];
			$drop_sum=$count*$product['price'];
			$prof=$sum-$drop_sum;
		?>
		<tr id="del_pos_<?= $key ?>">
		<td><a id="del_button_<?= $key ?>" onclick="del(<?= $key ?>,'<?= $product['name']; ?>',<?= $vsego ?>)" title="Удалить позицию" class="btn btn-warning"><div class="del_<?= $key ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></div></a>
		<div class="deldiv_<?= $key ?>"></div></td>
		<td><strong id="product_name_<?= $key ?>"><?= $product['name']; ?></strong><br><small>(Цена: <?= $product['price']; ?> <?= CURRENCY ?>)</small></td>
		<input type="hidden" name="product_id[<?= $key ?>]" value="<?= $value['product_id'] ?>">
		<td>
		
		<input id="price_<?= $key?>" onchange="profit(<?= $key?>,<?= $product['price']; ?>,<?= $vsego ?>)" style="max-width: 70px" type="number" class="form-conrol text-right" name="price[<?= $key ?>]" value="<?= $value['price'] ?>">
		</td>
		<td><input id="count_<?= $key?>" onchange="profit(<?= $key?>,<?= $product['price']; ?>,<?= $vsego ?>)" style="max-width: 50px" type="number" class="form-conrol text-right" name="count[<?= $key ?>]" value="<?= $count ?>">
		</td>
		<td><div class="sum_<?= $key?>"><?= number_format($sum, 2, '.', '') ?></div></td>
		<td><div class="prof_<?= $key?>"><?= number_format($prof, 2, '.', '') ?></div></td>
		</tr> <? } ?>
		</tbody>
		<? if ($order['profit'] > 0) {$label="fa-line-chart"; $style="profit_green";}
			else if ($order['profit'] < 0) {$label="fa-thumbs-down"; $style="profit_red";}
			else {$label="fa-battery-empty"; $style="profit_empty";}	?>
		<tr style="background-color: lightblue">
		
		<td><span id="profit_symbol" class="<?= $style ?>"><i  class="fa <?= $label ?> fa-lg" aria-hidden="true"></i></span></td>
		<td >
		<p align="right"><strong>Итого,</strong> <small class="vsego"><?= $key ?></small><small> поз.:</small></td>
		<td>&nbsp;</td>
		<td></td>
		
		<td><div class="total"><?= $order['total'] ?></div></td>
		<td><strong id="profit_itogo" class="profit <?= $style ?>" ><?= $order['profit'] ?> </strong></td>
	</tr>

		 <? } ?>
		
		</table>


</div>
<div>
<h3 class="text-center"><span class="fa fa-shopping-cart  fa-lg"></span> <strong>Доставка:</strong></h3>
<dl class="dl-horizontal">
				
		<dt><i class="fa fa-map-marker" aria-hidden="true"></i> Адрес доставки:</dt><dd>
		<div class="form-group">
		<input type="text" class="form-control" name="delivery_adress" value="<?= $order['delivery_adress'] ?>"></div></dd>
		<dt><i class="fa fa-truck" aria-hidden="true"></i> Способ доставки:</dt><dd><div class="form-group">
		<button disabled class="btn btn-default btn-block"><? if ($order['delivery']!="") echo $order['delivery']; else echo CRM_DELIVERY_NAME  ?></button></div></dd>
		<dt><i class="fa fa-clock-o" aria-hidden="true"></i> Дата, время: </dt><dd><div class="form-group"><button disabled class="btn btn-default btn-block"><? if ((($order['delivery_date']!='0000-00-00 00:00:00') AND ($order['delivery_date']!='')) AND ($_GET['edit']!='on')) echo $order['delivery_date']; else echo("Нет данных"); ?></button></div></dd>
		<dt><i class="fa fa-file-text" aria-hidden="true"></i> ТТН: </dt><dd><div class="form-group">
		<button disabled class="btn btn-default btn-block"><? if ($order['ttn']!="") echo ($order['ttn']); else echo("Нет данных"); ?></button></div></dd>
		<dt><i class="fa fa-check-square" aria-hidden="true"></i> Статус ТТН: </dt><dd><button disabled class="btn btn-default btn-block"><? if ($order['ttn_status']!="") echo ($order['ttn_status']); else echo("Нет данных"); ?></button></div></dd>
		
		<? if ($order['ttn_status']!="") echo('<dt><i class="fa fa-check-square" aria-hidden="true"></i></dt><dd>'.$order['ttn_status'].'</dd>'); ?>
		</dl>
</div>



<input type="hidden" name="order_time" value="<?= $order_time ?>">
<input type="hidden" name="order_id" value="<?= $order_id ?>">
<input type="hidden" name="order_ip" value="<?= $order_ip ?>">
<input id="inp_total" type="hidden" name="total" value="<?= $order['total'] ?>">
<input id="inp_profit" type="hidden" name="form_profit" value="<?= $order['profit'] ?>">
<div class="form-group col-sm-6 col-sm-offset-3 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6"><button type="submit" class="btn btn-primary btn-block"><h4 ><span class="fa fa-save fa-lg"></span> Сохранить</h4></div>

</form></div>
<script src="<?= JS_PATH ?>/jquery.min.js"></script> 
<!-- <script src="//code.jquery.com/jquery-3.1.1.min.js"></script> -->
<script type="text/javascript"> $(document).ready(function() 
{	var stat_block=$('#stat_block').height();
	var user_block=$('#user_block').height();
	if (stat_block>user_block){var big_block=stat_block;}
	else {var big_blok=userblock;}
	$('#stat_block').height(big_block);
	$('#user_block').height(big_block);
	}); 

</script>
	<script src="<?= JS_PATH ?>/bootstrap.min.js"></script>
	<? if ($_GET['edit']=="on") { ?>
    <script src="<?= JS_PATH ?>/jquery.maskedinput.js"></script>
<script type="text/javascript"> jQuery(function($){$(".phone").mask("<?= MASK_PHONE ?>");}); </script>
	<? } ?>
  </body>
</html>
<?// } else echo ("Слоны идут нахер!"); ?>