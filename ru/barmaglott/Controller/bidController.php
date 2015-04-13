<?php
namespace ru\barmaglott\Controller;
use ru\barmaglott\Model\BidModel;
spl_autoload_register(function ($class_name){
	$path_class_name=str_replace('\\', '/', $class_name);//strtolower($class_name)
	$pos = strrpos($path_class_name, '/');
	$name = substr($path_class_name, $pos+1);
	$path_class_name=substr($path_class_name,0,$pos+1).lcfirst($name);

	include_once('../../../'.$path_class_name . '.php');
});

class AddBidController{
	
}
?>
