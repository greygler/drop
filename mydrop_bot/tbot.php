<?php
    set_time_limit(0);
	require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
	date_default_timezone_set(TIME_ZONE);
	require_once (CLASS_PATH.'/db.class.php'); 
	$db_result=db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
	require_once (CLASS_PATH.'/drop.class.php');
	require_once (CLASS_PATH.'/lpcrm.class.php');
	require_once (CLASS_PATH.'/tbot.class.php');
	


    // Получаем запрос от Telegram 

    $content = file_get_contents("php://input");
    $update = json_decode($content, TRUE);
    $message = $update["message"];
	    
	$chatId = $message["chat"]["id"]; 		 	// Получаем ID чата	
	$mess=tbot::bot($message, $chatId);			// Обрабатываем команду
	tbot::send_bot($chatId, $mess); 			// Отправляем ответ

?>