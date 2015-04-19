<?php
namespace ru\barmaglott\Model;
use ru\barmaglott\DAO\DataBase;
use ru\barmaglott\DAO\Employee;
use ru\barmaglott\DAO\Bid;

spl_autoload_register(function ($class_name){
	$path_class_name=str_replace('\\', '/', $class_name);//strtolower($class_name)
	$pos = strrpos($path_class_name, '/');
	$name = substr($path_class_name, $pos+1);
	$path_class_name=substr($path_class_name,0,$pos+1).lcfirst($name);

	include_once('../../../'.$path_class_name . '.php');
});
class EmployeeModel{
	//Выборка списка всех клиентов-исполнителей
	public function getAllEmployee(){
		$dbc=new DataBase();
		$obj=new Employee();
		$result = $dbc->queryReturnArray("SELECT * FROM employee", $obj);
		return $result;
	}
	//Выборка исполнителя по его id
	public function getIdEmployee($id){
		$dbc=new DataBase();
		$obj=new Employee();
		$result = $dbc->queryReturnArray("SELECT * FROM employee WHERE id='$id'", $obj);
		foreach ($result as $employee){
			$obj1=new Bid();
			$res = $dbc->queryReturnArray("SELECT * FROM spravka35.bid WHERE fk_id_employee='$employee->id'", $obj1);
			//var_dump($res);
			foreach ($res as $bid){
				$employee->listBid=$bid;
			}
		}
		return $result;
	}
	//Идентификация исполнителя по паре логин-пароль
	public function identificationEmployee($login, $password){
		$dbc=new DataBase();
		$obj=new Employee();
		$result = $dbc->queryReturnArray("SELECT * FROM employee WHERE login='$login' AND password=SHA('$password')", $obj);
		if (count($result)==1) {
			foreach ($result as $employee){
				$obj1=new Bid();
				$res = $dbc->queryReturnArray("SELECT * FROM spravka35.bid WHERE fk_id_employee='$employee->id'", $obj1);
				//var_dump($res);
				foreach ($res as $bid){
					$employee->listBid=$bid;
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