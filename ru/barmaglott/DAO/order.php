<?php
namespace ru\barmaglott\DAO;
class Order{
	private $id_order;
	private $title;
	private $depiction;
	private $date_create;
	private $fk_id_client;
	private $login;
	private $num;
	private $list;
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
			case 'depiction' : $this->depiction = $value; break;
			case 'date_create' :	$this->date_create = $value;	break;
			case 'fk_id_client' : $this->fk_id_client = $value; break;
			case 'login' : $this->login = $value; break;
			case 'num' : $this->num = $value; break;
			case 'list' : $this->list[] = $value; break;
		}
	}
	public function __get($property) {
		switch ($property) {
			case 'id_order' : return $this->id_order;
			case 'title' : return $this->title;
			case 'depiction' : return $this->depiction;
			case 'date_create' : return $this->date_create;
			case 'fk_id_client' : return $this->fk_id_client;
			case 'login' : return $this->login;
			case 'num' : return $this->num;
			case 'list' : return $this->list;
			break;
		}
	}
}
?>
	

