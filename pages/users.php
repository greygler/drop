<?
if (($_SESSION['users_group']>0) AND ($_SESSION['users_group']<5)) {
require_once (CLASS_PATH.'/pagination.class.php');
$groups=autoring::groups();
$count_users=db::cound_bd('users');
?>
<div class="page-header">
		<h1>Пользователи системы</h1>
</div>
<div class="visible-xs alert alert-warning alert-dismissable"> 
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		Рекомендуется просматривать в горизонтальном расположении устройства.<br>Поверните устройство и заново загрузите таблицу товаров через боковое меню
		</div>
	
<? $limit=pagination::pagin($_GET,$count_users, $view_pages); 	?>

	
 <script src="<?= JS_PATH ?>/users.php"></script>	
<form>
<table class="table table-striped" >
<thead>
	<tr valign="middle">
		<th><a data-toggle="tooltip" data-placement="bottom" title="Сортировка по ID" href="<?= Pagination::pagelink_desc($_GET, 'order', 'id') ?>"><strong>ID</strong> 
<span class="badge"><?= Pagination::sort_symbol($_GET,'order','id', 'sort-numeric-asc', 'sort-numeric-desc'); ?></span></a>&#160;&#160;|&#160;&#160; 
<a data-toggle="tooltip" data-placement="bottom" title="Сортировка по заказам выплат" href="<?= Pagination::pagelink_desc($_GET, 'order', 'order_pay','1') ?>"><strong>Pay</strong> 
<span class="badge"><?= Pagination::sort_symbol($_GET,'order','order_pay', 'sort-numeric-asc', 'sort-numeric-desc'); ?></span></a>
		
</th>
		<th><a data-toggle="tooltip" data-placement="bottom" title="Сортировка по имени" href="<?= Pagination::pagelink_desc($_GET, 'order', 'name') ?>"><strong>Имя</strong> 
<span class="badge pull-left"><?= Pagination::sort_symbol($_GET,'order', 'name', 'sort-alpha-asc', 'sort-alpha-desc'); ?></span></a></th>
		<th><a data-toggle="tooltip" data-placement="bottom" title="Сортировка по группе" href="<?= Pagination::pagelink_desc($_GET, 'order', 'users_group') ?>"><strong>Группа</strong> 
<span class="badge pull-left"><?= Pagination::sort_symbol($_GET,'order', 'users_group', 'sort-numeric-asc', 'sort-numeric-desc'); ?></span></a></th>
		<th><a data-toggle="tooltip" data-placement="bottom" title="Сортировка по балансу" href="<?= Pagination::pagelink_desc($_GET, 'order', 'balance') ?>"><strong>Баланс</strong> 
<span class="badge pull-left"><?= Pagination::sort_symbol($_GET,'order', 'balance', 'sort-numeric-asc', 'sort-numeric-desc'); ?></span></a>
		</th>
		<th>Последняя авторизация</th>
	</tr>
</thead>	
	
	<tbody>
<?
if ($_GET['order']!="") $order_by="ORDER BY {$_GET['order']}";
	if ($_GET['desc']!="") $order_by.=" DESC";
	
//$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
$result = mysql_query("SELECT * FROM users {$order_by} LIMIT {$limit['begin']}, {$limit['count']}");

$myrow = mysql_fetch_array($result);
do
{ 

?>
	<tr id="table-<?= $myrow['id']?>" valign="middle" <? if ($myrow['users_group']==0) echo('class="danger"') ?> >
		<td valign="middle"><?= $myrow['id'] ?>
		<? if ($myrow['order_pay']>0) echo('&#160;<span class="badge"><a data-toggle="tooltip" data-placement="bottom" title="Пользователь '.$myrow['name'].' заказал выплату '.$myrow['order_pay'].'&#160;'.CURRENCY.'" data-fancybox data-src="'.ACTION_PATH.'/user_data.php?id='.$myrow['id'].'>" href="javascript:;"><i class="fa fa-money" aria-hidden="true"></i>
'.$myrow['order_pay'].'&#160;'.CURRENCY.'</a></span>'); ?>
		</td>
		<td class="users_href" valign="middle">
		
		<a id="btn_user-<?= $myrow['id']?>" type="button" class="btn btn-block <? if ($myrow['users_group']==0) echo('btn-danger text_white'); else 
		if ($myrow['balance']<0) echo ('btn-warning'); else	echo ('btn-default') ?>" data-toggle="tooltip" data-placement="bottom" title="Подробнее о пользователе <?= $myrow['name'] ?>" data-fancybox data-src="<?= ACTION_PATH ?>/user_data.php?id=<?= $myrow['id']?>" href="javascript:;"><div id="fa-user-<?= $myrow['id'] ?>" class="text-left <? if ($myrow['users_group']==0) echo('text_white'); else echo ('drop_color') ?>"><span class="badge"> <span class="fa <?= $groups[$myrow['users_group']]['fa_user'] ?>"></span></span> <?= $myrow['name'] ?></div></a>
		
		</td>
		<td valign="middle"> 
		<select data-toggle="tooltip" data-placement="bottom" title="Выбор группы для пользователя <?= $myrow['name'] ?>" id="group_user-<?= $myrow['id']?>"  class="form-control" size="1" name="pages" onchange="save_group(<?= $myrow['id']?>)">
		<? foreach ($groups as $key => $value)  { ?>
		<option <? if ($key==$myrow['users_group']) {echo ("selected"); $symbol="&#10004;";} ?>
				<? if (($myrow['balance']<0) AND ($key=='5')) { echo ("disabled"); $symbol="&#128274;";} ?>
		value="<?= $key ?>"> <?= $symbol.' '.$value['name_group'] ?></option>
		<? $symbol=""; } ?>
		</select>
		<input id="balance_<?= $myrow['id'] ?>" type="hidden" name="balance_<?= $myrow['id'] ?>" value="<?= $myrow['balance'] ?>">
		</td>
		<td valign="middle"><button id="btn_balance-<?= $myrow['id']?>" type="button" class="btn btn-block <? if (($myrow['users_group']==0) OR ($myrow['balance']<0)) echo('btn-danger text_white'); else if ($myrow['balance']>0)
		echo ('btn-success text_white'); else echo ('btn-default drop_color') ?>"> <? if ($myrow['balance']>0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span>'); else if ($myrow['balance']!=0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span>'); ?>
	
	<?= $myrow['balance'] ?> <?= CURRENCY ?></button></td>
	<td>
	
	<a class="btn btn-default btn-block" data-toggle="tooltip" data-placement="bottom" title="Логи входов пользователя <?= $myrow['name'] ?>" data-fancybox data-src="<?= ACTION_PATH ?>/user_logs.php?id=<?= $myrow['id']?>" href="javascript:;">
		<dl class="dl-horizontal dl-order">
	
	<?
	if ($myrow['device']!='0') $dev_symbol="fa-mobile"; else $dev_symbol="fa-desktop"; 
	if ($myrow['last_time']!="") echo('<dt><i class="fa '.$dev_symbol.'" aria-hidden="true"></i></dt><dd>'.date("d.m.Y H.i.s", $myrow['last_time'])); else echo ("Нет данных"); echo('</dd>'); ?>
	<? if ($myrow['city']!="") {
		if ($myrow['country']!='AA') $flag="flag-{$myrow['country']}"; else $flag='fa fa-flag';
		echo('<dt><i class="'.$flag.'"></i></dt><dd>г.'.$myrow['city']);}  echo('</dd>'); ?>
	
	</dl></a>
	</td>
	</tr>
<?	

}
while ($myrow = mysql_fetch_array($result));
?>
</tbody>
</table>
</form>
<? $limit=pagination::pagin($_GET,$count_users, $view_pages);	} ?>
