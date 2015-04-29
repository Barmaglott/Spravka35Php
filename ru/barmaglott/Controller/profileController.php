<?php
namespace ru\barmaglott\Controller;
use ru\barmaglott\Model\EmployeeModel;
use ru\barmaglott\Model\ClientModel;
use ru\barmaglott\DAO\Client;

//use ru\barmaglott\DAO\Bid;
class ProfileController{
	
	public function getProfile($user_role, $user_login){
		if($user_role == 'client') {
			$clientModel = new ClientModel();
			$client = $clientModel->getClientByName($user_login);
			return array('data'=>$client, 'view'=>'ru/barmaglott/View/profileLook.php');
		}
		if ($user_role == 'employee') {
			$employeeModel = new EmployeeModel();
			$employee = $employeeModel->getEmployeeByName($user_login);
			return array('data'=>$employee, 'view'=>'ru/barmaglott/View/profileLook.php');
		}
	}
	public function getProfileEdit($user){
		return array('data'=>$user, 'view'=>'ru/barmaglott/View/profileEdit.php');
	}
	//TODO Создать функцию для изменения профиля
	public function updateProfile($user, $password, $email){
		//$user = $_SESSION['user'];
		if( $_SESSION['user'] instanceof Client) {
			$clientModel = new ClientModel();
			$clientModel->updateProfileClient($_SESSION['user']->id, $_SESSION['user']->login, $password, $email);
			return $this->getProfile('client', $_SESSION['user']->login);
		}
		if (get_class($_SESSION['user']) instanceof ru\barmaglott\DAO\Employee) {
			$employeeModel = new EmployeeModel();
			$employee = $employeeModel->updateProfileEmployee($id, $login, $password, $email);
			return array('data'=>$employee, 'view'=>'ru/barmaglott/View/profileLook.php');
		}
		
	}
	//TODO Создать функцию для создания профиля
}
?>