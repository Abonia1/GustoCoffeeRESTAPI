<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept,Client-Service,Auth-Key');
use Swagger\Annotations as SWG;
/**
 * @package
 * @category
 * @subpackage
 *
 * @SWG\Resource(
 *  apiVersion="0.2",
 *  swaggerVersion="1.2",
 *  resourcePath="Auth",
 *  basePath="http://aboweb.local:8080/GustoCoffeeRESTAPI/index.php/",
 *  produces="['application/json']"
 * )
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
		/**
 *
 * @SWG\Api(
 *   path="auth/login",
 *   description="POST",
 *   @SWG\Operations(
 *     @SWG\Operation(
 *       method="POST",
 *       summary="Login Client",
 *       notes="Returns a string",
 *       nickname="LoginClient",
 *       @SWG\Parameters(
 *         @SWG\Parameter(
 *           name="Client-Service",
 *           description="Client Service",
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
 *           name="email",
 *           description="user name",
 *           paramType="query",
 *           required=true,
 *           type="string"
 *         ),
 *           @SWG\Parameter(
 *           name="mot_de_passe",
 *           description="password",
 *           paramType="query",
 *           required=true,
 *           type="password"
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
 *          )
 *       )
 *     )
 *   )
 * )
 */
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
				//return $response;
				echo $response;
				//json_output($response);
			}
		}
	}
		/**
 *
 * @SWG\Api(
 *   path="auth/logout",
 *   description="POST",
 *   @SWG\Operations(
 *     @SWG\Operation(
 *       method="POST",
 *       summary="Logout Client",
 *       notes="Returns a string",
 *       nickname="LogoutClient",
 *       @SWG\Parameters(
 *         @SWG\Parameter(
 *           name="Client-Service",
 *           description="Client Service",
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
 *           name="email",
 *           description="user name",
 *           paramType="query",
 *           required=true,
 *           type="string"
 *         ),
 *  *         @SWG\Parameter(
 *           name="mot_de_passe",
 *           description="password",
 *           paramType="query",
 *           required=true,
 *           type="string"
 *         ),
 *       ),
 *       @SWG\ResponseMessages(
 *          @SWG\ResponseMessage(
 *            code=400,
 *            message="Cant logout"
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
	public function logout()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_client = $this->MyModel->check_auth_client();
			if($check_auth_client == true){
				$response = $this->MyModel->logout();
				echo $response;
				//return json_output($response['status'],$response);
			}
		}
	}
	
		/**
 *
 * @SWG\Api(
 *   path="auth/loginadmin",
 *   description="POST",
 *   @SWG\Operations(
 *     @SWG\Operation(
 *       method="POST",
 *       summary="Login Admin",
 *       notes="Returns a string",
 *       nickname="LoginAdmin",
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
 *           name="identifiant",
 *           description="user name",
 *           paramType="query",
 *           required=true,
 *           type="string"
 *         ),
 *  *         @SWG\Parameter(
 *           name="mot_de_passe",
 *           description="password",
 *           paramType="query",
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
				//json_output($response['status'],$response);
			}
		}
	}
/**
 *
 * @SWG\Api(
 *   path="auth/logoutadmin",
 *   description="POST",
 *   @SWG\Operations(
 *     @SWG\Operation(
 *       method="POST",
 *       summary="Logout Admin",
 *       notes="Returns a string",
 *       nickname="LogoutAdmin",
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
 *           name="identifiant",
 *           description="user name",
 *           paramType="query",
 *           required=true,
 *           type="string"
 *         ),
 *  *         @SWG\Parameter(
 *           name="mot_de_passe",
 *           description="password",
 *           paramType="query",
 *           required=true,
 *           type="string"
 *         ),
 *       ),
 *       @SWG\ResponseMessages(
 *          @SWG\ResponseMessage(
 *            code=400,
 *            message="cant logout"
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

	public function logoutAdmin()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$check_auth_admin = $this->MyModelAdmin->check_auth_admin();
			if($check_auth_admin == true){
				$response = $this->MyModelAdmin->logoutAdmin();
				echo $response;
				//json_output($response['status'],$response);
			}
		}
	}
}
