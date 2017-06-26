<? session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
date_default_timezone_set(TIME_ZONE);
require_once (CLASS_PATH.'/db.class.php'); 
$db_result=db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
require_once (CLASS_PATH.'/autoring.class.php'); 
if (!autoring::is_autoring()) header("Location: login/");
require_once (CLASS_PATH.'/systems.class.php');
require_once (CLASS_PATH.'/favicon.class.php');
require_once (CLASS_PATH.'/functions.class.php');
require_once (CLASS_PATH.'/lpcrm.class.php'); 
require_once (CLASS_PATH.'/drop.class.php');
require_once (CLASS_PATH.'/users.class.php');
	
$status=drop::statuses($_SESSION['id']);				


 
if (!empty($_GET)) $type=$_GET['type'].".php"; else $type="news.php";
if (!file_exists(PAGE_PATH.$type)) $type="404.php";
$no_favicon=true; 
?>
<?= systems::head(); ?>

<?= systems::top_menu(); ?>
<?= systems::side_menu(); ?>
	<div class="container">
	<? require_once (PAGE_PATH.$type); ?>
	</div>
<?= systems::exit_modal(); ?>
<? if ($_SESSION['users_group']>=5) echo systems::support_modal(); ?>
	
	
<?= systems::footer() ?>