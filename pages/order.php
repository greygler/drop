<div class="page-header">
		<h1>Заказы</h1>
		</div>
<table border="1" class="table table-responsive table-striped" id="table1">
	<tr>
		<td>Order_id</td>
		<td >Страна</td>
		<td>Телефон</td>
		<td>Имя</td>
		<td>Коммент</td>
		<td>Наименование</td>
		<td>Колличество\Цена</td>
		<td>Сайт</td>
		<td>ip</td>
		<td>Адрес</td>
		<td>utm_source</td>
		<td>utm_medium</td>
		<td>utm_term</td>
		<td>utm_content</td>
		<td>utm_campaign</td>
	</tr>
	<?
	db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
	$result = mysql_query("SELECT * FROM order_tab ORDER BY order_id DESC");
	$myrow = mysql_fetch_array($result);
		do
	{ ?>
		<tr>
		<td><?= $myrow['order_id'] ?></td>
		<td><i class="flag-<?= $myrow['country'] ?>"></i></td>
		<td><?= $myrow['phone'] ?></td>
		<td><?= $myrow['name'] ?></td>
		<td><?= $myrow['comment'] ?></td>
		<td>Наименование</td>
		<td>Колличество\Цена</td>
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
	</table>
