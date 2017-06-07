<?

	require ($_SERVER['DOCUMENT_ROOT'].'/config.php');
	require (CLASS_PATH.'/db.class.php');
	require (CLASS_PATH.'/lpcrm.class.php'); 
	require (CLASS_PATH.'/drop.class.php'); 
	print_r(lp_crm::subCategories(CRM,CRM_KEY));
?>