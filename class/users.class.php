<?
class Users
{

public function stata()
{
	?>
	<h3 class="text-right"><span class="fa fa-calculator fa-lg"></span><strong>Статистика </strong><wbr><small>На <?= date("d.m.y H:i:s") ?></small></h3>
<dl class="dl-horizontal">
  <dt>Текущий баланс:</dt>
  <dd><button type="button" class="btn <? if ($_SESSION['balance']<0) echo('btn-danger text_white'); else if ($_SESSION['balance']>0) echo ('btn-success text_white'); else echo ('btn-default drop_color') ?> btn-block"><? if ($_SESSION['balance']>0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span>'); else if ($_SESSION['balance']!=0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span>'); ?> <?= $_SESSION['balance'] ?> <?= CURRENCY ?></button></dd>
  <dt>Всего заработано:</dt>
  <dd><button type="button" class="btn <? if ($_SESSION['total_balance']<0) echo('btn-danger text_white'); else if ($_SESSION['total_balance']>0) echo ('btn-success text_white'); else echo ('btn-default drop_color') ?> btn-block"><? if ($_SESSION['total_balance']>0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span>'); else if ($_SESSION['total_balance']!=0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span>'); ?> <?= $_SESSION['total_balance'] ?> <?= CURRENCY ?></button></dd>
  <dt>Текущие продажи:</dt>
  <dd><button type="button" class="btn btn-default  btn-block"><?= $_SESSION['sale'] ?></button></dd>
  <dt>Всего продаж:</dt>
  <dd><button type="button" class="btn btn-default btn-block"><?= $_SESSION['total_sale'] ?></button></dd>
  <dt>Из них успешных:</dt>
  <dd><button  type="button" class="btn  <? if ($_SESSION['sale_ok']<0) echo('btn-danger text_white'); else if ($_SESSION['sale_ok']>0) echo ('btn-success text_white'); else echo ('btn-default drop_color') ?>  btn-block"><? if ($_SESSION['sale_ok']>0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span>'); else if ($_SESSION['sale_ok']!=0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span>'); ?> <?= $_SESSION['sale_ok'] ?></button></dd>
  <dt></dt><dd><button id="order-pay_button" data-toggle="modal" data-target="#order-pay_modal" type="button"  <? 
  if (($_SESSION['balance']<MIN_PAY) OR ($_SESSION['order_pay']>=MIN_PAY))  echo('disabled="disabled"'); ?> class="btn <? if ($_SESSION['balance']>0) echo('btn-primary'); else echo('btn-danger') ?> btn-block user-buttom" ><? if (($_SESSION['balance']<MIN_PAY) AND ($_SESSION['balance']>0)) echo('Выплата не доступна!'); else if (($_SESSION['balance']>0) AND ($_SESSION['order_pay']<1)) echo('Заказать выплату'); else 
  if ($_SESSION['order_pay']>1) echo ('Заказана выплата '.$_SESSION['order_pay'].'&#160;'.CURRENCY); else if ($_SESSION['balance']<0)
  echo('Отрицательный баланс!') ?></button><? if ($_SESSION['balance']>0) echo('<span class="help-block">Минимальная сумма выплат - '.MIN_PAY.' '.CURRENCY.'</span>'); else echo('<span class="help-block">Дальнейшая работа только по предоплате<br>или после погашения задолженности!</span>'); ?><a data-toggle="modal" data-target="#rules_modal" href="#">Правила работы с системой <?= TITLE ?></a>
   </dd>
  </dl>
	<?
}

public function order_pay()
{
	?>
	<script>
function order_pay(id){	
 var msg   = $('#order_form').serialize();
    
	   $.ajax({
          type: 'POST',
          url: '<?= ACTION_PATH ?>/order_pay.php',
          data: msg,
          success: function(data) {
			alert(data);
		  if (data=='ok') {
			   var order_summ = $('#order_summ').val();
			  $('.pay_order_result').html('Заказ на выплату принят успешно');
			  $('#order-pay_button').html('Заказана выплата '+order_summ+'&#160;'+"<?= CURRENCY ?>");
			  $('#order-pay_button').attr("disabled","disabled");
			  $('#op_modal_button').addClass('hide');
			  $('#op_modal_cancel').html("Ok");
			  

		  } else $('.results_form').html(data);
									
								
          },
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
}
	</script>

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

<dt>Имя:</dt>
  <dd>
 <div class="form-group">
  <input id="user_name_input" class="form-control" placeholder="Ваше имя" type="text" required name="name" value="<?= $_SESSION['name'] ?>">
  </div>

  
 
  </dd>
  
  

  
  <dt>E-mail:</dt>
  <dd>
  <div class="form-group <? if  (autoring::is_verify_email()) echo('has-warning'); else echo('has-success'); ?> has-feedback">
  <input class="form-control" type="text" required name="email" value="<?= $_SESSION['email'] ?>" disabled>
  <? if (autoring::is_verify_email($_SESSION)) echo('<span  class="help-block control-label"><small><span class="novemail">E-mail не верифицирован!</span></small> <a data-toggle="modal" data-target="#verify_email" href="#"><small><span class="vemaillink">Верифицировать</span></small></a></span><span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>');
  else echo('<span class="glyphicon glyphicon-ok form-control-feedback"></span>');   ?>

  

 
</div>
  
 
  </dd>
  <dt>Phone:</dt>
  <dd>
  <div id="phone_group" class="form-group <? if (autoring::is_verify_phone($_SESSION)) echo('has-warning'); else echo('has-success'); ?> has-feedback">
  <input id="phone_num" class="form-control phone" type="text" name="phone" value="<?= $_SESSION['phone'] ?>" <? if ($_SESSION['send_sms']=='ok') echo('disabled'); ?> onchange="nohide_vphone()"> 
   <? if (($_SESSION['phone']=="") OR (!autoring::is_verify_phone()))  $hide="hide"; ?>
  <span id="phide1" class="<?= $hide ?> help-block control-label"><small class="novphone">
  <? if ($_SESSION['sms']!="") echo "SMS отправлено."; else echo("Телефон не верифицирован!");?></small>
  <a id="phide3" <? if ($_SESSION['sms']=="") echo ('class="hide"')?> data-toggle="modal" data-target="#sms_ok" href="#"><small><?= $_SESSION['sms'] ?>Ввести код из SMS</small></a>
 | <a data-toggle="modal" data-target="#verify_phone" href="#"><small class="vphonelink"><? if ($_SESSION['sms']!="") echo "Отправить повторно"; else echo("Верифицировать");?></small></a></span>
  <span id="phide2" class="glyphicon <? if (autoring::is_verify_phone($_SESSION)) echo('glyphicon-warning-sign'); else echo('glyphicon-ok');?>
     form-control-feedback"></span>
  
  

   </div>
   </dd>
  <dt>Skype:</dt>
  <dd> <div class="form-group"><input class="form-control" type="text" name="skype" value="<?= $_SESSION['skype'] ?>"></div></dd>
  <dt>Счет:</dt>
  <dd> <div class="form-group"><input class="form-control" type="text" name="wm" value="<?= $_SESSION['wm'] ?>"></div></dd>
  <dt><div class="results_form"></div></dt>
  <dd><button type="submit" class="btn btn-primary btn-block user-buttom"><span class="pull-left"><i class="fa fa-floppy-o" aria-hidden="true"></i></span>
 Сохранить</button></dd>
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
	  <form id="verify_email" class="form-signin" action="javascript:void(null);" onsubmit="verify_email()">
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

<?	
	
}



}

?>