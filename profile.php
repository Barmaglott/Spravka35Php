<!DOCTYPE html >
<head>
<title>Spravka35</title>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
<meta name="author" content="barmaglott" />
<meta name="keywords"
	content="simple, frilans, cherepovec, open project" />
<meta name="description" content="Simple frilans board" />

<link rel="stylesheet" href="style/minimalist.css" type="text/css"
	media="screen" />
<link rel="stylesheet" href="style/content-right.css" type="text/css"
	media="screen" />
<link rel="stylesheet" href="style/purple.css" type="text/css"
	media="screen" />
<link rel="stylesheet" href="style/bg_grey.css" type="text/css"
	media="screen" />
</head>

<body>
	<header>
		<h1>
			<a href="index.php">Spravka35</a>
		</h1>
	</header>

	<?php
	use ru\barmaglott\Controller\ProfileController;
	use ru\barmaglott\Controller\IdentificationController;
	// use ru\barmaglott\DAO\Client;
	// use ru\barmaglott\DAO\Bid;
	spl_autoload_register ( function ($class_name) {
		$path_class_name = str_replace ( '\\', '/', $class_name ); // strtolower($class_name)
		$pos = strrpos ( $path_class_name, '/' );
		$name = substr ( $path_class_name, $pos + 1 );
		$path_class_name = substr ( $path_class_name, 0, $pos + 1 ) . lcfirst ( $name );
		include_once ($path_class_name . '.php');
	} );
	session_start ();
	$messClient = '<p><a href="order.php">Добавить заказ</a></p>';
	$messEmployee = '<p>Чтобы добавить заявку выберете заказ.</p>';
	
	//$n1 = strrpos($_SERVER['REQUEST_URI'], '/');
	$a1 = substr($_SERVER['REQUEST_URI'], (strrpos($_SERVER['REQUEST_URI'], '/'))+1);//$n1+1);
	$n2 = strrpos(substr($_SERVER['REQUEST_URI'], (strrpos($_SERVER['REQUEST_URI'], '/'))+1), '.php');
	$a2 = substr($a1, 0, strrpos($a1, '.php'));
	var_dump($a1);
	var_dump($a2);
	var_dump($_SERVER['QUERY_STRING']);
	
	$profileController = new profileController ();
	// $identificationController = new IdentificationController();
	// $identificationController->identification();
	// include_once 'identification.php';
	if (isset ( $_GET ['login'] )) {
		$list = $profileController->getProfile ( $_GET ['role'], $_GET ['login'] );
	}
	if (isset ( $_GET ['edit'] ) & isset ( $_SESSION ['user'] )) {
		$list = $profileController->getProfileEdit ( $_SESSION ['user'] );
		if (isset ( $_POST ['submit'] )) {
			$list = $profileController->updateProfile ( $_SESSION ['user'], $_POST ['password'], $_POST ['email'] );
		}
	}
	
	if (isset ( $_GET ['add'] )) {
		$list = $profileController->getProfileAdd ();
		if (isset ( $_POST ['submit'] )) {
			$list = $profileController->addProfile ( $_POST ['role'], $_POST ['login'], $_POST ['password'], $_POST ['email'] );
		}
	}
	include_once $list ['view'];
	?>
      <footer>
		<p>
			Copyright &copy; <a href="#">barmaglott</a> 2015
			<!-- While not required, I would appreciate this link being left in -->
			| Design by <a href="http://xavisys.com"
				title="Freelance Web Programming and Design">Xavisys</a>

		</p>
	</footer>
</body>
</html>