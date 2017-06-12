<? session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
//if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/db.class.php'); 
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/favicon.class.php');
require_once (CLASS_PATH.'/autoring.class.php'); 

if (!autoring::is_autoring()) header("Location: ../login/");
require_once (CLASS_PATH.'/systems.class.php');
$groups=autoring::groups();
$user=autoring::get_user($_GET['id']);
//print_r($user);
?>
<?= systems::head(); ?>
<div class="container container_user_data">
<div class="page-header">
		<h1 style="margin: 0px 0 10px 0;"><small>Пользователь: </small><strong><?= $user['name']?></strong><small>, id: <?= $_GET['id'] ?></small></h1>
</div>
<div class="col-sm-6 col-md-6 col-lg-6"><h4 class="text-left text_white"><span class="fa fa-calendar-plus-o fa-lg"></span> <?= date("d.m.Y H:i.s", $user['registration']); ?></h4></div>
<div class="col-sm-6 col-md-6 col-lg-6"><h4 class="text-right text_white"><span class="fa <?= $groups[$user['users_group']]['fa_user'] ?> fa-lg"></span> <?= $groups[$user['users_group']]['name_group'] ?></h4></div>
<div id="user_block" class="col-sm-6 col-md-6 col-lg-6 panel panel-default"><h3 class="text-center"><span class="fa fa-address-card-o fa-lg"></span> Контакты:</h3>
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
</div>
<div id="stat_block" class="col-sm-6 col-md-6 col-lg-6 panel panel-default"><h3 class="text-center"><span class="fa fa-calculator fa-lg"></span><strong>Статистика:</strong></h3>
<dl class="dl-horizontal">
  <dt>Текущий баланс:</dt>
  <dd>  <div class="form-group"><button type="button" class="btn <? if ($user['balance']<0) echo('btn-danger text_white'); else if ($user['balance']>0) echo ('btn-success text_white'); else echo ('btn-default drop_color') ?> btn-block"><? if ($user['balance']>0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span>'); else if ($user['balance']!=0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span>'); ?> <?= $user['balance'] ?> <?= CURRENCY ?></button></div>
</dd>
  <dt>Всего заработано:</dt>
  <dd>  <div class="form-group"><button type="button" class="btn <? if ($user['total_balance']<0) echo('btn-danger text_white'); else if ($user['total_balance']>0) echo ('btn-success text_white'); else echo ('btn-default drop_color') ?> btn-block"><? if ($user['total_balance']>0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span>'); else if ($user['total_balance']!=0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span>'); ?> <?= $user['total_balance'] ?> <?= CURRENCY ?></button></div>
</dd>
  <dt>Текущие продажи:</dt>
  <dd>  <div class="form-group"><button type="button" class="btn btn-default  btn-block"><?= $user['sale'] ?></button></div>
</dd>
  <dt>Всего продаж:</dt>
  <dd>  <div class="form-group"><button type="button" class="btn btn-default btn-block"><?= $user['total_sale'] ?></button></div>
</dd>
  <dt>Из них успешных:</dt>
  <dd>  <div class="form-group"><button type="button" class="btn  <? if ($user['sale_ok']<0) echo('btn-danger text_white'); else if ($user['sale_ok']>0) echo ('btn-success text_white'); else echo ('btn-default drop_color') ?>  btn-block"><? if ($user['sale_ok']>0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span>'); else if ($user['sale_ok']!=0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span>'); ?> <?= $user['sale_ok'] ?></button></div>
</dd>
</dl>
</div>


</div>




<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript"> $(document).ready(function() {$('#stat_block').height($('#user_block').height());}); </script>
	<script src="<?= JS_PATH ?>/bootstrap.min.js"></script>
    
  </body>
</html>
<?// } else echo ("Слоны идут нахер!"); ?>