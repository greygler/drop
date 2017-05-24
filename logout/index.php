<? 
session_start();
require_once ('../config.php');
require_once ("../class/autoring.class.php");
autoring::logout();
header("Location: /");
?>
