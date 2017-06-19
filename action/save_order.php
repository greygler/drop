<?
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/drop.class.php');

print_r($_POST);

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
       
    'products'        => $products,                 // массив с товарами в заказе
	'total'			=> $_POST['total'],
	'profit'		=> $_POST['form_profit'],
    'bayer_name'      => $_POST['bayer_name'],             // покупатель (Ф.И.О)
    'phone'           => $_POST['phone'],           // телефон
    'email'           => $_POST['email'],           // электронка
    'comment'         => $_POST['comment'],    // комментарий
    'delivery_adress' => $_POST['delivery_adress'], // адрес доставки
    
);
drop::update_order($_POST['order_id'], $data);
//print_r($data);
} else header("Location: ".$_SERVER['DOCUMENT_ROOT']."/error/666.php");
?>