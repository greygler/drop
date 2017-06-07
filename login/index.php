<? 
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
date_default_timezone_set(TIME_ZONE);
require_once (CLASS_PATH.'/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once (CLASS_PATH.'/autoring.class.php'); 
if (autoring::is_autoring()) header("Location: /");
require_once (CLASS_PATH.'/favicon.class.php');
require_once (CLASS_PATH.'/functions.class.php');
require_once (CLASS_PATH.'/systems.class.php');
?>
<?= systems::head('yes') ?>
<?= systems::login() ?>
<?= systems::footer('yes') ?>
