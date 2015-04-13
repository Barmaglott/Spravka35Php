<?php
namespace ru\barmaglott\DAO;
class Order{
	private $id_order;
	private $title;
	private $describe_order;
	private $date_create;
	private $fk_id_client;
	private $numBid;
	private $listBid;
	/*
	public function __construct($id_order, $title, $describe_order, $date_create, $fk_id_client) {
		$this->id_order = $id_order;
		$this->title = $title;
		$this->describe_order = $describe_order;
		$this->date_create = $date_create;
		$this->fk_id_client;
	}*/
	public function __set($property, $value) {
		switch ($property) {
			case 'id_order' :	$this->id_order = $value;	break;
			case 'title' :	$this->title = $value; break;
			case 'describe_order' : $this->describe_order = $value; break;
			case 'date_create' :	$this->date_create = $value;	break;
			case 'fk_id_client' : $this->fk_id_client = $value; break;
			case 'numBid' : $this->numBid = $value; break;
			case 'listBid' : $this->listBid[] = $value; break;
		}
	}
	public function __get($property) {
		switch ($property) {
			case 'id_order' : return $this->id_order;
			case 'title' : return $this->title;
			case 'describe_order' : return $this->describe_order;
			case 'date_create' : return $this->date_create;
			case 'fk_id_client' : return $this->fk_id_client;
			case 'numBid' : return $this->numBid;
			case 'listBid' : return $this->listBid;
			break;
		}
	}
}
?>
	

