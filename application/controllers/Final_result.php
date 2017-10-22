<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Final_result extends CI_Controller
{
	
	function index(){

        $data['all_includes'] = $this->load->view('template/all_includes',NULL,TRUE);


        if(($this->session->userdata('userlogin')))
        { 
            $data['side_view'] = $this->load->view('template/sidenav',NULL,true);
            $this->load->view('view_final_result', $data);	
        }
        else
        {
            $this->load->view('view_login',$data); 
        }
    } 

    public function generateFinalResult(){
        $this->load->model('Db_quiz');
        $response = array();
        $response = array();
        $response['status'] = 0;
        $result_set = $this->Db_quiz->get_final_result();
        if($result_set){
            $response['result'] = $result_set;
            $response['status'] = 1;
        }
        echo json_encode($response);
    }
}