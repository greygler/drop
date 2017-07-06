<?
//require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
require_once ('/home/greygler/greygler.pro/drop/config.php');
date_default_timezone_set(TIME_ZONE);
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/autoring.class.php');
require_once (CLASS_PATH.'/drop.class.php');
require_once (CLASS_PATH.'/lpcrm.class.php');

// обновляем заказы
$orders=drop::last_order();
print_r($orders);echo("<br>");
echo count($orders);echo("<br>");
if ($orders[0]!=""){
$out=lp_crm::getOrdersByID(CRM, CRM_KEY, $orders);
print_r($out);echo("<br>===<br>");
if  (count($orders)>1) {
if ($out['status']=='ok') drop::are_orders($out);
}
 else if ($out['status']=='ok') drop::one_orders($out);

	print_r($out);

}
else echo ("Пусто!");
drop::new_sale_all();
?>