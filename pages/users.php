<div class="page-header">
		<h1>Пользователи системы</h1>
</div>
<ul class="pagination">
  <li class="disabled"><a href="#">&laquo;</a></li>
  <li class="active"><a href="/?<?= http_build_query($_GET) ?>&begin=1">1 <span class="sr-only">(current)</span></a></li>
  <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
  <li><a href="#">&laquo;</a></li>
</ul><form role="form" class="page_form" action="<?= $_SERVER["PHP_SELF"] ?>"> 
<? foreach($_GET as $key => $value) if ($key!="pages") echo('<input type="hidden" value="'.$value.'" name="'.$key.'">'); ?>
<select id="view_pages1"  class="form-control" size="1" name="pages" onchange="this.form.submit()">
<? foreach($view_pages as $key => $value) {?>
	<option value="<?= $value ?>"><?= $value ?></option>
	<? } ?>
	<option selected value="all">Все</option>
	</select>
	
	</form>

<table class="table table-striped table-responsive" >
	<tr valign="middle" class="info">
		<td valign="middle"><small><strong>ID</strong></small></td>
		<td valign="middle"><small><strong>Регистрация</strong></small></td>
		<td valign="middle"><small><strong>Имя</strong></small></td>
		<td valign="middle"><small><strong>Группа</strong></small></td>
		<td valign="middle"><small><strong>Баланс</strong></small></td>
		
	</tr>
<?
$groups=autoring::groups();
$count_users=db::cound_bd('users');
if ($_GET['pages']!="") $count_pages=ceil($count_users/$_GET['pages']);
else $count_pages=$count_users;
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
//$result = mysql_query("SELECT * FROM users LIMIT {$_GET['pages']}");
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
  <li class="active"><a href="&begin=1">1 <span class="sr-only">(current)</span></a></li>
  <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
  <li><a href="#">&laquo;</a></li>
</ul>
<form role="form" class="page_form" action="<?= $_SERVER["PHP_SELF"] ?>"> 
<? foreach($_GET as $key => $value) if ($key!="pages") echo('<input type="hidden" value="'.$value.'" name="'.$key.'">'); ?>
<select id="view_pages1"  class="form-control" size="1" name="pages" onchange="this.form.submit()">
<? foreach($view_pages as $key => $value) {?>
	<option value="<?= $value ?>"><?= $value ?></option>
	<? } ?>
	<option selected value="all">Все</option>
	</select>
	
	</form>