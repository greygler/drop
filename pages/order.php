
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
		
		
		

<table class="table table-responsive table-striped" id="table1">
<thead>
	<tr>
		<th>Дата, Order_id</th>
		<th><i class="fa fa-user" aria-hidden="true"></i> Имя,<br><i class="fa fa-phone" aria-hidden="true"></i> Телефон</th>
		<th>Коммент</th>
		<th>Наименование, Колличество\Цена</th>
		<th>Сайт</th>
		<th>ip</th>
		<th>Адрес</th>
		<th>utm_source</th>
		<th>utm_medium</th>
		<th>utm_term</th>
		<th>utm_content</th>
		<th>utm_campaign</th>
	</tr>
	</thead>
	<tbody>
	<?
	db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
	$result = mysql_query("SELECT * FROM order_tab ORDER BY order_id DESC");
	$myrow = mysql_fetch_array($result);
		do
	{ ?>
		<tr>
		<td><?= date("d.m.Y H:i:s", $myrow['order_time']); ?><br>
		<?= $myrow['order_id'] ?></td>
		<td><i class="fa fa-phone" aria-hidden="true"></i> <i class="flag-<?= $myrow['country'] ?>"></i>  <?= $myrow['phone'] ?><br><i class="fa fa-user" aria-hidden="true"></i> <?= $myrow['bayer_name'] ?>
		</td>
		
		<td><?= $myrow['comment'] ?></td>
		<td>Товар: <strong><?= $myrow['product_id'] ?></strong><br><?= $myrow['count'] ?> шт. * <?= $myrow['price'] ?> <?= CURRENCY ?><br>Заказ: <strong><?= $myrow['count']*$myrow['price'] ?> <?= CURRENCY ?></strong><br>Апрув: <strong><?= $myrow['count']*$myrow['price'] ?> <?= CURRENCY ?></strong></td>
		<td><?= $myrow['site'] ?></td>
		<td><?= $myrow['ip'] ?></td>
		<td>Адрес</td>
		<td>utm_source</td>
		<td>utm_medium</td>
		<td>utm_term</td>
		<td>utm_content</td>
		<td>utm_campaign</td>
	</tr>
	<?	

	}
while ($myrow = mysql_fetch_array($result));
?>
<tbody>
	</table>
