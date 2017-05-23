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
			<li class="visible-xs"><a href="?type=info"><span class="fa fa-info fa-2x"></span></a></li> 
		</ul>
		<div class="row  hidden-xs">
		 <div class="inform text-right col-md-1 col-lg-1 visible-lg visible-md"><span class="fa fa-user-circle fa-3x"></span> </div>
		<div class="inform col-sm-4 col-md-3 col-lg-4"> <span class="fa fa-user fa-lg"></span> <?= $_SESSION['name'] ?><br><span class="fa fa-money fa-lg" ></span> 0 грн. </div>
		<!-- <div class="inform text-left col-sm-1 col-md-1 col-lg-1"><a href="#"><span class="fa fa-power-off fa-lg"></span></a> </div> -->
		<div class="inform text-right  col-md-1 col-lg-1 visible-lg visible-md"><i class="help fa fa-support fa-3x"></i> </div>
		<div class="inform text-left col-sm-3 col-md-3 col-lg-2">
		<span class="fa fa-skype fa-lg"></span> <?= SKYPE ?><br><span class="fa fa-phone fa-lg"></span> <?= PHONE ?>
		</div>
		</div>
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
	
	
	
<? require_once ('footer.php'); ?>