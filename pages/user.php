<div class="page-header ">
		<h1><small class="text_white">Пользователь: </small><strong><?= $_SESSION['name']?></strong><small class="text_white">, id: <?= $_SESSION['id'] ?></small></h1>
</div>
<div class="col-sm-6 col-md-6 col-lg-6 text_white"><h4 class="text-left"><span class="fa fa-calendar-plus-o fa-lg"></span> <?= date("d.m.Y", $_SESSION['registration']); ?></h4></div>
<div class="col-sm-6 col-md-6 col-lg-6 text_white"><h4 class="text-right"><span class="fa <?= $_SESSION['fa_user']  ?> fa-lg"></span> <?= $_SESSION['name_group'] ?></h3></div>

<form >
<div class="col-sm-6 col-md-6 col-lg-6 panel panel-default "><h3 class="text-center"><span class="fa fa-address-card-o fa-lg"></span> Контакты:</h3>
<dl class="dl-horizontal">
  <dt>E-mail:</dt>
  <dd><input class="form-control" type="text" name="email" value="<?= $_SESSION['email'] ?>"></dd>
  <dt>Phone:</dt>
  <dd><input class="form-control" type="text" name="phone" value="<?= $_SESSION['phone'] ?>"></dd>
  <dt>Skype:</dt>
  <dd><input class="form-control" type="text" name="skype" value="<?= $_SESSION['skype'] ?>"></dd>
  <dt>Счет:</dt>
  <dd><input class="form-control" type="text" name="money" value="<?= $_SESSION['money'] ?>"></dd>
</dl>
</div>
<div class="col-sm-6 col-md-6 col-lg-6 panel panel-default"><h3 class="text-center"><span class="fa fa-calculator fa-lg"></span><strong>Статистика:</strong></h3>
<dl class="dl-horizontal">
  <dt>Текущий баланс:</dt>
  <dd><span class="badge"><?= $_SESSION['balance'] ?></span></dd>
  <dt>Всего заработано:</dt>
  <dd><span class="badge"><?= $_SESSION['balance'] ?></span></dd>
  <dt>Текущие продажи:</dt>
  <dd><span class="badge">7</span></dd>
  <dt>Всего продаж:</dt>
  <dd><span class="badge">12</span></dd>
  <dt>Из них успешных:</dt>
  <dd><span class="badge">11</span></dd>
</dl>
</div>
</form>

