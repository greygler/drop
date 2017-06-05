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

drop::update_data();	
					


 
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