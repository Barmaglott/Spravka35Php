<?php
namespace ru\barmaglott\Controller;
use ru\barmaglott\Model\OrderModel;

class IndexController{
	public function listAllOrder(){
		$orderModel = new OrderModel();
		return array('data'=>$orderModel->getAllOrder(),'view'=>'ru/barmaglott/View/indexView.php');
	}
	public function listOrderById($id){
		$result = $this->listAllOrder();
		$orerModel = new OrderModel();
		$order =  $orerModel->getOrderId($id);
		//$_SESSION['id'] = $order;
		$result['data_bid'] = $order;
	
		return $result;
	}
	public function listAllOrderByUser($user){
		return array('data'=>'listOrderByUser','view'=>'listOrderByUser');
	}
}
?>