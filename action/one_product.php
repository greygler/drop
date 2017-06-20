<? session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/db.class.php'); 
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/favicon.class.php');
require_once (CLASS_PATH.'/autoring.class.php'); 
require_once (CLASS_PATH.'/drop.class.php'); 
if (!autoring::is_autoring()) header("Location: ../login/");
require_once (CLASS_PATH.'/systems.class.php');
if ($_SESSION['user_group']<5) echo('<script src="'.JS_PATH.'/product.php"></script>');

$product=drop::one_product($_GET['id']);
 if ($product['pic']!="") $img_name=$product['pic']; else $img_name=IMG_PRODUCT_NAME;
 $cat_name=drop::category($product['cat']);
$subcat_name=drop::subcategory($product['subcat']);
//print_r($user);
?>
<?= systems::head(); ?>
<div class="container container_user_data">
<div class="page-header">
		<h1 style="margin: 0px 0 10px 0;"><strong><?= $product['name']?></strong><small>, id: <?= $_GET['id'] ?></small></h1>
</div>

<div class="col-sm-5 col-md-5 col-lg-5"><center>
<form id="product_form_<?= $_GET['id'] ?>" action="javascript:void(null);" method="post" enctype="multipart/form-data" onsubmit="new_image(<?= $_GET['id'] ?>)">
<img  id="img_<?= $_GET['id']; ?>" class="img-rounded img-responsive <? if ($_SESSION['users_group']<5)  echo "fleft"; ?> img_op" src="<?= IMG_PRODUCT_PATH.$img_name ?>" alt="<?= $product['name']?>">
<?  if ($_SESSION['users_group']<5)  echo drop::refresh_img($_GET['id'], $img_name); ?>
</form>

<button title="" type="button" class="btn btn-default btn-block">
<? if ($product['active']!=1) echo "Не продается" ?>
		<i class="pull-left fa fa-tag" aria-hidden="true"></i>Цена продажи: <strong><?= $product['price']; ?> <?= CURRENCY ?></strong></button>
		<button title="" type="button" class="pull-left btn btn-success btn-block"><i class="pull-left fa fa-hand-o-right" aria-hidden="true"></i>
Рекомендуемая цена: <strong><?= $product['spec_price']; ?> <?= CURRENCY ?></strong></button></center>
</div>
<div class="col-sm-7 col-md-7 col-lg-7 text-left panel panel-default"><br>
<? if ($product['subcat']==0) { echo ('<button type="button"  class="btn btn-info" ><i class="fa fa-folder-open" aria-hidden="true"></i> Категория: <strong> '.$cat_name.'<strong></button>');  }
		else { 
			echo ('<button type="button" class="btn btn-info" ><i class="fa fa-folder-open" aria-hidden="true"></i> Категория: <strong>'.$cat_name.'</strong></button>  <button type="button" class="btn btn-info" ><i class="fa fa-folder" aria-hidden="true"></i> Подкатегория: <strong>'.$subcat_name['name'].'</strong></button>');  } ?>
<h3><strong>Краткое описание:</strong><? if ($product['active']!=1) echo " <small>(Не доступно к продаже)</small>" ?></h3>
<? if ($product['description']!="") echo (nl2br($product['description'])); else echo ("Отсутствует.")  ?><br>
<br><center>&#183;</center>
</div>

</div>

<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="<?= JS_PATH ?>/bootstrap.min.js"></script>
    <script src="<?= JS_PATH ?>/gnmenu.js"></script>
	<script src="<?= JS_PATH ?>/jquery.fancybox.min.js"></script>

  </body>
</html>
<? } else header("Location: ".SITE_ADDR."/error/666.php"); ?>