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
			$obj=new Order();
			$result = $dbc->query("SELECT * FROM spravka35.order ORDER BY spravka35.order.date_create DESC", $obj);
			foreach ($result as $order){
				$num = $dbc->selectQuery("SELECT * FROM spravka35.bid WHERE fk_id_order='$order->id_order'" );
				$order->numBid = $num->num_rows;
			}
			return $result;
		}
		//Выборка заказов по id заказчика
		public function getIdClientOrder($id){
			$dbc=new DataBase();
			$obj=new Order();
			$result = $dbc->query("SELECT * FROM spravka35.order WHERE fk_id_client='$id' ORDER BY spravka35.order.date_create DESC", $obj);
			foreach ($result as $order){
				$obj1=new Bid();
				$res = $dbc->query("SELECT * FROM spravka35.bid WHERE fk_id_order='$order->id_order'", $obj1);
				//var_dump($res);
				foreach ($res as $bid){
					$order->listBid=$bid;
				}
			}
			return $result;
		}
		//Выборка заказов с отзывами по id заказа
		public function getIdOrder($id){
			$dbc=new DataBase();
			$obj=new Order();
			$result = $dbc->query("SELECT * FROM spravka35.order WHERE id_order='$id'", $obj);
			foreach ($result as $order){
				$obj1=new Bid();
				$res = $dbc->query("SELECT * FROM spravka35.bid WHERE fk_id_order='$order->id_order'", $obj1);
				//var_dump($res);
				foreach ($res as $bid){
					$order->listBid=$bid;
				}
				$order->numBid = count($order->listBid);
			}
			return $result;
		}
		//Добавление заказов
		public function addOrder($title, $describe_order,$user_id){
			$dbc = new DataBase();
			$dbc->addQuery("INSERT spravka35.order VALUES (0,'$title' , '$describe_order', NOW(), '$user_id')");
		}



	}
	?>
