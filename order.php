<?php
use ru\barmaglott\Controller\OrderController;

include_once 'templates/head.html';
include_once 'templates/header.html';

spl_autoload_register ( function ($class_name) {
	$path_class_name = str_replace ( '\\', '/', $class_name ); // strtolower($class_name)
	$pos = strrpos ( $path_class_name, '/' );
	$name = substr ( $path_class_name, $pos + 1 );
	$path_class_name = substr ( $path_class_name, 0, $pos + 1 ) . lcfirst ( $name );
	
	include_once ($path_class_name . '.php');
} );
session_start ();
$messClient = '<p>Добавте ваш заказ в форму.</p>';
$messEmployee = '<p>Как вы сюда попали? <a href = "index.php">Немедленно уходите отсюда.</a></p>';
include_once 'identification.php';

$orderController = new OrderController ();
if (isset ( $_POST ['submit'] )) {
	$orderController->addOrder ();
}
if (isset($_GET['id'])){
	$orderController->deleteOrder();
}
if (isset($_GET['id_bid'])){
	$orderController->selectBid();
	$home_url = 'http://' . $_SERVER ['HTTP_HOST'] . '/Spravka35Php/profile.php?role=employee&login='.$_GET['login'] ;
	header ( 'Location: ' . $home_url );
}

$list = $orderController->listAllOrderByUser ();

include_once $list ['view'];

include_once 'templates/footer.html';

?>
