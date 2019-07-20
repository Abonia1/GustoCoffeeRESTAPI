<?php
use Swagger\Annotations as SWG;
/**
 * @package
 * @category
 * @subpackage
 *
 * @SWG\Resource(
 *  apiVersion="0.2",
 *  swaggerVersion="1.2",
 *  resourcePath="Reservation Admin",
 *  basePath="http://aboweb.local:8080/GustoCoffeeRESTAPI/index.php/",
 *  produces="['application/json']"
 * )
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class reservationAdmin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('MyModelAdmin');
        $check_auth_admin = $this->MyModelAdmin->check_auth_admin();
		if($check_auth_admin != true){
			die($this->output->get_output());
		}
		
	}
	
	/**
 *
 * @SWG\Api(
 *   path="reservationadmin",
 *   description="GET",
 *   @SWG\Operations(
 *     @SWG\Operation(
 *       method="GET",
 *       summary="get reservation admin",
 *       notes="Returns a string",
 *       nickname="ReservationAdmin",
 *       @SWG\Parameters(
 *         @SWG\Parameter(
 *           name="Admin-Service",
 *           description="Admin Service",
 *           paramType="header",
 *           required=true,
 *           type="string"
 *         ),
 *        @SWG\Parameter(
 *           name="Auth-Key",
 *           description="Authentication Key",
 *           paramType="header",
 *           required=true,
 *           type="string"
 *         ),
 *         @SWG\Parameter(
 *           name="Admin-ID",
 *           description="user id or reference",
 *           paramType="header",
 *           required=true,
 *           type="integer"
 *         ),
 *  *         @SWG\Parameter(
 *           name="Authorization",
 *           description="authorization token",
 *           paramType="header",
 *           required=true,
 *           type="string"
 *         ),
 *       ),
 *       @SWG\ResponseMessages(
 *          @SWG\ResponseMessage(
 *            code=400,
 *            message="Invalid username"
 *          ),
 *          @SWG\ResponseMessage(
 *            code=404,
 *            message="Not found"
 *          )
 *       )
 *     )
 *   )
 * )
 */
	public function index()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_admin = $this->MyModelAdmin->check_auth_admin();
			if($check_auth_admin == true){
		        $response = $this->MyModelAdmin->auth();
		        if($response['status'] == 200){
					$resp = $this->MyModelAdmin->reservation_all_data();
					echo $resp;
	    			//json_output($response['status'],$resp);
		        }
			}
		}
	}
			/**
 *
 * @SWG\Api(
 *   path="reservationadmin/detail/{id}:",
 *   description="GET",
 *   @SWG\Operations(
 *     @SWG\Operation(
 *       method="GET",
 *       summary="detail reservation admin",
 *       notes="Returns a string",
 *       nickname="ReservationAdmin",
 *       @SWG\Parameters(
 *         @SWG\Parameter(
 *           name="Admin-Service",
 *           description="Admin Service",
 *           paramType="header",
 *           required=true,
 *           type="string"
 *         ),
 *        @SWG\Parameter(
 *           name="Auth-Key",
 *           description="Authentication Key",
 *           paramType="header",
 *           required=true,
 *           type="string"
 *         ),
 *         @SWG\Parameter(
 *           name="Admin-ID",
 *           description="user id or reference",
 *           paramType="header",
 *           required=true,
 *           type="string"
 *         ),
 *           @SWG\Parameter(
 *           name="Authorization",
 *           description="authorization token",
 *           paramType="header",
 *           required=true,
 *           type="string"
 *         ),
 *		 @SWG\Parameter(
 *           name="id",
 *           description="Reservation ID",
 *           paramType="header",
 *           required=true,
 *           type="integer"
 *         ),
 *       ),
 *       @SWG\ResponseMessages(
 *          @SWG\ResponseMessage(
 *            code=400,
 *            message="Invalid username"
 *          ),
 *          @SWG\ResponseMessage(
 *            code=404,
 *            message="Not found"
 *          )
 *       )
 *     )
 *   )
 * )
 */

	public function detail($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_admin = $this->MyModelAdmin->check_auth_admin();
			if($check_auth_admin == true){
		        $response = $this->MyModelAdmin->auth();
		        if($response['status'] == 200){
		        	$resp = $this->MyModelAdmin->reservation_detail_data($id);
					echo $resp;
					//json_output($response['status'],$resp);
		        }
			}
		}
	}
	/**
 *
 * @SWG\Api(
 *   path="reservationadmin/create",
 *   description="POST",
 *   @SWG\Operations(
 *     @SWG\Operation(
 *       method="POST",
 *       summary="create reservation admin",
 *       notes="Returns a string",
 *       nickname="ReservationAdmin",
 *       @SWG\Parameters(
 *         @SWG\Parameter(
 *           name="Admin-Service",
 *           description="Admin Service",
 *           paramType="header",
 *           required=true,
 *           type="string"
 *         ),
 *        @SWG\Parameter(
 *           name="Auth-Key",
 *           description="Authentication Key",
 *           paramType="header",
 *           required=true,
 *           type="string"
 *         ),
 *         @SWG\Parameter(
 *           name="Admin-ID",
 *           description="user id or reference",
 *           paramType="header",
 *           required=true,
 *           type="string"
 *         ),
 *           @SWG\Parameter(
 *           name="Authorization",
 *           description="authorization token",
 *           paramType="header",
 *           required=true,
 *           type="string"
 *         ),
 *		 @SWG\Parameter(
 *           name="c_id",
 *           description="User id",
 *           paramType="query",
 *           required=true,
 *           type="integer"
 *         ),
 * 		 @SWG\Parameter(
 *           name="date",
 *           description="date to reserve",
 *           paramType="query",
 *           required=true,
 *           type="string",
 * 			 format="date"
 *         ),
 * 		  @SWG\Parameter(
 *           name="time",
 *           description="Time to reserve",
 *           paramType="query",
 *           required=true,
 *           type="time"
 *         ),
 * 		  @SWG\Parameter(
 *           name="quantity",
 *           description="Number of person",
 *           paramType="query",
 *           required=true,
 *           type="integer"
 *         ),
 * 		  @SWG\Parameter(
 *           name="tbnumber",
 *           description="Table Number",
 *           paramType="query",
 *           required=true,
 *           type="integer"
 *         ),
 *  		 @SWG\Parameter(
 *           name="payment",
 *           description="payment in euro",
 *           paramType="query",
 *           required=true,
 *           type="integer"
 *         ),
 *       ),
 *       @SWG\ResponseMessages(
 *          @SWG\ResponseMessage(
 *            code=400,
 *            message="Invalid username"
 *          ),
 *          @SWG\ResponseMessage(
 *            code=404,
 *            message="Not found"
 *          )
 *       )
 *     )
 *   )
 * )
 */

	public function create()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_admin = $this->MyModelAdmin->check_auth_admin();
			if($check_auth_admin == true){
		        $response = $this->MyModelAdmin->auth();
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
		        		$resp = $this->MyModelAdmin->reservation_create_data($params);
					}
					echo $resp;
					//json_output($respStatus,$resp);
		        }
			}
		}
	}
				/**
 *
 * @SWG\Api(
 *   path="reservationadmin/update/{id}:",
 *   description="PUT",
 *   @SWG\Operations(
 *     @SWG\Operation(
 *       method="PUT",
 *       summary="update reservation admin",
 *       notes="Returns a string",
 *       nickname="ReservationAdmin",
 *       @SWG\Parameters(
 *         @SWG\Parameter(
 *           name="Admin-Service",
 *           description="Admin Service",
 *           paramType="header",
 *           required=true,
 *           type="string"
 *         ),
 *        @SWG\Parameter(
 *           name="Auth-Key",
 *           description="Authentication Key",
 *           paramType="header",
 *           required=true,
 *           type="string"
 *         ),
 *         @SWG\Parameter(
 *           name="Admin-ID",
 *           description="user id or reference",
 *           paramType="header",
 *           required=true,
 *           type="string"
 *         ),
 *           @SWG\Parameter(
 *           name="Authorization",
 *           description="authorization token",
 *           paramType="header",
 *           required=true,
 *           type="string"
 *         ),
* 		  @SWG\Parameter(
*			name="id",
 *           description="Reservation ID",
 *           paramType="path",
 *           required=true,
 *           type="integer"
 *         ),
 * 		 @SWG\Parameter(
 *           name="date",
 *           description="date to reserve",
 *           paramType="query",
 *           required=true,
 *           type="string",
 * 			 format="date"
 *         ),
 * 		  @SWG\Parameter(
 *           name="time",
 *           description="Time to reserve",
 *           paramType="query",
 *           required=true,
 *           type="time"
 *         ),
 * 		  @SWG\Parameter(
 *           name="quantity",
 *           description="Number of person",
 *           paramType="query",
 *           required=true,
 *           type="integer"
 *         ),
 * 		  @SWG\Parameter(
 *           name="tbnumber",
 *           description="Table Number",
 *           paramType="query",
 *           required=true,
 *           type="integer"
 *         ),
 *       ),
 *       @SWG\ResponseMessages(
 *          @SWG\ResponseMessage(
 *            code=400,
 *            message="Invalid username"
 *          ),
 *          @SWG\ResponseMessage(
 *            code=404,
 *            message="Not found"
 *          )
 *       )
 *     )
 *   )
 * )
 */

	public function update($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'PUT' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_admin = $this->MyModelAdmin->check_auth_admin();
			if($check_auth_admin == true){
		        $response = $this->MyModelAdmin->auth();
		        $respStatus = $response['status'];
		        if($response['status'] == 200){
					$params = $_REQUEST;
					//$params = json_decode(file_get_contents('php://input'), TRUE);
					//$params['updated_at'] = date('Y-m-d H:i:s');
					if ($params['date'] == "" || $params['time'] == ""||$params['time'] == ""|| $params['tbnumber'] == "") {
						$respStatus = 400;
						$resp = array('status' => 400,'message' =>  'date,time,quantity,tbnumber can\'t be empty');
					} else {
		        		$resp = $this->MyModelAdmin->reservation_update_data($id,$params);
					}
					echo $resp;
					//json_output($respStatus,$resp);
		        }
			}
		}
	}
				/**
 *
 * @SWG\Api(
 *   path="reservationadmin/delete/{id}:",
 *   description="DELETE",
 *   @SWG\Operations(
 *     @SWG\Operation(
 *       method="DELETE",
 *       summary="delete reservation admin",
 *       notes="Returns a string",
 *       nickname="ReservationAdmin",
 *       @SWG\Parameters(
 *         @SWG\Parameter(
 *           name="Admin-Service",
 *           description="Admin Service",
 *           paramType="header",
 *           required=true,
 *           type="string"
 *         ),
 *        @SWG\Parameter(
 *           name="Auth-Key",
 *           description="Authentication Key",
 *           paramType="header",
 *           required=true,
 *           type="string"
 *         ),
 *         @SWG\Parameter(
 *           name="Admin-ID",
 *           description="user id or reference",
 *           paramType="header",
 *           required=true,
 *           type="string"
 *         ),
 *           @SWG\Parameter(
 *           name="Authorization",
 *           description="authorization token",
 *           paramType="header",
 *           required=true,
 *           type="string"
 *         ),
 *  		  @SWG\Parameter(
 * 			name="id",
 *           description="Reservation ID",
 *           paramType="path",
 *           required=true,
 *           type="integer"
 *         ),
 *       ),
 *       @SWG\ResponseMessages(
 *          @SWG\ResponseMessage(
 *            code=400,
 *            message="Invalid username"
 *          ),
 *          @SWG\ResponseMessage(
 *            code=404,
 *            message="Not found"
 *          )
 *       )
 *     )
 *   )
 * )
 */
	public function delete($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'DELETE' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_admin = $this->MyModelAdmin->check_auth_admin();
			if($check_auth_admin == true){
		        $response = $this->MyModelAdmin->auth();
		        if($response['status'] == 200){
		        	$resp = $this->MyModelAdmin->reservation_delete_data($id);
					//json_output($response['status'],$resp);
					echo $resp;
		        }
			}
		}
	}

}
