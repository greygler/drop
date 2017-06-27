<?
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
if (mb_stripos($_SERVER['HTTP_REFERER'],SITE_ADDR)!==false){ ?> 
function noti(a,b,c){
 
Notification.requestPermission(function (permission) {
var n = new Notification(a, {body: b, icon: 'favicon/favicon.png',tag:''});
setTimeout(n.close.bind(n), c);
});
}
	
<? } else header("Location: ".SITE_ADDR."/error/666.php"); ?>
  