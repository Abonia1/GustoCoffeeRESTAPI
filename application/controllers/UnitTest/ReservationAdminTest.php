<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ReservationAdminTest extends CI_Controller {
        public function __construct()
        {
            parent::__construct(); 
            $this->load->library("unit_test");
            $this->load->reservationAdmin;	
        }
		
		
		// private function division($a,$b){
		// 	return $a/$b;
		// }
		
		public function index(){
			echo "Using Unit Test for get all resercvation by admin";	
			$test = $this->detail(1);
			$expected_result = 4;
			$test_name = "Division test function";
			echo $this->unit->run($test,$expected_result,$test_name);
		}
}		