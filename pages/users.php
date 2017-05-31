<?
if (($_SESSION['users_group']>0) AND ($_SESSION['users_group']<5)) {
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/pagination.class.php');
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

	
 <script src="/js/users.php"></script>	
<form>
<table class="table table-striped" >
<thead>
	<tr valign="middle">
		<th><strong>ID</strong></th>
		<th><strong>Имя</strong></th>
		<th><strong>Группа</strong></th>
		<th><strong>Баланс</strong></th>
		
	</tr>
</thead>	
	
	<tbody>
<?
//$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
$result = mysql_query("SELECT * FROM users LIMIT {$limit['begin']}, {$limit['count']}");

$myrow = mysql_fetch_array($result);
do
{ ?>
	<tr id="table-<?= $myrow['id']?>" valign="middle" <? if ($myrow['users_group']==0) echo('class="danger"') ?> >
		<td valign="middle"><?= $myrow['id'] ?></td>
		<td class="users_href" valign="middle">
		
		<a id="btn_user-<?= $myrow['id']?>" type="button" class="btn btn-block <? if ($myrow['users_group']==0) echo('btn-danger text_white'); else echo ('btn-default') ?>" title="Подробнее о пользователе <?= $myrow['name'] ?>" data-fancybox data-src="action/user_data.php?id=<?= $myrow['id']?>" href="javascript:;"><div id="fa-user-<?= $myrow['id'] ?>" class="text-left <? if ($myrow['users_group']==0) echo('text_white'); else echo ('drop_color') ?>"><span class="badge"> <span class="fa <?= $groups[$myrow['users_group']]['fa_user'] ?>"></span></span> <?= $myrow['name'] ?></div></a>
		
		</td>
		<td valign="middle"> 
		<select title="Выбор группы для пользователя <?= $myrow['name'] ?>" id="group_user-<?= $myrow['id']?>"  class="form-control" size="1" name="pages" onchange="save_group(<?= $myrow['id']?>)">
		<? foreach ($groups as $key => $value)  { ?>
		<option <? if ($key==$myrow['users_group']) echo ("selected") ; ?> value="<?= $key ?>"><?= $value['name_group'] ?></option>
		<? } ?>
		</select>
		</td>
		<td valign="middle"><button id="btn_balance-<?= $myrow['id']?>" type="button" class="btn btn-block <? if (($myrow['users_group']==0) OR ($myrow['balance']<0)) echo('btn-danger text_white'); else if ($myrow['balance']>0)
		echo ('btn-success text_white'); else echo ('btn-default drop_color') ?>"> <? if ($myrow['balance']>0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span>'); else if ($myrow['balance']!=0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span>'); ?>
	
	<?= $myrow['balance'] ?> <?= CURRENCY ?></button></td>
	</tr>
<?	
//echo $myrow['ИМЯ_ПОЛЯ1'];
//echo $myrow['ИМЯ_ПОЛЯ2'];
}
while ($myrow = mysql_fetch_array($result));
?>
</tbody>
</table>
</form>
<? $limit=pagination::pagin($_GET,$count_users, $view_pages);	} ?>
