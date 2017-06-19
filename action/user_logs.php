<? session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/db.class.php'); 
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/favicon.class.php');
require_once (CLASS_PATH.'/autoring.class.php'); 
require_once (CLASS_PATH.'/pagination.class.php');
if (!autoring::is_autoring()) header("Location: ../login/");
require_once (CLASS_PATH.'/systems.class.php');
require_once (CLASS_PATH.'/functions.class.php');

//print_r($user);
?>
<?= systems::head(); ?>
<div class="container container_user_data">
<div class="page-header">
		<h1 style="margin: 0px 0 10px 0;"><small>История входов, id: <?= $_GET['id'] ?></small></h1>
</div>
<? 
$count_logs=db::cound_bd('enter_log',"user_id='{$_GET['id']}'");
$limit=pagination::pagin($_GET, $count_logs, $view_pages,$_SERVER['PHP_SELF']); 	?>
<table class="table table-striped" >
<thead>
	<tr valign="middle">
		<th>Дата, время</th>
		<th>IP-адрес, город, регион</th>
		<th>Устройство</th>
		
	</tr>
</thead>	
	
	<tbody>
	 <? $result = mysql_query("SELECT * FROM enter_log WHERE user_id='{$_GET['id']}' ORDER BY id DESC  LIMIT {$limit['begin']}, {$limit['count']}");
		$myrow = mysql_fetch_array($result);
		do
		{ 
		$device=func::device($myrow['device'],$myrow['agent']);
		?>
		<tr>
		<td>
		<dl class="dl-horizontal dl-order">
		<dt><i class="fa fa-calendar" aria-hidden="true"></i></dt><dd><?= date("d.m.Y", $myrow['last_time']); ?></dd>
		<dt><i class="fa fa-clock-o" aria-hidden="true"></i></dt><dd><?= date("H:i:s", $myrow['last_time']); ?></dd>
		</dl>
		</td>
		<td>
		<dl class="dl-horizontal dl-order">
		<? if ($myrow['country']!='AA') $flag="flag-{$myrow['country']}"; else $flag='fa fa-flag'; ?>
		
		<dt><i class="fa fa-globe" aria-hidden="true"></i></dt><dd><?=  $myrow['ipv4']; ?></dd>
		<dt><i class="fa fa-map-marker" aria-hidden="true"></i></dt><dd><?= $myrow['city']; ?></dd>
		<dt><i class="fa <?= $flag ?>" aria-hidden="true"></i></dt><dd><?= $myrow['region']; ?></dd>
		</dl>
		
		</td>
		<td>
		
		<dl class="dl-horizontal dl-order">
				<? if ($myrow['device']!='0') $dev_symbol="fa-mobile"; else $dev_symbol="fa-desktop"; ?>
		<dt><i title="<?=  $device['device']; ?>" class="fa <?= $dev_symbol ?>" aria-hidden="true"></i></dt><dd><?= $device['os']; ?></dd>
		<dt><i class="fa fa-terminal" aria-hidden="true"></i></dt><dd><?= $device['browser']; ?></dd>
		</dl>
		</td>
		</tr>
		<? //echo $myrow['ИМЯ_ПОЛЯ1'];
		//echo $myrow['ИМЯ_ПОЛЯ2'];
		 }
		while ($myrow = mysql_fetch_array($result));
		?>
	
	<tbody>
	</table>
<? $limit=pagination::pagin($_GET, $count_logs, $view_pages,$_SERVER['PHP_SELF']); 	?>

</div>




<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="<?= JS_PATH ?>/bootstrap.min.js"></script>
  
  </body>
</html>
<? } else header("Location: ".$_SERVER['DOCUMENT_ROOT']."/error/666.php"); ?>