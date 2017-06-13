<?
if ((isset($_POST['log'])) AND (isset($_POST['pass']) )) {
	if (($_POST['log']=="dropadmin") AND ($_POST['pass']="123")){
	echo($_POST['log']);
	echo('ok');
	} else {echo("error!"); unset($_POST['pass']);};
}
else{ ?>
	<form method="post">
	<input type="text" name="log">
	<input type="password" name="pass">
	<input type="submit" value="Go!">
	</form>
<? } 
?>