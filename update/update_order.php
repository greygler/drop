<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');

require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/autoring.class.php');
require_once (CLASS_PATH.'/drop.class.php');
require_once (CLASS_PATH.'/lpcrm.class.php');
$orders=drop::last_order();
//print_r($orders);
$out=lp_crm::getOrdersByID(CRM, CRM_KEY, $orders);
if ($out['status']=='ok'){
	
	foreach($out['data'] as $key => $value) {
		echo("{$key} = {$value}<br>");
		//$products = unserialize(urldecode($value['products'])); 
		
	  print_r($value['products']); echo("<br>");
		$total=0;$profit=0;
	 foreach($value['products'] as $key_p => $value_p){
		$product=drop::one_product($value_p['product_id']);
		 $sum=$value_p['quantity']*$value_p['price'];
		 echo ("Сумма заказа {$key_p}.{$sum}<br>");
		 $total=$total+$sum;
		 $drop_sum=$value_p['quantity']*$product['price'];
		 echo ("Сумма покупки {$key_p}.{$drop_sum}<br>");
		 $prof=$sum-$drop_sum;
		 echo ("Профит {$key_p}.{$prof}<br>");
		 $profit=$profit+$prof;

	 }
	 
	
	  $products_base = urlencode(serialize($value['products']));
	 
	 if (UPDATE_PRODUCT) $update_product= "products='{$products_base}', total={$total}, profit={$profit},";
	 else $update_product="";
	 
	 $bd="UPDATE order_tab SET bayer_name='{$value['bayer_name']}', phone='{$value['phone']}', status='{$value['status']}', {$update_product}   delivery_adress='{$value['delivery_adress']}', ttn='{$value['ttn']}',ttn_status='{$value['ttn_status']}', delivery_date='{$value['delivery_date']}', delivery='{$value['delivery']}', delivery_index= '{$value['delivery_index']}', comment='{$value['comment']}'  WHERE order_id='{$key}'";
	  echo("!<br>");
	  echo $bd;
		$result = mysql_query ($bd);

if ($value['status']==18) {
$user_id=drop::get_order_id($key);
echo autoring::plus_balance($user_id, $prof);
echo drop::money_log($key,$user_id, 1,$prof,"Продажа");
}
if ($value['status']==31) {
$user_id=drop::get_order_id($key);

echo autoring::minus_balance($user_id, POST_PAY);
echo drop::money_log($key,$user_id, 0,POST_PAY,"Почтовые расходы");
}


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