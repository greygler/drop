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
	<? if ($no_favicon) echo favicon::favicons(FAVICON_PATH, FAVICON); // Favicon ?>
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/css/normalize.css" />
	<link rel="stylesheet" href="/css/main.css" />
	<link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/flags.css">
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>