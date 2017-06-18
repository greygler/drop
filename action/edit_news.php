<? session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
//if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/db.class.php'); 
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/favicon.class.php');
require_once (CLASS_PATH.'/autoring.class.php'); 

if (!autoring::is_autoring()) header("Location: ../login/");
require_once (CLASS_PATH.'/systems.class.php');

//$groups=autoring::groups();
//$user=autoring::get_user($_GET['id']);
//print_r($user);
if ($_GET['id']=='new') {$title="Добавить новость";
$datetime=time();
} else {
	$news=systems::load_news($_GET['id']);
$title="Редактировать новость #{$_GET['id']}";
$datetime=$news['date'];
}
?>
<?= systems::head(); ?>
<div class="container container_user_data">
<div class="page-header">
		<h1 style="margin: 0px 0 10px 0;"><small><?= $title ?></small></h1>
</div>

<script src="<?= JS_PATH ?>/edit_news.php"></script> 
<form class="panel panel-default"  role="form" action="javascript:void(null);" onsubmit="save_news(<? if ($_GET['id']!='new') echo $_GET['id']; else echo ("'{$_GET['id']}'"); ?>)" >
<div class="panel-body">

<div class="col-sm-6 col-md-6 col-lg-6"> 




<div class="row"> 

<div class="col-lg-4 col-md-4">
<div class="form-group input-group">

  <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
   <input class="form-control" placeholder="Дата новости" type="text" id="datepicker" value="<?= date("d.m.Y", $datetime) ?>"> 
</div>
</div>

<div class=" col-lg-4 col-md-4">
<div class="form-group input-group">

  <span class="input-group-addon"><i class="fa fa-clock-o fa-lg" aria-hidden="true"></i></span>
   <input id="time_h" class="form-control text-center" placeholder="Время новости" type="number" min="0" max="23" step="1" value="<?= date("H", $datetime) ?>"> 
   <span class="input-group-addon hidden-md">час.</span>
</div>

</div>

<div class=" col-lg-4 col-md-4">
<div class="form-group input-group">

  <span class="input-group-addon"><i class="fa fa-clock-o fa-lg" aria-hidden="true"></i></span>
   <input id="time_m" class="form-control text-center" placeholder="Время новости" type="number" min="0" max="59" step="5" value="<?= date("i", $datetime) ?>"> 
   <span class="input-group-addon hidden-md">мин.</span>
</div>

</div>


</div>

 <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-file-image-o" aria-hidden="true"></i></span>
 <input id="news-img" class="form-control" placeholder="Картинка для новости" type="file" value="" accept="image/*">
 <span class="input-group-addon">jpg, png, gif</span>
 </div>
 <div class="text-center">
 <? if ($news['pic']!="") $img_news=$news['pic'];  else $img_news=IMG_NEWS_NAME; ?>
 <img id="img_news" class="img-rounded img-responsive" src="<?= IMG_NEWS_PATH.$img_news ?>" alt=""  >
 </div>
 </div>
 
<div class="col-sm-6 col-md-6 col-lg-6">
 <div style="margin-top: 15px" class="form-group">
 <label for="text"> Текст новости: </label>
 <textarea class="form-control" name="t" id="text"  rows="7"><?= $news['text'] ?></textarea>
</div>
<div class="form-group">
 <button class="btn btn-primary btn-block">Сохранить</button></div>
</div>
</div>
<p>

</p>
</form>


</div>




<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="<?= JS_PATH ?>/jquery.ui.datepicker-ru.js"></script>
<script type="text/javascript"> $(document).ready(function() {$('#stat_block').height($('#user_block').height());}); </script>
	<script src="<?= JS_PATH ?>/bootstrap.min.js"></script>
	
 <script> 
 
$(function() {
    $("#datepicker").datepicker($.datepicker.regional["ru"]);
});
 </script>   
  </body>
</html>
<?// } else echo ("Слоны идут нахер!"); ?>