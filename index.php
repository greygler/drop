<? 
require ('config.php');
require ("class/db.class.php"); 
require ("class/lpcrm.class.php"); 
//db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
$categories=lp_crm::getCategories(CRM,CRM_KEY);
//foreach ($categories['data'] as $key => $value)
//if ($value['subcategories']!="") {$subcategories[$value['subcategoties'][$key]['id']]=$value['subcategoties'];
//echo "{$key} = {$value['subcategoties']['name']}"; }

if (!empty($_GET)) $type=$_GET['type'].".php"; else $type="news.php";
?>
<!DOCTYPE HTML>
<html lang="ru-RU">
<head>
	<meta charset="UTF-8">
	<title><?= TITLE ?></title>
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale = 1.0">
	<meta name="description" content="<?= DESCRIPTION ?>" />
	<meta name="keywords" content="<?= KEYWORDS ?>" />
	<meta name="author" content="Igor Sayutin" />
	<link rel="shortcut icon" href="img/favicon.png" type="image/png">
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/main.css" />	
	<link rel="stylesheet" href="css/style.css" />	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    
     <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

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
		<div class="inform col-sm-4 col-md-3 col-lg-4"> <span class="fa fa-user fa-lg"></span> Иванов Ванёк<br><span class="fa fa-money fa-lg" ></span> 0 грн. </div>
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
	
	<!-- Demo Page Description -->
	<div class="container">
	<? include("pages/{$type}");?>
	</div>
<div id="footer">
   <small>&copy; 2015-<?= date("Y")?> Igor Sayutin</small>
  </div>

   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    <script src="js/jquery.min.js"></script> 
	<script type="text/javascript" src="js/gnmenu.js"></script>

    <script src="js/bootstrap.min.js"></script>	
</body>
</html>