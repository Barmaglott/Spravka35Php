<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>

<body>
	<p>This page uses frames. The current browser you are using does not
		support frames.</p>
<?php
// use ru\barmaglott\DAO\DataBase;
// use ru\barmaglott\DAO\Client;
use ru\barmaglott\Model\ClientModel;
// use ru\barmaglott\Model\EmployeeModel;
// use ru\barmaglott\Model\BidModel;
use ru\barmaglott\Model\OrderModel;
use ru\barmaglott\Controller\IndexController;
use ru\barmaglott\Model\User;
// TODO добавить тестов для всех контроллеров

spl_autoload_register ( function ($class_name) {
	$path_class_name = str_replace ( '\\', '/', $class_name ); // strtolower($class_name)
	$pos = strrpos ( $path_class_name, '/' );
	$name = substr ( $path_class_name, $pos + 1 );
	$path_class_name = substr ( $path_class_name, 0, $pos + 1 ) . lcfirst ( $name );
	
	include_once ('../../../' . $path_class_name . '.php');
} );

// Тест моделей
client ();
// employee();
// bid();
// order();

// $_GET['user']='max';
// index();
// echo 'Пожалуйста <a href="/TestMySqlPhp/order.php?user=max">Введите заказ</a>';
function client() {
	$clientModel = new ClientModel ();
	// printTo($clientModel->getAllClient());
	// printTo($clientModel->getIdClient('1'));
	
	// printTo($clientModel->indentificationClient('user2', 'user2'));
	if ($client = $clientModel->indentificationClient ( 'user1', 'user1' )) {
		echo 'login.......';
		// printTo($client);
		echo $client [0]->login;
		printTo ( $client );
		echo '.....OK';
		echo '=================';
		// var_dump(UserSingleton::getInstance());
		var_dump ( User::getInstance () );
	}
	echo '=================';
}
function employee() {
	$employeeModel = new EmployeeModel ();
	printTo ( $employeeModel->getAllEmployee () );
	printTo ( $employeeModel->getIdEmployee ( '1' ) );
	// printTo($employeeModel->indentificationEmployee('max','max'));
	if ($employee = $employeeModel->indentificationEmployee ( 'max', 'max' )) {
		echo 'login.......';
		// printTo($client);
		echo $employee [0]->login;
		printTo ( $employee );
		echo '.....OK';
	}
	echo '=================';
}
function bid() {
	$bidModel = new BidModel ();
	printTo ( $bidModel->getIdEmployeeBid ( '1' ) );
	printTo ( $bidModel->getIdOrderBid ( '4' ) );
}
function order() {
	$orderModel = new OrderModel ();
	// printTo($orderModel->getAllOrder());
	printTo ( $orderModel->getIdClientOrder ( '1' ) );
	printTo ( $orderModel->getIdOrder ( '4' ) );
}
function printTo($result) {
	foreach ( $result as $res ) {
		var_dump ( $res );
		// printTo($res->listBid);
		
		// echo $res->login.'<br />';
		// echo $res->password.'<br />';
	}
}

// Тест контроллеров
function index() {
	$indexController = new IndexController ();
	if (isset ( $_GET ) && empty ( $_GET ['user'] )) {
		$list = $indexController->listAllOrder ();
		foreach ( $list as $res ) {
			var_dump ( $res );
			include_once $res;
		}
	}
	
	if (! empty ( $_GET ['user'] )) {
		$list = $indexController->listAllOrderByUser ( $_GET ['user'] );
		foreach ( $list as $res ) {
			var_dump ( $res );
			include_once $res;
		}
	}
}

?>
</body>
</html>