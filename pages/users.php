<div class="page-header">
		<h1>Пользователи системы</h1>
</div>
<? 
function pagelink($params)
{
 $link='/?'.http_build_query($params);
 return $link; 
}

$get_params=$_GET;
if ($get_params['page_no']!="") $page_no=$get_params['page_no']; else $page_no=1; 
$groups=autoring::groups();
$count_users=db::cound_bd('users');
if (($get_params['pages']!="") AND ($get_params['pages']!='all'))  $limit=$get_params['pages']; 
else $limit=$view_pages['0'];
$count_pages=ceil($count_users/$limit);
?>

<ul class="pagination">
  <li <? if ($page_no==1) {echo('class="disabled"'); $href="#"; } else {$get_params['page_no']=$page_no-1; $href=pagelink($get_params);} ?>><a href="<?= $href  ?>">&laquo;</a></li>
  <? for ($i=1; $i<=$count_pages; $i++ ) { ?>
  <li <? if ($i==$page_no) echo('class="active"') ?>><a href="<? $get_params['page_no']=$i; echo pagelink($get_params) ?>"><?= $i ?> <span class="sr-only">(current)</span></a></li>
  <? } ?>
  <!-- <li><a href="#">2 <span class="sr-only">(current)</span></a></li> -->
  <li <? if ($page_no==$count_pages) { echo('class="disabled"'); $href="#";} else{ $get_params['page_no']=$page_no+1; $href=pagelink($get_params); }  ?>><a href="<?= $href  ?>">&raquo;</a></li>
</ul>

<form role="form" class="page_form" action="<?= $_SERVER["PHP_SELF"] ?>"> 
<? foreach($get_params as $key => $value) if ($key!="pages") echo('<input type="hidden" value="'.$value.'" name="'.$key.'">'); ?>
<select id="view_pages1"  class="form-control" size="1" name="pages" onchange="this.form.submit()">
<? foreach($view_pages as $key => $value) {?>
	<option <? if ($limit==$value) echo ("selected"); ?> value="<?= $value ?>"><?= $value ?></option>
	<? } ?>
	<option value="all">Все</option>
	</select>
	
	</form>

<table class="table table-striped table-responsive" >
	<tr valign="middle" class="info">
		<td valign="middle"><p><strong>ID</strong></p></td>
		<td valign="middle"><p><strong>Имя</strong></p></td>
		<td valign="middle"><p><strong>Группа</strong></p></td>
		<td valign="middle"><p><strong>Баланс</strong></p></td>
		<td valign="middle"><p><strong>Регистрация</strong></p></td>
	</tr>
<?


$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
$result = mysql_query("SELECT * FROM users LIMIT {$limit}");

$myrow = mysql_fetch_array($result);
do
{ ?>
	<tr valign="middle" <? if ($myrow['users_group']==0) echo('class="danger"') ?> >
		<td valign="middle"><?= $myrow['id'] ?></td>
		
		<td valign="middle"><p class="text-left"><span class="drop_color fa <?= $groups[$myrow['users_group']]['fa_user'] ?> fa-lg"></span> <?= $myrow['name'] ?></p></td>
		<td valign="middle"> <!--<span class="fa <?= $groups[$myrow['users_group']]['fa_user'] ?> fa-lg"></span> -->
		<select id="view_pages1"  class="form-control" size="1" name="pages" onchange="">
		<? foreach ($groups as $key => $value)  { ?>
		<option <? if ($key==$myrow['users_group']) echo ("selected") ; ?> value="<?= $key ?>"><?= $value['name_group'] ?></option>
		<!--<option value="<?= $myrow['users_group'] ?>"><?= $groups[$myrow['users_group']]['name_group']; ?></option> -->
		<? } ?>
		</select>
		
		</td>
		<td valign="middle"><p class="text-right"><?= $myrow['balance'] ?> <?= CURRENCY ?></p></td>
		<td valign="middle"><p><?= date("d.m.Y G:i",$myrow['registration']) ?></p></td>
	</tr>
<?	
//echo $myrow['ИМЯ_ПОЛЯ1'];
//echo $myrow['ИМЯ_ПОЛЯ2'];
}
while ($myrow = mysql_fetch_array($result));
?>
</table>

<ul class="pagination">
  <li <? if ($page_no==1) {echo('class="disabled"'); $href="#"; } else {$get_params['page_no']=$page_no-1; $href=pagelink($get_params);} ?>><a href="<?= $href  ?>">&laquo;</a></li>
  <? for ($i=1; $i<=$count_pages; $i++ ) { ?>
  <li <? if ($i==$page_no) echo('class="active"') ?>><a href="<? $get_params['page_no']=$i; echo pagelink($get_params) ?>"><?= $i ?> <span class="sr-only">(current)</span></a></li>
  <? } ?>
  <!-- <li><a href="#">2 <span class="sr-only">(current)</span></a></li> -->
  <li <? if ($page_no==$count_pages) { echo('class="disabled"'); $href="#";} else{ $get_params['page_no']=$page_no+1; $href=pagelink($get_params); }  ?>><a href="<?= $href  ?>">&raquo;</a></li>
</ul>

<form role="form" class="page_form" action="<?= $_SERVER["PHP_SELF"] ?>"> 
<? foreach($get_params as $key => $value) if ($key!="pages") echo('<input type="hidden" value="'.$value.'" name="'.$key.'">'); ?>
<select id="view_pages1"  class="form-control" size="1" name="pages" onchange="this.form.submit()">
<? foreach($view_pages as $key => $value) {?>
	<option <? if ($limit==$value) echo ("selected"); ?> value="<?= $value ?>"><?= $value ?></option>
	<? } ?>
	<option value="all">Все</option>
	</select>
	
	</form>