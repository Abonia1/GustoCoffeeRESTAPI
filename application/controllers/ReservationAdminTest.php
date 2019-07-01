<?php

class ReservationAdminTest extends TestCase
{
    
    public function __construct()
       {
             parent::__construct(); 
             $this->load->library("unit_test");
             
            	
       }
       public function add($a,$b){
        return $a+$b;
        
       }
    
    public function test_detail()
     {
    //     echo "Using Unit Test for get all reservation by admin";	
    //     $test = $this->request('GET',['ReservationAdmin','detail']);
    //     $expected_result = ' {"reservation_id": "1",
    //     "date": "2019-09-05",
    //     "time": "11:30",
    //     "c_id": "1"}';
        $test =$this->add(1,1);
        $expected_result = 2;
        $test_name = 'Adds one plus one';
        echo $this->unit->run($test, $expected_result, $test_name);

        
        // $test = $this->MyModel->reservation_detail_data(1);
        // $expected_result= "reservation_id":"1",
        // "date": "2019-09-05",
        // "time": "11:30",
        // "c_id": "1";
        // $test_name='get detail of particular client reservation';
        // echo $this->unit->run($test,$expected_result,$test_name);

         
        // $test_name = "detail reservation test";
        // $this->$this->assertContains($expected_result, $test);
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


// public function add($a,$b)
// {
//     return $a+$b;
    
//    }

// public function test_add()
//  {
//     $test =$this->add(1,2);
//     $expected_result = 3;
//     $test_name = 'Adds one plus one';
//     $this->assertTrue(false);
//     //echo $this->unit->run($test, $expected_result, $test_name);
//  }
