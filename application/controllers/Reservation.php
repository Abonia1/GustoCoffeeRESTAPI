<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reservation extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('MyModel');
        $check_auth_client = $this->MyModel->check_auth_client();
		if($check_auth_client != true){
			die($this->output->get_output());
		}
		
	}
	//admin

	//client
	public function index()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->MyModel->check_auth_client();
			if($check_auth_client == true){
		        $response = $this->MyModel->auth();
		        if($response['status'] == 200){
		        	$resp = $this->MyModel->reservation_all_data();
	    			json_output($response['status'],$resp);
		        }
			}
		}
	}

	public function detail($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->MyModel->check_auth_client();
			if($check_auth_client == true){
		        $response = $this->MyModel->auth();
		        if($response['status'] == 200){
		        	$resp = $this->MyModel->reservation_detail_data($id);
					json_output($response['status'],$resp);
		        }
			}
		}
	}

	public function create()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->MyModel->check_auth_client();
			if($check_auth_client == true){
		        $response = $this->MyModel->auth();
		        $respStatus = $response['status'];
		        if($response['status'] == 200){
					//echo file_get_contents('php://input');
					//$params = json_decode(file_get_contents('php://input'), TRUE);
					//$params=file_get_contents('php://input');
					$params = $_REQUEST;
					if ($params['date'] == "" || $params['time'] == ""|| $params['quantity'] == ""|| $params['tbnumber'] == "") {
						$respStatus = 400;
						$resp = array('status' => 400,'message' =>  'date,time,quantity,tbnumber can\'t be empty');
					} else {
		        		$resp = $this->MyModel->reservation_create_data($params);
					}
					json_output($respStatus,$resp);
		        }
			}
		}
	}

	public function update($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'PUT' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->MyModel->check_auth_client();
			if($check_auth_client == true){
		        $response = $this->MyModel->auth();
		        $respStatus = $response['status'];
		        if($response['status'] == 200){
					$params = $_REQUEST;
					//$params = json_decode(file_get_contents('php://input'), TRUE);
					//$params['updated_at'] = date('Y-m-d H:i:s');
					if ($params['date'] == "" || $params['time'] == ""||$params['time'] == ""|| $params['tbnumber'] == "") {
						$respStatus = 400;
						$resp = array('status' => 400,'message' =>  'date,time,quantity,tbnumber can\'t be empty');
					} else {
		        		$resp = $this->MyModel->reservation_update_data($id,$params);
					}
					json_output($respStatus,$resp);
		        }
			}
		}
	}

	public function delete($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'DELETE' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->MyModel->check_auth_client();
			if($check_auth_client == true){
		        $response = $this->MyModel->auth();
		        if($response['status'] == 200){
		        	$resp = $this->MyModel->reservation_delete_data($id);
					json_output($response['status'],$resp);
		        }
			}
		}
	}

}
