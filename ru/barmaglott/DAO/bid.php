<?php
namespace ru\barmaglott\DAO;
class Bid {
	private $id_bid;
	private $title;
	private $describe_bid;
	private $fk_id_employee;
	private $fk_id_order;
	/*
	public function __construct($id_bid, $title, $describe_bid, $fk_id_employee, $fk_id_order) {
		$this->id_bid = $id_bid;
		$this->title = $title;
		$this->describe_bid = $describe_bid;
		$this->fk_id_employee = $fk_id_employee;
		$this->fk_id_order;
	}
	*/
	public function __set($property, $value) {
		switch ($property) {
			case 'id_bid' :	$this->id_bid = $value;	break;
			case 'title' :	$this->title = $value; break;
			case 'describe_bid' : $this->describe_bid = $value; break;
			case 'fk_id_employee' :	$this->fk_id_employee = $value;	break;
			case 'fk_id_order' : $this->fk_id_order = $value; break;
		}
	}
	public function __get($property) {
		switch ($property) {
			case 'id_bid' : return $this->id_bid;
			case 'title' : return $this->title;
			case 'describe_bid' : return $this->describe_bid;
			case 'fk_id_employee' : return $this->fk_id_employee;
			case 'fk_id_order' : return $this->fk_id_order;
			break;
		}
	}
}
?>