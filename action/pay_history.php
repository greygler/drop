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
<table class="table table-responsiv" border="1">
<thead>
<th>Заказ</th>
<th>Выплата</th>
<th>Сумма</th>
<th>Способ</th>
<th>Комментарий</th>
</thead>
<tbody>

<tr> 
<td><?= date("d.m.y H.i.s") ?></td>
<td><?= date("d.m.y H.i.s") ?></td>
<td>1500 <?= CURRENCY ?></td>
<td>Карта приват</td>
<td>Комментарий</td>
</tr>
<tr> 
<td><?= date("d.m.y H.i.s") ?></td>
<td><?= date("d.m.y H.i.s") ?></td>
<td>1500 <?= CURRENCY ?></td>
<td>Карта приват</td>
<td>Комментарий</td>
</tr>

</tbody>
</table>
<? } else header("Location: ".$_SERVER['DOCUMENT_ROOT']."/error/666.php"); ?>