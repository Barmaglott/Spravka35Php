<?php

namespace ru\barmaglott\Model;

use ru\barmaglott\DAO\Bid;
use ru\barmaglott\DAO\DataBase;

spl_autoload_register ( function ($class_name) {
	$path_class_name = str_replace ( '\\', '/', $class_name ); // strtolower($class_name)
	$pos = strrpos ( $path_class_name, '/' );
	$name = substr ( $path_class_name, $pos + 1 );
	$path_class_name = substr ( $path_class_name, 0, $pos + 1 ) . lcfirst ( $name );
	
	include_once ('../../../' . $path_class_name . '.php');
} );
class BidModel {
	
	// Выборка отзывов по id исполнителя возвращаем массив
	public function getBidIdEmployee($id) {
		$dbc = new DataBase ();
		$objBidBM = new Bid ();
		$resultBM = $dbc->queryReturnArray ( "SELECT * FROM bid WHERE fk_id_employee='$id'", $objBidBM );
		return $resultBM;
	}
	// Выборка отзывов по id заказа возвращаем массив
	public function getBidIdOrder($id) {
		$dbc = new DataBase ();
		$objBidBM = new Bid ();
		$resultBM = $dbc->queryReturnArray ( "SELECT * FROM bid WHERE fk_id_order='$id'", $objBidBM );
		return $resultBM;
	}
	// Добавление отзыва
	public function addBid($title, $describe_bid, $fk_id_employee, $fk_id_order) {
		$dbc = new DataBase ();
		$dbc->queryAdd ( "INSERT spravka35.bid VALUES (0,'$title' , '$describe_bid', '$fk_id_employee', '$fk_id_order', 0)" );
	}
	//Выбор заказа
	public function selectBid($id_bid){
		$dbc = new DataBase();
		$dbc->queryAdd("UPDATE spravka35.bid SET selected = 1 WHERE id_bid='$id_bid'");
	}
}
?>
