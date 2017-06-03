<?
class drop{
	
	public function last_time($type)
	{
		$fp = fopen($_SERVER['DOCUMENT_ROOT'].'/'.LAST_TIME_FILE, 'w+');
		flock($fp, LOCK_EX); // Блокирование файла для записи
		if ($type=='p') {$t1=time(); $t2=LAST_TIME_CATEGORY;} else {$t1=LAST_TIME_PRODUCT; $t2=time(); }
		$text="<?\n\tdefine('LAST_TIME_PRODUCT','".$t1."');\n\tdefine('LAST_TIME_CATEGORY','".$t2."');\n?>";
		fwrite($fp, $text);
		flock($fp, LOCK_UN); // Снятие блокировки
		fclose($fp);

	}
	
	public function get_id($key) // Ищем ID пользователя по ключу
	{
		//db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
		$result = mysql_query("SELECT * FROM users WHERE drop_key='{$key}'");
		$myrow = mysql_fetch_array($result);
		return $myrow['id'];
	}

	public function new_order($user_id, $data, $status) // Cохраняем заказ
	{
		//db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
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
	
	public function is_product($id) // Есть ли в базе товар с таким ID
	 {
		//$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
		$count=db::cound_bd('products', "id='{$id}'");
		if ($count>0) return true; else return false;
		 
	 }
	 
	public function is_categories($id) // Есть ли такая категория в базе
	{
		$count=db::cound_bd('categories', "id='{$id}'");
		if ($count>0) return true; else return false;
	}
	
	
	public function is_subcategories($id) // Есть ли такая cубкатегория в базе
	{
		$count=db::cound_bd('subcategories', "id='{$id}'");
		if ($count>0) return true; else return false;
	}
	
	public function products($id, $name, $model, $description, $price, $spec_price, $cat, $subcat) // Обновление базы товаров. Если нет - добавляем
	{
		if (drop::is_product($id)) 
			$result = mysql_query ("UPDATE products SET name='{$name}', model='{$model}', price='{$price}', spec_price='{$spec_price}',  description='{$description}', cat='{$cat}', subcat='{$subcat}' WHERE id='{$id}'");
		else 
			$result = mysql_query ("INSERT INTO products (id, name, model,  price, spec_price,  description, cat, subcat, active) VALUES ('{$id}', '{$name}', '{$model}','{$price}', '{$spec_price}', '{$description}','{$cat}', '{$subcat}','1')");
		if ($result == 'true') return 'ok'; else return 'error';
	}
	
	public function cat_base($id, $name) // Обновление базы категорий. Если нет - добавляем
	{
		if (drop::is_categories($id)) 
			$result = mysql_query ("UPDATE categories SET name='{$name}' WHERE id='{$id}'");
		
		else
			$result = mysql_query ("INSERT INTO categories (id, name) VALUES ('{$id}', '{$name}')");
		
		if ($result == 'true') return 'ok'; else return 'error';
	}
	
	public function subcat_base($id, $name) //Обновление базы субкатегорий. Если нет - добавляем
	{
		if (drop::is_subcategories($id)) 
			$result = mysql_query ("UPDATE categories SET name='{$name}' WHERE id='{$id}'");
		else 
			$result = mysql_query ("INSERT INTO categories (id, name,) VALUES ('{$id}', '{$name}')");
		if ($result == 'true') return 'ok'; else return 'error';
	}
	
}
?>