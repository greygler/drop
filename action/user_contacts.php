<dl class="dl-horizontal">
  <dt>E-mail:</dt>
  <dd><div class="form-group"><button type="button" class="btn btn-default btn-block"> <? if ($user['email']==$user['v_email']) echo ('<span class="pull-right"><i class="fa fa-check text-success" aria-hidden="true"></i></span>'); else echo ('<span class="pull-right"><i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i></span>') ?><?= $user['email'] ?>
  
  </button></div></dd>
  <dt>Phone:</dt>
  <dd>
  <div class="form-group">
  
  <? if (($user['phone']==$user['v_phone']) AND ($user['phone']!="")) { $form_class="has-success"; $symbol="glyphicon-ok"; } 
  else {$form_class="has-warning "; $symbol="glyphicon-warning-sign"; } ?>
  <div class="input-group <?= $form_class ?> has-feedback">
     <span class="input-group-btn">
        <button  title="Скопировать в буфер" data-clipboard-target="#phone" class="btn btn-default btn-clipboard_phone" type="button"><i class="fa fa-clipboard" aria-hidden="true"></i></button>
      </span>
      <input  id="phone" type="text" readonly value="<? if ($user['phone']!="") echo($user['phone']); else echo("Не указан");  ?>" class="form-control">
	     <span class="glyphicon <?= $symbol ?> form-control-feedback"></span>
	  
	 
	  
    </div>
  
  <script>new Clipboard('.btn-clipboard_phone'); </script>
  
  
  
  </div></dd>
 
  
  <?
   $contact=unserialize($user['contact']);
 $result = mysql_query("SELECT * FROM contact");
$myrow = mysql_fetch_array($result);
do
{
	?>
	<dt><?= $myrow['name'] ?>:</dt>
  <dd> <div class="form-group">
  
   <div class="input-group">
       <span class="input-group-btn">
        <button title="Скопировать в буфер" data-clipboard-target="#contact_<?= $myrow['id'] ?>" class="btn btn-default btn-clipboard_c<?= $myrow['id'] ?>" type="button"><i class="fa fa-clipboard" aria-hidden="true"></i></button>
      </span>
      <input  id="contact_<?= $myrow['id'] ?>" type="text" readonly value="<? if ($contact[$myrow['id']]!="") echo($contact[$myrow['id']]); else echo("Не указан");  ?>" class="form-control">
	 
	  
    </div>
  
  <script>new Clipboard('.btn-clipboard_c<?= $myrow['id'] ?>'); </script> 
 </div></dd>
  <?

}
while ($myrow = mysql_fetch_array($result));
?>
 
<?
   $pay_method=unserialize($user['pay_method']);
   $result = mysql_query("SELECT * FROM pay_method");
$myrow = mysql_fetch_array($result);
do
{
	if ($myrow['active']=="0") $dis="disabled";
?>
	<dt><?= $myrow['name'] ?>:</dt>
  <dd> <div class="form-group">
  
   <div class="input-group">
      <span class="input-group-btn">
        <button title="Скопировать в буфер" <?= $dis ?> data-clipboard-target="#pay_method_<?= $myrow['id'] ?>" class="btn btn-default btn-clipboard_pm<?= $myrow['id'] ?>" type="button"><i class="fa fa-clipboard" aria-hidden="true"></i></button>
      </span>
      <input <?= $dis ?> id="pay_method_<?= $myrow['id'] ?>" type="text" readonly value="<?

	  if ($pay_method[$myrow['id']]!="") echo $pay_method[$myrow['id']];  else 
  
  if ($myrow['active']!="0") echo("Не указан"); else echo("Не доступен") ?>" class="form-control">
	  
	  
    </div>
  <script>new Clipboard('.btn-clipboard_pm<?= $myrow['id'] ?>'); </script> 
 
  
  </div></dd>
  <?
$dis="";
}
while ($myrow = mysql_fetch_array($result));
?>
  
  
</dl>