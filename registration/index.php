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
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	 <script type="text/javascript" language="javascript">
 	function call() {
		 if ($('#password1').val()!=$('#password2').val())
          { $('.results').html('Пароли не совпадают!');
								$('#password1_group').addClass('has-error');
								$('#password2_group').addClass('has-error');} else {			 ;
	
 	  var msg   = $('#form_reg').serialize();
        $.ajax({
          type: 'POST',
          url: 'registration.php',
          data: msg,
          success: function(data) {
			if (data=='error') { $('.results').html('Такой E-mail уже зарегистрирован!');
								$('#emailgroup').addClass('has-error');} else
		  if (data=='ok') {document.location.href = '/'; } else $('.results').html(data)
									
								
          },
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
	}
    }
</script>
	
  
</head>

<body>
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
         <input type="password" id="password1" class="form-control" name="password1" placeholder="Пароль" required="" onchange="checkPasswords()"/>  
</div>	
<div id="password2_group" class="input-group">
 <span class="input-group-addon"><i class="fa fa-key sybmol" aria-hidden="true"></i>
</span>
         <input type="password" id="password2"  class="form-control" name="password2" placeholder="Пароль повторно" required="" onchange="checkPasswords()"/>  
</div>	
<div class="error"></div>
 <div> 
      <label class="checkbox">
        <input required type="checkbox" value="rules" id="rules" name="rules"> Согласен с <a data-toggle="modal" data-target="#rules_modal" href="#">Правилами</a>
      </label>  </div> 
      <button class="btn btn-lg btn-log btn-block"  id="submit" type="submit">Вход</button> <br>
	  <p class="text-center"> <a href="/login">У меня уже есть регистрация </a> </p>

    </form>
	
  </div>
  
<? $jquery='no';
require_once ('../footer.php'); ?>
