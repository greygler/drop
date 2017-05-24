<? session_start();
require_once ('config.php');
require_once ("class/db.class.php"); 
require_once ("class/autoring.class.php"); 
if (!autoring::is_autoring()) header("Location: login/");
require_once ("class/lpcrm.class.php"); 
require_once ("class/favicon.class.php");
//db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
$categories=lp_crm::getCategories(CRM,CRM_KEY);
//foreach ($categories['data'] as $key => $value)
//if ($value['subcategories']!="") {$subcategories[$value['subcategoties'][$key]['id']]=$value['subcategoties'];
//echo "{$key} = {$value['subcategoties']['name']}"; }

$balance=7;
$new_order=4;
if ($balance<0) $color_balance="red"; else if ($balance!=0) $color_balance="green";
 
if (!empty($_GET)) $type=$_GET['type'].".php"; else $type="news.php";
require_once ('head.php');
?>


	<!-- HTML Markup for Top Navigation Menu -->	
	<nav>
		<ul>
			<li><a href="#" class="icon icon-menu" id="btn-menu">Menu</a></li>
			<li><a href="?type=order"><div class="hidden-xs">Заказы</div><div class="visible-xs"><i class="fa fa-shopping-cart fa-2x"></i>
</div></a></li>
			<li><a href="?type=user"><div class="hidden-xs">Kабинет</div><div class="visible-xs"><i class="fa fa-user-circle fa-2x"></i>
</div></a></li></a></li>
			<li class="visible-xs"><a data-toggle="modal" data-target="#support" href="#"><span class="help fa fa-support fa-2x"></span></a></li> 
		</ul>
		<div id="user" class="row  hidden-xs">
		
		 <div class="inform text-right col-md-1 col-lg-1 visible-lg visible-md"><span class="fa fa-user-circle fa-3x"></span> </div>
		<div class="inform col-sm-3 col-md-3 col-lg-4"> <span class="fa fa-user fa-lg"></span> <?= $_SESSION['name'] ?><a data-toggle="modal" data-target="#logmodal" class="visible-lg visible-md" href="#"> <i class="fa fa-power-off fa-lg"></i> Выход</a> 
		
		<a  id="logout-xs" class="inform visible-sm" data-toggle="modal" data-target="#logmodal" href="#"> <i class="fa fa-power-off fa-lg"></i></a>
		<br>
		<font color="<?= $color_balance ?>">
		<span class="fa fa-money fa-lg" ></span> <strong><?= $balance ?> <?= CURRENCY ?>. </strong></font>
		<? if ($new_order>0) {$color_order="red"; ?>
		<a href="?type=order&orders=new">
		<font color="<?= $color_order ?>"> <span class="neworder fa fa-shopping-cart fa-lg"></span><strong>  <?= $new_order ?></font> </strong></a> <? } ?> 
		</div>
		
		
		<div class="inform text-left col-sm-3 col-md-4 col-lg-3"><a href="tel:<?= SKYPE ?>">
		<span class="fa fa-skype fa-lg"></span> <?= SKYPE ?></a><br><a href="tel:<?= PHONE ?>"><span class="fa fa-phone fa-lg"></span> <?= PHONE ?></a>
		</div>
		</div>
		
		<div id="logout-xs" class="inform visible-xs">
		<a  href="<?= $logout ?>"> <i class="fa fa-power-off fa-lg"></i></a></div>
		<!--<div class="text-right visible-xs"><i class="help fa fa-support fa-3x"></i> </div>  -->
	</nav>

	<!-- HTML Markup for Sidebar Slide Out Menu -->
	<div id="sideNav">
		<ul>
			<li class="searchForm"><a href="#" class="icon icon-search"><span><input type="text" placeholder="Поиск товара" class="search" /></span></a></li> 
			<li><a href="/" class="icon icon-home"><span>Главная</span></a></li>
			<li><a href="?type=products" class="icon icon-articles"><span>Товары (<?= $categories['status']; ?>)</span></a>
				<ul>
				<? 
				if ($categories['status']=='ok') foreach ($categories['data'] as $key => $value){
					echo ('<li><a href="?type=products&cat='.$key.'"><span>'.$value['name'].'</span></a>'."</li>\n");
				}
					
				?>
					<!-- <li><a href="#"><span>Web Development</span></a></li> -->
				</ul>
			</li>
			<li><a href="#" class="icon icon-social"><span>Social Media</span></a>
				<ul>
				<li><a href="#"><span>Facebook</span></a></li>
				<li><a href="#"><span>Twitter</span></a></li>								
				</ul>			
			</li>
		</ul>	
	</div>	
	
	<div class="container">
	<? require_once ("pages/".$type); ?>
	</div>
	
	<div class="modal fade" id="logmodal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Выход из системы</h4>
      </div>
      <div class="modal-body">
        <p>Вы действительно хотите выйти?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
        <a href="/logout"><button type="button" class="btn btn-primary">Выйти</button></a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="support" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Поддержка</h4>
      </div>
      <div class="modal-body">
        <p><a href="tel:<?= SKYPE ?>">
		<span class="fa fa-skype fa-lg"></span> <?= SKYPE ?></a><br><a href="tel:<?= PHONE ?>"><span class="fa fa-phone fa-lg"></span> <?= PHONE ?></a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	
	
<? require_once ('footer.php'); ?>