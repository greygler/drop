<? 
//session_start();
 if (!isset($_SESSION['info_profile'])) autoring::update_user_info($_SESSION['id']); 
 else {autoring::update_user_info($_SESSION['id']); $_SESSION['info_profile']="1"; }
$last_enter=unserialize($_SESSION['last_enter']);

?>

<div class="page-header lead">
		<h1><small class="text_white">Пользователь: </small><wbr><strong><?= $_SESSION['name']?></strong><small class="text_white">, id: <?= $_SESSION['id'] ?></small></h1>
</div>

<? if  ($last_enter['agent']!="") 
echo func::Last_enter($last_enter, $_SESSION['device'], $_SESSION['ipv4'], $_SESSION['city'], $_SESSION['region'], $_SESSION['country'], $_SESSION['agent']);  

?>
<div class="col-sm-6 col-md-6 col-lg-6 text_white"><h4 class="text-left">
<span class="fa fa-calendar-plus-o fa-lg"></span> <?= date("d.m.Y H:i:s", $_SESSION['registration']); ?></h4></div>
<div class="col-sm-6 col-md-6 col-lg-6 text_white">
<h4 class="text-right"><span class="fa <?= $_SESSION['fa_user']  ?> fa-lg"></span> <?= $_SESSION['name_group'] ?></h4></div>


<div id="user_block" class="col-sm-6 col-md-6 col-lg-6 panel panel-default panel_user">
<?= users::profile(); ?>

</div>

<div id="stat_block" class="col-sm-6 col-md-6 col-lg-6 panel panel-default panel_user">

 <script src="<?= JS_PATH ?>/stat.php"></script>

<h3 class="text-center"><span class="fa fa-cogs fa-lg"></span> <strong>Настройки</strong></h3><br>
<form action="javascript:void(null);" onsubmit="new_code(<?= $_SESSION['id'] ?>)" >
<dl class="dl-horizontal">
  <dt>Автоматическая<br>передача заказа:</dt>
  <dd><input onchange='active_drop(<?= $_SESSION['id'] ?>)' id="checkbox_active" type="checkbox"  name="checkbox" <? if ($_SESSION['active_drop']=='1') echo("checked"); ?>><span class="help-block"><small> <span class="active_drop"><? if  ($_SESSION['active_drop']=='1') echo('<font color="blue">Включена</font>'); else echo('<font color="#737373">Отключена</font>'); ?></span></small></span>
  </dd>
   <dt>Прием<br>дублирующих заказов:<span class="help-block"><small>Без автопередачи</small></span></dt>
  <dd><input onchange='take_drop(<?= $_SESSION['id'] ?>)' id="checkbox_take" type="checkbox"  name="checkbox" <? if ($_SESSION['take_drop']=='1') echo("checked"); ?>><span class="help-block"><small> <span class="take_drop"><? if  ($_SESSION['take_drop']=='1') echo('<font color="blue">Включена</font>'); else echo('<font color="#737373">Отключена</font>'); ?></span></small></span>
   
  </dd>
  <dt>Телеграм-бот <? if ($_SESSION['telegram']!="") echo ("<br>уведомления:"); ?></dt>
  <dd>
  <? if ($_SESSION['telegram']!="") { ?>
<input onchange='active_tbot(<?= $_SESSION['id'] ?>)' id="checkbox_tbot" type="checkbox"  name="checkbox" <? if ($_SESSION['tbot']=='1') echo("checked"); ?>><span class="help-block"><small> <span class="active_tbot"><? if  ($_SESSION['tbot']=='1') echo('<font color="blue">Включенo</font>'); else echo('<font color="#737373">Отключено</font>'); ?></span></small></span>
  <? } else {?> 
  <div id="form_v_tbot" class="form-group"><a id="tbot_button" class="btn btn-default btn-block" data-toggle="modal" data-target="#tbot">Подключить</a><span class="help-block hide" id="link_ver_bot" ><a  data-toggle="modal" data-target="#tbot_ver" >Ввести код верификации</a></span></div>
  <div id="check_tbot" class="hide">
  <input onchange='active_tbot(<?= $_SESSION['id'] ?>)' id="checkbox_tbot" type="checkbox"  name="checkbox" <? if ($_SESSION['tbot']=='1') echo("checked"); ?>><span class="help-block"><small> <span class="active_tbot"><? if  ($_SESSION['tbot']=='1') echo('<font color="blue">Включенo</font>'); else echo('<font color="#737373">Отключено</font>'); ?></span></small></span>
  </div>
  
  <? } ?>
  </dd>
  <dt>Секретный токен:</dt>
  <dd>
   <div class="input-group">
  <input id="drop_key" style="cursor: text;" type="text" class="form-control" value="<?= $_SESSION['drop_key'] ?>"  readonly>
  <span class="input-group-btn">
        <button id="new_drop_code"  data-toggle="tooltip" data-placement="bottom" title="Пересоздать токен" class="btn btn-default" type="submit"><i id="refresh_code" class="fa fa-refresh fa-lg fa-fw"></i></button>
      </span>
	 
  </div>
   <span class="help-block">Внимание! После изменения токена могут не приниматься заказы, в которых указан старый токен!</span>
  </dd>
 
  </dl>
</form>
<div class="form-group">
<a class="btn btn-info btn-block " data-toggle="tooltip" data-placement="bottom" title="Логи входов" data-fancybox data-src="<?= ACTION_PATH ?>/money.php?id=<?= $_SESSION['id']?>&frame=no" href="javascript:;">Движение средств</a></div>
<div class="form-group">
<a class="btn btn-info btn-block " data-toggle="tooltip" data-placement="bottom" title="Логи входов" data-fancybox data-src="<?= ACTION_PATH ?>/user_logs.php?id=<?= $_SESSION['id']?>" href="javascript:;">История авторизаций</a></div>

</div>


<?= users::user_modal(); ?>
<? if ($_SESSION['v_email']!=$_SESSION['email'])  echo users::modal_email(); ?>
<?= users::modal_phone();?>


<? $geobase='yes'; ?>


