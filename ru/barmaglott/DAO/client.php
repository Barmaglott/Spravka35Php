<?php
namespace ru\barmaglott\DAO;
class Client{
	private $id;
	private $login;
	private $password;
	private $email;
	private $list;

	/*
	public function __construct(){
	
	}*/
	public function __set($property, $value) {
		switch ($property) {
			case 'id' :	$this->id = $value;	break;
			case 'login' :	$this->login = $value; break;
			case 'password' : $this->password = $value; break;
			case 'email' :	$this->email = $value;	break;
			case 'list' : $this->list[] = $value; break;
		}
	}
	public function __get($property) {
		switch ($property) {
			case 'id' : return $this->id;
			case 'login' : return $this->login;
			case 'password' : return $this->password;
			case 'email' : return $this->email;
			case 'list' : return $this->list;
			break;
		}
	}
}
?>