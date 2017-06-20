<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/drop.class.php');

//print_r($_FILES);
//print_r($_POST);

   $return=drop::new_image($_POST['id'], $new_file_name);
   if ($_POST['id']!=IMG_PRODUCT_PATH.IMG_PRODUCT_NAME)
   {	   
	$del_link = str_replace(IMG_PRODUCT_PATH, IMG_PROD_PATH, $_POST['pic_name']);
	unlink($del_link);
   }
  //echo $del_link;
   echo (IMG_PRODUCT_PATH.IMG_PRODUCT_NAME);
   } else header("Location: ".SITE_ADDR."/error/666.php");
?>