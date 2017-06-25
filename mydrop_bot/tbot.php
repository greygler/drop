<?php
    set_time_limit(0);
	require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
	date_default_timezone_set(TIME_ZONE);
	require_once (CLASS_PATH.'/db.class.php'); 
	$db_result=db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
	require_once (CLASS_PATH.'/drop.class.php');
	require_once (CLASS_PATH.'/lpcrm.class.php');
	require_once (CLASS_PATH.'/tbot.class.php');
	
    $website = "https://api.telegram.org/bot".TELEGRAM_BOT;

    // Получаем запрос от Telegram 

    $content = file_get_contents("php://input");
    $update = json_decode($content, TRUE);
    $message = $update["message"];
	

    // Получаем: 

    $chatId = $message["chat"]["id"]; 					// ID чата
    $text = $message["text"]; 							// Сообщение
	$first_name=$message['from']['first_name'];			// Имя
	$last_name=$message['from']['last_name'];			// Фамилия
	$username = $message['from']['username'];			// Ник
	$language_code=$message['from']['language_code'];	// Язык
	
	$help="Все команды по правилам Telegram-ботов начинаются <b>с наклонной черты</b>.%0A%0AКоманды бота <b>«".TITLE."»</b>:%0A/start - Начало работы с Ботом «".TITLE ."»,%0A/reg - регистрация,%0A/balance - баланс,%0A/mystat - статистика по заказам,%0A/options - настройки Вашего аккаунта,%0A/hello - Поприветствовать бота,%0A/bye - Попрощаться с ботом,%0A/help - Эта подсказка.";
  
switch ($text) {
	case "/start":
        $mess="Здравствуйте, {$first_name} {$last_name}.%0AВас приветствует бот <b>Системы Управления Продажами по Дропшиппингу «".TITLE ."»</b>";
        break;
    case "/hello":
        $mess="Привет, {$first_name}!";
        break;
    case "/bye":
        $mess="Пока, {$first_name}!";
        break;
	case "/help":
        $mess=$help;
        break;
		
	case "/reg":
        $mess="Ваш ID: {$chatId}%0AВведите его в соответсвующее поле системы.";
        break;	
		
	case "/balance":
		$user=tbot::UserIdChat($chatId);
        $mess="Ваш текущий баланс: <b>{$user['balance']} ".CURRENCY.".</b>%0A";
		$mess.="Всего заработано в системе: <b>{$user['total_balance']} ".CURRENCY.".</b>%0A";
        break;
		
	case "/mystat":
		$user=tbot::UserIdChat($chatId);
		$status=drop::getstatusbase(); 
		$statuses=drop::statuses($id);
		//foreach ($statuses as $key => $value) $mess.="{$key}={$value}%0A";
		//$stats=tbot::stats($user['id']);
		$mess.="Ваша текущая статистика:%0A";
		foreach ($status as $key => $value) { $mess.="<b>{$value}</b>: {$statuses[$key]}%0A"; }
        
        break;
		
	case "/options":
		$user=tbot::UserIdChat($chatId);
		$mess="Имя: <b>{$user['name']}</b>%0A";
		$mess.="Группа: <b>{$user['users_group']}</b>%0A";
		$mess.="Email: <b>{$user['email']}</b>%0A";
		// Верификация
		$mess.="Телефон: <b>{$user['phone']}</b>%0A";
		// Верификация
        $mess.="Автодобавление заказа: <b>{$user['active_drop']}</b>%0A";
		$mess.="Разрешение дублей: <b>{$user['take_drop']}</b>%0A";
        break;
	
    default:
	    $mess="Неизвестная комманда! Воспользуйтесь подсказкой по команде /help";
        break;
}
file_get_contents($website."/sendmessage?chat_id=".$chatId."&parse_mode=html&text=".$mess); 
?>