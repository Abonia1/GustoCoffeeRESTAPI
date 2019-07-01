<?php

class MyModelAdminTest extends \PHPUnit\Framework\TestCase
{
    
    public function setUp(): void
    {
        $this->resetInstance();
        $this->CI->load->model('GustoCoffeeRESTAPI/MyModelAdmin');
        $this->obj = $this->MyModelAdmin;
    }
    
    public function test_reservation_all_data()
    {
        echo "Using Unit Test for get all reservation by admin";
        $actual = $this->obj ->reservation_all_data(3);	
       // $test = $this->request('GET',['MyModelAdmin','reservation_all_data']);
        $expected = [
            "reservation_id"=> "3",
        "date"=> "2019-06-10",
        "time"=> "16:00",
        "c_id"=> "1"
        ];
        $list = $this->obj->reservation_all_data();
         
         
        $test_name = "detail reservation test";
        $this->assertEquals($expected, $actual);
        
        //$this->assertArrayHasKey('foo', ['reservation_id' => '1']);
        //$this->$this->assertContains($expected_result, $test);
        
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