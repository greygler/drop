<? session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
//if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/db.class.php'); 
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/favicon.class.php');
require_once (CLASS_PATH.'/autoring.class.php'); 

if (!autoring::is_autoring()) header("Location: ../login/");
require_once (CLASS_PATH.'/users.class.php');
require_once (CLASS_PATH.'/systems.class.php');
$groups=autoring::groups();
$user=autoring::get_user($_GET['id']);
//print_r($user);
?>
<?= systems::head(); ?>
<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="<?= JS_PATH ?>/clipboard.min.js"></script>
<div class="container container_user_data">
<div class="page-header">
		<h1 style="margin: 0px 0 10px 0;"><small>Пользователь: </small><strong><?= $user['name']?></strong><small>, id: <?= $_GET['id'] ?></small></h1>
</div>
<div class="col-sm-6 col-md-6 col-lg-6"><h4 class="text-left text_white"><span class="fa fa-calendar-plus-o fa-lg"></span> <?= date("d.m.Y H:i.s", $user['registration']); ?></h4></div>
<div class="col-sm-6 col-md-6 col-lg-6"><h4 class="text-right text_white"><span class="fa <?= $groups[$user['users_group']]['fa_user'] ?> fa-lg"></span> <?= $groups[$user['users_group']]['name_group'] ?></h4></div>
<div id="user_block" class="col-sm-6 col-md-6 col-lg-6 panel panel-default"><h3 class="text-center"><span class="fa fa-address-card-o fa-lg"></span> Контакты:</h3>

<? include("user_contacts.php"); ?>


</div>
<div id="stat_block" class="col-sm-6 col-md-6 col-lg-6 panel panel-default"><h3 class="text-center">

<span class="fa fa-money fa-lg"></span> <strong>Заказ выплаты:</strong><br><small><?= $user['order_pay']?> <?= CURRENCY ?></small></h3>
<div>
<button id="order-pay_button" class="btn btn-primary btn-block form-group" data-toggle="modal" data-target="#user-pay_modal">Выплатить</button>
</div>


<h3 class="text-center"><span class="fa fa-history fa-lg"></span> <strong>История выплат:</strong></h3>
<div>
<iframe name="history" id="frame_history" src="<?= ACTION_PATH ?>/pay_history.php/?id=<?= $_GET['id']; ?>" width="100%" height="150"></iframe>
</div>
</div>


</div>

<?= users::user_pay($_GET['id']) ?>



<script type="text/javascript"> $(document).ready(function() {
	var block=$('#user_block').height();
	var frame=block/2+50;
	$('#stat_block').height(block);
	$('#frame_history').height(frame);
});

 </script>
	<script src="<?= JS_PATH ?>/bootstrap.min.js"></script>
    
  </body>
</html>
<?// } else header("Location: ".$_SERVER['DOCUMENT_ROOT']."/error/666.php"); ?>