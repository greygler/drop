<? session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
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
<? if ($_GET['frame']=='no') { ?>

<div class="container container_user_data">
<div class="page-header">
		<h1 style="margin: 0px 0 10px 0;"><small>История выплат: </small><strong><?= $user['name']?></strong><small>, id: <?= $_GET['id'] ?></small></h1>
</div>
<? } ?>
<table class="<? if ($_GET['frame']=='no') echo('table'); else echo('table-responsive') ?> table-striped" border="1">
<thead>
<th>Заказ</th>
<th>Выплата</th>
<th>Сумма</th>
<th>Способ</th>
<th>Комментарий</th>
</thead>
<tbody>
<? $count_pay=db::cound_bd("pay_history", "user_id='{$_GET['id']}'");
if ($count_pay>0) { 
 $pay_method=autoring::pay_method("WHERE active!=0");
 $pay_status=autoring::pay_status();
 $result = mysql_query("SELECT * FROM pay_history  WHERE user_id='{$_GET['id']}' ORDER BY `id` DESC");
$myrow = mysql_fetch_array($result);
do
{
?>
<tr> 
<td><?= date("d.m.y H.i.s", $myrow['date_order']) ?></td>
<td><? if ($myrow['date_pay']!="") echo($pay_status[$myrow['pay_status']]."<br>".date("d.m.y H.i.s",$myrow['date_pay'])); else echo("Ожидаем") ?></td>
<td><?= $myrow['summ']; ?> <?= CURRENCY ?></td>
<td><?= $pay_method[$myrow['method_pay']]; ?></td>
<td><?= $myrow['comment']; ?></td>
</tr>
<? }
while ($myrow = mysql_fetch_array($result)); 
 }
else echo('<tr><td colspan="5">История пуста</td><tr>'); ?>
</tbody>
</table>

<? } else header("Location: ".SITE_ADDR."/error/666.php"); ?>