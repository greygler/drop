<? session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
//if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/db.class.php'); 
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/favicon.class.php');
require_once (CLASS_PATH.'/autoring.class.php'); 

if (!autoring::is_autoring()) header("Location: ../login/");
require_once (CLASS_PATH.'/systems.class.php');
$groups=autoring::groups();
$user=autoring::get_user($_GET['id']);
//print_r($user);
?>
<?= systems::head(); ?>
<div class="container container_user_data">
<div class="page-header">
		<h1 style="margin: 0px 0 10px 0;"><small>Новость #<?= $_GET['id'] ?></small></h1>
</div>
<form class="panel panel-default"  role="form" action="" >
<div class="panel-body">

<div class="col-sm-6 col-md-6 col-lg-6"> 


<div class="form-group input-group">

  <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
   <input class="form-control" placeholder="Дата новости" type="text" id="datepicker" value="29.05.2017">
</div>


 <div class="form-group input-group">
  <span class="input-group-addon"><i class="fa fa-file-image-o" aria-hidden="true"></i>
</span>
 <input class="form-control" placeholder="" type="file" value="">
 </div>
 
 </div>
 
<div class="col-sm-6 col-md-6 col-lg-6">
 <div style="margin-top: 15px" class="form-group">
 <textarea class="form-control" name="news" id=""  rows="7">Новость</textarea>
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
	<script src="<?= JS_PATH ?>/nicEdit.php"></script>
	<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
 <script> 
 
$(function() {
    $("#datepicker").datepicker($.datepicker.regional["ru"]);
});
 </script>   
  </body>
</html>
<?// } else echo ("Слоны идут нахер!"); ?>