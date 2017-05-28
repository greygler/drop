<? session_start();
require_once ('../config.php');
require_once ("../class/db.class.php"); 
require_once ("../class/autoring.class.php"); 

if (!autoring::is_autoring()) header("Location: ../login/");

require_once ('../head.php');
$user=autoring::get_user($_GET['id']);
print_r($user);
?>



<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
    <script src="/js/gnmenu.js"></script>
	<script src="/js/jquery.fancybox.min.js"></script>
  </body>
</html>