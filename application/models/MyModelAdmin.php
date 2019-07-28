<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept,Client-Service,Auth-Key');
defined('BASEPATH') OR exit('No direct script access allowed');

class MyModelAdmin extends CI_Model {
         /**
 * @SWG\Model(id="reservation", required="Client-Service, Auth-Key,User-ID, Authorization",
 *     @SWG\Property(name="Client-Service",type="String"),
 *     @SWG\Property(name="Auth-Key",type="String"),
 *     @SWG\Property(name="User-ID",type="Integer"),
 *     @SWG\Property(name="Authorization",type="String")
 *     @SWG\Property(name="id",type="integer")
  * )
*/


    var $admin_service = "frontend-admin";
    var $auth_key       = "gustorestapi";

    public function check_auth_admin(){
        $admin_service = $this->input->get_request_header('Admin-Service', TRUE);
        $auth_key  = $this->input->get_request_header('Auth-Key', TRUE);
        
        if($admin_service == $this->admin_service && $auth_key == $this->auth_key){
            return true;
        } else {
            return json_output(401,array('status' => 401,'message' => 'Unauthorized.'));
        }
    }

    public function loginAdmin($username,$password)
    {
        $q  = $this->db->select('mot_de_passe,id')->from('administrateur')->where('identifiant',$username)->get()->row();
       
        if($q == ""){
            return array('status' => 204,'message' => 'Username not found.');
        } else {
            $hashed_password = $q->mot_de_passe;
            $id              = $q->id;
             //echo $hashed_password ." ".$password;
        //exit;
            if (hash_equals($hashed_password, crypt($password, $hashed_password))) {
               $last_login = date('Y-m-d H:i:s');
               //$token = crypt(substr( md5(rand()), 0, 7));
               $randomIdLength = 10;
               $bytes = random_bytes($randomIdLength);
               $token = str_replace(
                   ['.','/','='], 
                   '',
                   base64_encode($bytes)
               );
               $expired_at = date("Y-m-d H:i:s", strtotime('+12 hours'));
               $this->db->trans_start();
               //$this->db->where('id',$id)->update('administrateur',array('last_login' => $last_login));
               $this->db->insert('admin_authentication',array('admin_id' => $id,'token' => $token,'expired_at' => $expired_at));
               if ($this->db->trans_status() === FALSE){
                  $this->db->trans_rollback();
                  return array('status' => 500,'message' => 'Internal server error.');
               } else {
                  $this->db->trans_commit();
                  return json_output(200,array('status' => 200,'message' => 'Successfully login.','id' => $id, 'token' => $token));
                  //return array('status' => 200,'message' => 'Successfully login.','id' => $id, 'token' => $token);
               }
            } else {
                echo "Wrong password";
                exit();
               return array('status' => 204,'message' => 'Wrong password.');
            }
        }
    }

    public function logoutAdmin()
    {
        $admin_id  = $this->input->get_request_header('Admin-ID', TRUE);
        $token     = $this->input->get_request_header('Authorization', TRUE);
        $this->db->where('admin_id',$admin_id)->where('token',$token)->delete('admin_authentication');
        return json_output(200,array('status' => 200,'message' => 'Successfully logout.'));
    }

    public function auth()
    {
        $admin_id  = $this->input->get_request_header('Admin-ID', TRUE);
        $token     = $this->input->get_request_header('Authorization', TRUE);
        $q  = $this->db->select('expired_at')->from('admin_authentication')->where('admin_id',$admin_id)->where('token',$token)->get()->row();
        if($q == ""){
            return json_output(401,array('status' => 401,'message' => 'Unauthorized.'));
        } else {
            if($q->expired_at < date('Y-m-d H:i:s')){
                return json_output(401,array('status' => 401,'message' => 'Your session has been expired.'));
            } else {
                $updated_at = date('Y-m-d H:i:s');
                $expired_at = date("Y-m-d H:i:s", strtotime('+12 hours'));
                $this->db->where('client_id',$admin_id)->where('token',$token)->update('client_authentication',array('expired_at' => $expired_at,'updated_at' => $updated_at));
                return array('status' => 200,'message' => 'Authorized.');
            }
        }
    }
    // public function reservation_all_data()
    //  {
    //      return $this->db->select('reservation_id,date,time,c_id')->from('reservation')->where('c_id',$id)->order_by('reservation_id','desc')->get()->result();
    //  }
    
    public function reservation_all_data()
    {
       $response= $this->db->select('reservation_id,date,time,c_id')->from('reservation')->order_by('reservation_id','asc')->get()->result();
       
       return json_output(200,array('response'=>$response));
  
    }

    public function reservation_detail_data($id)
    {
        $response= $this->db->select('reservation_id,date,time,c_id')->from('reservation')->where('reservation_id',$id)->order_by('reservation_id','desc')->get()->row();
        return json_output(200,array('response'=>$response));

    }

    public function reservation_create_data($data)
    {
        
        $response=$this->db->insert('reservation',$data);
        return json_output(201,array('status' => 201,'message' => 'Data has been created.','response'=>$response));
    }

    public function reservation_update_data($id,$data)
    {
        $response=$this->db->where('reservation_id',$id)->update('reservation',$data);
        return json_output(200,array('status' => 200,'message' => 'Data has been updated.','response'=>$response));
    }

    public function reservation_delete_data($id)
    {
        $this->db->where('reservation_id',$id)->delete('reservation');
        return json_output(200,array('status' => 200,'message' => 'Data has been deleted.','response'=>$response));
    }

}
