 <div class="page-header">
		<h1></h1>
<?	
require_once (CLASS_PATH.'/pagination.class.php');
$result = mysql_query("SELECT * FROM status");
$myrow = mysql_fetch_array($result);
do if ($myrow['fixed']!='0')
{
if ($myrow['style']!='') {$style=$myrow['style'];$color="white";} else $style="btn-default";
$all_status=drop::all_statuses();
?>

<a href="?type=order&status=<?= $myrow['id']; ?>" style="min-width: 175px;color:<?= $color ?>" type="button" class="btn <?= $style ?>"><strong><?= $myrow['name'] ?></strong><? if ($_SESSION['users_group']<5) echo("<br><small>(В т.ч. мои)</small>"); ?><br><h3><strong><? if ($_SESSION['users_group']<5) echo ("{$all_status[$myrow['id']]} <small>({$_SESSION['status'][$myrow['id']]})</small>"); else echo $_SESSION['status'][$myrow['id']];  ?></strong></h3></a>
<?
$color="";
}
while ($myrow = mysql_fetch_array($result));
?>		



		</div> 
		
<script src="<?= JS_PATH ?>/work_news.php"></script>	
	
<div class="row">
<div id="aside1" class="col-sm-6 col-md-6 col-lg-6 panel panel-default">

<?= users::stata(); ?>
<? if ($_SESSION['balance']>MIN_PAY) echo users::order_pay(); ?>
</div>
<div  id="article" class="col-sm-6 col-md-6 col-lg-6 panel panel-default">

<?
$count_news=db::cound_bd('news');
$limit=pagination::pagin($_GET,$count_news, $view_news); 
 if ($_SESSION['users_group']<5) { ?>
<button data-fancybox data-src="<?= ACTION_PATH ?>/edit_news.php?id=new" href="javascript:;" class="btn btn-primary btn-block">Добавить новость </button>
 <? }
 $result = mysql_query("SELECT * FROM news ORDER BY id DESC LIMIT {$limit['begin']}, {$limit['count']}");
$myrow = mysql_fetch_array($result);
do
{
if ($myrow['pic']!="") $img_news=$myrow['pic'];  else $img_news=IMG_NEWS_NAME; 
?>

<div id="news_<?= $myrow['id'] ?>" class="media">
  <a class="pull-left" href="#">
    <img  class="media-object" src="<?= IMG_NEWS_PATH.$img_news ?>" alt="...">
  </a>
  <div class="media-body">
    <h4 class="media-heading text-left"><?= date("d.m.Y H:i:s", $myrow['date']); ?></h4>
	
    <div class="text-left"><?= $myrow['text'] ?></div>
  </div>
  <? if ($_SESSION['users_group']<5) { ?>
  <div class="pull-right"><button data-fancybox data-src="<?= ACTION_PATH ?>/edit_news.php?id=<?= $myrow['id'] ?>" href="javascript:;" id="edit_button_<?= $myrow['id'] ?>" onclick="edit_news()" title="Редактировать новость" class="btn btn-danger"><div class="edit_<?= $myrow['id'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div></button>
	<button onclick="del_news_func(<?= $myrow['id'] ?>,'<?= date("d.m.Y H:i:s", $myrow['date']); ?>')" id="del_news_<?= $myrow['id'] ?>"  title="Удалить новость" class="btn btn-danger"><div class="del_<?= $myrow['id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></div></button>
  <div class="delnews_<?= $myrow['id'] ?>'"></div></div> <? } ?>
</div>
<hr width="90%">
<?  } while ($myrow = mysql_fetch_array($result)); ?>
<? $limit=pagination::pagin($_GET,$count_news, $view_news); ?>

</div>

</div>
<script src="<?= JS_PATH ?>/news.php"></script>	


		
