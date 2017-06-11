<?
class Systems
{
	
public function head($login="", $registration="")
{
?>
<!DOCTYPE html>
<html lang="<?= LANG ?>">
  <head>
    <meta http-equiv="content-type" content="text/html; utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="GreyGler" />
    <meta name="copyright" content="http://it-senior.pp.ua" />
	<title><?= TITLE ?></title>
    <meta name="keywords" content="<?= KEYWORDS ?>">
    <meta name="description" content="<?= DESCRIPTION ?>">
	<meta name="robots" content="<?= ROBOTS ?>"> 
	<?= favicon::favicons(FAVICON_PATH, FAVICON_G_PATH, FAVICON); // Favicon ?>
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?= CSS_PATH ?>/normalize.css" />
	<link rel="stylesheet" href="<?= CSS_PATH ?>/main.css" />
	<link rel="stylesheet" type="text/css" href="<?= CSS_PATH ?>/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?= CSS_PATH ?>/font-awesome.min.css">
	<link rel="stylesheet" href="<?= CSS_PATH ?>/flags.css">
	<? if (($login=="yes") OR  ($registration=='yes')) {?><link href="<?= CSS_PATH ?>/login.css" rel="stylesheet"><?} ?>
	<link href="<?= CSS_PATH ?>/bootstrap-switch.min.css" rel="stylesheet">
	<link href="<?= CSS_PATH ?>/bootstrap.min.css" rel="stylesheet">
	<link href="<?= CSS_PATH ?>/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<? if ($login=="yes") {?><script src="<?= JS_PATH ?>/login.php"></script><?} ?>
	<? if ($registration=='yes') {?><script src="<?= JS_PATH ?>/registration.php"></script><?} ?>
  </head>
  <body>
<?
}	


public function login()
{ 
?>
 <div class="wrapper">
    <form id="form_reg" class="form-signin" action="javascript:void(null);" onsubmit="call()" >       
      <h2 class="form-signin-heading">Авторизация</h2>
	  <div class="results"></div>
	  <div id="emailgroup" class="input-group">
       <span class="input-group-addon "><i class="fa fa-at sybmol" aria-hidden="true"></i>
</span><input type="email" id="email" class="form-control" name="email" placeholder="Email Address" required="" />
	  </div>
	  <div  id="password_group"class="input-group">
 <span class="input-group-addon"><i class="fa fa-key sybmol" aria-hidden="true"></i>
</span>
         <input type="password" id="password" class="form-control" name="password" placeholder="Password" required=""/>  
</div>	 <div> <br>
<p class="text-center"> <a href="/nopassword">Я забыл пароль </a> </p>
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Запомнить меня
      </label> </div> 
      <button class="btn btn-lg btn-log btn-block" type="submit">Вход</button>  
	  <br>
	  <p class="text-center"> <a href="/registration">Зарегистрироваться </a> </p>
    </form>
  </div>
<?
}

public function registration()
{ 
?>
 <div class="wrapper">
    <form id="form_reg" class="form-signin" action="javascript:void(null);" onsubmit="call()">       
      <h2 class="form-signin-heading">Регистрация</h2>
	 

	  <div class="input-group">
       <span class="input-group-addon "><i class="fa fa-user sybmol" aria-hidden="true"></i>
</span><input type="text" class="form-control" name="name"  id="name" placeholder="Ваше имя" required="" />
	  </div>
	  <div id='emailgroup' class="input-group">
	  
       <span class="input-group-addon "><i class="fa fa-at sybmol" aria-hidden="true"></i>
</span><input type="email" id="email" class="form-control" name="email" placeholder="Email Address" required=""  />
	  </div> <div class="results"></div>
	  <div id="password1_group" class="input-group">
 <span class="input-group-addon"><i class="fa fa-key sybmol" aria-hidden="true"></i>
</span>
         <input type="password" id="password1" class="form-control" name="password1" placeholder="Пароль" required="" />  
</div>	
<div id="password2_group" class="input-group">
 <span class="input-group-addon"><i class="fa fa-key sybmol" aria-hidden="true"></i>
</span>
         <input type="password" id="password2"  class="form-control" name="password2" placeholder="Пароль повторно" required="" />  
</div>	
<div class="error"></div>
<div class="no_rules"> </div>
<div class="checkbox">
      <label>
            <input id="rules" value="ok" name="rules" type="checkbox"> Согласен с <a data-toggle="modal" data-target="#rules_modal" href="#">Правилами работы</a>
          </label>
    </div>


 
      <button class="btn btn-lg btn-log btn-block"  id="submit" type="submit">Регистрация</button> <br>
	  <p class="text-center"> <a href="/login">У меня уже есть регистрация </a> </p>

    </form>
	
  </div>
<?
}
	
public function top_menu()
{ 
$new_order=$_SESSION['status']['3'];
if ($_SESSION['balance']<0) $color_balance="red"; else if ($_SESSION['balance']!=0) $color_balance="green";
?>
	<nav>
		<ul>
			<li><a href="#" class="icon icon-menu" id="btn-menu">Menu</a></li>
			<li><a data-toggle="tooltip" data-placement="bottom" title="Перечень заказов и продаж" href="?type=order"><div class="hidden-xs">Заказы</div><div class="visible-xs"><i class="fa fa-shopping-cart fa-2x"></i>
</div></a></li>
			<li><a  data-toggle="tooltip" data-placement="bottom" title="Личный кабинет пользователя" href="?type=user"><div class="hidden-xs">Kабинет</div><div class="visible-xs"><i class="fa fa-user-circle fa-2x"></i>
</div></a></li>
          <? if ($_SESSION['users_group']>=5) echo('<li class="visible-xs"><a data-toggle="modal" data-target="#support" href="#"><span class="help fa fa-support fa-2x"></span></a></li>');
		   else echo('<li><a data-toggle="tooltip" data-placement="bottom" title="Управление пользователями системы &#171;'.TITLE.'&#187;" href="?type=users"><i class="visible-xs fa fa-users fa-2x"></i><div class="hidden-xs">Пользователи</div></a></li>'); ?>
			 
		</ul>
		<div id="user" class="row  hidden-xs">
		<div id="data_user"> 
		 <div class="inform  text-right col-md-1 col-lg-1 visible-lg visible-md"><span class="fa <?= $_SESSION['fa_logo'] ?> fa-3x"></span> </div>
		<div class="inform users_data col-sm-3 col-md-3 col-lg-4"> <span class="fa <?= $_SESSION['fa_user']  ?> fa-lg"></span> <span class="user_name"><?= $_SESSION['name'] ?></span><a data-toggle="modal" data-target="#logmodal" class="visible-lg visible-md" href="#"> <i class="fa fa-power-off fa-lg"></i> Выход</a> 
		
		<a data-toggle="modal" data-target="#logmodal" id="logout-xs" class="inform visible-sm" href="#"> <i class="fa fa-power-off fa-lg"></i></a>
		<br>
		<font color="<?= $color_balance ?>">
		<span class="fa fa-money fa-lg" ></span> <strong><?= $_SESSION['balance'] ?> <?= CURRENCY ?>. </strong></font>
		<? if ($new_order>0) {$color_order="red"; ?>
		<a href="?type=order&status=3">
		<font color="<?= $color_order ?>"> <span class="neworder fa fa-shopping-cart fa-lg"></span><strong>  <?= $new_order ?></strong></font></a> <? } ?> 
		</div>
		</div>
		<? if ($_SESSION['users_group']>=5) echo('<div class="inform text-left col-sm-3 col-md-4 col-lg-5"><address><a href="tel:'.SKYPE.'"><span class="fa fa-skype fa-lg"></span> '.SKYPE.'</a><br><a href="tel:'.PHONE.'"><span class="fa fa-phone fa-lg"></span> '.PHONE.'</a></address></div>'); ?>
		
		</div>
		
		<div id="logout-xs" class="inform visible-xs">
		<a  data-toggle="modal" data-target="#logmodal" href="#"> <i class="fa fa-power-off fa-lg"></i></a></div>
		<!--<div class="text-right visible-xs"><i class="help fa fa-support fa-3x"></i> </div>  -->
	</nav>
<?}

public function side_menu()
{
?><datalist id = "search_result"></datalist>

	<div id="sideNav">
		<ul>
			<li class="searchForm"><form action="/" ><input type="hidden" name="type" value="products">
			<a href="#" class="icon icon-search"><span>
			
			<input type="text"  list="search_result" placeholder="Поиск товара" name="product" class="search" /></span></a>
			 </form></li> 
			<!-- <ul class="search_result drop_color"></ul> -->
			<li><a data-toggle="tooltip" data-placement="bottom" title="Главная страница системы &#171;<?= TITLE ?>&#187;" href="/" class="icon icon-home"><span>Главная</span></a></li>
			<li><a data-toggle="tooltip" data-placement="bottom" title="Каталог всех товаров, всех категорий, представленных в системе &#171;<?= TITLE ?>&#187; для продаж.<?= "\n" ?>Актуальность &#9200; <?= date("d.m.Y H:i:s", LAST_TIME_PRODUCT) ?>" href="?type=products" class="icon icon-articles"><span>Товары <i class="fa fa-caret-down" aria-hidden="true"></i></span></a>
				<ul>
				<? 
				
				$result = mysql_query("SELECT * FROM categories");
					$myrow = mysql_fetch_array($result);
					do
					{
						echo ('<li><a data-toggle="tooltip" data-placement="bottom" title="Каталог товаров категории &#171;'.$myrow['name'].'&#187;'."\n".'Актуальность категорий &#9200; '.date("d.m.Y H:i:s", LAST_TIME_CATEGORY).'" href="?type=products&cat='.$myrow['id'].'"><span><i class="fa fa-check-square-o" aria-hidden="true"></i> '.$myrow['name'].'</span></a>'."</li>\n");
					
					}
					while ($myrow = mysql_fetch_array($result));
				
									
				?>
					<!-- <li><a href="#"><span>Web Development</span></a></li> -->
				</ul>
			</li>
			<li><a href="?type=options" class="icon icon-options"><span>Настройки системы</span></a>
				<!-- <ul>
				<li><a href="#"><span>1</span></a></li>
				<li><a href="#"><span>2</span></a></li>								
				</ul>	 -->		
			</li>
		</ul>	
	</div>	
<?
}

public function support_modal()
{
?>
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
    </div>
  </div>
</div>
<?
}

public function exit_modal()
{
?>
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
    </div>
  </div>
</div>
<?
}

public function politics()
{
?>	
 <div  id="polit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><strong>Политика конфиденциальности</strong></h4>
      </div>
	  <div class="modal-body">
       <strong>Защита личных данных</strong>
                <p>Для защиты ваших личных данных у нас внедрен ряд средств защиты, которые действуют при введении, передаче или работе с вашими личными данными.</p>
                <strong>Разглашение личных сведений и передача этих сведений третьим лицам</strong>
                <p>Ваши личные сведения могут быть разглашены нами только в том случае это необходимо для:<br>(а) обеспечения соответствия предписаниям закона или требованиям судебного процесса в нашем отношении ; <br>(б) защиты наших прав или собственности <br>(в) принятия срочных мер по обеспечению личной безопасности наших сотрудников или потребителей предоставляемых им услуг, а также обеспечению общественной безопасности. <br>Личные сведения, полученные в наше распоряжение при регистрации, могут передаваться третьим организациям и лицам, состоящим с нами в партнерских отношениях для улучшения качества оказываемых услуг. Эти сведения не будут использоваться в каких-либо иных целях, кроме перечисленных выше. Адрес электронной почты, предоставленный вами при регистрации может использоваться для отправки вам сообщений или уведомлений об изменениях, связанных с вашей заявкой, а также рассылки сообщений о происходящих в компании событиях и изменениях, важной информации о новых товарах и услугах и т.д. Предусмотрена возможность отказа от подписки на эти почтовые сообщения.</p>
                <strong>Использование файлов «cookie»</strong>
                <p>Когда пользователь посещает веб-узел, на его компьютер записывается файл «cookie» (если пользователь разрешает прием таких файлов). Если же пользователь уже посещал данный веб-узел, файл «cookie» считывается с компьютера. Одно из направлений использования файлов «cookie» связано с тем, что с их помощью облегчается сбор статистики посещения. Эти сведения помогают определять, какая информация, отправляемая заказчикам, может представлять для них наибольший интерес. Сбор этих данных осуществляется в обобщенном виде и никогда не соотносится с личными сведениями пользователей.</p>
                <p>Третьи стороны, включая компании Google, показывают объявления нашей компании на страницах сайтов в Интернете. Третьи стороны, включая компанию Google, используют cookie, чтобы показывать объявления, основанные на предыдущих посещениях пользователем наших вебсайтов и интересах в веб-браузерах. Пользователи могут запретить компаниям Google использовать cookie. Для этого необходимо посетить специальную страницу компании Google по этому адресу:<br><a href="http://www.google.com/privacy/ads/" target="_blank"> http://www.google.com/privacy/ads/</a></p>
                <strong>Изменения в заявлении о соблюдении конфиденциальности</strong>
                <p>Заявление о соблюдении конфиденциальности предполагается периодически обновлять. При этом будет изменяться дата предыдущего обновления, указанная в начале документа. Сообщения об изменениях в данном заявлении будут размещаться на видном месте наших веб-узлов</p>
				<p>Услуга предоставлена 
				<address>
				<strong><?= ADDRESS ?></strong>.<p>
				<a href="tel:<?= SKYPE ?>"> <span class="fa fa-skype fa-lg"></span> <?= SKYPE ?></a><br>
				<a href="tel:<?= PHONE ?>"><span class="fa fa-phone fa-lg"></span> <?= PHONE ?></a></p>
				</address>
                <p class="s1">Благодарим Вас за проявленный интерес к системе <?= TITLE?>! </p><br><br><br>
      </div>
    </div>
  </div>
</div>
<?	
}

public function rules()
{
?>
<div  id="rules_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Правила предоставления услуг</h4>
      </div>
	  <div class="modal-body">
       <strong>Пункт 1</strong>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, et, distinctio voluptates alias vitae voluptas non harum modi quia placeat commodi similique explicabo beatae blanditiis corporis voluptatibus aspernatur officia rerum!	</p>
        <strong>Пункт 2</strong>
        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, provident, in cupiditate saepe asperiores perferendis blanditiis aperiam eaque suscipit quibusdam! Temporibus, ut, eaque, quas, cum facilis eveniet atque deleniti consequuntur esse maxime asperiores soluta possimus. Accusantium, fuga, laborum excepturi laboriosam optio beatae atque hic nulla numquam corporis ipsa eveniet perferendis sit quod natus minima aliquid doloribus ullam ipsum recusandae alias debitis deleniti tenetur quam error veniam ratione! Distinctio, fugiat, voluptatem inventore earum facere nobis mollitia harum nisi nesciunt ab dicta iste vitae velit ad non quod dolores labore quasi ipsam officia. Itaque, minus ratione iure tempora! Cupiditate, vitae, aliquid magnam odio officiis eligendi ratione consequuntur nobis rerum nihil asperiores facilis facere obcaecati nisi impedit. Pariatur, quisquam, tempore, voluptates corporis aliquid maxime optio nulla debitis recusandae fugiat libero similique perferendis ut cumque sed. Ab, nostrum reiciendis itaque harum voluptates repudiandae inventore quo quasi. Quam, laborum, repellat, quod, voluptatibus doloribus obcaecati eligendi vel vitae asperiores placeat eaque animi sint. Iste itaque unde dolor consequuntur obcaecati omnis eum explicabo voluptatibus. Nemo, tempore, eveniet, suscipit omnis possimus magni dicta illum provident distinctio sint assumenda dolorem officia dolore quis quae ratione placeat veritatis? Beatae, saepe, quod maiores soluta placeat accusamus eaque id sequi praesentium possimus?</p>
        <strong>Пункт 3</strong>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, explicabo, a consequatur odit esse mollitia nulla pariatur nesciunt qui quisquam ea ipsam consectetur dolor enim omnis doloremque autem consequuntur quia sint alias harum odio molestias adipisci aliquid quod sequi veniam! Blanditiis, tenetur illo labore incidunt inventore quo consequuntur dolorum corporis nobis aperiam eligendi illum nihil reiciendis nisi natus tempore corrupti obcaecati commodi esse ut ipsam aliquam sequi repudiandae. Sapiente, fugit atque excepturi quo est illo nihil ipsa exercitationem quos deserunt. Illo itaque assumenda dolorem in temporibus aliquid atque perferendis! Qui, possimus, sapiente ex harum omnis consequuntur eum totam doloribus voluptatibus!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, non, voluptates optio aut labore nobis eligendi tempora blanditiis alias quo iusto rem dolorem minus minima sint pariatur iste nisi. Dicta?</p>
				<p><strong>Услуга предоставлена <?= ADDRESS ?>.</strong><br>
				<a href="tel:<?= SKYPE ?>"> <span class="fa fa-skype fa-lg"></span> <?= SKYPE ?></a><br>
				<a href="tel:<?= PHONE ?>"><span class="fa fa-phone fa-lg"></span> <?= PHONE ?></a></p>
                <p class="s1">Благодарим Вас за проявленный интерес к системе <?= TITLE?>! </p><br><br><br>
      </div>
    </div>
  </div>
</div>
<?	
}

public function attention()
{
	$_SESSION['info_profile']="1";
?>
<div class="modal fade" id="no_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Внимание! Замечания в работе системы!</h4>
      </div>
      <div class="modal-body">
	  <? if (!autoring::filling_profile($_SESSION)) {?>
	  <p><strong>Ваш профиль не заполнен!</strong><br>
        Для продолжения работы настоятельно рекомедуется заполнить контактные данные Вашего профиля!</p>
		 <? } if (autoring::is_verify_profile($profile)) {?>
	  <p><strong>Данные Вашего профиля не верифицировнны! </strong><br>
        Для продолжения работы настоятельно рекомедуется верифицировать контактные данные Вашего профиля!</p>
		 <? } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">В следующий раз</button>
        <a href="?type=user" type="button" class="btn btn-primary">Устранить замечания</a>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript"> jQuery(function($){$('#no_info').modal('show') }); </script>
<?

}

public function info_balance()
{
	$_SESSION['info_balance']="1";
?>
<div class="modal fade" id="info_balance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">У Вас отрицательный баланс!</h4>
      </div>
      <div class="modal-body">
        Дальнейшая работа возможна только по предоплате<br>или после погашения задолженности!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Понятно</button>
        
      </div>
    </div>
  </div>
</div>
<script type="text/javascript"> jQuery(function($){$('#info_balance').modal('show') }); </script>
<? 
}





public function footer($geobase="")
{
?>
<div  id="footer">
  <div class="col-lg-3 col-md-3 col-sm-3">
   <center><small><?= ADDRESS ?></small></center>
   </div>
    <div class="col-lg-3 col-md-3 col-sm-3">
   <center><small><a data-toggle="modal" data-target="#polit" href="#">Политика конфиденциальности</a></small></center>
   </div>
    <div class="col-lg-3 col-md-3 col-sm-3">
   <center><small><a data-toggle="modal" data-target="#rules_modal" href="#">Правила предоставления услуг</a></small></center>
   </div>
   <div class="col-lg-3 col-md-3 col-sm-3 text-right">
   <span>&copy;&#032;&#050;&#048;&#049;&#053;&#045;<?= date("Y")?>&#032;&#071;&#114;&#101;&#121;&#071;&#108;&#101;&#114;</span>
   </div>
  </div>
  
<?= systems::politics(); ?>
<?= systems::rules(); ?>

<script src="/js/jquery.min.js"></script> 
  <!--<script src="//code.jquery.com/jquery-3.1.1.min.js"></script> -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
 
<script src="<?= JS_PATH ?>/jquery.maskedinput.js"></script>
<script type="text/javascript"> jQuery(function($){$(".phone").mask("<?= MASK_PHONE ?>");}); </script>
<script type="text/javascript"> jQuery(function($){$(".sms").mask("\999-99-999");}); </script>
<script type="text/javascript"> jQuery(function($){$(".pcart").mask("\9999-9999-9999-9999");}); </script>
<script type="text/javascript"> jQuery(function($){$(".wmu").mask("\U999999999999");}); </script>
<script type="text/javascript"> jQuery(function($){$(".wmr").mask("\R999999999999");}); </script>
<script type="text/javascript"> jQuery(function($){$(".wmz").mask("\Z999999999999");}); </script>
<script src="<?= JS_PATH ?>/bootstrap.min.js"></script>
<script src="<?= JS_PATH ?>/control-modal.js"></script>
<script src="<?= JS_PATH ?>/gnmenu.php"></script>
<script src="<?= JS_PATH ?>/search.php"></script>
<script src="<?= JS_PATH ?>/jquery.fancybox.min.js"></script>
<script src="<?= JS_PATH ?>/bootstrap-switch.min.js"></script>
<script>$("[name='checkbox']").bootstrapSwitch();</script>
<script src="<?= JS_PATH ?>/search.php"></script>
<script type="text/javascript">$("[data-fancybox]").fancybox({'afterClose': function() {parent.location.reload(true);}});</script>
<script>$(function () {$('[data-toggle="tooltip"]').tooltip()})</script>
<? 
$filling_profile=autoring::filling_profile();
$is_verify_profile=autoring::is_verify_profile();
$autoring=autoring::is_autoring();
if (((!$filling_profile OR $is_verify_profile) AND ($_SESSION['info_profile']!='1')) AND ($autoring)) echo systems::attention();
?>

<? if (($_SESSION['balance']<0) AND ($_SESSION['info_balance']!="1")) echo systems::info_balance(); ?>
<? 	if ($geobase=='yes') { ?><script>var ip='<?= func::GetRealIp() ?>'</script><script src="<?= JS_PATH ?>/geobase.php"></script><? } ?>
  </body>
</html>
<?
}




}
?>