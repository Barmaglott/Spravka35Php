<?php

namespace ru\barmaglott\Controller;

use ru\barmaglott\Model\EmployeeModel;
use ru\barmaglott\Model\ClientModel;
use ru\barmaglott\DAO\Client;
use ru\barmaglott\DAO\Employee;

class ProfileController {
	public function getProfile($user_role, $user_login) {
		if ($user_role == 'client') {
			$clientModel = new ClientModel ();
			$client = $clientModel->getClientByName ( $user_login );
			return array (
					'role' => 'заказчик',
					'role_data' => 'заказов',
					'data' => $client,
					'view' => 'ru/barmaglott/View/profileLook.php' 
			);
		}
		if ($user_role == 'employee') {
			$employeeModel = new EmployeeModel ();
			$employee = $employeeModel->getEmployeeByName ( $user_login );
			return array (
					'role' => 'исполнитель',
					'role_data' => 'отзывов',
					'data' => $employee,
					'view' => 'ru/barmaglott/View/profileLook.php' 
			);
		}
	}
	public function getProfileEdit($user) {
		if ($user instanceof Client) {
			$clientModel = new ClientModel ();
			$client = $clientModel->getClientByName ( $user->login );
			return array (
					'data' => $client,
					'view' => 'ru/barmaglott/View/profileEdit.php' 
			);
		}
		if ($user instanceof Employee) {
			$employeeModel = new EmployeeModel ();
			$employee = $employeeModel->getEmployeeByName ( $user->login );
			return array (
					'data' => $employee,
					'view' => 'ru/barmaglott/View/profileEdit.php' 
			);
		}
		// return array('data'=>$user, 'view'=>'ru/barmaglott/View/profileEdit.php');
	}
	public function updateProfile($user, $password, $email) {
		if ($user instanceof Client) {
			$clientModel = new ClientModel ();
			$clientModel->updateProfileClient ( $user->id, $user->login, $password, $email );
			return $this->getProfileEdit ( $_SESSION ['user'] );
		}
		if ($user instanceof Employee) {
			$employeeModel = new EmployeeModel ();
			$employee = $employeeModel->updateProfileEmployee ( $user->id, $user->login, $password, $email );
			return $this->getProfileEdit ( $_SESSION ['user'] );
		}
	}
	public function getProfileAdd() {
		return array (
				'msg' => 'Создайте свой профиль сейчас.',
				'view' => 'ru/barmaglott/View/profileAdd.php' 
		);
	}
	// TODO Создать функцию для создания профиля
	public function addProfile($role, $login, $password, $email) {
		if ($role == "client") {
			$clientModel = new ClientModel ();
			if (! $clientModel->getClientByName ( $login )) {
				$clientModel->insertProfileClient ( $login, $password, $email );
				$clientModel->identificationClient ( $login, $password );
				// $msg = "Теперь вы полноправный заказчик.";
				// return $this->getProfileEdit($_SESSION['user']);
				$home_url = 'http://' . $_SERVER ['HTTP_HOST'] . '/Spravka35Php/index.php';
				header ( 'Location: ' . $home_url );
			}
			
			return array (
					'msg' => 'Заказчик с таким логином уже существует.Выберете другой логин.',
					'view' => 'ru/barmaglott/View/profileAdd.php' 
			);
		}
		if ($role == "employee") {
			$employeeModel = new EmployeeModel ();
			if (! $employeeModel->getEmployeeByName ( $login )) {
				$employeeModel->insertProfileEmployee ( $login, $password, $email );
				$employeeModel->identificationEmployee ( $login, $password );
				$home_url = 'http://' . $_SERVER ['HTTP_HOST'] . '/Spravka35Php/index.php';
				header ( 'Location: ' . $home_url );
				// $msg = "Теперь вы полноправный исполнитель.";
				// return $this->getProfileEdit($_SESSION['user']);
			}
			return array (
					'msg' => 'Исполнитель с таким логином уже существует.Выберете другой логин.',
					'view' => 'ru/barmaglott/View/profileAdd.php' 
			);
		}
	}
}
?>