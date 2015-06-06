<?php
	use ru\barmaglott\Controller\ProfileController;
	use ru\barmaglott\Controller\IdentificationController;
	// use ru\barmaglott\DAO\Client;
	// use ru\barmaglott\DAO\Bid;
	
	include_once 'templates/head.html';
	include_once 'templates/header.html';
	
	spl_autoload_register ( function ($class_name) {
		$path_class_name = str_replace ( '\\', '/', $class_name ); // strtolower($class_name)
		$pos = strrpos ( $path_class_name, '/' );
		$name = substr ( $path_class_name, $pos + 1 );
		$path_class_name = substr ( $path_class_name, 0, $pos + 1 ) . lcfirst ( $name );
		include_once ($path_class_name . '.php');
	} );
	session_start ();
	$messClient = '<p><a href="order.php">Добавить заказ</a></p>';
	$messEmployee = '<p>Чтобы добавить заявку выберете заказ.</p>';
	
	//include_once 'identification.php';
	
	$profileController = new profileController ();
	// $identificationController = new IdentificationController();
	// $identificationController->identification();
	// include_once 'identification.php';
	if (isset ( $_GET ['login'] )) {
		echo '<div id="sidebar" class="bg_color">';
			include_once 'templates/menu.html';
		echo '</div>';
		$list = $profileController->getProfile ( $_GET ['role'], $_GET ['login'] );
	}
	if (isset ( $_GET ['edit'] ) & isset ( $_SESSION ['user'] )) {
		$list = $profileController->getProfileEdit ( $_SESSION ['user'] );
		if (isset ( $_POST ['submit'] )) {
			$list = $profileController->updateProfile ( $_SESSION ['user'], $_POST ['password'], $_POST ['email'] );
		}
	}
	
	if (isset ( $_GET ['add'] )) {
		echo '<div id="sidebar" class="bg_color">';
		include_once 'templates/menu.html';
		echo '</div>';
		$list = $profileController->getProfileAdd ();
		if (isset ( $_POST ['submit'] )) {
			$list = $profileController->addProfile ( $_POST ['role'], $_POST ['login'], $_POST ['password'], $_POST ['email'], $_POST['phone'] );
		}
	}
	include_once $list ['view'];
	
	include_once 'templates/footer.html';
?>
     