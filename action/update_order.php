<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');

require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/autoring.class.php');
require_once (CLASS_PATH.'/drop.class.php');
require_once (CLASS_PATH.'/lpcrm.class.php');
$orders=drop::last_order();
$out=lp_crm::getOrdersByID(CRM, CRM_KEY, $orders);
if ($out['status']=='ok'){
	foreach($out['data'] as $key => $value) {
		echo("{$key} = {$value}<br>");
		$result = mysql_query ("UPDATE order_tab SET bayer_name='{$value['bayer_name']}', phone='{$value['phone']}', price='{$value['total']}', status='{$value['status']}', delivery_adress='{$value['delivery_adress']}', ttn='{$value['ttn']}',ttn_status='{$value['ttn_status']}', delivery_date='{$value['delivery_date']}', delivery='{$value['delivery']}', delivery_index= {$value['delivery_index']}', comment='{$value['comment']}'  WHERE order_id='{$key}'");

if ($result == 'true')

{
echo "Информация в базе обновлена успешно!";
}

else

{
echo "Информация в базе не обновлена!";
}
	}
}
	print_r($out);



?>