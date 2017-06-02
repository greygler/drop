<? session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
date_default_timezone_set(TIME_ZONE);
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/db.class.php'); 
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/autoring.class.php'); 


if (!autoring::is_autoring()) header("Location: login/");
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/lpcrm.class.php'); 
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/favicon.class.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/functions.class.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/class/drop.class.php');

db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
$categories=lp_crm::getCategories(CRM,CRM_KEY);
if ($categories['status']=='ok') foreach ($categories['data'] as $key => $value)
	$cat_status[]= drop::cat_base($key, $value['name']);
					
					

$subcategoties=lp_crm::subCategories($categories);

//foreach ($categories['data'] as $key => $value)
//if ($value['subcategories']!="") {$subcategories[$value['subcategoties'][$key]['id']]=$value['subcategoties'];
//echo "{$key} = {$value['subcategoties']['name']}"; }


$new_order=4;
if ($_SESSION['balance']<0) $color_balance="red"; else if ($_SESSION['balance']!=0) $color_balance="green";
 
if (!empty($_GET)) $type=$_GET['type'].".php"; else $type="news.php";
$no_favicon=true;
require_once ('head.php');
?>


	<!-- HTML Markup for Top Navigation Menu -->	
	<nav>
		<ul>
			<li><a href="#" class="icon icon-menu" id="btn-menu">Menu</a></li>
			<li><a href="?type=order"><div class="hidden-xs">Заказы</div><div class="visible-xs"><i class="fa fa-shopping-cart fa-2x"></i>
</div></a></li>
			<li><a href="?type=user"><div class="hidden-xs">Kабинет</div><div class="visible-xs"><i class="fa fa-user-circle fa-2x"></i>
</div></a></li>
          <? if ($_SESSION['users_group']>=5) echo('<li class="visible-xs"><a data-toggle="modal" data-target="#support" href="#"><span class="help fa fa-support fa-2x"></span></a></li>');
		   else echo('<li><a href="?type=users"><i class="visible-xs fa fa-users fa-2x"></i><div class="hidden-xs">Пользователи</div></a></li>'); ?>
			 
		</ul>
		<div id="user" class="row  hidden-xs">
		<div id="data_user"> 
		 <div class="inform  text-right col-md-1 col-lg-1 visible-lg visible-md"><span class="fa <?= $_SESSION['fa_logo'] ?> fa-3x"></span> </div>
		<div class="inform users_data col-sm-3 col-md-3 col-lg-4"> <span class="fa <?= $_SESSION['fa_user']  ?> fa-lg"></span> <?= $_SESSION['name'] ?><a data-toggle="modal" data-target="#logmodal" class="visible-lg visible-md" href="#"> <i class="fa fa-power-off fa-lg"></i> Выход</a> 
		
		<a data-toggle="modal" data-target="#logmodal" id="logout-xs" class="inform visible-sm" href="#"> <i class="fa fa-power-off fa-lg"></i></a>
		<br>
		<font color="<?= $color_balance ?>">
		<span class="fa fa-money fa-lg" ></span> <strong><?= $_SESSION['balance'] ?> <?= CURRENCY ?>. </strong></font>
		<? if ($new_order>0) {$color_order="red"; ?>
		<a href="?type=order&orders=new">
		<font color="<?= $color_order ?>"> <span class="neworder fa fa-shopping-cart fa-lg"></span><strong>  <?= $new_order ?></strong></font></a> <? } ?> 
		</div>
		</div>
		<? if ($_SESSION['users_group']>=5) echo('<div class="inform text-left col-sm-3 col-md-4 col-lg-5"><address><a href="tel:'.SKYPE.'"><span class="fa fa-skype fa-lg"></span> '.SKYPE.'</a><br><a href="tel:'.PHONE.'"><span class="fa fa-phone fa-lg"></span> '.PHONE.'</a></address></div>'); ?>
		
		</div>
		
		<div id="logout-xs" class="inform visible-xs">
		<a  data-toggle="modal" data-target="#logmodal" href="#"> <i class="fa fa-power-off fa-lg"></i></a></div>
		<!--<div class="text-right visible-xs"><i class="help fa fa-support fa-3x"></i> </div>  -->
	</nav>

	<!-- HTML Markup for Sidebar Slide Out Menu -->
	<div id="sideNav">
		<ul>
			<li class="searchForm"><a href="#" class="icon icon-search"><span><input type="text" placeholder="Поиск товара" class="search" /></span></a></li> 
			<li><a href="/" class="icon icon-home"><span>Главная</span></a></li>
			<li><a href="?type=products" class="icon icon-articles"><span>Товары <i class="fa fa-caret-down" aria-hidden="true"></i></span></a>
				<ul>
				<? 
				
				$result = mysql_query("SELECT * FROM categories");
					$myrow = mysql_fetch_array($result);
					do
					{
						echo ('<li><a href="?type=products&cat='.$myrow['id'].'"><span><i class="fa fa-caret-right" aria-hidden="true"></i> '.$myrow['name'].'</span></a>'."</li>\n");
					
					}
					while ($myrow = mysql_fetch_array($result));
				
									
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
	<?
	
	if (time()-$_SESSION['product_time']>UPDATE_TIME) {
	$products=lp_crm::getProducts(CRM,CRM_KEY); 
	if ($products['status']=='ok') foreach ($products['data'] as $key => $value) {
	if ($categories['data'][$value['category_id']]['name']!=""){ $cat=$value['category_id']; }
		else {  $cat=$subcategoties[$value['category_id']]['parent']; $subcat=$value['category_id'];  }
		$result=drop::products($value ['id'], $value ['name'], $value ['model'], $value ['description'], $value ['price'], $value ['spec_price'], $cat, $subcat); $cat=0; $subcat=0;
	}
	$_SESSION['product_time']=time();
	echo $_SESSION['product_time'];
	}
	require_once ($_SERVER['DOCUMENT_ROOT'].'/pages/'.$type); ?>
	</div>
	
	<div class="modal fade" id="logmodal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">
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
<? if ($_SESSION['users_group']>=5) { ?>
<div class="modal fade" id="support" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Поддержка</h4>
      </div>
      <div class="modal-body">
        <p><address><a href="tel:<?= SKYPE ?>">
		<span class="fa fa-skype fa-lg"></span> <?= SKYPE ?></a><br><a href="tel:<?= PHONE ?>"><span class="fa fa-phone fa-lg"></span> <?= PHONE ?></a></address></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<? } ?>
	
	
<? require_once ($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>