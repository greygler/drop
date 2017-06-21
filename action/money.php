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
<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="<?= JS_PATH ?>/clipboard.min.js"></script>
<? if ($_GET['frame']=='no') { ?>

<div class="container container_user_data">
<div class="page-header">
		<h1 style="margin: 0px 0 10px 0;"><small>История движения средств: </small><strong><?= $user['name']?></strong><small>, id: <?= $_GET['id'] ?></small></h1>
</div>
<? } ?>
<table class="<? if ($_GET['frame']=='no') echo('table'); else echo('table-responsive') ?> table-striped" border="1">
<thead>
<th>Дата</th>
<th>Сумма</th>
<th>Order ID</th>
<th>Комментарий</th>
</thead>
<tbody>
<? $count_pay=db::cound_bd("money", "user_id='{$_GET['id']}'");
if ($count_pay>0) { 
 $result = mysql_query("SELECT * FROM money  WHERE user_id='{$_GET['id']}' ORDER BY `id` DESC");
$myrow = mysql_fetch_array($result);
do
{
?>
<tr> 
<td><?= date("d.m.y H.i.s", $myrow['datetime']) ?></td>
<td><? if ($myrow['name']!=1) echo ('<font color="red">-'); else echo ('<font color="green">+')  ?><?= $myrow['summ']; ?> <?= CURRENCY ?></font></td>
<td>

		<div class="input-group">
      
      <input id="order-id_<?= $myrow['id']; ?>" type="text" class="form-control" readonly value="<?= $myrow['order_id']; ?>">
	  <span class="input-group-btn">
        <button title="Скопировать в буфер" data-clipboard-target="#order-id_<?= $myrow['id']; ?>" class="btn btn-default input-order-btn_<?= $myrow['id']; ?>" type="button"><i class="fa fa-clipboard" aria-hidden="true"></i></button>
      </span>
    </div>
	
	 <script>new Clipboard('.input-order-btn_<?= $myrow['id']; ?>'); </script> 
	  </td>
<td><?= $myrow['comment']; ?></td>
</tr>
<? }
while ($myrow = mysql_fetch_array($result)); 
 }
else echo('<tr><td colspan="5">История пуста</td><tr>'); ?>
</tbody>
</table>
<script src="<?= JS_PATH ?>/bootstrap.min.js"></script>
</body>
</html>

<?// } else header("Location: ".SITE_ADDR."/error/666.php"); ?>