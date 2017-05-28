<?
require_once ("class/pagination.class.php");
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

	
<script type="text/javascript" language="javascript">
function save_group(id) {
	 var group_user = $('#group_user-'+id).val();
	 
  $.ajax({
        type: "POST",
        url: "../action/save_group.php",
        data: {
                'id': id, 
                'group_user':group_user
            },
            
            //dataType: "json",
          
            success: function(data){
				
				$('#fa-user-'+id).html(data);
				if (group_user==0) $('#table-'+id).addClass('danger');
				else $('#table-'+id).removeClass('danger');
			}
  })
 
}

</script>	

<table class="table table-striped table-responsive table-hover" >
	<tr valign="middle" class="info">
		<td valign="middle"><p><strong>ID</strong></p></td>
		<td valign="middle"><p><strong>Имя</strong></p></td>
		<td valign="middle"><p><strong>Группа</strong></p></td>
		<td valign="middle"><p><strong>Баланс</strong></p></td>
		
	</tr>
	
	<form>
<?
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
$result = mysql_query("SELECT * FROM users LIMIT {$limit['begin']}, {$limit['count']}");

$myrow = mysql_fetch_array($result);
do
{ ?>
	<tr id="table-<?= $myrow['id']?>" valign="middle" <? if ($myrow['users_group']==0) echo('class="danger"') ?> >
		<td valign="middle"><?= $myrow['id'] ?></td>
		<td valign="middle"><a data-fancybox data-src="action/user_data.php?id=<?= $myrow['id']?>" href="javascript:;"><p id="fa-user-<?= $myrow['id'] ?>" class="text-left"><span class="drop_color fa <?= $groups[$myrow['users_group']]['fa_user'] ?> fa-lg"></span> <?= $myrow['name'] ?></p></a></td>
		<td valign="middle"> 
		<select id="group_user-<?= $myrow['id']?>"  class="form-control" size="1" name="pages" onchange="save_group(<?= $myrow['id']?>)">
		<? foreach ($groups as $key => $value)  { ?>
		<option <? if ($key==$myrow['users_group']) echo ("selected") ; ?> value="<?= $key ?>"><?= $value['name_group'] ?></option>
		<? } ?>
		</select>
		</td>
		<td valign="middle"><p ><?= $myrow['balance'] ?> <?= CURRENCY ?></p></td>
	</tr>
<?	
//echo $myrow['ИМЯ_ПОЛЯ1'];
//echo $myrow['ИМЯ_ПОЛЯ2'];
}
while ($myrow = mysql_fetch_array($result));
?>
</table>
</form>
<? $limit=pagination::pagin($_GET,$count_users, $view_pages)	?>
