<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Teaminfo extends CI_Controller{
	
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

    public function addTeamInfo(){
        $this->load->model('Db_master_data');
        $data = file_get_contents("php://input");
        $phpArray = json_decode($data,true);
        $response = array();
        $response['status'] = 0;
        
        $this->Db_master_data->addTeamInfo($phpArray);

        echo json_encode($response);
    }
}
?>