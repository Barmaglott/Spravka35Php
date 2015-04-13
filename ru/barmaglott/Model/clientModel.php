<?php
namespace ru\barmaglott\Model;
use ru\barmaglott\DAO\DataBase;
use ru\barmaglott\DAO\Client;
use ru\barmaglott\DAO\Order;
//use ru\barmaglott\Model\User;

/*
spl_autoload_register(function ($class_name){
	$path_class_name=str_replace('\\', '/', $class_name);//strtolower($class_name)
	$pos = strrpos($path_class_name, '/');
	$name = substr($path_class_name, $pos+1);
	$path_class_name=substr($path_class_name,0,$pos+1).lcfirst($name);

	include_once('../../../'.$path_class_name . '.php');
});
*/
class ClientModel{
	/*
	private $client;
	static public function  getClient(){
		(self::client)? $result = self::client: $result = false;
		return $result;
	}*/
	//Выборка списка всех клиентов-заказчиков
	public function getAllClient(){
		$dbc=new DataBase();
		$obj=new Client();
		$result = $dbc->query("SELECT * FROM client", $obj);
		//При выборе списка выборка заказов НЕ ПРОИСХОДИТ
		/*
		foreach ($result as $client){
			$obj1=new Order();
			$res = $dbc->query("SELECT * FROM spravka35.order WHERE fk_id_client='$client->id'", $obj1);
			
			foreach ($res as $order){
				$client->listOrder=$order;
			}
			
		}*/
		return $result;
	}
	//Выборка клиента по его id
	public function getIdClient($id){
		$dbc=new DataBase();
		$obj=new Client();
		
		$result = $dbc->query("SELECT * FROM client WHERE id='$id'", $obj);
		
		foreach ($result as $client){
			$obj1=new Order();
			$res = $dbc->query("SELECT * FROM spravka35.order WHERE fk_id_client='$client->id'", $obj1);
			//var_dump($res);
			foreach ($res as $order){
				$client->listOrder=$order;
			}
		}
		return $result;
	}
	//Идентификация клиента по паре логин-пароль
	public function identificationClient($login, $password){
		$dbc=new DataBase();
		$obj=new Client();
		$result = $dbc->query("SELECT * FROM client WHERE login='$login' AND password=SHA('$password')", $obj);
		if (count($result)==1) {
			foreach ($result as $client){
				//$this->client=$client;
				$obj1=new Order();
				$res = $dbc->query("SELECT * FROM spravka35.order WHERE fk_id_client='$client->id'", $obj1);
				//var_dump($res);
				foreach ($res as $order){
					$client->listOrder=$order;
				}
			
			}
			$_SESSION['user'] = $result[0];
			//User::setInstance($result[0]);
		}else {
			$result = false;
		}
		return $result;
	}
	
	
}
?>