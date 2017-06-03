<? session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
date_default_timezone_set(TIME_ZONE);
require_once ($_SERVER['DOCUMENT_ROOT'].'/'.LAST_TIME_FILE);
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/db.class.php'); 
$db_result=db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/autoring.class.php'); 

if (!autoring::is_autoring()) header("Location: login/");
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/systems.class.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/favicon.class.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/functions.class.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/lpcrm.class.php'); 
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/drop.class.php');
if (time()-LAST_TIME_CATEGORY>UPDATE_TIME) {
	$categories=lp_crm::getCategories(CRM,CRM_KEY);
	if ($categories['status']=='ok') foreach ($categories['data'] as $key => $value)
		$cat_status[]= drop::cat_base($key, $value['name']);
		drop::last_time('c');
	}
if (time()-LAST_TIME_PRODUCT>UPDATE_TIME) {
		$products=lp_crm::getProducts(CRM,CRM_KEY); 
		if ($products['status']=='ok') foreach ($products['data'] as $key => $value) {
		if ($categories['data'][$value['category_id']]['name']!=""){ $cat=$value['category_id']; }
			else {  $cat=$subcategoties[$value['category_id']]['parent']; $subcat=$value['category_id'];  }
			$result=drop::products($value ['id'], $value ['name'], $value ['model'], $value ['description'], $value ['price'], $value ['spec_price'], $cat, $subcat); $cat=0; $subcat=0;
			drop::last_time('p');
	}
}	
					

$subcategoties=lp_crm::subCategories($categories);
 
if (!empty($_GET)) $type=$_GET['type'].".php"; else $type="news.php";
$no_favicon=true; 
?>
<?= systems::head(); ?>

<?= systems::top_menu(); ?>
<?= systems::side_menu(); ?>
	<div class="container">
	<? require_once ($_SERVER['DOCUMENT_ROOT'].'/pages/'.$type); ?>
	</div>
<?= systems::exit_modal(); ?>
<? if ($_SESSION['users_group']>=5) echo systems::support_modal(); ?>
	
	
<?= systems::footer() ?>