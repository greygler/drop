<? 
session_start();
require_once ('../config.php');
require_once ("../class/autoring.class.php"); 
//if (autoring::is_autoring()) header("Location: /");
require_once ("../class/favicon.class.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
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
	<meta name="robots" content="none"> 
	<?= favicon::favicons('../'.FAVICON_PATH, FAVICON); // Favicon ?>
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../css/normalize.css" />
	<link href="../css/login.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	
	
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	 <script type="text/javascript" language="javascript">
 	function call() {
		 			 ;
	
 	  var msg   = $('#form_reg').serialize();
        $.ajax({
          type: 'POST',
          url: 'login.php',
          data: msg,
          success: function(data) {
			if (data=='no') { $('.results').html('Такой E-mail не зарегистрирован!');
								$('#emailgroup').addClass('has-error');} else
			if (data=='error') { $('.results').html('E-mail или пароль не верны!');
								$('#emailgroup').addClass('has-error');
								$('#password_group').addClass('has-error');} else
								
		  if (data=='ok') {document.location.href = '/'; } else $('.results').html(data)
									
								
          },
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	
    }
</script>
  
</head>

<body>

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
  
<? $jquery='no';
require_once ('../footer.php'); ?>
