<?
class drop{
	
	public function last_time($type)
	{
		$fp = fopen($_SERVER['DOCUMENT_ROOT'].'/'.LAST_TIME_FILE, 'w+');
		flock($fp, LOCK_EX); // Блокирование файла для записи
		if ($type=='p') {$t1=time(); $t2=LAST_TIME_CATEGORY;} else {$t1=LAST_TIME_PRODUCT; $t2=time(); }
		$text="<?\n\t// Обновление ".date("d.m.Y H:i:s").", Пользователь id:{$_SESSION['id']}, {$_SESSION['name']}\n\tdefine('LAST_TIME_PRODUCT','".$t1."');\n\tdefine('LAST_TIME_CATEGORY','".$t2."');\n?>";
		
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
	
	public function search($product)
	{
		$result = mysql_query("SELECT * from products WHERE name LIKE '%{$product}%'");
		return $result;
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
	
	public function category($id) // Возвращяем название категории по ID
	{
		if (drop::is_categories($id)) 
		{
			$result = mysql_query("SELECT * FROM categories WHERE id='{$id}'");
			$myrow = mysql_fetch_array($result);
			return $myrow['name'];
		}
		else return false;
	}
	
	
	public function is_subcategories($id) // Есть ли такая cубкатегория в базе
	{
		$count=db::cound_bd('subcategories', "id='{$id}'");
		if ($count>0) return true; else return false;
	}
	
	public function subcategory($id) // Возвращяем массив субкатегории по ID
	{
		if (drop::is_subcategories($id)) 
		{
			$result = mysql_query("SELECT * FROM subcategories WHERE id='{$id}'");
			$myrow = mysql_fetch_array($result);
			return $myrow;
		}
		else return false;
	}
	
	public function product_active($id, $active) // Обновление автивности товара
		{
			$result = mysql_query ("UPDATE products SET active='{$active}' WHERE id='{$id}'");
			if ($result == 'true') return 'ok'; else return 'error';
		}
	
	public function products($id, $name, $model, $description, $price, $spec_price, $cat, $subcat) // Обновление базы товаров. Если нет - добавляем
	{
		if (drop::is_product($id)) 
			$result = mysql_query ("UPDATE products SET name='{$name}', model='{$model}', price='{$price}', spec_price='{$spec_price}',  description='{$description}', cat='{$cat}', subcat='{$subcat}' WHERE id='{$id}'");
		else 
			$result = mysql_query ("INSERT INTO products (id, name, model,  price, spec_price,  description, cat, subcat, active) VALUES ('{$id}', '{$name}', '{$model}','{$price}', '{$spec_price}', '{$description}','{$cat}', '{$subcat}','".ACTIVE_PRODUCT."')");
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
	
	public function subcat_base($id, $name, $parent) //Обновление базы субкатегорий. Если нет - добавляем
	{
		if (drop::is_subcategories($id)) 
			$result = mysql_query ("UPDATE subcategories SET name='{$name}', parent='{$parent}' WHERE id='{$id}'");
			
		else 
			$result = mysql_query ("INSERT INTO subcategories (id, name, parent) VALUES ('{$id}', '{$name}', '{$parent}')");
			
		if ($result == 'true') return 'ok'; else return 'error';
	}

	public function update_data()
		{
				if (time()-LAST_TIME_CATEGORY>UPDATE_TIME) {
				$categories=lp_crm::getCategories(CRM,CRM_KEY);
				$subcategories=lp_crm::subCategories($categories);
				if ($categories['status']=='ok') {
					foreach ($categories['data'] as $key => $value)
						$cat_status[]= drop::cat_base($key, $value['name']);
					foreach ($subcategories as $key => $value)
						$subcat_status[]=drop::subcat_base($key, $value['name'], $value['parent']);
					}
				drop::last_time('c');
			}
			
			if (time()-LAST_TIME_PRODUCT>UPDATE_TIME) {
			//if (!isset($subcategories)) $subcategories=lp_crm::subCategories($categories);
			$products=lp_crm::getProducts(CRM,CRM_KEY); 
			
			//print_r($products);
			if ($products['status']=='ok') foreach ($products['data'] as $key => $value) {
				$subcat=drop::subcategory($value['category_id']);
			if (drop::is_categories($value['category_id'])){ $cat=$value['category_id']; }
				else {  $cat=$subcat['parent']; $subcat=$value['category_id'];  }
				$result=drop::products($value ['id'], $value ['name'], $value ['model'], $value ['description'], $value ['price'], $value ['spec_price'], $cat, $subcat); $cat=0; $subcat=0;
				drop::last_time('p');
				}
			}
		}
}
?>