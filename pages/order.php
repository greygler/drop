<h1></h1>

<script src="<?= JS_PATH ?>/order.php"></script>
<?
if ($_GET['status']!="") $get_status=$_GET['status']; else $get_status=3;
$all_status=drop::all_statuses();
 require_once (CLASS_PATH.'/pagination.class.php');
 if (($_SESSION['users_group']<5) AND ($_GET['orders']!="my")) $count_status=$all_status[$get_status]; 
else $count_status=$_SESSION['status'][$get_status]; 
$limit=pagination::limit_pagin($_GET,$count_status, $view_pages); 	?>
<div class="form-group">
<div class="form-group col-sm-2 col-md-2  col-lg-2 "> 
<? if ($_SESSION['users_group']<5) { ?>
<a href="/?type=order" class="btn <? if ($_GET['orders']!='my') echo ('btn-info'); else echo('btn-default'); ?> btn-block"><? if ($_GET['orders']!='my') echo ('<i class="fa fa-check" aria-hidden="true"></i>'); ?> Все заказы</a>
 <? } ?>
</div>
<div class="form-group col-sm-2 col-md-2 col-md-offset-1 col-lg-2 col-lg-offset-1"> 
<? if ($_SESSION['users_group']<5) { ?>
<a href="/?type=order&orders=my" class="btn <? if ($_GET['orders']=='my') echo ('btn-info'); else echo('btn-default'); ?> btn-block"><? if ($_GET['orders']=='my') echo ('<i class="fa fa-check" aria-hidden="true"></i>'); ?> Мои заказы</a> <? } ?>
</div>
<div class="form-group col-sm-2 col-md-2 col-md-offset-5 col-lg-2 col-lg-offset-5"> 
<button data-fancybox data-src="<?= ACTION_PATH ?>/edit_order.php?edit=on" href="javascript:;" class="btn btn-default btn-block"><i class="fa fa-plus-square" aria-hidden="true"></i> Добавить заказ</button> 
</div>
</div>
<section id="order_tabs">
		<ul class="nav nav-tabs">
		<?	
		
$result = mysql_query("SELECT * FROM status");
$myrow = mysql_fetch_array($result);
do 
{
if ($myrow['style']!='') {$style=$myrow['style'];} else $style="btn-info";
if ($myrow['id']==$get_status) {$li_style="active"; $symbol1="<i class=\"fa fa-check\" aria-hidden=\"true\"></i>
 <strong><u>";$symbol2="</u></strong>"; $this_status=$myrow['name']; }
//else {$span1="<em>"; $span2="</em>";}
if ($_SESSION['status'][$myrow['id']]<1) $li_style="disabled";

?>

<li class="<?= $li_style ?>" ><?= $span1 ?><a  class="<?= $style ?> white_link" href="?type=order<?if ($_GET['orders']=="my") echo("&orders=my") ?>&status=<?= $myrow['id'] ?>"><?= $symbol1.$myrow['name'].$symbol2 ?> (<? if (($_GET['orders']=='my') OR ($_SESSION['users_group']>=5)) echo $_SESSION['status'][$myrow['id']]; else echo $all_status[$myrow['id']] ?>)</a><?= $span2 ?></li>
<?
$symbol2="";$symbol1="";$style="";$li_style="";$span1=""; $span2="";
}
while ($myrow = mysql_fetch_array($result));
?>
  
</ul>
</section>		
		
		
<div id="table_order">
<table class="table table-responsive table-striped table-bordered" >
<thead>
	<tr>
	<? if (($_SESSION['users_group']<5) AND ($_GET['orders']!="my")) {
		$groups=autoring::groups();
		
	echo('<th>id, Имя пользователя</th>');}
else $where_id=" AND user_id='{$_SESSION['id']}'";
	?>
		
		<th>Дата, Order_id</th>
		<th><i class="fa fa-user" aria-hidden="true"></i> Имя, <i class="fa fa-phone" aria-hidden="true"></i> Телефон,<br><i class="fa fa-envelope-o" aria-hidden="true"></i> E-mail, <i class="fa fa-flag" aria-hidden="true"></i> IP-адрес</th>
		<th>Комментарий</th>
		<th><i class="fa fa-external-link" aria-hidden="true"></i> Сайт заказа,<br><i class="fa fa-shopping-cart " aria-hidden="true"></i> Заказ: товар, цена, итого, профит </th>
		<th>Доставка</th>
		<th>UTM-метки</th>
	</tr>
	</thead>
	<tbody >
	<?
    
	if ( $count_status > 0)  {
		$db="SELECT * FROM order_tab WHERE (status='{$get_status}'{$where_id}) ORDER BY order_id DESC LIMIT {$limit['begin']}, {$limit['count']}";
		//echo $db;
	$result = mysql_query($db);
	
	$myrow = mysql_fetch_array($result);
		do 
	{ 
	
	?>
		<tr id="tr_<?= $myrow['id'] ?>">
		<? 
		if (($_SESSION['users_group']<5) AND ($_GET['orders']!="my")) {
			$user=autoring::get_user($myrow['user_id']);  ?>
	<!--	echo("<td>{$myrow['user_id']}. {$user['name']}</td>");} ?> -->
		<td>
		<a id="btn_user-<?= $myrow['user_id']?>" type="button" class="btn btn-block <? if ($user['users_group']==0) echo('btn-danger text_white'); else 
		if ($user['balance']<0) echo ('btn-warning'); else	echo ('btn-default') ?>" data-toggle="tooltip" data-placement="bottom" title="Подробнее о пользователе <?= $user['name'] ?>" data-fancybox data-src="<?= ACTION_PATH ?>/user_data.php?id=<?= $myrow['user_id']?>" href="javascript:;"><div id="fa-user-<?= $myrow['user_id'] ?>" class="text-left <? if ($user['users_group']==0) echo('text_white'); else echo ('drop_color') ?>"><span class="badge"> <span class="fa <?= $groups[$user['users_group']]['fa_user'] ?>"></span></span> <?= $myrow['user_id'] ?>. <?= $user['name'] ?></div></a></td> <? }  ?>
		<td>
		<dl class="dl-horizontal dl-order">
		<dt><i class="fa fa-calendar" aria-hidden="true"></i></dt><dd><?= date("d.m.Y", $myrow['order_time']); ?></dd>
		<dt><i class="fa fa-clock-o" aria-hidden="true"></i></dt><dd><?= date("H:i:s", $myrow['order_time']); ?></dd>
		<dt><i class="fa fa-briefcase" aria-hidden="true"></i></dt><dd><?= $myrow['order_id'] ?></dd>
		
	<?  if ($myrow['lp-crm']!='1') 
		if (($_SESSION['users_group']<5) AND ($_GET['orders']!="my")) echo ('<p class="text-center"><span class="fa-stack fa-lg"><i class="fa fa-cloud-upload fa-stack-1x"></i> <i class="fa fa-ban fa-stack-2x text-danger"></i></span></p>');
		else echo('<button id="upload_button_'.$myrow['id'].'" onclick="upload('.$_SESSION['id'].','.$myrow['id'].')" title="Передать заказ для обработки" class="btn btn-danger"><div class="upload_'.$myrow['id'].'"><i class="fa fa-cloud-upload fa-lg" aria-hidden="true"></i></div></button>
		<button data-fancybox data-src="'.ACTION_PATH.'/edit_order.php?id='.$myrow['id'].'" href="javascript:;" id="edit_button_'.$myrow['id'].'" onclick="edit('.$_SESSION['id'].','.$myrow['id'].')" title="Редактировать заказ" class="btn btn-danger"><div class="edit_'.$myrow['id'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div></button>
		<button id="del_button_'.$myrow['id'].'" onclick="del('.$myrow['id'].','.$myrow['order_id'].')" title="Удалить заказ" class="btn btn-danger"><div class="del_'.$myrow['id'].'"><i class="fa fa-trash-o" aria-hidden="true"></i></div></button>
		<div class="deldiv_'.$myrow['id'].'"></div>'); ?>
</dl>
		</td>
		<td>
		
		<dl class="dl-horizontal dl-order dl-name">
		<dt><i class="fa fa-user" aria-hidden="true"></i></dt><dd><?= $myrow['bayer_name'] ?></dd>
		<dt><i class="fa fa-phone" aria-hidden="true"></i></dt><dd><?= $myrow['phone'] ?></dd>
		<? if ($myrow['email']!="") { ?> 
		<dt><i class="fa fa-envelope" aria-hidden="true"></i></dt><dd><?= $myrow['email'] ?></dd> <? } ?>

		<dt><i class="flag-<?= $myrow['country'] ?>"></i></dt><dd><?= $myrow['ip'] ?></dd>
		</dl>
		</td>
		
		<td><?= $myrow['comment'] ?><? if ($myrow['comment']!="") echo ("<br>");
		if ($myrow['cancel_description']!="") echo("Причина отказа:<br>{$myrow['cancel_description']}") ?></td>
		<td>
		<dl class="dl-horizontal dl-order">
		<dt><? if ($myrow['site']!="") { ?><i class="fa fa-external-link" aria-hidden="true"></i></dt><dd><a target="_blank" href="http://<?= $myrow['site'] ?>"> <?= $myrow['site'] ?></a> <? }  ?></dd>
	
		
		<? $products = unserialize(urldecode($myrow['products'])); 
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
		<a data-fancybox data-src="<?= ACTION_PATH ?>/one_product.php?id=<?= $value['product_id']; ?>" href="javascript:;javascript:window.location.reload();"><strong> <?= $product['name']; ?></strong><br><small>(Цена: <?= $product['price']; ?> <?= CURRENCY ?>)</small></a></dd>
		
		<dt><i class="fa fa-shopping-cart sprice" aria-hidden="true"></i></dt>
		<dd><strong><?= $count ?> шт.</strong> <small><i class="fa fa-times" aria-hidden="true"></i></small> <strong> <?= $value['price'] ?> <?= CURRENCY ?></strong> = <?= number_format($sum, 2, '.', '')?> <?= CURRENCY ?> <span class="badge pull-right">Profit: <?= $prof ?> <?= CURRENCY ?><span> </dd>
		
		<? } ?>
		<dt><i class="fa fa-money" aria-hidden="true"></i></dt>
		<dd style="background-color: #C0C0C0"> Итого, заказ: <strong><?= $myrow['total'] ?> <?= CURRENCY ?></strong></dd>
		
		<dt >
			<? if ($myrow['profit'] > 0) {$label="fa-line-chart"; $style="profit_green";}
			else if ($myrow['profit'] < 0) {$label="fa-thumbs-down"; $style="profit_red";}
			else {$label="fa-battery-empty"; $style="profit_empty";}	?>
		<i style="" class="fa <?= $label ?> <?= $style ?>" aria-hidden="true"></i></dt>
		<dd style="background-color: #FFFF00"> Итого, Profit: <strong class="<?= $style ?>"><?= $myrow['profit'] ?> <?= CURRENCY ?></strong></dd>
		
		</dl>
		
		</td>
		
		
		<td>
		<dl class="dl-horizontal dl-order">
		<? if ($myrow['delivery_adress']!="")  { if ($myrow['delivery_index']!="") $delivery_index=$myrow['delivery_index'].', ';
		echo ('<dt><i class="fa fa-map-marker" aria-hidden="true"></i></dt><dd>'.$delivery_index.$myrow['delivery_adress'].'</dd>'); }?>
		<? if ($myrow['delivery']!="") echo ('<dt><i class="fa fa-truck" aria-hidden="true"></i></dt><dd>'.$myrow['delivery'].'</dd>');?>
		
		<? if (($myrow['delivery_date']!='0000-00-00 00:00:00') AND ($myrow['delivery_date']!='')) echo ('<dt><i class="fa fa-clock-o" aria-hidden="true"></i></dt><dd>'.$myrow['delivery_date'].'</dd>');  ?>
		<? if ($myrow['ttn']!="") echo ('<dt><i class="fa fa-file-text" aria-hidden="true"></i></dt><dd>'.$myrow['ttn'].'</dd>'); ?>
		<? if ($myrow['ttn_status']!="") echo('<dt><i class="fa fa-check-square" aria-hidden="true"></i></dt><dd>'.$myrow['ttn_status'].'</dd>'); ?>
		</dl>
		
		
		</td>
		<td>
		<dl class="dl-horizontal">
		<? if ($myrow['utm_source']!="") echo("<dt><strong>utm_source:</strong></dt> <dd>{$myrow['utm_source']}</dd>"); ?>
		<? if ($myrow['utm_medium']!="") echo("<dt><strong>utm_medium:</strong></dt> <dd>{$myrow['utm_medium']}</dd>"); ?>
		<? if ($myrow['utm_term']!="") echo("<dt><strong>utm_term:</strong></dt> <dd>{$myrow['utm_term']}</dd>"); ?>
		<? if ($myrow['utm_content']!="") echo("<dt><strong>utm_content:</strong></dt> <dd>{$myrow['utm_content']}</dd>"); ?>
		<? if ($myrow['utm_campaign']!="") echo("<dt><strong>utm_campaign:</strong></dt> <dd>{$myrow['utm_campaign']}</dd>"); ?>
		
		</dl></td>
	</tr>
	<?	

	}
while ($myrow = mysql_fetch_array($result));
} else echo('<tr><td colspan="7"><h3 align="center">Нет заказов со статусом "<strong>'.$this_status.'</strong>" </h3></td></tr>');

?>
<tbody>
	</table>
	</div>
<? $limit=pagination::pagin($_GET,$count_status, $view_pages); 
$refresh=="yes";	?>
