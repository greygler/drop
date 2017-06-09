 <div class="page-header">
		<h1></h1>
<?	
$result = mysql_query("SELECT * FROM status");
$myrow = mysql_fetch_array($result);
do if ($myrow['fixed']!='0')
{
if ($myrow['style']!='') {$style=$myrow['style'];$color="white";} else $style="btn-default"

?>

<a href="" style="min-width: 175px;color:<?= $color ?>" type="button" class="btn <?= $style ?>"><?= $myrow['name'] ?><br><h3><strong>0</strong></h3></a>
<?
$color="";
}
while ($myrow = mysql_fetch_array($result));
?>		



		</div> 
		

	
<div class="row">
<div id="aside1" class="col-sm-6 col-md-6 col-lg-6 panel panel-default">

<?= users::stata(); ?>
<? if ($_SESSION['balance']>MIN_PAY) echo users::order_pay(); ?>
</div>
<div  id="article" class="col-sm-6 col-md-6 col-lg-6 panel panel-default">

<? $result = mysql_query("SELECT * FROM news");
$myrow = mysql_fetch_array($result);
do
{
if ($myrow['pic']!="") $img_news=$myrow['pic'];  else $img_news=IMG_NEWS_NAME; 
?>

<div class="media">
  <a class="pull-left" href="#">
    <img  class="media-object" src="<?= IMG_NEWS_PATH.$img_news ?>" alt="...">
  </a>
  <div class="media-body">
    <h4 class="media-heading text-left"><?= date("d.m.Y H:i:s", $myrow['date']); ?></h4>
	
    <div class="text-left"><?= $myrow['text'] ?></div>
  </div>
</div>
<hr width="90%">
<?  } while ($myrow = mysql_fetch_array($result)); ?>

<div class="media">
  <a class="pull-left" href="#">
    <img  class="media-object" src="<?= IMG_NEWS_PATH.$img_news ?>" alt="...">
  </a>
  <div class="media-body">
    <h4 class="media-heading text-left">Заголовок медиа</h4>
	
    <div class="text-left">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</div>
  </div>
</div>
</div>

</div>
<script src="<?= JS_PATH ?>/news.php"></script>	


		
