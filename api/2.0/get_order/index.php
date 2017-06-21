<?
session_start();
if (!empty($_POST)) {
	//print_r($_POST);
	require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
	require_once (CLASS_PATH.'/db.class.php');
	require_once (CLASS_PATH.'/autoring.class.php');
	require_once (CLASS_PATH.'/lpcrm.class.php'); 
	require_once (CLASS_PATH.'/drop.class.php'); 
	db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
	if (db::cound_bd('users', "drop_key='{$_POST['key']}'")>0) $user=drop::get_id($_POST['key']); else $user=autoring::get_user(DEFAULT_ID);
	$take=db::cound_bd('order_tab', "(phone='{$_POST['phone']}' AND bayer_name='{$_POST['bayer_name']}' AND site='{$_POST['site']}')");
	if ((($take>0) AND ($user['take_drop']==1)) OR ($take==0)) {
		echo ("{$take} - {$user['take_drop']}");
	$groups=autoring::user_group($user['users_group']);
	//print_r($groups);
	$order=$_POST;
	$products = unserialize(urldecode($_POST['products'])); 
	foreach($products as $key => $value){
	  $product=drop::one_product($value['product_id']);
	 // print_r($product); echo("<br>");
	  $sum=$value['count']*$value['price'];
	 // echo ("Сумма заказа {$key}.{$sum}<br>");
	  $total=$total+$sum;
	  $drop_sum=$value['count']*$product['price'];
	 // echo ("Сумма покупки {$key}.{$drop_sum}<br>");
	  $prof=$sum-$drop_sum;
	//  echo ("Профит {$key}.{$prof}<br>");
	  $profit=$profit+$prof;
	  
	}
	//echo ("общ. cумма покупки {$total}<br>");
	$order['total']=$total;
	//echo ("общ. профит {$profit}<br>");
	$order['profit']=$profit;
	$result=drop::new_order($user['id'], $order,'3');

	echo TITLE.": ".$result."<br>";
	

	if ($user['active_drop']=='1'){
 
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
    'payment'         => $groups['payment'],          // вариант оплаты (id в CRM)
    'utm_source'      => TITLE,  // utm_source 
    'utm_medium'      => 'Id: '.$user['id'],  // utm_medium 
    'utm_term'        => 'Имя: '.$user['name'],    // utm_term   
    'utm_content'     => 'Phone: '.$user['phone'], // utm_content    
    'utm_campaign'    => 'Email: '.$user['email'] // utm_campaign
);
	$out=lp_crm::getcurl(CRM, 'addNewOrder.html', $data);
	print_r($out);
	if ($out['status']=='ok') drop::lpcrm_order_id($_POST['order_id'], '1');
	echo $out;
	} else echo (TITLE.": заказ добавлен в базу, но не передан для обработки");
	
} else {echo('error! Дубль');	echo ("{$take} - {$user['take_drop']}");}
} else	header("Location: / ");
?>