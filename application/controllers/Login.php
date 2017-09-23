<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
	
	function index(){
        
        $data['all_includes'] = $this->load->view('template/all_includes',NULL,TRUE);

        if(($this->session->userdata('userlogin')))
        { 
            $data['side_view'] = $this->load->view('template/sidenav',NULL,true);
            // $data['topbar'] = $this->load->view('template/topbar',NULL,TRUE);
            $this->load->view('view_home', $data);	
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
}    
?>