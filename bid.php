<?php
// use ru\barmaglott\DAO\DataBase;
// use ru\barmaglott\DAO\Client;
use ru\barmaglott\Model\ClientModel;
// use ru\barmaglott\Model\EmployeeModel;
// use ru\barmaglott\Model\BidModel;
use ru\barmaglott\Model\OrderModel;
use ru\barmaglott\Controller\BidController;

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

include_once 'templates/footer.html';

?>
