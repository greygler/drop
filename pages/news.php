<div class="page-header">
		<h1>Новости системы</h1>
		</div>
		
<? $img_news=IMG_NEWS_NAME ?>		
<div class="row">
<div class="col-sm-6 col-md-6 col-lg-6 panel panel-default">

<div class="media">
  <a class="pull-left" href="#">
    <img  class="media-object" src="<?= IMG_NEWS_PATH.$img_news ?>" alt="...">
  </a>
  <div class="media-body">
    <h4 class="media-heading text-left">Заголовок медиа</h4>
	
    <p class="text-left">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
  </div>
</div>

<div class="media">
  <a class="pull-left" href="#">
    <img  class="media-object" src="<?= IMG_NEWS_PATH.$img_news ?>" alt="...">
  </a>
  <div class="media-body">
    <h4 class="media-heading text-left">Заголовок медиа</h4>
	
    <p class="text-left">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
  </div>
</div>
</div>
<div class="col-sm-6 col-md-6 col-lg-6 panel panel-default">

<?= users::stata(); ?>
<? if ($_SESSION['balance']>MIN_PAY) echo users::order_pay(); ?>
</div>
</div>
		

		
