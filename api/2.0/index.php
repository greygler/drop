<?
if (!empty($_POST)) {
	require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
	require_once (CLASS_PATH.'/db.class.php');
	require_once (CLASS_PATH.'/lpcrm.class.php'); 
	require_once (CLASS_PATH.'/drop.class.php'); 
	db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
	$user_id=drop::get_id($_POST['key']);
	$order=$_POST;
	$products = unserialize(urldecode($_POST['products'])); 
	foreach($products as $key => $value){
	  $product=drop::one_product($value['product_id']);
	 // print_r($product); echo("<br>");
	  $sum=$value['count']*$value['price'];
	  echo ("Сумма заказа {$key}.{$sum}<br>");
	  $total=$total+$sum;
	  $drop_sum=$value['count']*$product['price'];
	  echo ("Сумма покупки {$key}.{$drop_sum}<br>");
	  $prof=$sum-$drop_sum;
	  echo ("Профит {$key}.{$prof}<br>");
	  $profit=$profit+$prof;
	  
	}
	echo ("общ. cумма покупки {$total}<br>");
	$order['total']=$total;
	echo ("общ. профит {$profit}<br>");
	$order['profit']=$profit;
	$result=drop::new_order($user_id, $order,'3');

	echo $result;
	
	echo time();
	
 
	$data = array(
    'key'             => CRM_KEY, //Ваш секретный токен
    'order_id'        => $_POST['order_id'], //идентификатор (код) заказа (*автоматически*)
    'country'         => $_POST['country'],                      // Географическое направление заказа
    'office'          => CRM_OFFICE,                   // Офис (id в CRM)
    'products'        => $_POST['products'],                 // массив с товарами в заказе
    'bayer_name'      => $_POST['bayer_name'],             // покупатель (Ф.И.О)
    'phone'           => $_POST['phone'],           // телефон
    'email'           => $_POST['email'],           // электронка
    'comment'         => $_POST['comment'],    // комментарий
    'site'            => $_POST['site'],  // сайт отправляющий запрос
    'ip'              => $_POST['ip'],  // IP адрес покупателя
    'delivery'        => CRM_DELIVERY,        // способ доставки (id в CRM)
    'delivery_adress' => $_POST['delivery_adress'], // адрес доставки
    'payment'         => CRM_PAYMENT,          // вариант оплаты (id в CRM)
    'utm_source'      => $user_id,  // utm_source 
    'utm_medium'      => $_POST['utm_medium'],  // utm_medium 
    'utm_term'        => $_POST['utm_term'],    // utm_term   
    'utm_content'     => $_POST['utm_content'], // utm_content    
    'utm_campaign'    => $_POST['utm_campaign'] // utm_campaign
);
	//$out=lp_crm::getcurl(CRM, 'addNewOrder.html', $data);
	print_r($out);
	if ($out['status']=='ok') drop::lpcrm($_POST['row_id'], '1');
	//echo $out;

}
else
	header("Location: / ");
?>