<?php

namespace ru\barmaglott\Controller;

use ru\barmaglott\Model\OrderModel;
// use ru\barmaglott\Model\User;
use ru\barmaglott\DAO\Client;
use ru\barmaglott\Model\BidModel;

class OrderController {
	public function listAllOrderByUser() {
		// if (get_class(User::getInstance())=='Client')
		if ($_SESSION ['user'] instanceof Client) {
			$orderModel = new OrderModel ();
			$listOrderByUser = $orderModel->getOrderByIdClient ( $_SESSION ['user']->id );
			return array (
					'data' => $listOrderByUser,
					'view' => 'ru/barmaglott/View/orderView.php' 
			);
		}
	}
	public function addOrder() {
		$orderModel = new OrderModel ();
		$orderModel->addOrder ( $_POST ['title'], $_POST ['describe_order'], $_SESSION ['user']->id );
	}
	public function deleteOrder(){
		$orderModel = new OrderModel();
		$orderModel->deleteOrder($_GET['id']);
	}
	public function selectBid(){
		$orderModel = new OrderModel();
		$orderModel->selectBid($_GET['id_bid'], $_GET['id_order']);
		$bidModel = new BidModel();
		$bidModel->selectBid($_GET['id_bid']);
	}
}

?>