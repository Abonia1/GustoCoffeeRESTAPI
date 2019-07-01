<?php

class reservationadmintest extends \PHPUnit\Framework\TestCase
{
    
    public function __construct()
    {
        parent::__construct();
       // $this->load->library('unit_test');
    }
    
    public function test_detail()
    {
        echo "Using Unit Test for get all reservation by admin";	
        $test = $this->request('GET',['ReservationAdmin','detail']);
        $expected_result = ' {"reservation_id": "1",
        "date": "2019-09-05",
        "time": "11:30",
        "c_id": "1"}';
         
        $test_name = "detail reservation test";
        $this->assertArrayHasKey('foo', ['reservation_id' => '1']);
        $this->$this->assertContains($expected_result, $test);
        
        //echo $this->unit->run($test,$expected_result,$test_name);
    }
} 
// {
//         public function __construct()
//         {
//             parent::__construct(); 
//             $this->load->library("unit_test");
//             $this->load->reservationAdmin;	
//         }
		
		
// 		// private function division($a,$b){
// 		// 	return $a/$b;
// 		// }
		
// 		public function test_details(){
// 			echo "Using Unit Test for get all resercvation by admin";	
// 			$test = $this->detail(1);
// 			$expected_result = {
//                 "reservation_id": "1",
//                 "date": "2019-09-05",
//                 "time": "11:30",
//                 "c_id": "1"
//             };
// 			$test_name = "detail reservation test";
// 			echo $this->unit->run($test,$expected_result,$test_name);
// 		}
// }		