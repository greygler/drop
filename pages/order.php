<div class="page-header">
		<h1>Заказы</h1>
		</div>
<table border="1" class="table-responsive table-striped" id="table1">
<thead>
	<tr>
		<th>Order_id</th>
		<th >Страна</th>
		<th>Телефон</th>
		<th>Имя</th>
		<th>Коммент</th>
		<th>Наименование</th>
		<th>Колличество\Цена</th>
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
<tbody>
	</table>
