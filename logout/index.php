<? 
session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
require_once (CLASS_PATH.'/autoring.class.php');
autoring::logout();
header("Location: /");
?>
