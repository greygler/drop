
		<h1></h1>
		<ul class="nav nav-tabs">
		<?	
$result = mysql_query("SELECT * FROM status");
$myrow = mysql_fetch_array($result);
do 
{
if ($myrow['style']!='') {$style=$myrow['style'];$color="white";} else $style="btn-default"

?>

<li><a style="color: <?= $color ?>" class="<?= $style ?>" href="#"><?= $myrow['name'] ?></a></li>
<?
$color="";
}
while ($myrow = mysql_fetch_array($result));
?>
  
</ul>
		
		
		

<table class="table table-responsive table-striped table-bordered" >
<thead>
	<tr>
	<? if ($_SESSION['user_group']<5) {
		$groups=autoring::groups();
	echo('<th>id, Имя пользователя</th>');} ?>
		
		<th>Дата, Order_id</th>
		<th><i class="fa fa-user" aria-hidden="true"></i> Имя, <i class="fa fa-phone" aria-hidden="true"></i> Телефон,<br>IP-адрес</th>
		<th>Коммент</th>
		<th>Заказ</th>
		<th>Сайт</th>
		<th>Адрес</th>
		<th>UTM-метки</th>
	</tr>
	</thead>
	<tbody >
	<?
	db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
	$result = mysql_query("SELECT * FROM order_tab ORDER BY order_id DESC");
	$myrow = mysql_fetch_array($result);
		do
	{ $product=drop::one_product($myrow['product_id']);
	
	?>
		<tr>
		<? 
		if ($_SESSION['user_group']<5) {
			$user=autoring::get_user($myrow['user_id']);  ?>
	<!--	echo("<td>{$myrow['user_id']}. {$user['name']}</td>");} ?> -->
		<td>
		<a id="btn_user-<?= $myrow['user_id']?>" type="button" class="btn btn-block <? if ($user['users_group']==0) echo('btn-danger text_white'); else 
		if ($user['balance']<0) echo ('btn-warning'); else	echo ('btn-default') ?>" title="Подробнее о пользователе <?= $user['name'] ?>" data-fancybox data-src="<?= ACTION_PATH ?>/user_data.php?id=<?= $myrow['user_id']?>" href="javascript:;"><div id="fa-user-<?= $myrow['user_id'] ?>" class="text-left <? if ($user['users_group']==0) echo('text_white'); else echo ('drop_color') ?>"><span class="badge"> <span class="fa <?= $groups[$user['users_group']]['fa_user'] ?>"></span></span> <?= $myrow['user_id'] ?>. <?= $user['name'] ?></div></a></td> <? } ?>
		<td>
		<dl class="dl-horizontal dl-order">
		<dt><i class="fa fa-calendar" aria-hidden="true"></i></dt><dd><?= date("d.m.Y", $myrow['order_time']); ?></dd>
		<dt><i class="fa fa-clock-o" aria-hidden="true"></i></dt><dd><?= date("H:i:s", $myrow['order_time']); ?></dd>
		<dt><i class="fa fa-briefcase" aria-hidden="true"></i></dt><dd><?= $myrow['order_id'] ?></dd>
		</dl></td>
		<td>
		<a href="" type="button" class="btn btn-default btn_left">
		<dl class="dl-horizontal dl-order dl-name">
		<dt><i class="fa fa-user" aria-hidden="true"></i></dt><dd><?= $myrow['bayer_name'] ?></dd>
		<dt><i class="fa fa-phone" aria-hidden="true"></i></dt><dd><?= $myrow['phone'] ?></dd>
		<dt><i class="flag-<?= $myrow['country'] ?>"></i></dt><dd><?= $myrow['ip'] ?></dd>
		</dl></a>
		</td>
		
		<td><?= $myrow['comment'] ?></td>
		<td>
		<dl class="dl-horizontal dl-order">
		<dt><i class="fa fa-shopping-cart sprice" aria-hidden="true"></i></dt><dd><a data-fancybox data-src="<?= ACTION_PATH ?>/one_product.php?id=<?= $myrow['product_id']; ?>" href="javascript:;javascript:window.location.reload();"><strong><?= $product['name']; ?></strong></dd>
		<dt><i class="fa fa-tag sprice" aria-hidden="true"></i></dt><dd><a data-fancybox data-src="<?= ACTION_PATH ?>/one_product.php?id=<?= $myrow['product_id']; ?>" href="javascript:;"><?= $product['price']; ?> <?= CURRENCY ?></a></dd>
		<dt><i class="fa fa-barcode" aria-hidden="true"></i></dt><dd><strong><?= $myrow['count'] ?> шт.</strong> <small><i class="fa fa-times" aria-hidden="true"></i></small> <strong> <?= $myrow['price'] ?> <?= CURRENCY ?></strong> </dd>
		<dt><i class="fa fa-check-square-o" aria-hidden="true"></i></dt><dd><strong><?= $myrow['count']*$myrow['price'] ?> <?= CURRENCY ?></strong></dd>
		<dt>
		<? if ($myrow['profit'] > 0) {$label="fa-line-chart"; $style="color: green";}
			else if ($myrow['profit'] < 0) {$label="fa-thumbs-down"; $style="color: red";}
			else {$label="fa-battery-empty"; $style="color: #5b6064";}	?>
		<i style="<?= $style ?>" class="fa <?= $label ?>" aria-hidden="true"></i></dt><dd><strong style="<?= $style ?>"><?= $myrow['profit'] ?> <?= CURRENCY ?></strong></dd></dl></td>
		<td><a target="_blank" href="http://<?= $myrow['site'] ?>"><i class="fa fa-globe" aria-hidden="true"></i> <?= $myrow['site'] ?></a></td>
		
		<td>Адрес</td>
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
?>
<tbody>
	</table>
