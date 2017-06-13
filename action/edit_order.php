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
<?= systems::head(); ?>
<div class="container container_user_data">
<div class="page-header">
		<h1 style="margin: 0px 0 10px 0;"><small>Заказ #<?= $order_id ?></small></h1>
</div>
<form>
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
  <textarea class="form-control" rows="3" value="comment"><?= $order['comment'] ?></textarea>

  
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

<dl class="dl-horizontal dl-order">
<?  
		//print_r($products);
		foreach($products as $key => $value){
			if ($value['count']!="") $count=$value['count']; else $count=$value['quantity'];
			$product=drop::one_product($value['product_id']);
			$sum=$count*$value['price'];
			$drop_sum=$count*$product['price'];
			$prof=$sum-$drop_sum;
		?>
			<dt><?= $key ?>. </dt>
		<dd>
		<a data-fancybox data-src="<?= ACTION_PATH ?>/one_product.php?id=<?= $value['product_id']; ?>" href="javascript:;javascript:window.location.reload();"><strong> <?= $product['name']; ?></strong> <small>(Цена: <?= $product['price']; ?> <?= CURRENCY ?>)</small></a></dd>
		
		<dt><i class="fa fa-shopping-cart sprice" aria-hidden="true"></i></dt>
		<dd><strong><?= $count ?> шт.</strong> <small><i class="fa fa-times" aria-hidden="true"></i></small> <strong> <?= $value['price'] ?> <?= CURRENCY ?></strong> = <?= $sum ?> <?= CURRENCY ?> <span class="badge pull-right">Profit: <?= $prof ?> <?= CURRENCY ?><span> </dd>
		
		<? } ?>
		
		<dt>
		<? if ($order['profit'] > 0) {$label="fa-line-chart"; $style="color: green";}
			else if ($order['profit'] < 0) {$label="fa-thumbs-down"; $style="color: red";}
			else {$label="fa-battery-empty"; $style="color: #5b6064";}	?>
		<i style="<?= $style ?>" class="fa <?= $label ?>" aria-hidden="true"></i></dt>
		<dd><strong style="<?= $style ?>"><?= $order['profit'] ?> <?= CURRENCY ?></strong></dd>
		
		</dl>


</div>
<div>
<h3 class="text-center"><span class="fa fa-shopping-cart  fa-lg"></span> <strong>Доставка:</strong></h3>
<dl class="dl-horizontal dl-order">
		<? if ($order['delivery_adress']!="")  { if ($order['delivery_index']!="") $delivery_index=$order['delivery_index'].', ';
		echo ('<dt><i class="fa fa-map-marker" aria-hidden="true"></i></dt><dd>'.$delivery_index.$order['delivery_adress'].'</dd>'); }?>
		<? if ($order['delivery']!="") echo ('<dt><i class="fa fa-truck" aria-hidden="true"></i></dt><dd>'.$order['delivery'].'</dd>');?>
		
		<? if (($order['delivery_date']!='0000-00-00 00:00:00') AND ($order['delivery_date']!='')) echo ('<dt><i class="fa fa-clock-o" aria-hidden="true"></i></dt><dd>'.$order['delivery_date'].'</dd>');  ?>
		<? if ($order['ttn']!="") echo ('<dt><i class="fa fa-file-text" aria-hidden="true"></i></dt><dd>'.$order['ttn'].'</dd>'); ?>
		<? if ($order['ttn_status']!="") echo('<dt><i class="fa fa-check-square" aria-hidden="true"></i></dt><dd>'.$order['ttn_status'].'</dd>'); ?>
		</dl>
</div>


</div>
<input type="hidden" name="order_time" value="<?= $order_time ?>">
<input type="hidden" name="order_id" value="<?= $order_id ?>">
<input type="hidden" name="order_ip" value="<?= $order_id ?>">
<div class="form-group col-sm-6 col-sm-offset-3 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6"><button class="btn btn-primary btn-block"><h4 ><span class="fa fa-save fa-lg"></span> Сохранить</h4></div>

</form>
<script src="<?= JS_PATH ?>/jquery.min.js"></script> 
<!-- <script src="//code.jquery.com/jquery-3.1.1.min.js"></script> -->
<script type="text/javascript"> $(document).ready(function() {$('#stat_block').height($('#user_block').height());}); </script>
	<script src="<?= JS_PATH ?>/bootstrap.min.js"></script>
	<? if ($_GET['edit']=="on") { ?>
    <script src="<?= JS_PATH ?>/jquery.maskedinput.js"></script>
<script type="text/javascript"> jQuery(function($){$(".phone").mask("<?= MASK_PHONE ?>");}); </script>
	<? } ?>
  </body>
</html>
<?// } else echo ("Слоны идут нахер!"); ?>