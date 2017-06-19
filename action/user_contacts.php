<dl class="dl-horizontal">
  <dt>E-mail:</dt>
  <dd><div class="form-group"><button type="button" class="btn btn-default btn-block"> <? if ($user['email']==$user['v_email']) echo ('<span class="pull-right"><i class="fa fa-check text-success" aria-hidden="true"></i></span>'); else echo ('<span class="pull-right"><i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i></span>') ?><?= $user['email'] ?>
  
  </button></div></dd>
  <dt>Phone:</dt>
  <dd>
  <div class="form-group">
  <button type="button" class="btn btn-default btn-block"> <? if (($user['phone']==$user['v_phone']) AND ($user['phone']!="")) echo ('<span class="pull-right"><i class="fa fa-check text-success" aria-hidden="true"></i></span>'); else if ($user['phone']!="") echo ('<span class="pull-right"><i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i></span>'); if ($user['phone']!="") echo($user['phone']); else echo("Не указан"); ?>
  </button></div></dd>
 
  
  <?
   $contact=unserialize($user['contact']);
 $result = mysql_query("SELECT * FROM contact");
$myrow = mysql_fetch_array($result);
do
{
	?>
	<dt><?= $myrow['name'] ?>:</dt>
  <dd> <div class="form-group">
  <button type="button" class="btn btn-default btn-block"><? if ($contact[$myrow['id']]!="") echo($contact[$myrow['id']]); else echo("Не указан");  ?></button>
  
 </div></dd>
  <?

}
while ($myrow = mysql_fetch_array($result));
?>
 
<?
   $pay_method=unserialize($user['pay_method']);
   $result = mysql_query("SELECT * FROM pay_method");
$myrow = mysql_fetch_array($result);
do
{
	if ($myrow['active']=="0") $dis="disabled";
?>
	<dt><?= $myrow['name'] ?>:</dt>
  <dd> <div class="form-group">
  <button type="button" <?= $dis ?> class="btn btn-default btn-block"><? if ($pay_method[$myrow['id']]!="") echo ($pay_method[$myrow['id']]); else 
  
  if ($myrow['active']!="0") echo("Не указан"); else echo("Не доступен")  ?></button>
  
  
  </div></dd>
  <?
$dis="";
}
while ($myrow = mysql_fetch_array($result));
?>
  
  
</dl>