<?php

namespace ru\barmaglott\Controller;

use ru\barmaglott\Model\ClientModel;
use ru\barmaglott\Model\EmployeeModel;

class IdentificationController {
	public function identification() {
		if (isset ( $_POST ['submit'] )) {
			switch ($_POST['role']){
				case 'client' :
					$clientModel = new ClientModel ();
					$clientModel->identificationClient ( $_POST ['user_name'], $_POST ['user_password'] );
					break;
				case 'employee' :
					$employeeModel = new EmployeeModel ();
					$employeeModel->identificationEmployee ( $_POST ['user_name'], $_POST ['user_password'] );
					break;
			}
			/*
			if ($_POST['role']=="client"){
				$clientModel = new ClientModel ();
				$clientModel->identificationClient ( $_POST ['user_name'], $_POST ['user_password'] );
			}
			if ($_POST['role']=="employee"){
				$employeeModel = new EmployeeModel ();
				$employeeModel->identificationEmployee ( $_POST ['user_name'], $_POST ['user_password'] );
			}
			*/
		}
		
		if ($_SESSION ['user']) {
			return array (
					'data' => $_SESSION ['user'],
					'view' => 'ru/barmaglott/View/identificationYes.php' 
			);
		} else {
			return array (
					'data' => NULL,
					'view' => 'ru/barmaglott/View/identificationNo.php' 
			);
		}
	}
}
?>