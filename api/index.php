<?
if (!empty($_POST)) {
	require ('../config.php');
	require ("../class/db.class.php");
	require ("../class/lpcrm.class.php"); 
	db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
	$db="SELECT * FROM users WHERE drop_key='{$_POST['key']}'";
	$result = mysql_query($db);
	//echo $db;
	$myrow = mysql_fetch_array($result);
    $user_id=$myrow['id'];
	//echo  $user_id;
	//echo("Результат:<br>");
	//foreach ($_POST as $key => $value) echo ("{$key} = {$value}<br>\n");

	
	echo time();
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
	$out=json_encode(lp_crm::getcurl(CRM, 'addNewOrder.html', $data));
	echo $out;
}
else
	header("Location: / ");
?>