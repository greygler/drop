<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/autoring.class.php');
require_once (CLASS_PATH.'/functions.class.php');
require_once (CLASS_PATH.'/lpcrm.class.php');
require_once (CLASS_PATH.'/drop.class.php');
$groups=autoring::user_group($_SESSION['users_group']);

//print_r($_POST);

$products_list = array();
$counter=1;
foreach ($_POST['count'] as $key => $value) if ($value!=0){
	
	$products_list[$counter]= array( 
            'product_id' => $_POST['product_id'][$key],    //код товара (из каталога CRM)
            'price'      => $_POST['price'][$key],    //цена товара 1
            'count'      => $_POST['count'][$key]        //количество товара 1
    );  $counter++;
};
$products = urlencode(serialize($products_list));

	$data = array(
    'order_id' => $_POST['order_id'], 
	'ip'				 => $_POST['order_ip'], 
	//'site' 				 => $_POST['site'],
	'country'         	=> $_POST['country'], 
    'products'       	=> $products,                 // массив с товарами в заказе
	'total'				=> $_POST['total'],
	'profit'			=> $_POST['form_profit'],
    'bayer_name'   	   	=> $_POST['bayer_name'],             // покупатель (Ф.И.О)
    'phone'         	=> $_POST['phone'],           // телефон
    'email'         	=> $_POST['email'],           // электронка
    'comment'       	=> $_POST['comment'],    // комментарий
    'delivery_adress'	=> $_POST['delivery_adress'], // адрес доставки
	
    
);

if (drop::is_order($_POST['order_id'])) drop::update_order($_POST['order_id'], $data);
else {
	
	 drop::new_order($_POST['user_id'], $data, '3');
	 if ($_POST['active_drop']=='1') {
			//drop::id_order_id($_POST['order_id']);
		 drop::update_lpcrm(drop::id_order_id($_POST['order_id']),$groups);}
}
echo ("Заказ успешно сохранен.");
//print_r($data);
} else header("Location: ".SITE_ADDR."/error/666.php");
?>