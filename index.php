<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>

<body>
    <p>This page uses frames. The current browser you are using does not support frames.</p>
<?php
//use ru\barmaglott\DAO\DataBase;
//use ru\barmaglott\DAO\Client;
use ru\barmaglott\Model\ClientModel;
//use ru\barmaglott\Model\EmployeeModel;
//use ru\barmaglott\Model\BidModel;
use ru\barmaglott\Model\OrderModel;
use ru\barmaglott\Controller\IndexController;

	
    
spl_autoload_register(function ($class_name){
	$path_class_name=str_replace('\\', '/', $class_name);//strtolower($class_name)
	$pos = strrpos($path_class_name, '/');
	$name = substr($path_class_name, $pos+1);
	$path_class_name=substr($path_class_name,0,$pos+1).lcfirst($name);

	include_once($path_class_name . '.php');
});
session_start();
$messClient = '<p><a href="order.php">Добавить заказ</a></p>';
$messEmployee = '<p>Чтобы добавить заявку выберете заказ.</p>';
include_once 'identification.php';

$indexController = new IndexController();

if (isset($_GET['id'])){
	$list = $indexController->listOrderById($_GET['id']);
}else{
	$list = $indexController->listAllOrder();
}
include_once $list['view'];
	
	


?>
</body>
</html>