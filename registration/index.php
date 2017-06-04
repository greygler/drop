<? 
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
date_default_timezone_set(TIME_ZONE);
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/db.class.php');
$result=db::connect_db(DB_HOST, DB_NAME, DB_LOGIN, DB_PASS);
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/autoring.class.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/favicon.class.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/functions.class.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/systems.class.php');
?>


<?= systems::head('no','yes') ?>

<?= systems::registration() ?>
  
<?= systems::footer('yes') ?>
