<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>

<body>
<?php
use ru\barmaglott\Controller\OrderController;

spl_autoload_register(function ($class_name){
	$path_class_name=str_replace('\\', '/', $class_name);//strtolower($class_name)
	$pos = strrpos($path_class_name, '/');
	$name = substr($path_class_name, $pos+1);
	$path_class_name=substr($path_class_name,0,$pos+1).lcfirst($name);

	include_once($path_class_name . '.php');
});
session_start();
$messClient = '<p>Добавте ваш заказ в форму.</p>';
$messEmployee = '<p>Как вы сюда попали? <a href = "index.php">Немедленно уходите отсюда.</a></p>';
include_once 'identification.php';

$orderController = new OrderController();
$orderController->addOrder();
$list = $orderController->listAllOrderByUser();
	
include_once $list['view'];

?>
</body>
</html>