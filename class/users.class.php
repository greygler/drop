<?
class Users
{

public function stata()
{
?>
	<h3 class="text-right"><span class="fa fa-calculator fa-lg"></span><strong>Статистика </strong><wbr><small>На <?= date("d.m.y H:i:s") ?></small></h3>
<dl class="dl-horizontal">
  <dt>Текущий баланс:</dt>
  <dd><div class="form-group"><button type="button" class="btn <? if ($_SESSION['balance']<0) echo('btn-danger text_white'); else if ($_SESSION['balance']>0) echo ('btn-success text_white'); else echo ('btn-default drop_color') ?> btn-block"><? if ($_SESSION['balance']>0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span>'); else if ($_SESSION['balance']!=0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span>'); ?> <?= $_SESSION['balance'] ?> <?= CURRENCY ?></button></div></dd>
  <dt>Всего заработано:</dt>
  <dd><div class="form-group"><button type="button" class="btn <? if ($_SESSION['total_balance']<0) echo('btn-danger text_white'); else if ($_SESSION['total_balance']>0) echo ('btn-success text_white'); else echo ('btn-default drop_color') ?> btn-block"><? if ($_SESSION['total_balance']>0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span>'); else if ($_SESSION['total_balance']!=0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span>'); ?> <?= $_SESSION['total_balance'] ?> <?= CURRENCY ?></button></div></dd>
  <dt>Текущие продажи:</dt>
  <dd><div class="form-group"><button type="button" class="btn btn-default  btn-block"><?= $_SESSION['sale'] ?></button></div></dd>
  <dt>Всего продаж:</dt>
  <dd><div class="form-group"><button type="button" class="btn btn-default btn-block"><?= $_SESSION['total_sale'] ?></button></div></dd>
  <dt>Из них успешных:</dt>
  <dd><div class="form-group"><button  type="button" class="btn  <? if ($_SESSION['sale_ok']<0) echo('btn-danger text_white'); else if ($_SESSION['sale_ok']>0) echo ('btn-success text_white'); else echo ('btn-default drop_color') ?>  btn-block"><? if ($_SESSION['sale_ok']>0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span>'); else if ($_SESSION['sale_ok']!=0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span>'); ?> <?= $_SESSION['sale_ok'] ?></button></div></dd> 
  <dt></dt><dd><div class="form-group"><button id="order-pay_button" data-toggle="modal" data-target="#order-pay_modal" type="button"  <? 
  if (($_SESSION['balance']<MIN_PAY) OR ($_SESSION['order_pay']>=MIN_PAY))  echo('disabled="disabled"'); ?> class="btn <? if ($_SESSION['balance']>=0) echo('btn-primary'); else echo('btn-danger') ?> btn-block" ><? if (($_SESSION['balance']<MIN_PAY) AND ($_SESSION['balance']>=0)) echo('Выплата не доступна!'); else if (($_SESSION['balance']>0) AND ($_SESSION['order_pay']<=MIN_PAY)) echo('Заказать выплату'); else 
  if ($_SESSION['order_pay']>1) echo ('Заказана выплата '.$_SESSION['order_pay'].'&#160;'.CURRENCY); else if ($_SESSION['balance']<0)
  echo('Отрицательный баланс!') ?></button>
  <? if (($_SESSION['order_pay_id']!="") AND ($_SESSION['order_pay_id']!=0)) echo('<span class="help-block"><small>Последний статус выплаты: <strong>'.autoring::last_status_pay($_SESSION['order_pay_id']).'</strong></small><span>'); 
$history_count=db::cound_bd("pay_history", "id={$_SESSION['id']}")
?></div>
<div class="form-group">
<a data-toggle="tooltip" data-placement="bottom" data-fancybox data-src="<?= ACTION_PATH ?>/pay_history.php?id=<?= $_SESSION['id'] ?>&frame=no" href="javascript:;" class="btn btn-default btn-block">История выплат - <?= $history_count ?> записей</a></div>

<? if ($_SESSION['balance']>0) echo('<span class="help-block">Минимальная сумма выплат - '.MIN_PAY.' '.CURRENCY.'</span>'); else echo('<span class="help-block">Дальнейшая работа только по предоплате<br>или после погашения задолженности!</span>'); ?><a data-toggle="modal" data-target="#rules_modal" href="#">Правила работы с системой <?= TITLE ?></a>
   </dd>
  </dl>
	<?
}

public function order_pay()
{
	?>
	<script src="<?= JS_PATH ?>/order_pay.php"></script>

<div class="modal fade" id="order-pay_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
	 <form id="order_form" class="form-signin" action="javascript:void(null);" onsubmit="order_pay(<?= $_SESSION['id']; ?>)">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Заказ выплаты</h4>
      </div>
	  <div class="modal-body">
      
	   <input type="hidden" name='id' value="<?= $_SESSION['id'] ?>">
	   <div class="form-group">
	   
	   <div class="input-group">
  <span class="input-group-addon"><?= CURRENCY ?></span>
 	   <input id="order_summ" type="number" class="form-control text-right" name="order_summ" value="<?= (int)$_SESSION['balance'] ?>">
	   <span class="input-group-addon">.00</span>
</div></div>
<div class="form-group">
<select name="pay_method" id="pay_method" class="form-control">
<? $pay_method=autoring::pay_method("WHERE active!=0");
foreach  ($pay_method as $key => $value) { ?> 
<option value="<?= $key ?>"><?= $value ?></option>
<? } ?>
</select>
</div>
<div class="pay_order_result"></div>
	  
      </div>
	  <div class="modal-footer">
        <button id="op_modal_cancel" type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
        <button id="op_modal_button" type="submit" class="btn btn-primary">Заказать</button>
      </div>
	   </form>
    </div>
  </div>
</div>
	<?
}

public function user_pay($user_id)
{
	?>
	<script src="<?= JS_PATH ?>/order_pay_go.php"></script>
	
<? $user=autoring::get_user($_GET['id']); 
$pay_method=autoring::pay_method("WHERE active!=0");
$pm=unserialize($user['pay_method']);?>
<div class="modal fade" id="user-pay_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
	 <form id="order_form_go" class="form-signin" action="javascript:void(null);" onsubmit="order_pay_go(<?= $_SESSION['id']; ?>)">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Выплата пользователю <br><?= $user['name']; ?>, ID:<?= $user_id ?></h4>
      </div>
	  <div class="modal-body">
      
	   <input type="hidden" name='id' value="<?= $user_id ?>">
	   
	   <div class="row"> 
	   <div class="form-group col-sm-6 col-md-6 col-lg-6">
	   <label for="order_summ">Заказанная сумма:</label>
	   <div class="input-group">
  <span class="input-group-addon"><?= CURRENCY ?></span>
 	   <input id="order_summ" type="text" class="form-control text-right" name="order_summ" value="<?= $user['order_pay'] ?>">
	   <span class="input-group-btn">
	   <button title="Скопировать в буфер"  data-clipboard-target="#order_summ" class="btn btn-default btn-clipboard_summ" type="button"><i class="fa fa-clipboard" aria-hidden="true"></i></button>
      </span>
</div> <script>new Clipboard('.btn-clipboard_summ'); </script> </div>
<div class="form-group col-sm-6 col-md-6 col-lg-6">
<label for="pay_method"><?= $pay_method[$user['order_pay_method']] ?>:</label>
<div class="input-group">
     
      <input  id="pay_method" type="text" readonly value="<?= $pm[$user['order_pay_method']]; ?>" class="form-control">
	   <span class="input-group-btn">
        <button title="Скопировать в буфер"  data-clipboard-target="#pay_method" class="btn btn-default btn-clipboard_pm" type="button"><i class="fa fa-clipboard" aria-hidden="true"></i></button>
      </span>
	  
    </div>
  <script>new Clipboard('.btn-clipboard_pm'); </script> 

</div>
</div>

<div class="form-group">
<select name="pay_status" id="pay_status" class="form-control">
<? $pay_status=autoring::pay_status();
foreach  ($pay_status as $key => $value) { ?> 
<option <? if ($key==0) echo("disabled"); ?> value="<?= $key ?>"><? if ($key==0) echo("&#128274;"); ?> <?= $value ?></option>
<? } ?>
</select>
</div>

<div class="form-group">
<textarea placeholder="Комментарий к выплате" class="form-control" name="comment" id="comment" cols="30" rows="5"></textarea>
</div>

<div class="pay_order_result"></div>
	  
      </div>
	  <div class="modal-footer">
        <button id="op_modal_cancel" type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
        <button id="op_modal_button" type="submit" class="btn btn-primary">Присвоить статус</button>
      </div>
	   </form>
    </div>
  </div>
</div>
	<?
}

public function profile()
{
	?>
	
	<script src="<?= JS_PATH ?>/user.php"></script>
<script src="<?= JS_PATH ?>/user_email.php"></script>
 <script src="<?= JS_PATH ?>/user_phone.php"></script>
	<h3 class="text-center"><span class="fa fa-address-card-o fa-lg"></span> Профиль:</h3>
<form id="data_form" class="form-signin" action="javascript:void(null);" onsubmit="data_form()">
<dl class="dl-horizontal">
  <dt></dt>
<dd><button  type="button"   data-toggle="modal" data-target="#update_password" class="btn btn-danger user-buttom"><span class="pull-left fa fa-key" aria-hidden="true"></span>Cменить пароль</button></dd><div class="update_pass_results"></div>

<dt>Имя: <em>*</em></dt>
  <dd>
 <div class="form-group">
  <input id="user_name_input" class="form-control" placeholder="Ваше имя" type="text" required name="name" value="<?= $_SESSION['name'] ?>">
  </div>

  
 
  </dd>
  
  

  
  <dt>E-mail: <em>*</em></dt>
  <dd>
  <div class="form-group <? if  (autoring::is_verify_email($_SESSION)) echo('has-warning'); else echo('has-success'); ?> has-feedback">
  <input id="user_email" class="form-control" type="text" required name="email" value="<?= $_SESSION['email'] ?>" disabled>
  <? if (autoring::is_verify_email($_SESSION)) echo('<span  class="help-block control-label"><small><span class="novemail">E-mail не верифицирован!</span></small> <a data-toggle="modal" data-target="#verify_email" href="#"><small><span class="vemaillink">Верифицировать</span></small></a></span><span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>');
  else echo('<span class="glyphicon glyphicon-ok form-control-feedback"></span>');   ?>

  

 
</div>
  
 
  </dd>
  <dt>Phone: <em>*</em></dt>
  <dd>
  <div id="phone_group" class="form-group <? if (autoring::is_verify_phone($_SESSION)) echo('has-warning'); else echo('has-success'); ?> has-feedback">
  <input id="phone_num" class="form-control phone" type="text" name="phone" value="<?= $_SESSION['phone'] ?>" <? if ($_SESSION['send_sms']=='ok') echo('disabled'); ?> onchange="nohide_vphone()"> 
   <? if (($_SESSION['phone']=="") OR (!autoring::is_verify_phone()))  $hide="hide"; ?>
  <span id="phide1" class="<?= $hide ?> help-block control-label"><small class="novphone">
  <? if ($_SESSION['sms']!="") echo "SMS отправлено."; else echo("Телефон не верифицирован!");?></small>
  <a id="phide3" <? if ($_SESSION['sms']=="") echo ('class="hide"')?> data-toggle="modal" data-target="#sms_ok" href="#"><small><?= $_SESSION['sms']; ?>Ввести код из SMS</small></a>
 | <a data-toggle="modal" data-target="#verify_phone" href="#"><small class="vphonelink"><? if ($_SESSION['sms']!="") echo "Отправить повторно"; else echo("Верифицировать");?></small></a></span>
  <span id="phide2" class="glyphicon <? if (autoring::is_verify_phone($_SESSION)) echo('glyphicon-warning-sign'); else echo('glyphicon-ok');?>
     form-control-feedback"></span>
  
  

   </div>
   </dd>
   
   <?
   $contact=unserialize($_SESSION['contact']);
 $result = mysql_query("SELECT * FROM contact");
$myrow = mysql_fetch_array($result);
do
{
	if ($myrow['phone']=="1") $class="phone";
	?>
	<dt><?= $myrow['name'] ?>:</dt>
  <dd> <div class="form-group"><input id="c<?= $myrow['id'] ?>" class="form-control <?= $class ?>" type="text" name="contact[<?= $myrow['id'] ?>]" value="<?= $contact[$myrow['id']] ?>"></div></dd>
  <?
$class="";
}
while ($myrow = mysql_fetch_array($result));
?>


   <?
   $pay_method=unserialize($_SESSION['pay_method']);
 $result = mysql_query("SELECT * FROM pay_method");
$myrow = mysql_fetch_array($result);
do
{
	if ($myrow['active']=="0") $dis="disabled";
	if ($myrow['cart']=="c") $class="pcart";
	if ($myrow['cart']=="u") $class="wmu";
	if ($myrow['cart']=="r") $class="wmr";
	if ($myrow['cart']=="z") $class="wmz";
	?>
	<dt><?= $myrow['name'] ?>:</dt>
  <dd> <div class="form-group"><input id="p<?= $myrow['id'] ?>" class="form-control <?= $class ?>" <?= $dis ?> type="text" name="pay_method[<?= $myrow['id'] ?>]" value="<?= $pay_method[$myrow['id']] ?>"></div></dd>
  <?
$dis="";$class="";
}
while ($myrow = mysql_fetch_array($result));
?>  
  
  
   <dt><div class="results_form"></div></dt>
  <dd><button type="submit" class="btn btn-primary btn-block user-buttom"><span class="pull-left"><i class="fa fa-floppy-o" aria-hidden="true"></i></span>
 Сохранить</button></dd>
<input type="hidden" value="<?= $_SESSION['id'] ?>" name="id">
</dl>
</form>

	<?
}

public function modal_email()
{
	?>
	
	
<div class="modal fade" id="verify_email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Верификация E-mail</h4>
      </div>
      <div class="modal-body">
        Для верификации на Ваш E-mail будет отправленна ссылка верификации.<br>
		Для подтверждения Вашего <strong>E-mail: <?= $_SESSION['email'] ?></strong> зайдите в Вашу почту,<br>откройте письмо и перейдите по указанной в письме ссылке
      </div>
	  <form id="verify_email" class="form-signin" action="javascript:void(null);" onsubmit="verify_email(<?= $_SESSION['id'] ?>)">
	  <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Отправить письмо верификации</button>
      </div>
	  </form>
    </div>
  </div>
</div>

<div class="modal fade" id="vemail_ok" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Верификация E-mail</h4>
      </div>
      <div class="modal-body">
        Для верификации на Ваш E-mail Вам отправленна ссылка верификации.<br>
		Для подтверждения Вашего <strong>E-mail: <?= $_SESSION['email'] ?></strong> зайдите в Вашу почту,<br>откройте письмо и перейдите по указанной в письме ссылке
      </div>
	
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
       
      </div>
	
    </div>
  </div>
</div>
	
	
	<?
		
}

public function modal_phone()
{
?>
 
<div class="modal fade" id="verify_phone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Верификация телефона</h4>
      </div>
      <div class="modal-body">
        Для верификации на Ваш <strong>телефон: <span class="modal_phone"><?= $_SESSION['phone'] ?></span></strong><br>будет отправленна SMS c кодом подтверждения.<br>
		
      </div>
	  <form id="verify_phone" class="form-signin" action="javascript:void(null);" onsubmit="verify_phone()">
	  <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
        <button type="submit" class="btn btn-primary">Отправить SMS для верификации</button>
      </div>
	  </form>
    </div>
  </div>
</div>

<div class="modal fade" id="sms_ok" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Верификация телефона</h4>
      </div>
	  <form id="is_sms" class="form-signin" action="javascript:void(null);" onsubmit="is_sms()">
      <div class="modal-body">
        <span class="out_sms">
		<? if ($_SESSION['sms']!="") echo ("Введите код SMS для проверки телефона<br>{$_SESSION['phone']}") ?></span><br><br>
		
		<div id="verify_fg" class=" form-group "> <!-- has-success has-feedback -->
		<input id="code_sms" type="text" class="sms form-control" required placeholder="Код из СМС" name="code_sms">
		<input id="v_phone" type="hidden" name="v_phone" value="<?= $_SESSION['phone']?>">
		<input type="hidden" value="<?= $_SESSION['id'] ?>" name="id">
		<span id="fc-ok" class="glyphicon <? if ($_SESSION['sms']!="") echo ("hide") ?> glyphicon-ok form-control-feedback"></span>
		<span id="fc-no" class="glyphicon <? if ($_SESSION['sms']!="") echo ("hide") ?> glyphicon-remove form-control-feedback"></span>
		<span class="verify_help help-block"></span>

		</div>
      </div>
	
      <div class="modal-footer">
        <button type="button" class="sms_btn_cansel btn btn-default" data-dismiss="modal">Отмена</button>
        <button id="button_ok" type="submit" class="btn btn-primary">Подтвердить телефон</button>
      </div>
	</form>
    </div>
  </div>
</div>

<?	
	
}

public function user_modal()
{
?>

<div class="modal fade " id="update_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
   <form id="form_pass" class="form-signin" action="javascript:void(null);" onsubmit="update_password()">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Замена пароля</h4>
      </div>
      <div class="modal-body">
	  <div id="password_group" class="input-group">
 <span class="input-group-addon"><i class="fa fa-key sybmol" aria-hidden="true"></i>
</span>
       <input class="form-control" required type="password" name="old_password" placeholder="Действующий пароль"></div>
	   <div class="results"></div>
	   <div id="password1_group" class="input-group">
 <span class="input-group-addon"><i class="fa fa-key sybmol" aria-hidden="true"></i>
</span>
	   <input id="password1"  required class="form-control" type="password" name="new_password1" placeholder="Новый пароль"></div>
	   <div id="password2_group" class="input-group">
 <span class="input-group-addon"><i class="fa fa-key sybmol" aria-hidden="true"></i>
</span>
	   <input id="password2" required class="form-control" type="password" name="new_password2" placeholder="Новый пароль повторно"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Сменить пароль</button>
      </div>
    </div>
   </form>
  </div>
</div>

<div class="modal fade" id="form_ok" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Обновление профиля</h4>
      </div>
      <div class="modal-body">
        Данные сохранены успешно!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
       
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="password_ok" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Замена пароля</h4>
      </div>
      <div class="modal-body">
        Пароль заменен успешно!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
       
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="tbot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
   <form id="bot_form" class="form-signin" action="javascript:void(null);" onsubmit="tbot()">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Подключение Телеграм-бота</h4>
      </div>
      <div class="modal-body">
	  <ul class="text-left fa-ul">
	  <li><i class="fa fa-telegram sybmol" aria-hidden="true"></i> Зайдите в свой Телеграм-мессенджер,</li><li><i class="fa fa-telegram" aria-hidden="true"></i> Найдите и добавьте в контакты бот <strong>@<?= TELEGRAM_BOT_NAME ?></strong></li>
	  <li><i class="fa fa-telegram" aria-hidden="true"></i> Дайте команду <strong>/start</strong> или нажмите соответсвтующую кнопку</li>
	  <li><i class="fa fa-telegram" aria-hidden="true"></i> Бот Вам сообщит Ваш ID, в виде:<br><em><strong>Ваш ID в системе: ХХХХХХХ</strong></em>, где ХХХХХХХ - какое-то число</li>
	  <li><i class="fa fa-telegram" aria-hidden="true"></i> Присвоенный Вам ID впишите в поле ниже:</li>
	  </ul>
	  <br>
	  <div class="form-group">
	   <div class="input-group">
 <span class="input-group-addon"><i class="fa fa-telegram sybmol" aria-hidden="true"></i>
</span>
	   <input id="tbot_id" required class="form-control" type="text" name="tbot_id" placeholder="Ваш ID в боте @<?=TELEGRAM_BOT_NAME ?>"></div>
      </div>  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Подключиться</button>
      </div>
    </div>
   </form>
  </div>
</div>

<div class="modal fade" id="tbot_ver" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
   <form id="bot_form" class="form-signin" action="javascript:void(null);" onsubmit="tbot_ver()">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Верификация Телеграм-бота</h4>
      </div>
      <div class="modal-body">
	  Бот отправил Вам проверочный код. Введите его в поле ниже:<br>
	  <br>
	  <div class="form-group">
	   <div class="input-group">
 <span class="input-group-addon"><i class="fa fa-telegram sybmol" aria-hidden="true"></i>
</span>
	   <input id="tbot_ver_code" required class="sms form-control" type="text" name="tbot_ver_code" placeholder="Ваш проверочный код для бота @<?=TELEGRAM_BOT_NAME ?>"></div>
      </div>  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Подтвердить</button>
      </div>
    </div>
   </form>
  </div>
</div>


<?	
	
}



}

?>