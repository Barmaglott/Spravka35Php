<?php
// use ru\barmaglott\DAO\DataBase;
use ru\barmaglott\DAO\Client;
use ru\barmaglott\DAO\Employee;
// use ru\barmaglott\Model\ClientModel;
// use ru\barmaglott\Model\EmployeeModel;
// use ru\barmaglott\Model\BidModel;
// use ru\barmaglott\Model\OrderModel;
// use ru\barmaglott\Controller\IndexController;
use ru\barmaglott\Controller\IdentificationController;

spl_autoload_register ( function ($class_name) {
	$path_class_name = str_replace ( '\\', '/', $class_name ); // strtolower($class_name)
	$pos = strrpos ( $path_class_name, '/' );
	$name = substr ( $path_class_name, $pos + 1 );
	$path_class_name = substr ( $path_class_name, 0, $pos + 1 ) . lcfirst ( $name );
	
	include_once ($path_class_name . '.php');
} );

session_start ();
$identificationController = new IdentificationController ();
$resIdent = $identificationController->identification ();
echo '<div id="sidebar" class="bg_color">';
include_once 'templates/menu.html';
include_once $resIdent ['view'];
echo '</div>';
?>
  