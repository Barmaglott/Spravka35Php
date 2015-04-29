<?php
namespace ru\barmaglott\Model;
use ru\barmaglott\DAO\Order;
use ru\barmaglott\DAO\DataBase;
use ru\barmaglott\DAO\Bid;



spl_autoload_register(function ($class_name){
	$path_class_name=str_replace('\\', '/', $class_name);//strtolower($class_name)
	$pos = strrpos($path_class_name, '/');
	$name = substr($path_class_name, $pos+1);
	$path_class_name=substr($path_class_name,0,$pos+1).lcfirst($name);

	include_once('../../../'.$path_class_name . '.php');
});

	class OrderModel{
		
		//Выборка всех заказов без отзывов(но с кол-вом)
		public function getAllOrder(){
			$dbc=new DataBase();
			$objOrderOM=new Order();
			$resultOM = $dbc->queryReturnArray("SELECT o.id_order, o.title, o.depiction, o.date_create, c.login
  												FROM spravka35.order o INNER JOIN spravka35.client c 
												ON o.fk_id_client = c.id 
												ORDER BY o.date_create DESC"
												, $objOrderOM);
			foreach ($resultOM as $orderOM){
				$num = $dbc->querySelect("SELECT * FROM spravka35.bid WHERE fk_id_order='$orderOM->id_order'" );
				$orderOM->num = $num->num_rows;
			}
			return $resultOM;
		}
		//Выборка заказов по id заказчика
		public function getIdClientOrder($id){
			$dbc=new DataBase();
			$objOrderOM=new Order();
			$objBidOM=new Bid();
			$resultOM = $dbc->queryReturnArray("SELECT o.id_order, o.title, o.depiction, o.date_create, c.login
  												FROM spravka35.order o INNER JOIN spravka35.client c 
												ON o.fk_id_client = c.id 
												 WHERE o.fk_id_client='$id' "
												, $objOrderOM);
			foreach ($resultOM as $orderOM){
				
				$resOM = $dbc->queryReturnArray("SELECT b.id_bid, b.title, b.depiction, e.login
  												FROM spravka35.bid b INNER JOIN spravka35.employee e 
												ON b.fk_id_employee = e.id 
												WHERE b.fk_id_order='$orderOM->id_order'"
												, $objBidOM);
				//var_dump($res);
				foreach ($resOM as $bidOM){
					$orderOM->list = $bidOM;
				}
			}
			return $resultOM;
		}
		//Выборка заказов с отзывами по id заказа
		public function getOrderId($id){
			$dbc=new DataBase();
			$objOrderOM=new Order();
			$objBidOM = new Bid();
			
			$resultOM = $dbc->queryReturnArray("SELECT o.id_order, o.title, o.depiction, o.date_create, c.login
  												FROM spravka35.order o INNER JOIN spravka35.client c 
												ON o.fk_id_client = c.id 
												 WHERE o.id_order='$id' "
												, $objOrderOM);
			foreach ($resultOM as $orderOM){
				//$obj1=new Bid();
				$resOM = $dbc->queryReturnArray("SELECT b.id_bid, b.title, b.depiction, e.login
  												FROM spravka35.bid b INNER JOIN spravka35.employee e 
												ON b.fk_id_employee = e.id 
												WHERE b.fk_id_order='$orderOM->id_order'"
												, $objBidOM);
				foreach ($resOM as $bidOM){
					$orderOM->list = $bidOM;
				}
				$orderOM->num = count($orderOMOM->list);
			}
		
			return $resultOM;
		}
		//Выборка заказов с отзывами по id заказа
		public function getOrderIdReturnObject($id){
			$dbc=new DataBase();
			$objBidOM = new Order();
			$objBidOM = new Bid();
				
			$orderOM = $dbc->queryReturnObject("SELECT * FROM spravka35.order WHERE id_order='$id'", $objOrderOM);
			
				//$obj1=new Bid();
			$resultOM = $dbc->queryReturnArray("SELECT * FROM spravka35.bid WHERE fk_id_order='$orderOM->id_order'", $objBidOM);
			foreach ($resultOM as $bidOM){
				$orderOM->list = $bidOM;
			}
			$orderOM->num = count($orderOM->list);
			
		
			return $orderOM;
		}
		//Добавление заказов
		public function addOrder($title, $describe_order,$user_id){
			$dbc = new DataBase();
			$dbc->queryAdd("INSERT spravka35.order VALUES (0,'$title' , '$describe_order', NOW(), '$user_id')");
		}



	}
	?>
