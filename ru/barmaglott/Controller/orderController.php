<?php
namespace ru\barmaglott\Controller;
use ru\barmaglott\Model\OrderModel;
use ru\barmaglott\Model\User;
use ru\barmaglott\DAO\Client;
class OrderController{
	public function listAllOrderByUser(){
		//if (get_class(User::getInstance())=='Client')
		
		if ($_SESSION['user'] instanceof Client ){
			$orderModel = new OrderModel();
			$listOrderByUser = 	$orderModel->getIdClientOrder($_SESSION['user']->id);
			return array('data'=>$listOrderByUser, 'view'=>'ru/barmaglott/View/orderView.php');
		}
	}
	public function addOrder(){
		if (isset($_POST['submit'])){
			$orderModel = new OrderModel();
			$orderModel->addOrder($_POST['title'], $_POST['describe_order'], $_SESSION['user']->id);
		}
	}
}

?>