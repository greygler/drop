<div class="page-header">
		<h1>Пользователи системы</h1>
</div>
<table class="table table-striped table-responsive" >
	<tr valign="middle" class="warning">
		<td valign="middle"><small>ID</small></td>
		<td valign="middle"><small>Имя</small></td>
		<td valign="middle"><small>Группа</small></td>
		<td valign="middle"><small>Баланс</small></td>
		
	</tr>
<?
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
 $result = mysql_query("SELECT * FROM users");
$myrow = mysql_fetch_array($result);
do
{ ?>
	<tr valign="middle" >
		<td valign="middle"><small><?= $myrow['id'] ?></small></td>
		<td valign="middle"><small><?= $myrow['name'] ?></small></td>
		<td valign="middle"><small><?= $myrow['users_group'] ?></small></td>
		<td valign="middle"><small><?= $myrow['balance'] ?></small></td>
		
	</tr>
<?	
//echo $myrow['ИМЯ_ПОЛЯ1'];
//echo $myrow['ИМЯ_ПОЛЯ2'];
}
while ($myrow = mysql_fetch_array($result));
?>
</table>