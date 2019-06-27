<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
//client
	public function login()
	{
		$method = $_SERVER['REQUEST_METHOD'];

		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {

			$check_auth_client = $this->MyModel->check_auth_client();
			
			if($check_auth_client == true){
				$params = $_REQUEST;
		        
		        $username = $params['email'];
		        $password = $params['mot_de_passe'];

		        	
		        $response = $this->MyModel->login($username,$password);
				echo $response;
				json_output($response['status'],$response);
			}
		}
	}

	public function logout()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->MyModel->check_auth_client();
			if($check_auth_client == true){
		        $response = $this->MyModel->logout();
				json_output($response['status'],$response);
			}
		}
	}
	

	//admin
	public function loginAdmin()
	{
		$method = $_SERVER['REQUEST_METHOD'];

		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {

			$check_auth_admin = $this->MyModelAdmin->check_auth_admin();
			
			if($check_auth_admin == true){
				$params = $_REQUEST;
		        
		        $username = $params['identifiant'];
		        $password = $params['mot_de_passe'];

		        	
		        $response = $this->MyModelAdmin->loginAdmin($username,$password);
				echo $response;
				json_output($response['status'],$response);
			}
		}
	}

	public function logoutAdmin()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_admin = $this->MyModelAdmin->check_auth_admin();
			if($check_auth_admin == true){
		        $response = $this->MyModelAdmin->logoutAdmin();
				json_output($response['status'],$response);
			}
		}
	}
}
