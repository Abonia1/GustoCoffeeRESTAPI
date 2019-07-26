<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
use Swagger\Annotations as SWG;
/**
 * @package
 * @category
 * @subpackage
 *
 * @SWG\Resource(
 *  apiVersion="0.2",
 *  swaggerVersion="1.2",
 *  resourcePath="Reservation Client",
 *  basePath="http://aboweb.local:8080/GustoCoffeeRESTAPI/index.php/",
 *  produces="['application/json']"
 * )
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class service extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('MyModel');
		
		
    }
    
    public function index()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
					$resp = $this->MyModel->service_all_data();
					echo $resp;
					header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
					
	    			//return json_output(array($response['status'],$resp));
		        }

	}
	public function service_type($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
					$resp = $this->MyModel->service_type_data($id);
					echo $resp;
	    			//return json_output(array($response['status'],$resp));
		        }

	}
}