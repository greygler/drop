<?
class Tbot{
	const WEBSITE='https://api.telegram.org/bot'.TELEGRAM_BOT;
	const HELP='Все команды по правилам Telegram-ботов начинаются <b>с наклонной черты</b>.%0A%0AКоманды бота <b>«'.TITLE.'»</b>:%0A/start - Начало работы с Ботом «'.TITLE .'»,%0A/reg - регистрация,%0A/balance - текущий баланс,%0A/mystat - статистика по заказам,%0A/options - настройки Вашего аккаунта,%0A<i>Опции включения/выключения:</i>%0A/bot on - включить уведомления,%0A/bot off - выключить уведомления,%0A/auto on - включить автопередачу заказа,%0A/auto off - выключить автопередачу заказа,%0A/take on - разрешить дубли заказа,%0A/take off - запретить заказа,%0A/help - Эта подсказка.';
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
		$status=drop::getstatusbase(); 
		$statuses=drop::statuses($id);
		$mess.="<b>Ваша текущая статистика:%0A</b>";
		foreach ($status as $key => $value) { $mess.="{$value}: <b>{$statuses[$key]}</b>%0A";
		}
		return $mess;
	}
	
	public function yes_or_no($yon)
	{
		if ($yon!="1") return "нет"; else return "да";
	}
	
	public function options($user)
	{
		$mess="Имя: <b>{$user['name']}</b>%0A";
			$mess.="Группа: <b>{$user['users_group']}</b>%0A";
			$mess.="Email: <b>{$user['email']}</b> ";
			if ($user['email']==$user['v_email']) $mess.="(Верифицирован)%0A"; else $mess.="(Не верифицирован)%0A";
			
			if ($user['phone']!=""){
				$mess.="Телефон: <b>{$user['phone']}</b> ";
				if ($user['phone']==$user['v_phone']) $mess.="(Верифицирован)%0A"; else $mess.="(Не верифицирован)%0A";
			}
			$mess.="Автодобавление заказа: <b>".tbot::yes_or_no($user['active_drop'])."</b>%0A";
			$mess.="Разрешение дублей: <b>".tbot::yes_or_no($user['take_drop'])."</b>%0A";
			$mess.="Уведомление телеграм-бот: <b>".tbot::yes_or_no($user['tbot'])."</b>%0A";
			return $mess;
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
				
				$mess=tbot::stats($user[id]);
			}
			else $mess=tbot::ERROR;
			break;
			
		case "/options":
			if ($user!=false) {
			
			$mess=tbot::options($user);
			}
			else $mess=tbot::ERROR;
			break;
			
		case "/bot":
			if ($user!=false) {
			
			$mess="Автоматическое уведомление: <b>".tbot::yes_or_no($user['tbot'])."</b>";
			$mess.="%0A/bot on - включить,%0A/bot off - включить";
			}
			else $mess=tbot::ERROR;
			break;
			
		case "/bot on":
			if ($user!=false) {
			if (autoring::active_tbot($user['id'], '1')==true) 
				$mess="Автоматическое уведомление успешно включено";
				else $mess="Ошибка включения автоматического уведомления";
			}
			else $mess=tbot::ERROR;
			break;
			
		case "/bot off":
			if ($user!=false) {
			if (autoring::active_tbot($user['id'], '0')==true) 
				$mess="Автоматическое уведомление успешно выключено";
				else $mess="Ошибка выключения автоматического уведомления";
			}
			else $mess=tbot::ERROR;
			break;
			
		case "/auto":
			if ($user!=false) {
			
			$mess="Автоматическое передача заказа: <b>".tbot::yes_or_no($user['tbot'])."</b>";
			$mess.="%0A/auto on - включить,%0A/auto off - включить";
			}
			else $mess=tbot::ERROR;
			break;	
		
		case "/auto on":
			if ($user!=false) {
			if (autoring::active_drop($user['id'], '1')==true) 
				$mess="Автоматическая передача заказа успешно включена";
				else $mess="Ошибка включения автоматической передачи заказа";
			}
			else $mess=tbot::ERROR;
			break;
			
		case "/auto off":
			if ($user!=false) {
			if (autoring::active_drop($user['id'], '0')==true) 
				$mess="Автоматическая передача заказа успешно выключена";
				else $mess="Ошибка выключения автоматической передачи заказа";
			}
			else $mess=tbot::ERROR;
			break;	


		case "/take":
			if ($user!=false) {
			
			$mess="Разрешение дублей заказа: <b>".tbot::yes_or_no($user['tbot'])."</b>";
			$mess.="%0A/take on - включить,%0A/take off - включить";
			$mess.="%0A<i>Автоматическая передача дублирующих заявок возможна в случае, если это разрешено на стороне приема заказов</i>";
			}
			else $mess=tbot::ERROR;
			break;	
		
		case "/take on":
			if ($user!=false) {
			if (autoring::take_drop($user['id'], '1')==true) 
				$mess="<b>Разрешение дублей заказа успешно включена</b>";
				else $mess="Ошибка включения разрешения дублей заказа";
				$mess.="%0A<i>Автоматическая передача дублирующих заявок возможна в случае, если это разрешено на стороне приема заказов</i>";
			}
			else $mess=tbot::ERROR;
			break;
			
		case "/take off":
			if ($user!=false) {
			if (autoring::take_drop($user['id'], '0')==true) 
				$mess="<b>Разрешение дублей заказа успешно выключена</b>";
				else $mess="Ошибка выключения разрешения дублей заказа";
				$mess.="%0A<i>Автоматическая передача дублирующих заявок возможна в случае, если это разрешено на стороне приема заказов</i>";
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