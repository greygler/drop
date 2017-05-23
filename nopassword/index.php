<? 
require_once ('../config.php');
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
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/login.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


  
</head>

<body>
    <div class="wrapper">
    <form class="form-signin" >       
      <h2 class="form-signin-heading">Сброс пароля</h2>
	  <div class="input-group">
       <span class="input-group-addon "><i class="fa fa-at sybmol" aria-hidden="true"></i>
</span><input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
	  </div>
	  <br>

     
      <button class="btn btn-lg btn-log btn-block" type="submit">Сбросить пароль</button> 
<br>
	  <p class="text-center"> <a href="/login">Авторизоваться </a> </p>	  
	
	  <p class="text-center"> <a href="/registration">Зарегистрироваться </a> </p>
    </form>
  </div>
  
<? require_once ('../footer.php'); ?>
