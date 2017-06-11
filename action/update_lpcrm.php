<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/autoring.class.php');
require_once (CLASS_PATH.'/drop.class.php');
require_once (CLASS_PATH.'/lpcrm.class.php');
$groups=autoring::user_group($_SESSION['users_group']);
$order=drop::one_order($_POST['row_id']);

$products_list = array(
    1 => array( 
            'product_id' => $order['product_id'],    //код товара (из каталога CRM)
            'price'      => $order['price'], //цена товара 1
            'count'      => $order['count']                      //количество товара 1
    ),  
    );
$products = urlencode(serialize($products_list));
 
	$data = array(
    'key'             => CRM_KEY, //Ваш секретный токен
    'order_id'        => $order['order_id'], //идентификатор (код) заказа (*автоматически*)
    'country'         => $order['country'],                      // Географическое направление заказа
    'office'          => CRM_OFFICE,                   // Офис (id в CRM)
    'products'        => $products,                 // массив с товарами в заказе
    'bayer_name'      => $order['bayer_name'],             // покупатель (Ф.И.О)
    'phone'           => $order['phone'],           // телефон
    'email'           => $order['email'],           // электронка
    'comment'         => $order['comment'],    // комментарий
    'site'            => $order['site'],  // сайт отправляющий запрос
    'ip'              => $order['ip'],  // IP адрес покупателя
    'delivery'        => CRM_DELIVERY,        // способ доставки (id в CRM)
    'delivery_adress' => $order['delivery_adress'], // адрес доставки
    'payment'         => $groups['payment'],          // вариант оплаты (id в CRM)
    'utm_source'      => $_SESSION['id'],  // utm_source 
    'utm_medium'      => $order['utm_medium'],  // utm_medium 
    'utm_term'        => $order['utm_term'],    // utm_term   
    'utm_content'     => $order['utm_content'], // utm_content    
    'utm_campaign'    => $order['utm_campaign'] // utm_campaign
);
	$out=lp_crm::getcurl(CRM, 'addNewOrder.html', $data);
	print_r($out);
	if ($out['status']='ok') {$ok=drop::lpcrm($_POST['row_id'], '1');
	echo($ok);}
	else echo('error');





} else echo ("Слоны идут нахер!");
?>