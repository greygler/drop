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


<div class="col-sm-6 col-md-6 col-lg-6 panel panel-default panel_user">
<?= users::profile(); ?>

</div>

<div class="col-sm-6 col-md-6 col-lg-6 panel panel-default panel_user">

<script>
function active_drop(id) {
	
	if ($('#checkbox').is(':checked')) 
		var active='1'; else var active='0';
		 	
 	    $.ajax({
          type: 'POST',
          url: '<?= ACTION_PATH ?>/active_drop.php',
          data: {
			  drop_active: active,
			  id : id
		  },
        success: function(data) {
			$('.active_drop').html(data);
		},
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	}
	
function new_code(id)
{
	$('#refresh_code').addClass('fa-spin');
	$.ajax({
          type: 'POST',
          url: '<?= ACTION_PATH ?>/new_key.php',
          data: {id: id},
          success: function(data) { $("#drop_key").val(data); $('#refresh_code').removeClass('fa-spin');},
          error:  function(xhr, str){
			alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
		
}
</script>

<h3 class="text-center"><span class="fa fa-cogs fa-lg"></span> <strong>Настройки</strong></h3><br>
<form action="javascript:void(null);" onsubmit="new_code(<?= $_SESSION['id'] ?>)" >
<dl class="dl-horizontal">
  <dt>Автоматическая<br>передача заказа:</dt>
  <dd><input onchange='active_drop(<?= $_SESSION['id'] ?>)' id="checkbox" type="checkbox"  name="checkbox" <? if ($_SESSION['active_drop']=='1') echo("checked"); ?>><span class="help-block"><small> <span class="active_drop"><? if  ($_SESSION['active_drop']=='1') echo('<font color="blue">Включена</font>'); else echo('<font color="#737373">Отключена</font>'); ?></span></small></span>


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
</div>


<?= users::user_modal(); ?>
<? if ($_SESSION['v_email']!=$_SESSION['email'])  echo users::modal_email(); ?>
<?= users::modal_phone();?>


<? $geobase='yes'; ?>


