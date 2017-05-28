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
<div class="col-sm-6 col-md-6 col-lg-6"><h4 class="text-left"><span class="fa fa-calendar-plus-o fa-lg"></span> <?= date("d.m.Y", $user['registration']); ?></h3></div>
<div class="col-sm-6 col-md-6 col-lg-6"><h4 class="text-right"><span class="fa <?= $groups[$user['users_group']]['fa_user'] ?> fa-lg"></span><?= $groups[$user['users_group']]['name_group'] ?></h3></div>
<div class="col-sm-6 col-md-6 col-lg-6"><h3 class="text-center"><span class="fa fa-address-card-o fa-lg"></span> Контакты:</h3>
<dl class="dl-horizontal">
  <dt>E-mail:</dt>
  <dd><?= $user['email'] ?></dd>
  <dt>Phone:</dt>
  <dd>Телефон</dd>
  <dt>Skype:</dt>
  <dd>Skype</dd>
  <dt>Счет:</dt>
  <dd>43534534534535</dd>
</dl>
</div>
<div class="col-sm-6 col-md-6 col-lg-6"><h3 class="text-center"><span class="fa fa-calculator fa-lg"></span><strong>Статистика:</strong></h3>
<dl class="dl-horizontal">
  <dt>Текущий баланс:</dt>
  <dd><?= $user['balance'] ?></dd>
  <dt>Всего заработано:</dt>
  <dd><?= $user['balance'] ?></dd>
  <dt>Текущие продажи:</dt>
  <dd>7</dd>
  <dt>Всего продаж:</dt>
  <dd>12</dd>
  <dt>Из них успешных:</dt>
  <dd>11</dd>
</dl>
</div>


</div>




<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
    <script src="/js/gnmenu.js"></script>
	<script src="/js/jquery.fancybox.min.js"></script>
  </body>
</html>