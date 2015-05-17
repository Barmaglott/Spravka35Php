<!DOCTYPE html>
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
// use ru\barmaglott\DAO\DataBase;
// use ru\barmaglott\DAO\Client;
use ru\barmaglott\Model\ClientModel;
// use ru\barmaglott\Model\EmployeeModel;
// use ru\barmaglott\Model\BidModel;
use ru\barmaglott\Model\OrderModel;
use ru\barmaglott\Controller\BidController;

spl_autoload_register ( function ($class_name) {
	$path_class_name = str_replace ( '\\', '/', $class_name ); // strtolower($class_name)
	$pos = strrpos ( $path_class_name, '/' );
	$name = substr ( $path_class_name, $pos + 1 );
	$path_class_name = substr ( $path_class_name, 0, $pos + 1 ) . lcfirst ( $name );
	
	include_once ($path_class_name . '.php');
} );
session_start ();
$messClient = '<p>Как вы сюда попали? <a href = "index.php">Немедленно уходите отсюда.</a></p>';
$messEmployee = '<p>Добавте вашу завку в форму.</p>';
include_once 'identification.php';

$bidController = new BidController ();
if (isset ( $_POST ['submit'] ))
	$bidController->addOrder ();
if (isset ($_GET ['id'] )){
	$list = $bidController->getOrder($_GET ['id'] );
}else {
	$list = $bidController->getOrder ($_SESSION['id'] );
}
// $bidController->addOrder();
/*
 * if (isset($_GET['id'])){
 * $list = $indexController->listOrderById($_GET['id']);
 * }else{
 * $list = $indexController->listAllOrder();
 * }
 */
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