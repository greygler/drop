<?
class LP_CRM
{
	const CRM_HOST='lp-crm.biz/api/';
	
	public function getcurl($crm, $api, $data) // запрос
	{
		// запрос
		$path=  'http://'.$crm.'.'.lp_crm::CRM_HOST.$api.'.html';
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $path);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		$out = curl_exec($curl);
		curl_close($curl);
		return json_decode($out, true);
	}
	
	public function getCategories($crm, $key) // Категории товаров
	{
		$data = array(
			'key' => $key,  
		);
 
		$out_data = lp_crm::getcurl($crm, 'getCategories', $data);
		return $out_data;
	}
	
	public function getProducts($crm, $key) // Все товары
	{
		$data = array(
			'key' => $key,  
		);
 
		$out_data = lp_crm::getcurl($crm, 'getProducts', $data);
		return $out_data;
	}
	
	public function getStatuses($crm, $key) // Статусы заказов
	{
		$data = array(
			'key' => $key,  
		);
 
		$out_data = lp_crm::getcurl($crm, 'getStatuses', $data);
		return $out_data;
	}
	
}
?>