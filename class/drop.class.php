<?
class drop{
	
	public function get_id($key)
	{
		db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
		$result = mysql_query("SELECT * FROM users WHERE drop_key='{$key}'");
		$myrow = mysql_fetch_array($result);
		return $myrow['id'];
	}

	public function new_order($user_id, $data, $status)
	{
		db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
		$col="user_id, order_time, status, ";
		$values="'{$user_id}',".time().", {$status}, ";
		foreach($data as $key => $value) if ($key!='key')
		{
			$col.="{$key},";
			$values.="'{$value}',";
		}
		$col = substr($col, 0, -1);
		$values = substr($values, 0, -1);
		$db="INSERT INTO order_tab ({$col}) VALUES ({$values})";
		$result = mysql_query ($db);
		echo $db;
		if ($result == 'true') return 'ok'; else return 'error';

	}
}
?>