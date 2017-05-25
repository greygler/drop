<div class="page-header">
		<h1>Пользователи системы</h1>
</div>
<ul class="pagination">
  <li class="disabled"><a href="#">&laquo;</a></li>
  <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
  <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
  <li><a href="#">&laquo;</a></li>
</ul> <select style="width: 70px; float: right;" class="form-control" size="1" name="pages">
	<option selected value="5">5</option>
	<option value="10">10</option>
	</select>

<table class="table table-striped table-responsive" >
	<tr valign="middle" class="info">
		<td valign="middle"><small><strong>ID</small></strong></td>
		<td valign="middle"><small><strong>Регистрация</small></strong></td>
		<td valign="middle"><small><strong>Имя</small></strong></td>
		<td valign="middle"><small><strong>Группа</small></strong></td>
		<td valign="middle"><small><strong>Баланс</small></strong></td>
		
	</tr>
<?
$groups=autoring::groups();
$count_users=db::cound_bd('users');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
 $result = mysql_query("SELECT * FROM users");
$myrow = mysql_fetch_array($result);
do
{ ?>
	<tr valign="middle" <? if ($myrow['users_group']==0) echo('class="danger"') ?> >
		<td valign="middle"><small><?= $myrow['id'] ?></small></td>
		<td valign="middle"><small><?= date("d.m.Y G:i",$myrow['registration']) ?></small></td>
		<td valign="middle"><small><?= $myrow['name'] ?></small></td>
		<td valign="middle"><small><span class="fa <?= $groups[$myrow['users_group']]['fa_user'] ?> fa-lg"></span> <?= $groups[$myrow['users_group']]['name_group']; ?></small></td>
		<td valign="middle"><small><?= $myrow['balance'] ?> <?= CURRENCY ?></small></td>
		
	</tr>
<?	
//echo $myrow['ИМЯ_ПОЛЯ1'];
//echo $myrow['ИМЯ_ПОЛЯ2'];
}
while ($myrow = mysql_fetch_array($result));
?>
</table>
<ul class="pagination">
  <li class="disabled"><a href="#">&laquo;</a></li>
  <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
  <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
  <li><a href="#">&laquo;</a></li>
</ul>
