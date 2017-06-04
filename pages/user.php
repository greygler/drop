<? 
//session_start();
 if (!isset($_SESSION['info_profile'])) autoring::update_user_info($_SESSION['id']); 
 else {autoring::update_user_info($_SESSION['id']); $_SESSION['info_profile']="1"; }
$last_enter=unserialize($_SESSION['last_enter']);

?>

 <script src="/js/user.php"></script>
 <script>
 
  function verify_email() {
		 $('#verify_email').modal('hide');
 	  var msg   = $('#verify_email').serialize();
        $.ajax({
          type: 'POST',
          url: '/verify/email/vemail.php',
          data: msg,
          success: function(data) {
			
		  if (data=='ok') {$('.novemail').html('Письмо отправлено.');
		  $('.vemaillink').html('Отправить повторно');
		   $('#vemail_ok').modal('show');
		  } else $('.results_form').html(data);
									
								
          },
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	}
 
    
 </script>
  <script>
  
 
  
  function nohide_vphone() {
	  
	 var phone_num=$("#phone_num").val();
	 if (phone_num!=""){
		 var msg   = $('#data_form').serialize();
		 $.ajax({
          type: 'POST',
          url: '/verify/phone/session_phone.php',
          data: msg,
          success: function(data) {
			 alert(data);
			 if (data=='ok'){
			$('#phone_group').removeClass('has-warning');
			$('#phone_group').addClass('has-success');
			$('#phide1').addClass('hide');
			$('#phide2').removeClass('hide');
			$('#phide2').removeClass('glyphicon-warning-sign');  
			$('#phide2').addClass('glyphicon-ok');
			 }
			 else{
				$('.novphone').html('Телефон не верифицирован!');
				$('.vphonelink').html('Верифицировать');
				$('#is_sms')[0].reset();
				$('#verify_fg').removeClass('has-success');
				$('#verify_fg').removeClass('has-feedback');
				$('.verify_help').html('');
				 //$('#fc-ok').addClass('hide');
				 //$('#fc-no').addClass('hide');
				$('.modal_phone').html(phone_num);
				$('#phide1').removeClass('hide');
				//$('#phide2').addClass('hide');
				$('#phone_group').removeClass('has-success');
				$('#phone_group').addClass('has-warning');
				$('#phide2').removeClass('glyphicon-ok');  
				$('#phide2').addClass('glyphicon-warning-sign');  
				
			 }
			 },
          error:  function(xhr, str){
		  alert('Возникла ошибка: ' + xhr.responseCode);
          }
		  });
		   }
	 else {
		 $('#phide1').addClass('hide');
		 $('#phide2').addClass('hide');
		 $('#phone_group').addClass('has-warning');
		 $('#phone_group').removeClass('has-success');
		 $('#phide2').removeClass('glyphicon-ok');  
		 
		}
  
	
  }
 
  function verify_phone() {
		 $('#verify_phone').modal('hide');
 	  var msg   = $('#verify_phone').serialize();
        $.ajax({
          type: 'POST',
          url: '/verify/phone/sendsms.php',
          data: msg,
          success: function(data) {
			//alert(data);
		  if (data!='') {$('.novphone').html('SMS отправлено.');
		  $('.vphonelink').html('Отправить повторно');
		 // $('#phone_num').hide();
        $('#phone_num').attr("disabled","disabled");

		  
		  $('.out_sms').html(data);
		  $('#fc-ok').addClass('hide');
			$('#fc-no').addClass('hide');
		   $('#sms_ok').modal('show');
		  } else $('.results_form').html(data);
									
								
          },
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	}
	
	function is_sms() {
		 
 	  var msg   = $('#sms_ok').serialize();
        $.ajax({
          type: 'POST',
          url: '/verify/phone/sms_ok.php',
          data: msg,
          success: function(data) {
			alert(data);
		  if (data='ok') {$('.verify_help').html('Телефон успешно верифицирован!');
		   $('#verify_fg').addClass('has-success');
		   $('#verify_fg').addClass('has-feedback');
		   $('#fc-ok').removeClass('hide');
		   $('#phide1').addClass('hide');
			$('#phide2').removeClass('glyphicon-warning-sign');
			$('#phone_group').removeClass('has-warning');
			$('#phone_group').addClass('has-success');
			$('#phide2').addClass('glyphicon-ok');
		 
		  } else {
			  $('.verify_help').html('Ошибка верификации!');
			$('#verify_fg').addClass('has-error');
		    $('#verify_fg').addClass('has-feedback');
			 $('#fc-no').removeClass('hide');
						
		  }			 
          },
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
		 $('#button_ok').addClass('hide');
		  $('.sms_btn_cansel').html('Ок');
	}
 
    
	
 </script>


<div class="page-header lead">
		<h1><small class="text_white">Пользователь: </small><wbr><strong><?= $_SESSION['name']?></strong><small class="text_white">, id: <?= $_SESSION['id'] ?></small></h1>
</div>

<? if  ($last_enter['agent']!="") 
echo func::Last_enter($last_enter, $_SESSION['device'], $_SESSION['ipv4'], $_SESSION['city'], $_SESSION['region'], $_SESSION['country'], $_SESSION['agent']);  

?>



<div class="col-sm-6 col-md-6 col-lg-6 text_white"><h4 class="text-left"><span class="fa fa-calendar-plus-o fa-lg"></span> <?= date("d.m.Y H:i:s", $_SESSION['registration']); ?></h4></div>
<div class="col-sm-6 col-md-6 col-lg-6 text_white"><h4 class="text-right"><span class="fa <?= $_SESSION['fa_user']  ?> fa-lg"></span> <?= $_SESSION['name_group'] ?></h3></div>

<form id="data_form" class="form-signin" action="javascript:void(null);" onsubmit="data_form()">
<div class="col-sm-6 col-md-6 col-lg-6 panel panel-default panel_user"><h3 class="text-center"><span class="fa fa-address-card-o fa-lg"></span> Профиль:</h3>

<dl class="dl-horizontal">
<dt></dt>
<dd><button  type="button"   data-toggle="modal" data-target="#update_password" class="btn btn-danger user-buttom"><span class="pull-left fa fa-key" aria-hidden="true"></span>Cменить пароль</button></dd><div class="update_pass_results"></div>
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
  <input id="phone_num" class="form-control phone" type="text" name="phone" value="<?= $_SESSION['phone'] ?>" <? if ($_SESSION['send_sms']=='ok') echo('disabled'); ?> onchange="nohide_vphone()"> <? print_r($_SESSION); ?>
   <? if (($_SESSION['phone']=="") OR (!autoring::is_verify_phone($_SESSION)))  $hide="hide"; ?>
  <span id="phide1" class="<?= $hide ?> help-block control-label"><small class="novphone">Телефон не верифицирован!</small> <a data-toggle="modal" data-target="#verify_phone" href="#"><small class="vphonelink">Верифицировать</small></a></span>
  <span id="phide2" class="glyphicon <? if (autoring::is_verify_phone($_SESSION)) echo('glyphicon-warning-sign'); else echo('glyphicon-ok');?>
     form-control-feedback"></span>
  
  

   </div>
   </dd>
  <dt>Skype:</dt>
  <dd><input class="form-control" type="text" name="skype" value="<?= $_SESSION['skype'] ?>"></dd>
  <dt>Счет:</dt>
  <dd><input class="form-control" type="text" name="wm" value="<?= $_SESSION['wm'] ?>"></dd>
  <dt><div class="results_form"></div></dt>
  <dd><button type="submit" class="btn btn-primary btn-block user-buttom"><span class="pull-left"><i class="fa fa-floppy-o" aria-hidden="true"></i></span>
 Сохранить</button></dd>
</dl>

</div>
</form>
<div class="col-sm-6 col-md-6 col-lg-6 panel panel-default panel_user"><h3 class="text-right"><span class="fa fa-calculator fa-lg"></span><strong>Статистика </strong><wbr><small>На <?= date("d.m.y H:i:s") ?></small></h3>
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
  <dd><button type="button" class="btn  <? if ($_SESSION['sale_ok']<0) echo('btn-danger text_white'); else if ($_SESSION['sale_ok']>0) echo ('btn-success text_white'); else echo ('btn-default drop_color') ?>  btn-block"><? if ($_SESSION['sale_ok']>0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span>'); else if ($_SESSION['sale_ok']!=0) echo('<span class="pull-right badge"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span>'); ?> <?= $_SESSION['sale_ok'] ?></button></dd>
  <dt></dt><dd><button type="button"  <? if ($_SESSION['balance']<MIN_PAY) echo('disabled="disabled"'); ?> class="btn <? if ($_SESSION['balance']>0) echo('btn-primary'); else echo('btn-danger') ?> btn-block user-buttom" ><? if (($_SESSION['balance']<MIN_PAY) AND ($_SESSION['balance']>0)) echo('Выплата не доступна!'); else if ($_SESSION['balance']>0) echo('Заказать выплату'); else echo('Отрицательный баланс!') ?></button><? if ($_SESSION['balance']>0) echo('<span class="help-block">Минимальная сумма выплат - '.MIN_PAY.' '.CURRENCY.'</span>'); else echo('<span class="help-block">Дальнейшая работа только по предоплате<br>или после погашения задолженности!</span>'); ?><a data-toggle="modal" data-target="#rules_modal" href="#">Правила работы с системой <?= TITLE ?></a>
   </dd>
  </dl>

</div>

<!-- Modal -->
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

<? if ($_SESSION['v_email']!="1") { ?> 
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
<? } ?>
<? if ($_SESSION['v_phone']!="1") { ?> 
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
        <span class="out_sms"></span><br><br>
		
		<div id="verify_fg" class=" form-group "> <!-- has-success has-feedback -->
		<input type="text" class="sms form-control" required placeholder="Код из СМС" name="code_sms">
		<span id="fc-ok" class="glyphicon glyphicon-ok form-control-feedback"></span>
		<span id="fc-no" class="glyphicon glyphicon-remove form-control-feedback"></span>
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
<? } ?>

<? $geobase='yes'; ?>


