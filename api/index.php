<?

	require ($_SERVER['DOCUMENT_ROOT'].'/config.php');
	require ($_SERVER['DOCUMENT_ROOT'].'/class/db.class.php');
	require ($_SERVER['DOCUMENT_ROOT'].'/class/lpcrm.class.php'); 
	require ($_SERVER['DOCUMENT_ROOT'].'/class/drop.class.php'); 
	print_r(lp_crm::subCategories(CRM,CRM_KEY));
?>