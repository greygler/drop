<? 
//session_start();
 if (!isset($_SESSION['info_profile'])) autoring::update_user_info($_SESSION['id']); 
 else {autoring::update_user_info($_SESSION['id']); $_SESSION['info_profile']="1"; }
$last_enter=unserialize($_SESSION['last_enter']);

?>

<div id="cont_user_id" class="page-header lead">
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

 <?= users::user_stat(); ?>

</div>


<?= users::user_modal(); ?>
<? if (($_SESSION['v_email']!=$_SESSION['email']) OR ($_GET['verify']!=''))  echo users::modal_email(); ?>
<?= users::modal_phone();?>





