<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
	
	function index(){
        
        $data['all_includes'] = $this->load->view('template/all_includes',NULL,TRUE);

        if(($this->session->userdata('userlogin')))
        { 
            $data['side_view'] = $this->load->view('template/sidenav',NULL,true);
            $this->load->view('view_teamInfo.php', $data);	
        }
        else
        {
            $this->load->view('view_login',$data); 
        }
    } 		
    
    public function verify_login(){
        
        $data = file_get_contents("php://input");
        $phpArray = json_decode($data,true);
        $this->load->model('Db_login');
        $response = array();
        $status = 0;
        if(isset($phpArray['username']) && isset($phpArray['password'])){
            $username = $phpArray['username'];
            $password = $phpArray['password'];

            if($username!= '')
            {
                $login_status = $this->Db_login->login_check($username,$password);
                if($login_status['status'] == 1)
                {
                    $status= 1;
                    $response['status'] = $status;
                    foreach ($login_status['result'] as $row) {
                        $admin_id = $row->id;
                    }
                    $login_data = array('username' => $username ,
                        'admin_id' => $admin_id,
                        'round' => 0,
                        'quiz_id'=>0,
                        'userlogin' => TRUE
                    );
                    $this->session->set_userdata($login_data);
                }
                else
                {
                    $response['status'] = $status;
                }
            }
        }
        echo json_encode($response);
    }

    public function verify_logout()
    {
        $data = file_get_contents("php://input");
        $phpArray = json_decode($data,true);
        $response = array();
        $sesionData = array();
        $status = 0;
        if(isset($phpArray['logout'])){
            // check for injection attacks
            $logout = addslashes($phpArray['logout']);
            if($logout==1){                
                
                if ($this->session->userdata('userlogin'))
                {
                    $admin_id = $this->session->userdata('admin_id');
                }

                $login_data = array('username'=>'','admin_id' => '','userlogin'=>'');
                
                $this->session->unset_userdata($login_data);
                $this->session->sess_destroy();

                $this->load->model('Db_login');
                $this->Db_login->logout($admin_id);
                
                $status = 1;
            }
        }
        else{
           $status = 0;
       }
       
       $response['status'] = $status;
       echo json_encode($response);
   }
}    
?>