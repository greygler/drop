<?
class Tbot{
	const WEBSITE='https://api.telegram.org/bot'.TELEGRAM_BOT;
	const HELP='Все команды по правилам Telegram-ботов начинаются <b>с наклонной черты</b>.%0A%0AКоманды бота <b>«'.TITLE.'»</b>:%0A/start - Начало работы с Ботом «'.TITLE .'»,%0A/reg - регистрация,%0A/balance - баланс,%0A/mystat - статистика по заказам,%0A/options - настройки Вашего аккаунта,%0A/hello - Поприветствовать бота,%0A/bye - Попрощаться с ботом,%0A/help - Эта подсказка.';
	const ERROR='Вы не зарегистрированны в системе <b>«'.TITLE.'»</b>.%0AПожалуйста, пройдите регистрацию.';
	const NO_COMMAND='Неизвестная команда! Воспользуйтесь подсказкой по команде /help';
	
	
	public function UserIdChat($id_chat) // Забираем данные пользователя по Id_chat
	{
		$is_user_bot=db::cound_bd('users', "telegram='{$id_chat}'");
		if ($is_user_bot>0){
		$result = mysql_query("SELECT * FROM users WHERE telegram='{$id_chat}'");
		$myrow = mysql_fetch_array($result);
		return $myrow;
		}
		else return false;
	}
		
	public function stats($id) // Общая статистика
	{
		$status=getstatusbase();
		$statuses=drop::statuses($id);
		foreach ($status as $key => $value){
			$stats[$key]['name']=$value;
			$stats[$key]['stat']=$statuses[$key];
		}
		return $stats;
	}
	
	
	public function bot($message, $chatId) {
			
			$text = $message["text"]; 							// Сообщение
			$first_name=$message['from']['first_name'];			// Имя
			$last_name=$message['from']['last_name'];			// Фамилия
			$username = $message['from']['username'];			// Ник
			$language_code=$message['from']['language_code'];	// Язык
	
	
		$user=tbot::UserIdChat($chatId);
		if ($user!=false) tbot::last_command($user['id'], $text);
  
		switch ($text) {
		case "/start":
			$mess="Здравствуйте, {$first_name} {$last_name}.%0AВас приветствует бот <b>Системы Управления Продажами по Дропшиппингу «".TITLE ."»</b>%0AВаш ID в системе: {$chatId}%0AВведите его в соответсвующее поле.";
			break;
		case "/hello":
			$mess="Привет, {$first_name}!";
			break;
		case "/bye":
			$mess="Пока, {$first_name}!";
			break;
		case "/help":
			$mess=tbot::HELP;
			break;
			
		case "/reg":
			$mess="Ваш ID: {$chatId}%0AВведите его в соответсвующее поле системы.";
			break;	
			
		case "/balance":
			if ($user!=false) {
			$mess="Ваш текущий баланс: <b>{$user['balance']} ".CURRENCY.".</b>%0A";
			$mess.="Всего заработано в системе: <b>{$user['total_balance']} ".CURRENCY.".</b>%0A";
			}
			else $mess=tbot::ERROR;
			break;
			
		case "/mystat":
			
			if ($user!=false) {
			$status=drop::getstatusbase(); 
			$statuses=drop::statuses($id);
			//foreach ($statuses as $key => $value) $mess.="{$key}={$value}%0A";
			//$stats=tbot::stats($user['id']);
			$mess.="Ваша текущая статистика:%0A";
			foreach ($status as $key => $value) { $mess.="<b>{$value}</b>: {$statuses[$key]}%0A"; }
			}
			else $mess=tbot::ERROR;
			break;
			
		case "/options":
			if ($user!=false) {
			$user=tbot::UserIdChat($chatId);
			$mess="Имя: <b>{$user['name']}</b>%0A";
			$mess.="Группа: <b>{$user['users_group']}</b>%0A";
			$mess.="Email: <b>{$user['email']}</b>%0A";
			// Верификация
			$mess.="Телефон: <b>{$user['phone']}</b>%0A";
			// Верификация
			$mess.="Автодобавление заказа: <b>{$user['active_drop']}</b>%0A";
			$mess.="Разрешение дублей: <b>{$user['take_drop']}</b>%0A";
			}
			else $mess=tbot::ERROR;
			break;
		
		default:
			$mess=tbot::NO_COMMAND;
			break;
			
	
}
return $mess;
	}
	
	
	public function last_command($user_id, $command) // Последняя команда
	{
		$result = mysql_query ("UPDATE users SET last_t_com='{$command}' WHERE id='{$user_id}'");
	}
	
	public function last_report($user_id, $report) // Последний отчет
	{
		$result = mysql_query ("UPDATE users SET last_report_bot='{$report}' WHERE id='{$user_id}'");
	}	
	  
	public function send_bot($chatId, $mess) // Отправка в бот
	{
		file_get_contents(tbot::WEBSITE."/sendmessage?chat_id=".$chatId."&parse_mode=html&text=".$mess); 
	}  

}

?>