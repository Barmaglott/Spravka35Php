<?php

namespace ru\barmaglott\Model;
// храним юзера
class User {
	private static $instance;
	private function __construct() {
	}
	private function __clone() {
	}
	// внедряем юзера
	static public function setInstance($user) {
		self::$instance = $user;
	}
	public static function getInstance() {
		if (is_null ( self::$instance ))
			self::$instance = 'UPSSS';
		return self::$instance;
	}
}
?>