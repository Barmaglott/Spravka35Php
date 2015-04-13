<?php
namespace ru\barmaglott\DAO;
class Employee{
	private $id;
	private $login;
	private $password;
	private $email;
	private $listBid;
	/*
	public function __construct(){

	}
	*/
	public function __set($property, $value) {
		switch ($property) {
			case 'id' :	$this->id = $value;	break;
			case 'login' :	$this->login = $value; break;
			case 'password' : $this->password = $value; break;
			case 'email' :	$this->email = $value;	break;
			case 'listBid' : $this->listBid[] = $value; break;
		}
	}
	public function __get($property) {
		switch ($property) {
			case 'id' : return $this->id;
			case 'login' : return $this->login;
			case 'password' : return $this->password;
			case 'email' : return $this->email;
			case 'listBid' : $this->listBid[] = $value; break;
			break;
		}
	}
}
?>