<?php

namespace ru\barmaglott\DAO;

class DataBase {
	private $mysqli;
	// Создаём подключение к БД
	public function __construct() {
		$this->mysqli = mysqli_connect ( 'localhost', 'root', 'm260180x', 'spravka35' ) or die ( 'Капец соединению' );
		$this->mysqli->query ( "SET NAMES utf8" );
	}
	// Запрос выборки из БД возвращает одиночный результат querySelect
	public function querySelect($query) {
		$result = mysqli_query ( $this->mysqli, $query ) or die ( 'Капец запросу' );
		return $result;
	}
	// Запрос вставки в БД queryAdd
	public function queryAdd($query) {
		mysqli_query ( $this->mysqli, $query ) or die ( 'Капец запросу' );
	}
	// Запрос на выборку конструирует объекты и возвращает массив queryReturnArray
	public function queryReturnArray($query, $obj_user) {
		$result = mysqli_query ( $this->mysqli, $query ) or die ( 'Капец запросу' );
		while ( $obj = $result->fetch_object ( get_class ( $obj_user ) ) ) {
			// var_dump($obj);
			// echo $obj->login.'<br />';
			// echo $obj->password.'<br />';
			$array [] = $obj;
		}
		return $array;
		// mysqli_close($dbc);
	}
	// Запрос на выборку конструирует объект и возвращает этот объект queryReturnObject
	public function queryReturnObject($query, $obj_user) {
		$result = mysqli_query ( $this->mysqli, $query ) or die ( 'Капец запросу' );
		while ( $obj = $result->fetch_object ( get_class ( $obj_user ) ) ) {
			// var_dump($obj);
			// echo $obj->login.'<br />';
			// echo $obj->password.'<br />';
			$array [] = $obj;
		}
		return $array [0];
	}
}

?>