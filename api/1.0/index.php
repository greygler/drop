<?
if (!empty($_POST)) {
	require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
	require_once (CLASS_PATH.'/db.class.php');
	require_once (CLASS_PATH.'/lpcrm.class.php'); 
	require_once (CLASS_PATH.'/drop.class.php'); 
	$user_id=drop::get_id($_POST['key']);
	$result=drop::new_order($user_id, $_POST,'3');

	echo $result;
	
	echo time();
	$products_list = array(
    1 => array( 
            'product_id' => '1',    //код товара (из каталога CRM)
            'price'      => '2', //цена товара 1
            'count'      => '1'                      //количество товара 1
    ),  
    );
$products = urlencode(serialize($products_list));
 
	$data = array(
    'key'             => CRM_KEY, //Ваш секретный токен
    'order_id'        => $_POST['order_id'], //идентификатор (код) заказа (*автоматически*)
    'country'         => $_POST['country'],                      // Географическое направление заказа
    'office'          => CRM_OFFICE,                   // Офис (id в CRM)
    'products'        => $products,                 // массив с товарами в заказе
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
	$out=lp_crm::getcurl(CRM, 'addNewOrder.html', $data);
	print_r($out);
	if ($out['status']='ok') {drop::lpcrm($_POST['row_id'], '1');
	//echo $out;
}
else
	header("Location: / ");
?>