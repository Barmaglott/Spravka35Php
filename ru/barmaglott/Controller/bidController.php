<?php

namespace ru\barmaglott\Controller;

use ru\barmaglott\Model\BidModel;
use ru\barmaglott\Model\OrderModel;

class BidController {
	/*
	 * public function listOrderByUser(){
	 * //if (get_class(User::getInstance())=='Client')
	 *
	 * if ($_SESSION['user'] instanceof Client ){
	 * $orderModel = new OrderModel();
	 * $listOrderByUser = $orderModel->getIdClientOrder($_SESSION['user']->id);
	 * return array('data'=>$listOrderByUser, 'view'=>'ru/barmaglott/View/orderView.php');
	 * }
	 * }
	 * public function addOrder(){
	 * if (isset($_POST['submit'])){
	 * $orderModel = new OrderModel();
	 * $orderModel->addOrder($_POST['title'], $_POST['describe_order'], $_SESSION['user']->id);
	 * }
	 * }
	 */
	// Выборка заказа по id
	public function getOrder($id_order) {
		$orderModel = new OrderModel ();
		$order = $orderModel->getOrderId ( $id_order );
		$_SESSION['id']=$id_order;
		// $order = $orderModel->getOrderIdReturnObject($id_order);
		return array (
				'data' => $order,
				'view' => 'ru/barmaglott/View/bidView.php' 
		);
	}
	// Выборка заявок по id заказа
	public function getBid($id_order) {
		$bidModel = new BidModel ();
		$bid = $bidModel->getBidIdOrder ( $id );
		return array (
				'data' => $bid,
				'view' => 'ru/barmaglott/View/bidView.php' 
		);
	}
	public function addOrder() {
		$bidModel = new BidModel ();
		$id_order = $_SESSION ['id'];
		$bidModel->addBid ( $_POST ['title'], $_POST ['describe_bid'], $_SESSION ['user']->id, $_SESSION ['id'] );
		// header("Location: http://".$_SERVER['SERVER_NAME']."/".$_SERVER['REQUEST_URI']);
		
		// return array('view'=>'ru/barmaglott/View/bidView.php');
	}
	

}
?>
