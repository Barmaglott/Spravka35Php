<?php

namespace ru\barmaglott\Model;

use ru\barmaglott\DAO\DataBase;
use ru\barmaglott\DAO\Client;
use ru\barmaglott\DAO\Order;
use ru\barmaglott\DAO\ru\barmaglott\DAO;
class ClientModel {
	
	// Выборка списка всех клиентов-заказчиков
	public function getAllClient() {
		$dbc = new DataBase ();
		$obj = new Client ();
		$result = $dbc->queryReturnArray ( "SELECT * FROM client", $obj );
		// При выборе списка выборка заказов НЕ ПРОИСХОДИТ
		/*
		 * foreach ($result as $client){
		 * $obj1=new Order();
		 * $res = $dbc->query("SELECT * FROM spravka35.order WHERE fk_id_client='$client->id'", $obj1);
		 *
		 * foreach ($res as $order){
		 * $client->listOrder=$order;
		 * }
		 *
		 * }
		 */
		return $result;
	}
	
	// Выборка клиента по его id getIdClient
	public function getClientById($id) {
		$dbc = new DataBase ();
		$obj = new Client ();
		
		$result = $dbc->queryReturnArray ( "SELECT * FROM client WHERE id='$id'", $obj );
		
		foreach ( $result as $client ) {
			$obj1 = new Order ();
			$res = $dbc->queryReturnArray ( "SELECT * FROM spravka35.order WHERE fk_id_client='$client->id'", $obj1 );
			// var_dump($res);
			foreach ( $res as $order ) {
				$client->list = $order;
			}
		}
		return $result;
	}
	// Выборка клиента по его логину
	public function getClientByName($login) {
		$dbc = new DataBase ();
		$obj = new Client ();
		
		$result = $dbc->queryReturnArray ( "SELECT * FROM client WHERE login='$login'", $obj );
		
		foreach ( $result as $client ) {
			$obj1 = new Order ();
			$res = $dbc->queryReturnArray ( "SELECT * FROM spravka35.order WHERE approved = 1 AND fk_id_client='$client->id'", $obj1 );
			// var_dump($res);
			foreach ( $res as $order ) {
				$client->list = $order;
			}
		}
		return $result [0];
	}
	// Идентификация клиента по паре логин-пароль
	public function identificationClient($login, $password) {
		$dbc = new DataBase ();
		$obj = new Client ();
		$result = $dbc->queryReturnArray ( "SELECT * FROM client WHERE login='$login' AND password=SHA('$password')", $obj );
		if (count ( $result ) == 1) {
			foreach ( $result as $client ) {
				// $this->client=$client;
				$obj1 = new Order ();
				$res = $dbc->queryReturnArray ( "SELECT * FROM spravka35.order WHERE fk_id_client='$client->id'", $obj1 );
				// var_dump($res);
				foreach ( $res as $order ) {
					$client->list = $order;
				}
			}
			$_SESSION ['user'] = $result [0];
			// User::setInstance($result[0]);
		} else {
			$result = false;
		}
		return $result;
	}
	// Update профиль клиента
	public function updateProfileClient($id, $login, $password, $email) {
		$dbc = new DataBase ();
		// $obj=new Client();
		// password = SHA('$password'),
		$result = $dbc->queryAdd ( "UPDATE spravka35.client SET  email = '$email' WHERE id = '$id' and login = '$login' " );
	}
	public function insertProfileClient($login, $password, $email, $phone) {
		$dbc = new DataBase ();
		$dbc->queryAdd ( "INSERT INTO spravka35.client (login, password, email, phone, date_create) VALUES ('$login', SHA('$password'), '$email', '$phone', NOW())" );
	}
}
?>