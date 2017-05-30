<? session_start();
require_once ('../config.php');
require_once ("../class/db.class.php"); 
require_once ("../class/autoring.class.php"); 

if (!autoring::is_autoring()) header("Location: ../login/");

require_once ('../head.php');
$groups=autoring::groups();
$user=autoring::get_user($_GET['id']);
//print_r($user);
?>
<div class="container container_user_data">
<div class="page-header">
		<h1 style="margin: 0px 0 10px 0;"><small>Пользователь: </small><strong><?= $user['name']?></strong><small>, id: <?= $_GET['id'] ?></small></h1>
</div>
<div class="col-sm-6 col-md-6 col-lg-6"><h4 class="text-left text_white"><span class="fa fa-calendar-plus-o fa-lg"></span> <?= date("d.m.Y H:i.s", $user['registration']); ?></h4></div>
<div class="col-sm-6 col-md-6 col-lg-6"><h4 class="text-right text_white"><span class="fa <?= $groups[$user['users_group']]['fa_user'] ?> fa-lg"></span> <?= $groups[$user['users_group']]['name_group'] ?></h4></div>
<div class="col-sm-6 col-md-6 col-lg-6 panel panel-default"><h3 class="text-center"><span class="fa fa-address-card-o fa-lg"></span> Контакты:</h3>
<dl class="dl-horizontal">
  <dt>E-mail:</dt>
  <dd><button type="button" class="btn btn-default btn-block"><?= $user['email'] ?></button></dd>
  <dt>Phone:</dt>
  <dd><button type="button" class="btn btn-default btn-block"><?= $user['phone'] ?></button></dd>
  <dt>Skype:</dt>
  <dd><button type="button" class="btn btn-default btn-block"><?= $user['skype'] ?></button></dd>
  <dt>WM:</dt>
  <dd><button type="button" class="btn btn-default btn-block"><?= $user['wm'] ?></button></dd>
  <dt>Еще что-то:</dt>
  <dd><button type="button" class="btn btn-default btn-block">43534534534535</button></dd>
</dl>
</div>
<div class="col-sm-6 col-md-6 col-lg-6 panel panel-default"><h3 class="text-center"><span class="fa fa-calculator fa-lg"></span><strong>Статистика:</strong></h3>
<dl class="dl-horizontal">
  <dt>Текущий баланс:</dt>
  <dd><button type="button" class="btn <? if ($user['balance']<0) echo('btn-danger text_white'); else if ($user['balance']>0) echo ('btn-success text_white'); else echo ('btn-default drop_color') ?> btn-block"><? if ($user['balance']>0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span>'); else if ($user['balance']!=0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span>'); ?> <?= $user['balance'] ?> <?= CURRENCY ?></button></dd>
  <dt>Всего заработано:</dt>
  <dd><button type="button" class="btn <? if ($user['total_balance']<0) echo('btn-danger text_white'); else if ($user['total_balance']>0) echo ('btn-success text_white'); else echo ('btn-default drop_color') ?> btn-block"><? if ($user['total_balance']>0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span>'); else if ($user['total_balance']!=0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span>'); ?> <?= $user['total_balance'] ?> <?= CURRENCY ?></button></dd>
  <dt>Текущие продажи:</dt>
  <dd><button type="button" class="btn btn-default  btn-block"><?= $user['sale'] ?></button></dd>
  <dt>Всего продаж:</dt>
  <dd><button type="button" class="btn btn-default btn-block"><?= $user['total_sale'] ?></button></dd>
  <dt>Из них успешных:</dt>
  <dd><button type="button" class="btn  <? if ($user['sale_ok']<0) echo('btn-danger text_white'); else if ($user['sale_ok']>0) echo ('btn-success text_white'); else echo ('btn-default drop_color') ?>  btn-block"><? if ($user['sale_ok']>0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span>'); else if ($user['sale_ok']!=0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span>'); ?> <?= $user['sale_ok'] ?></button></dd>
</dl>
</div>


</div>




<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
    <script src="/js/gnmenu.js"></script>
	<script src="/js/jquery.fancybox.min.js"></script>
  </body>
</html>