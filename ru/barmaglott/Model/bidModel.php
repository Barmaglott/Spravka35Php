<?php
namespace ru\barmaglott\Model;
use ru\barmaglott\DAO\Bid;
use ru\barmaglott\DAO\DataBase;

spl_autoload_register(function ($class_name){
	$path_class_name=str_replace('\\', '/', $class_name);//strtolower($class_name)
	$pos = strrpos($path_class_name, '/');
	$name = substr($path_class_name, $pos+1);
	$path_class_name=substr($path_class_name,0,$pos+1).lcfirst($name);

	include_once('../../../'.$path_class_name . '.php');
});

class BidModel{
	
	//Выборка отзывов по id исполнителя
	public function getIdEmployeeBid($id){
		$dbc=new DataBase();
		$obj=new Bid();
		$result = $dbc->query("SELECT * FROM bid WHERE fk_id_employee='$id'", $obj);
		return $result;
	}
	//Выборка отзывов по id заказа
	public function getIdOrderBid($id){
		$dbc=new DataBase();
		$obj=new Bid();
		$result = $dbc->query("SELECT * FROM bid WHERE fk_id_order='$id'", $obj);
		return $result;
	}
		
	
	
}
?>
