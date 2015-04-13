<?php
namespace ru\barmaglott\DAO;
class DataBase{
	private $mysqli;
	public function __construct(){
		$this->mysqli = mysqli_connect('localhost','root','m260180x','spravka35')
			or die('Капец соединению');
		$this->mysqli->query ( "SET NAMES utf8" );
	}
	public function selectQuery($query){
		$result = mysqli_query($this->mysqli, $query)
			or die('Капец запросу');
		return $result;
	}
	public function addQuery($query){
		mysqli_query($this->mysqli, $query)
			or die('Капец запросу');
	}
	public function query($query,$obj_user){
		$result = mysqli_query($this->mysqli, $query)
			or die('Капец запросу');
		while ($obj = $result->fetch_object(get_class($obj_user))){
			//var_dump($obj);
			//echo $obj->login.'<br />';
			//echo $obj->password.'<br />';
			$array[]=$obj;
		}
		return $array;
		//mysqli_close($dbc);
	}
}

?>