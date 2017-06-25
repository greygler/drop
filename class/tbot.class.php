<?
class Tbot{
	
	public function UserIdChat($id_chat)
	{
		$result = mysql_query("SELECT * FROM users WHERE telegram='{$id_chat}'");
		$myrow = mysql_fetch_array($result);
		return $myrow;
	}
		
	public function stats($id)
	{
		$status=getstatusbase();
		$statuses=drop::statuses($id);
		foreach ($status as $key => $value){
			$stats[$key]['name']=$value;
			$stats[$key]['stat']=$statuses[$key];
		}
		return $stats;
	}
	 

}

?>