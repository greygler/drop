<? autoring::update_user_info($_SESSION['id']); 
$last_enter=unserialize($_SESSION['last_enter']);

?>

 <script src="/js/user.php"></script>


<div class="page-header lead">
		<h1><small class="text_white">Пользователь: </small><wbr><strong><?= $_SESSION['name']?></strong><small class="text_white">, id: <?= $_SESSION['id'] ?></small></h1>
</div>

<?= func::Last_enter($last_enter, $_SESSION['device'], $_SESSION['ipv4'], $_SESSION['city'], $_SESSION['region'], $_SESSION['country'], $_SESSION['agent']); ?>



<div class="col-sm-6 col-md-6 col-lg-6 text_white"><h4 class="text-left"><span class="fa fa-calendar-plus-o fa-lg"></span> <?= date("d.m.Y", $_SESSION['registration']); ?></h4></div>
<div class="col-sm-6 col-md-6 col-lg-6 text_white"><h4 class="text-right"><span class="fa <?= $_SESSION['fa_user']  ?> fa-lg"></span> <?= $_SESSION['name_group'] ?></h3></div>

<form >
<div class="col-sm-6 col-md-6 col-lg-6 panel panel-default panel_user"><h3 class="text-center"><span class="fa fa-address-card-o fa-lg"></span> Профиль:</h3>

<dl class="dl-horizontal">
<dt></dt>
<dd><button  type="button"   data-toggle="modal" data-target="#update_password" class="btn btn-danger user-buttom"><span class="pull-left fa fa-key" aria-hidden="true"></span>Cменить пароль</button></dd><div class="update_pass_results"></div>
  <dt>E-mail:</dt>
  <dd><input class="form-control" type="text" required name="email" value="<?= $_SESSION['email'] ?>"></dd>
  <dt>Phone:</dt>
  <dd><input class="form-control phone" type="text" name="phone" value="<?= $_SESSION['phone'] ?>"></dd>
  <dt>Skype:</dt>
  <dd><input class="form-control" type="text" name="skype" value="<?= $_SESSION['skype'] ?>"></dd>
  <dt>Счет:</dt>
  <dd><input class="form-control" type="text" name="wm" value="<?= $_SESSION['wm'] ?>"></dd>
  <dt></dt>
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
  <dt></dt><dd><button type="button"  <? if ($_SESSION['balance']<MIN_PAY) echo('disabled="disabled"'); ?> class="btn btn-primary btn-block user-buttom" ><? if ($_SESSION['balance']<MIN_PAY) echo('Выплата не доступна!'); else echo('Заказать выплату'); ?></button><span class="help-block">Минимальная сумма выплат - <?= MIN_PAY ?> <?= CURRENCY ?></span>
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


