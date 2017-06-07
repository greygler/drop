<?
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/drop.class.php');
$product = trim(strip_tags(stripcslashes(htmlspecialchars($_POST["product"]))));
$search=drop::search($product);
$myrow = mysql_fetch_array($search);
do
{
 //echo ("\n<li>".$myrow['name']."</li>");
 echo('<option value = "'.$myrow['name'].'">');
}
while ($myrow = mysql_fetch_array($search));


} else echo ("Слоны идут нахер!");
?>